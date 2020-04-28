<?php
/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */
class BC_Customize_Control_Checkbox_Multiple extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'checkbox-multiple';

	/**
	 * Displays the control content.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function render_content() {

		if ( empty( $this->choices ) )
			return; ?>

		<?php if ( !empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>

		<?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); 
		?>
		<ul>
			<?php foreach ( $this->choices as $value => $label ) : ?>

				<li>
					<label>
						<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> />
						<?php echo esc_html( $label ); ?>
					</label>
				</li>

			<?php endforeach; ?>
		</ul>

		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
	<?php }
}

/* Multi Input field */

/*class Multi_Input_Custom_control extends WP_Customize_Control{
	public $type = 'multi_input';
	// public function enqueue(){
	// 	wp_enqueue_script( 'custom_controls', get_template_directory_uri().'/inc/customizer/js/custom_controls.js', array( 'jquery' ),'', true );
	// 	wp_enqueue_style( 'custom_controls_css', get_template_directory_uri().'/inc/customizer/css/custom_controls.css');
	// }
	public function render_content(){

		// echo "<pre>"; print_r($this->settings);
		?>
		<label class="customize_multi_input">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<p><?php echo wp_kses_post($this->description); ?></p>
			<input type="hidden" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($this->value()); ?>" class="customize_multi_value_field" data-customize-setting-link="<?php echo esc_attr($this->id); ?>"/>
			<div class="customize_multi_fields">
				<div class="set">
					<input type="text" value="" class="customize_multi_single_field"/>
					<a href="#" class="customize_multi_remove_field">X</a>
				</div>
			</div>
			<a href="#" class="button button-primary customize_multi_add_field"><?php esc_attr_e('Add More', 'mytheme') ?></a>
		</label>
		<?php
	}
}*/


