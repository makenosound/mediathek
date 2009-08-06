<?php

	Class extension_mediathek extends Extension {
	
		/**
		 * Extension information
		 */
		 
		public function about() {
			return array(
				'name' => 'Field: Mediathek',
				'version' => '2.0',
				'release-date' => '2009-08-06',
				'author' => array(
					'name' => 'Nils Hörrmann',
					'website' => 'http://www.nilshoerrmann.de',
					'email' => 'post@nilshoerrmann.de'
				)
			);
		}
	
		/**
		 * Add callback functions to backend delegates
		 */

		public function getSubscribedDelegates(){
			return array(
				array(
					'page' => '/administration/',
					'delegate' => 'AdminPagePreGenerate',
					'callback' => '__appendAssets'
				),
				array(
					'page' => '/publish/new/',
					'delegate' => 'EntryPostNew',
					'callback' => '__saveSortOrder'
				),
				array(
					'page' => '/publish/edit/',
					'delegate' => 'EntryPostEdit',
					'callback' => '__saveSortOrder'
				)
			);
		}
	
		/**
		 * Append assets to the page head
		 *
		 * @param object $context 
		 */

		public function __appendAssets($context) {
			// append javascript for field settings pane
			if (Administration::instance()->Page instanceof contentBlueprintsSections) {
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/mediathek/assets/section.js', 100, false);
			}
			// append styles and javascript for mediasection display
			if (Administration::instance()->Page instanceof contentPublish) {
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/mediathek/assets/mediasection.js', 100, false);
				Administration::instance()->Page->addStylesheetToHead(URL . '/extensions/mediathek/assets/mediasection.css', 'screen', 101, false);
			}
		}
			
		/**
		 * Saves sort order of the field
		 *
		 * @param object $context 
		 */

		public function __saveSortOrder($context) {
			foreach($context['fields']['sort_order'] as $id => $value) {
				$entries = explode(',', $value);
				$order = array();
				foreach($entries as $entry) {
					$order[] = intval($entry);
				}
				Administration::instance()->Database->query(
					"UPDATE `tbl_fields_mediathek`
					SET `sort_order` = '" . implode(',', $order) . "'
					WHERE `field_id` = " . intval($id)			
				);
			}
		}
	
		/**
		 * Function to be executed on uninstallation
		 */
	
		public function uninstall() {
			// drop database table
			Administration::instance()->Database->query("DROP TABLE `tbl_fields_mediathek`");
		}
	
		/**
		 * Function to be executed if the extension has been updated
		 *
		 * @param string $previousVersion - version number of the currently installed extension build
		 * @return boolean - true on success, false otherwise
		 */
		
		public function update($previousVersion) {
			if(version_compare($previousVersion, '1.1', '<')){
				return Administration::instance()->Database->query(
					"ALTER TABLE `tbl_fields_mediathek` 
					ADD `allow_multiple_selection` enum('yes','no') NOT NULL default 'yes', 
					ADD `filter_tags` text"
				);
			}
			if(version_compare($previousVersion, '2.0', '<')) {
				return Administration::instance()->Database->query(
					"ALTER TABLE `tbl_fields_mediathek` 
					ADD `caption` text, 
					ADD `included_fields` text, 
					ADD `sort_order` text, 
					DROP `related_field_id`, 
					DROP `related_title_id`, 
					DROP `show_count`"
				);
			}
			return true;
		}
	
		/**
		 * Function to be executed on installation.
		 *
		 * @return boolean - true on success, false otherwise
		 */
	
		public function install() {
			// Create database table and fields.
			return Administration::instance()->Database->query(
				"CREATE TABLE `tbl_fields_mediathek` (
					`id` int(11) unsigned NOT NULL auto_increment,
					`field_id` int(11) unsigned NOT NULL,
					`related_section_id` VARCHAR(255) NOT NULL,
					`filter_tags` text,
					`caption` text, 
					`included_fields` text, 
					`sort_order` text,
					`allow_multiple_selection` enum('yes','no') NOT NULL default 'yes',
        	  		PRIMARY KEY  (`id`),
			  		KEY `field_id` (`field_id`)
				)"
			);
		}
		
	}
