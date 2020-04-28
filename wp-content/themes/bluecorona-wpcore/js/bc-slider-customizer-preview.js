// 
jQuery( document ).ready(function($) {
	jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).live('change',function() {
		checkbox_values = jQuery( this )
							.parents( '.customize-control' )
							.find( 'input[type="checkbox"]:checked' )
							.map(function() { return this.value;} )
							.get()
							.join( ',' );
						jQuery( this )
							.parents( '.customize-control' )
							.find( 'input[type="hidden"]' )
							.val( checkbox_values )
							.trigger( 'change' );
	});

	try {

	wp.customize.bind( 'ready', function ( ) {
		wp.customize.control( 'bc_theme_home_options[background_image][bc_background_overlay_type]', function( control ) {
			if( control.settings.default._value == 'gradient'){
				wp.customize.control('bc_theme_home_options[background_image][bc_background_overlay_solid_color]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_start]').toggle(true);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_end]').toggle(true);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_rotation]').toggle(true);
			}else if(control.settings.default._value == 'solid'){
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_start]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_end]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_rotation]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_overlay_solid_color]').toggle(true);
			}
			
	    });

	    wp.customize.control( 'bc_theme_home_options[image_slider][bc_overlay_type_one]', function( control ) {
			if( control.settings.default._value == 'gradient'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_one]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_one]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_one]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_one]').toggle(true);
			}else if(control.settings.default._value == 'solid'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_one]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_one]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_one]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_one]').toggle(true);
			}
	    });

	    wp.customize.control( 'bc_theme_home_options[image_slider][bc_overlay_type_two]', function( control ) {
			if( control.settings.default._value == 'gradient'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_two]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_two]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_two]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_two]').toggle(true);
			}else if(control.settings.default._value == 'solid'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_two]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_two]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_two]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_two]').toggle(true);
			}
	    });

	    wp.customize.control( 'bc_theme_home_options[image_slider][bc_overlay_type_three]', function( control ) {
			if( control.settings.default._value == 'gradient'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_three]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_three]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_three]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_three]').toggle(true);
			}else if(control.settings.default._value == 'solid'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_three]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_three]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_three]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_three]').toggle(true);
			}
	    });

	    wp.customize.control( 'bc_theme_home_options[background_video][bc_video_overlay_type]', function( control ) {
			if( control.settings.default._value == 'gradient'){
				wp.customize.control('bc_theme_home_options[background_video][bc_video_overlay_color]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_start]').toggle(true);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_end]').toggle(true);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_rotation]').toggle(true);
			}else if(control.settings.default._value == 'solid'){
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_start]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_end]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_rotation]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_overlay_color]').toggle(true);
			}
	    });
	});
	// Append the search icon list item to the main nav
	wp.customize.bind( 'change', function ( setting ) {
		
		var image_overlay_type = setting.get();
		// For Background Image Section
		if ( 0 === setting.id.indexOf( 'bc_theme_home_options[background_image][bc_background_overlay_type]' ) ) {
			
			if( image_overlay_type == 'gradient'){
				wp.customize.control('bc_theme_home_options[background_image][bc_background_overlay_solid_color]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_start]').toggle(true);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_end]').toggle(true);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_rotation]').toggle(true);
			}else if(image_overlay_type == 'solid'){
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_start]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_end]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_gradient_rotation]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_image][bc_background_overlay_solid_color]').toggle(true);
			}
		}
		
		// For Image Slider Section One
		if ( 0 === setting.id.indexOf( 'bc_theme_home_options[image_slider][bc_overlay_type_one]' ) ) {
			console.log( setting.get());
			var image_overlay_type = setting.get();
			if( image_overlay_type == 'gradient'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_one]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_one]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_one]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_one]').toggle(true);
			}else if(image_overlay_type == 'solid'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_one]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_one]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_one]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_one]').toggle(true);
			}
		}

		// For Image Slider Section Two
		if ( 0 === setting.id.indexOf( 'bc_theme_home_options[image_slider][bc_overlay_type_two]' ) ) {
			console.log( setting.get());
			var image_overlay_type = setting.get();
			if( image_overlay_type == 'gradient'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_two]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_two]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_two]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_two]').toggle(true);
			}else if(image_overlay_type == 'solid'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_two]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_two]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_two]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_two]').toggle(true);
			}
		}

		// For Image Slider Section Three
		if ( 0 === setting.id.indexOf( 'bc_theme_home_options[image_slider][bc_overlay_type_three]' ) ) {
			console.log( setting.get());
			var image_overlay_type = setting.get();
			if( image_overlay_type == 'gradient'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_three]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_three]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_three]').toggle(true);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_three]').toggle(true);
			}else if(image_overlay_type == 'solid'){
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_start_three]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_end_three]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_gradient_rotation_three]').toggle(false);
				wp.customize.control('bc_theme_home_options[image_slider][bc_overlay_solid_color_three]').toggle(true);
			}
		}

		// For Video Section
		if ( 0 === setting.id.indexOf( 'bc_theme_home_options[background_video][bc_video_overlay_type]' ) ) {
			console.log( setting.get());
			var image_overlay_type = setting.get();
			if( image_overlay_type == 'gradient'){
				wp.customize.control('bc_theme_home_options[background_video][bc_video_overlay_color]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_start]').toggle(true);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_end]').toggle(true);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_rotation]').toggle(true);
			}else if(image_overlay_type == 'solid'){
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_start]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_end]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_gradient_rotation]').toggle(false);
				wp.customize.control('bc_theme_home_options[background_video][bc_video_overlay_color]').toggle(true);
			}
		}
	});

	//validation for background gradient rotation
	wp.customize( 'bc_theme_home_options[background_image][bc_background_gradient_rotation]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if (value > 360) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 360'} );
            setting.notifications.add( code, notification );

 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );
 		}
        return value;
    };
	} );
	//validation for image gradient rotation one
	wp.customize( 'bc_theme_home_options[image_slider][bc_gradient_rotation_one]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if (value > 360) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 360'} );
            setting.notifications.add( code, notification );

 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );
 		}
        return value;
    };
	} );

	//validation for image gradient rotation two
	wp.customize( 'bc_theme_home_options[image_slider][bc_gradient_rotation_two]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if (value > 360) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 360'} );
            setting.notifications.add( code, notification );

 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );
 		}
        return value;
    };
	} );

	//validation for image gradient rotation two
	wp.customize( 'bc_theme_home_options[image_slider][bc_gradient_rotation_three]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if (value > 360) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 360'} );
            setting.notifications.add( code, notification );

 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );
 		}
        return value;
    };
	} );
	//validation for video opacity
	wp.customize( 'bc_theme_home_options[background_video][bc_video_gradient_rotation]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if(value > 360 ) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 360'} );
            setting.notifications.add( code, notification );
 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );
 		}
        return value;
    };
	});

	//validation for image opacity
	wp.customize( 'bc_theme_home_options[background_image][bc_background_image_opacity]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if(value > 100 ) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 100'} );
            setting.notifications.add( code, notification );
 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );		
 		}
        return value;
    };
	});

	//validation for image opacity one
	wp.customize( 'bc_theme_home_options[image_slider][bc_opacity_one]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if(value > 100 ) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 100'} );
            setting.notifications.add( code, notification );
 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );	
 		}
        return value;
    };
	});
	//validation for image opacity two
	wp.customize( 'bc_theme_home_options[image_slider][bc_opacity_two]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if(value > 100 ) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 100'} );
            setting.notifications.add( code, notification );
 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );	
 		}
        return value;
    };
	});
	//validation for image opacity Three
	wp.customize( 'bc_theme_home_options[image_slider][bc_opacity_three]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if(value > 100 ) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 100'} );
            setting.notifications.add( code, notification );
 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );	
 		}
        return value;
    };
	});

	//validation for image opacity
	wp.customize( 'bc_theme_home_options[image_slider][bc_slider_rotation_time_one]', function ( setting ) {
    setting.validate = function ( value ) {
        var code, notification;
 		code = 'required';
 		if(value > 5000 ) {
            notification = new wp.customize.Notification( code, {message: 'Not more than 5000'} );
            setting.notifications.add( code, notification );
 		}else if ( !Number( value ) ) {
            notification = new wp.customize.Notification( code, {message: 'only integer values'} );
            setting.notifications.add( code, notification );
        }else {
            setting.notifications.remove( code );
 		}
        return value;
    };
	});

}
catch(err) {
	// console.log(err);
}
});
