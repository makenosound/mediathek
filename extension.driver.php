<?php

	Class extension_mediathek extends Extension {

		/**
		 * Extension information
		 */

		public function about() {
			return array(
				'name' => 'Field: Mediathek',
				'version' => '2.0.3',
				'release-date' => 'unreleased',
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
				),
				array(
					'page' => '/publish/',
					'delegate' => 'Delete',
					'callback' => '__deleteSortOrder'
				)
			);
		}

		/**
		 * Append assets to the page head
		 *
		 * @param object $context
		 */

		public function __appendAssets($context) {
			$callback = Administration::instance()->getPageCallback();

			// Append javascript for field settings pane
			if ($callback['driver'] == 'blueprintssections' && is_array($callback['context'])){
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/mediathek/assets/section.js', 100, false);
			}

			// Append styles and javascript for mediasection display
			if ($callback['driver'] == 'publish' && ($callback['context']['page'] == 'edit' || $callback['context']['page'] == 'new')){
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
			if(!is_null($context['fields']['sort_order'])) {
				// delete current sort order
				$entry_id = $context['entry']->_fields['id'];
				Administration::instance()->Database->query(
					"DELETE FROM `tbl_fields_mediathek_sorting` WHERE `entry_id` = '$entry_id'"
				);
				// add new sort order
				foreach($context['fields']['sort_order'] as $field_id => $value) {
					$entries = explode(',', $value);
					$order = array();
					foreach($entries as $entry) {
						$order[] = intval($entry);
					}
					Administration::instance()->Database->query(
						"INSERT INTO `tbl_fields_mediathek_sorting` (`entry_id`, `field_id`, `order`) VALUES ('$entry_id', '$field_id', '" . implode(',', $order) . "')"
					);
				}
			}
		}

		/**
		 * Delete sort order of the field
		 *
		 * @param object $context
		 */

		public function __deleteSortOrder($context) {
			// DELEGATE NOT WORKING:
			// http://github.com/symphony/symphony-2/issues#issue/108
		}

		/**
		 * Function to be executed on uninstallation
		 */

		public function uninstall() {
			// drop database table
			Administration::instance()->Database->query("DROP TABLE `tbl_fields_mediathek`");
			Administration::instance()->Database->query("DROP TABLE `tbl_fields_mediathek_sorting`");
		}

		/**
		 * Function to be executed if the extension has been updated
		 *
		 * @param string $previousVersion - version number of the currently installed extension build
		 * @return boolean - true on success, false otherwise
		 */

		public function update($previousVersion) {
			if(version_compare($previousVersion, '1.1', '<')){
				$updated = Administration::instance()->Database->query(
					"ALTER TABLE `tbl_fields_mediathek`
						ADD `allow_multiple_selection` enum('yes','no') NOT NULL default 'yes',
						ADD `filter_tags` text"
				);
				if(!$updated) return false;
			}
			if(version_compare($previousVersion, '2.0', '<')) {
				$updated = Administration::instance()->Database->query(
					"ALTER TABLE `tbl_fields_mediathek`
						ADD `caption` text,
						ADD `included_fields` text,
						DROP `related_field_id`,
						DROP `related_title_id`,
						DROP `show_count`"
				);
				if(!$updated) return false;
				$updated = Administration::instance()->Database->query(
					"CREATE TABLE `tbl_fields_mediathek_sorting` (
						`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
						`entry_id` int(11) NOT NULL,
						`field_id` ind(11) NOT NULL,
						`order` text,
						PRIMARY KEY (`id`)
					);"
				);
				if(!$updated) return false;
			}
			if(version_compare($previousVersion, '2.0.3', '<')) {
				$updated = Administration::instance()->Database->query(
					"ALTER TABLE `tbl_fields_mediathek_sorting`
						DROP PRIMARY KEY,
						CHANGE `entry_id` `entry_id` INT(11) NOT NULL,
						ADD `id` INT(11) NOT NULL,
						ADD `field_id` INT(11) NOT NULL"
				);
				if(!$updated) return false;
				$updated = Administration::instance()->Database->query(
					"ALTER TABLE `tbl_fields_mediathek_sorting`
						ADD PRIMARY KEY (`id`),
						CHANGE `id` `id` INT(11) unsigned NOT NULL AUTO_INCREMENT"
				);
				if(!$updated) return false;
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
			$fields = Administration::instance()->Database->query(
				"CREATE TABLE `tbl_fields_mediathek` (
					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					`field_id` int(11) unsigned NOT NULL,
					`related_section_id` VARCHAR(255) NOT NULL,
					`filter_tags` text,
					`caption` text,
					`included_fields` text,
					`allow_multiple_selection` enum('yes','no') NOT NULL default 'yes',
        	  		PRIMARY KEY  (`id`),
			  		KEY `field_id` (`field_id`)
				)"
			);
			$sorting = Administration::instance()->Database->query(
				"CREATE TABLE `tbl_fields_mediathek_sorting` (
					`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
					`entry_id` int(11) NOT NULL,
					`field_id` int(11) NOT NULL,
					`order` text,
					PRIMARY KEY (`id`)
				)"
			);
			if($fields && $sorting) return true;
			else return false;
		}

	}