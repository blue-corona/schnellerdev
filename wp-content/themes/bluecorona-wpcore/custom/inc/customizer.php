<?php
/**
 * Customizer Setup and Custom Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class skyrocket_initialise_customizer_settings {
	// Get our default values
	private $defaults;

	public function __construct() {
		
		// Register our sections
		add_action( 'customize_register', array( $this, 'skyrocket_add_customizer_sections' ) );

		// Register our sample Custom Control controls
		add_action( 'customize_register', array( $this, 'skyrocket_register_sample_custom_controls' ) );

	}


	/**
	 * Register the Customizer sections
	 */
	public function skyrocket_add_customizer_sections( $wp_customize ) {
		/**
		 * Add our section that contains examples of our Custom Controls
		 */
		$wp_customize->add_section( 'sample_custom_controls_section',
			array(
				'title' => __( 'Nikhil Section', 'skyrocket' ),
				'description' => esc_html__( 'These are an example of Customizer Custom Controls.', 'skyrocket'  )
			)
		);
	}


	/**
	 * Register our sample custom controls nikhil 
	 */
	public function skyrocket_register_sample_custom_controls( $wp_customize ) {

		// Add our Sortable Repeater setting and Custom Control for Social media URLs
		$wp_customize->add_setting( 'sample_sortable_repeater_control',
			array(
				'default' => $this->defaults['sample_sortable_repeater_control'],
				'transport' => 'refresh',
				'sanitize_callback' => 'skyrocket_url_sanitization'
			)
		);
		$wp_customize->add_control( new Skyrocket_Sortable_Repeater_Custom_Control( $wp_customize, 'sample_sortable_repeater_control',
			array(
				'label' => __( 'Custom Social Media', 'skyrocket' ),
				'description' => esc_html__( 'This is the control description.', 'skyrocket' ),
				'section' => 'sample_custom_controls_section',
				'button_labels' => array(
					'add' => __( 'Add Row', 'skyrocket' ),
				)
			)
		) );

	}

}


/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname(__FILE__) ) . 'custom-controls.php';

/**
 * Initialise our Customizer settings
 */
$skyrocket_settings = new skyrocket_initialise_customizer_settings();
