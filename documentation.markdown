# Documentation: Mediathek

Mediathek is the German word for media center. It is an enhancement of a select box field that links entries between sections focussing on connecting media to articles.

* [Mediathek Extension](http://github.com/nilshoerrmann/mediathek/tree)

### Known Issues

1. 
2.
3.

### Dependencies

    extensions/jit_image_manipulation

### Installation

#### Manual Installation

Download, unpacking, uploading, enabeling ...

1. Upload the mediathek folder in this archive to your Symphony extensions folder.
2. Enable it by selecting Field: Mediathek, choose enable from the with-selected menu, then click apply.
3. You can now add the Mediathek field to your sections.

#### Via Git

GitHub procedure

### Updating

#### Manual Update

**Please do always make a backup before updating your extensions!**

1. Deleted the old "mediathek" folder in your Symphony "extensions" folder and replace it with the new one in this archive.
2. Update your database by enabling the "Field: Mediathek" under "Extensions" in your Symphony backend (see installation, section 2).

Be aware that due to some changes in the data source output (see change log) your XSL templates will need some tender love and care.

#### Via Git
      
### Configuration

#### Label

Title of the field

#### Placement

Location of the field (main content or sidebar)

#### Related section

Section to be linked to the current one

#### Allow selection of multiple options

Switch between single or multiple select mode

#### Filter items by tags or categorie:

A comma separated list of tags or categories that should be used to filter the output. A minus sign excludes a tag or category.

#### Custom item caption

Template to be used to build the text that represents the linked entries in the Mediathek.

#### Included elements

List of all fields that should be included in the data source output.

### Usage

Description of UI elements.

#### Closed Mediathek

A closed Mediathek will only show selected items.

- *dragging:* Dragging items up and down will reorder the Mediathek. This order will be respected in the data source output. Note: You have to save changes to apply your ordering.
- *drag and drop:* Dragging items outside the Mediathek allows you to drop the item into any given textarea. Images will be inserted as image tags, files will be inserted as links (The markup will respect your selected text-formatter. Currently supported are Markdown, Textile and plain HTML). Note: Drag and drop is only available for items with files attached.
- *preview:* Images and files can be previewed. A small plus icon indicates a conneted file and toggles the preview. 
- *unselect:* Doubleclick an item to unselect it.

#### Opened Mediathek

An opened Mediathek will show all items of the related section depending on the given filter values. Items will be sorted alphabetically, selected items will be highlighted. Click edit to open and close the Mediathek.

- *select:* Click an item to select it.
- *unselect:* Click a selected item to unselect it.
- *preview:* Same behaviour as in opened mode.
- *search:* Type a term into the search field. Searching will start automatically.

#### Create new Items

Click the create new tab to add a new item. Newly created items will be marked as selected automatically.

#### Drag and Drop Items

How to drag and drop items.

#### Preview

How to use preview.

### Sample Data Source Output

	<data />

#### Using XSLT to change markup

Change HTML markup based on Mediathek data source output.
See <http://chaoticpattern.com/article/manipulating-html-in-xml/>

### Contributing

Forking the repository.