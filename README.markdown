# Mediathek (unstable)

- Version: 2.0 beta
- Date: 6th August 2009
- Author: Nils Hörrmann, post@nilshoerrmann.de
- Repository: <http://github.com/nilshoerrmann/mediathek/tree/master>
- Requirements: 
  - Symphony CMS 2.0.6 or newer, <http://github.com/symphony/symphony-2/tree/master>
  - JIT Image Manipulation (for image previews), <http://github.com/pointybeard/jit_image_manipulation/tree/master>


## Introduction

Mediathek is the German word for media center. It is an enhancement of a select box field that links entries between sections focussing on connecting media to articles.

### Features: Settings

- *Label:* Title of the field
- *Placement:* Location of the field (main content or sidebar)
- *Related section:* Section to be linked to the current one
- *Allow selected of multiple options:* Switch between single or multiple select mode
- *Filter items by tags or categorie:* A comma separated list of tags or categories that should be used to filter the output. A minus sign excludes a tag or category.
- *Custom item caption:* Template to be used to build the text that represents the linked entries in the Mediathek.
- *Included elements:* List of all fields that should be included in the data source output.

### Features: Closed Mediathek

A closed Mediathek will only show selectec items.

- *dragging:* Dragging items up and down will reorder the Mediathek. This order will be respected in the data source output. Note: You have to save changes to apply your ordering.
- *drag and drop:* Dragging items outside the Mediathek allows you to drop the item into any given textarea. Images will be inserted as image tags, files will be inserted as links (The markup will respect your selected text-formatter. Currently supported are Mardown, Textile and plain HTML). Note: Drag and drop is only available for items with files attached.
- *preview:* Images and files can be previewed. A small plus icon indicates a conneted file and toggles the preview. 
- *unselect:* Doubleclick an item to unselect it.


### Features: Opened Mediathek

An opened Mediathek will show all items of the related section depending on the given filter values. Items will be sorted alphabetically, selected items will be highlighted. Click edit to open and close the Mediathek.

- *select:* Click an item to select it.
- *unselect:* Click a selected item to unselect it.
- *preview:* Same behaviour as in opened mode.
- *search:* Type a term into the search field. Searching will start automatically.

### Features: Create New

Click the create new tab to add a new item. Newly created items will be marked as selected automatically.


## Installation

1. Upload the `mediathek` folder in this archive to your Symphony `extensions` folder.
2. Enable it by selecting `Field: Mediathek`, choose `enable` from the `with-selected` menu, then click `apply`.
3. You can now add the Mediathek field to your sections.


## Updating

1. Deleted the old "mediathek" folder in your Symphony "extensions" folder and replace it with the new one in this archive.
2. Update your database by enabling the "Field: Mediathek" under "Extensions" in your Symphony backend (see installation, section 2).
4. PLEASE NOTE: Be aware that due to some changes in the data source output (see change log) your XSL templates will need some tender love and care.


## Change Log

Version 2.0 - 6th August 2009

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