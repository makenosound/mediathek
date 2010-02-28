/*
 * MEDIATHEK for Symphony
 *
 * @author: Nils Hörrmann, post@nilshoerrmann.de
 * @source: http://github.com/nilshoerrmann/mediathek
 */


/*-----------------------------------------------------------------------------
	Language strings
-----------------------------------------------------------------------------*/	 

	Symphony.Language.add({

	}); 
	

/*-----------------------------------------------------------------------------
	Mediathek plugin
-----------------------------------------------------------------------------*/

	jQuery.fn.mediathek = function(custom_settings) {

		// Get objects
		var objects = this;
		
		// Get settings
		var settings = {
			autodiscover: false,
			delay_initialize: false
		};
		jQuery.extend(settings, custom_settings);


	/*-------------------------------------------------------------------------
		Mediathek
	-------------------------------------------------------------------------*/

		objects = objects.map(function() {
		
			// This object
			var object = this;		

		/*-------------------------------------------------------------------*/
			
			if (object instanceof jQuery === false) {
				object = jQuery(object);
			}
			
			object.mediathek = {
			
				initialize: function() {

				}

			}
			
			if (settings.delay_initialize !== true) {
				object.mediathek.initialize();
			}
			
			return object;
		});
		
		return objects;

	});
	

/*-----------------------------------------------------------------------------
	Apply Mediathek plugin
-----------------------------------------------------------------------------*/

	jQuery(document).ready(function() {
		jQuery('div.field-mediathek').mediathek();
	});
