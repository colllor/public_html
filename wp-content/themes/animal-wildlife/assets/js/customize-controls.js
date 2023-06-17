( function( api ) {

	// Extends our custom "animal-wildlife" section.
	api.sectionConstructor['animal-wildlife'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );