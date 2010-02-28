# Mediathek

A media center for Symphony.

- Version: 2.1dev
- Date: **unreleased**
- Requirements: Symphony CMS 2.0.7 or newer, <http://github.com/symphony/symphony-2>
- Optional Requirement: JIT Image Manipulation (for image previews), <http://github.com/pointybeard/jit_image_manipulation>
- Author: Nils Hörrmann, post@nilshoerrmann.de
- Constributors: [A list of contributors can be found in the commit history](http://github.com/nilshoerrmann/mediathek/commits/master)
- GitHub Repository: <http://github.com/nilshoerrmann/mediathek/tree/master>
- Available languages: English (default), German

## Synopsis

Mediathek is the German word for media center. It is an enhancement of a select box field that links entries between sections focussing on connecting media to articles.

## Installation

Information about [installing and updating extensions](http://symphony-cms.com/learn/tasks/view/install-an-extension/) can be found in the Symphony documentation at <http://symphony-cms.com/learn/>.

## Documentation

For further assistence please have a look at the documentation in the `documentation` folder.

## Change Log

**Version 2.1** - yet to be released

- [changed]	Complete rewrite of the JavaScript to match the Symphony plugin architecture
- [changed]	New interface to improve usability

**Version 2.0.5** - 8th February 2010

- [fixed]	jQuery 1.4 and Symphony 2.0.7 compatibility (thanks brendo)

**Version 2.0.4** - 15th January 2010

- [fixed]	Symphony 2.0.7 compatibility (thanks brendo)
- [fixed]	Issues with sort order (thanks brendo)

**Version 2.0.3** - 30th September 2009

- [fixed]	Sort order bug with multiple field instances (see update notes above)
- [fixed]	Display issues in Internet Explorer 7 and lower

**Version 2.0.2** - 20th September 2009

- [fixed]	Logic bug in asset management

**Version 2.0.1** - 19th September 2009

- [fixed]	Issues with data source output
- [fixed]	Textile syntax
- [added]	Improved asset management

**Version 2.0** - 27th September 2009

- [changed]	Complete rewrite of the extension using jQuery, which is now part of the Symphony core.

**Version 1.1.3** - 13th March 2009

- [fixed]   Fetch correct id after creating new entry
- [fixed]   Invisible preview link

**Version 1.1.2** - 5th March 2009

- [fixed]   Changed color handling on drop
- [fixed]   Corrected regex used to determine id of newly created items

**Version 1.1.1** - 20th February 2009

- [added]   Improved script detection
- [fixed]   Added missing option to exclude tags while filtering

**Version 1.1** - 16th February 2009

- [fixed]   Data sources will return file information instead of IDs
- [fixed]   Allow multiple Mediathek fields in the same section
- [added]   Option to toggle between single or multiple select mode
- [added]   Allow data source sorting for single select Mediathek fields
- [added]   Search functionality
- [added]   Tag and category filter
- [added]   Option to toggle entry overview information (file name or file count)
- [added]   German translation
- [removed] File count for opened and closed Mediathek

**Version 1.0** - 11th January 2009

- Initial release

## Credits

This extension was originally based on the core select box field created by the Symphony team, Alistair Kearney, Allen Chang, Scott Hughes. Thanks to all extension developers for inspirations.