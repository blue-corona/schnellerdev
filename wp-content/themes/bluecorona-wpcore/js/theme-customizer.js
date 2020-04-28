( function( $ ) {

	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-info').css( 'background-color', newval );
			$('.btn-secondary').css( 'background-color', newval );
		} );
	} );
	
} )( jQuery );

wp.customize( 'SETTING_NAME', function( value ) {
	value.bind( function( newval ) {
		// Change handled here
	} );
} );