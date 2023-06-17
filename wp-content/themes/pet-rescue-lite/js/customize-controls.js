( function( api ) {

	// Extends our custom "pet-rescue-lite" section.
	api.sectionConstructor['pet-rescue-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );