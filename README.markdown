# Mediathek

Mediathek is the German word for media center. It is an enhancement of a select box field that links entries between sections focussing on connecting media to articles.

- Version: 2.0.5
- Date: 8th February 2010
- Author: Nils Hörrmann, post@nilshoerrmann.de
- Repository: <http://github.com/nilshoerrmann/mediathek/tree/master>
- Requirements: Symphony CMS 2.0.7 or newer, <http://github.com/symphony/symphony-2/tree/master>
- Optional Requirement: JIT Image Manipulation (for image previews), <http://github.com/pointybeard/jit_image_manipulation/tree/master>

This extension contains the following languages:

- English (default)
- German

### Documentation

For further assistence please have a look at the documentation in the `documentation` folder.

### Updating from version 2.0.2 to version 2.0.3

Due to a bug in the Symphony core the update function for extensions is broken. You have to run the following SQL statements replacing `tbl_` with your current database table prefix, e. g. `sym_`:

	ALTER TABLE `tbl_fields_mediathek_sorting`
		DROP PRIMARY KEY,
		CHANGE `entry_id` `entry_id` INT(11) NOT NULL,
		ADD `id` INT(11) NOT NULL,
		ADD `field_id` INT(11) NOT NULL;

	ALTER TABLE `tbl_fields_mediathek_sorting` 
		ADD PRIMARY KEY (`id`),
		CHANGE `id` `id` INT(11) unsigned NOT NULL AUTO_INCREMENT;

**If you have sections with Mediathek fields making use of the ordering feature, you need to manually edit each entry restoring the item order and resaving the entry. Apologies for any inconvenience.**

### Change Log

Version 2.0.5 - 8th February 2010

- [fixed]	jQuery 1.4 and Symphony 2.0.7 compatibility (thanks brendo)

Version 2.0.4 - 15th January 2010

- [fixed]	Symphony 2.0.7 compatibility (thanks brendo)
- [fixed]	issues with sort order (thanks brendo)

Version 2.0.3 - 30th September 2009

- [fixed]	sort order bug with multiple field instances (see update notes above)
- [fixed]	display issues in Internet Explorer 7 and lower

Version 2.0.2 - 20th September 2009

- [fixed]	logic bug in asset management

Version 2.0.1 - 19th September 2009

- [fixed]	issues with data source output
- [fixed]	Textile syntax
- [added]	improved asset management

Version 2.0 - 27th September 2009

- complete rewrite of the extension using jQuery, which is now part of the Symphony core.

Version 1.1.3 - 13th March 2009

- [fixed]   fetch correct id after creating new entry
- [fixed]   invisible preview link

Version 1.1.2 - 5th March 2009

- [fixed]   changed color handling on drop
- [fixed]   corrected regex used to determine id of newly created items

Version 1.1.1 - 20th February 2009

- [added]   Improved script detection
- [fixed]   Added missing option to exclude tags while filtering

Version 1.1 - 16th February 2009

- [fixed]   Data sources will return file information instead of IDs
- [fixed]   Allow multiple Mediathek fields in the same section
- [added]   Option to toggle between single or multiple select mode
- [added]   Allow data source sorting for single select Mediathek fields
- [added]   Search functionality
- [added]   Tag and category filter
- [added]   Option to toggle entry overview information (file name or file count)
- [added]   German translation
- [removed] File count for opened and closed Mediathek

Version 1.0 - 11th January 2009

- Initial release

### Credits

This extension was originally based on the core select box field created by the Symphony team, Alistair Kearney, Allen Chang, Scott Hughes. Thanks to all extension developers for inspirations.