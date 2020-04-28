<?php 
/*Custom widget*/
// BC Gravity Widget
class BC_Gravity_Widget extends WP_Widget {
	public function __construct() {

		$id = 'BC_Gravity_widget';
		$title = esc_html__('BC Gravity Form', 'bc-gravity-custom-widget');
		$options = array(
			'classname' => 'bc-gravity-markup-widget',
			'description' => esc_html__('Add Custom HTML in inputbox', 'bc-gravity-custom-widget')
		);
		parent::__construct( $id, $title, $options );
	}
	
	public function widget( $args, $instance ) {?>

<div class="shadow-lg ">

	<div class="bc_color_info_bg d-flex py-3 px-4">
        <img alt="icon" class="img-fluid align-self-center " src="<?php echo get_template_directory_uri();?>/img/24icon.png">
        <span class="bc_color_secondary text-capitalize bc_text_30 bc_font_alt_1 text-center px-2 pt-1">
            <?php 
				if ( isset( $instance['title'] ) && !empty($instance['title']) ) {
					echo  $instance['title']; 
				}else{
					echo 'Emergency Service';
				}
			?>
        </span>
    </div>
	<!-- <div class="bc_hero_bg_form_color mb-0 pl-1 pr-1">
	
	</div> -->
	<div class="entry-content bg-light"><?php echo do_shortcode($instance['gravityform']);?></div>
</div>

<?php echo $args['after_widget'];
}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( isset( $new_instance['title'] ) && ! empty( $new_instance['title'] ) ) {
			$instance['title'] = $new_instance['title'];
		}
		if ( isset( $new_instance['gravityform'] ) && ! empty( $new_instance['gravityform'] ) ) {
			$instance['gravityform'] = $new_instance['gravityform'];
		}
		return $instance;
	}
	public function form( $instance ) {
		$id = $this->get_field_id( 'title' );
		$for = $this->get_field_id( 'title' );
		$name = $this->get_field_name( 'title' );
		$label = __( 'Title', 'bc-service-custom-widget' );
		$title = 'Emergency Service';
		if ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $for ); ?>"><?php echo esc_html( $label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $title ); ?></textarea>
		</p>
		<?php 
		$g_id = $this->get_field_id( 'gravityform' );
		$g_for = $this->get_field_id( 'gravityform' );
		$g_name = $this->get_field_name( 'gravityform' );
		$g_label = __( 'Shortcode', 'bc-service-custom-widget' );
		$g_title = '[gravityform id=2]';
		if ( isset( $instance['gravityform'] ) && ! empty( $instance['gravityform'] ) ) {
			$g_title = $instance['gravityform'];
		}?>
		<p>
			<label for="<?php echo esc_attr( $g_for ); ?>"><?php echo esc_html( $g_label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $g_id ); ?>" name="<?php echo esc_attr( $g_name ); ?>"><?php echo esc_textarea( $g_title ); ?></textarea>
		</p>
<?php }
}
// register widget
function bc_gravity_register_widgets() {
	register_widget( 'BC_Gravity_Widget' );
}
add_action( 'widgets_init', 'bc_gravity_register_widgets' );
