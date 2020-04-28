<?php 
/*Custom widget*/
// BC Service Widget
class BC_Services_Widget extends WP_Widget {
	public function __construct() {

		$id = 'BC_Services_widget';
		$title = esc_html__('BC Services', 'bc-service-custom-widget');
		$options = array(
			'classname' => 'bc-service-markup-widget',
			'description' => esc_html__('Add Custom HTML in inputbox', 'bc-service-custom-widget')
		);
		parent::__construct( $id, $title, $options );
	}
	
	function addSwiperInitServiceJsToFooter($instance){
			echo "
			<script>
			var servicesSwiper = new Swiper('#".$instance."', {
			    pagination: false,
			    navigation: {
			        nextEl: '.bc_services_swiper_next',
			        prevEl: '.bc_services_swiper_prev',
			    },
			});
			</script>
			";
	}

	public function widget( $args, $instance ) {
		//Add JS for widget to footer
		$widgetInstance = $this->id;
		add_action('wp_footer', function() use ( $widgetInstance ) { 
        $this->addSwiperInitServiceJsToFooter( $widgetInstance ); });
	?>

<div class="mt-5">
<?php 
	if ( isset( $instance['title'] ) && !empty($instance['title']) ) {
		echo $args['before_title'] . $instance['title'] . $args['after_title']; 
	}else{
		echo '<h2 class="text-center m-0 bc_alternate_font_blue">Our</h2>';
		echo '<h3 class="text-center mb-3 bc_primary_content_blue"><strong>SERVICES</strong></h3>';
	}
?>
	<div id="<?php echo $this->id ?>" class="bc_services_swiper swiper-container ">
		<div class="swiper-wrapper text-center">
			<div class="swiper-slide">
				<div class="row">
					<div class="col-sm-12"><img class="" src="<?php echo get_template_directory_uri();?>/img/heating.png" alt="beating" /></div>
				</div>
				<div class="row pt-3">
					<div class="col-sm-12"><button class="btn bc_default_primary text-white w-50" type="button">Heating</button></div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="row">
					<div class="col-sm-12"><img class="" src="<?php echo get_template_directory_uri();?>/img/cooling.png" alt="cooling" /></div>
				</div>
				<div class="row pt-3">
					<div class="col-sm-12"><button class="btn bc_default_primary text-white w-50 " type="button">Cooling</button></div>
				</div>
			</div>
			<div class="swiper-slide">
				<div class="row">
					<div class="col-sm-12"><img class="" src="<?php echo get_template_directory_uri();?>/img/airquality.png" alt="airquality" /></div>
				</div>
				<div class="row pt-3">
					<div class="col-sm-12"><button class="btn bc_default_primary text-white w-50" type="button">Air Quality</button></div>
				</div>
			</div>
		</div>
		<div class="bc_services_swiper_next swiper-button-next"><em class="fa fa-angle-right"></em></div>
		<div class="bc_services_swiper_prev swiper-button-prev"> <em class="fa fa-angle-left"></em> </div>
	</div>
</div>
<?php echo $args['after_widget'];
}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( isset( $new_instance['title'] ) && ! empty( $new_instance['title'] ) ) {
			$instance['title'] = $new_instance['title'];
		}
		return $instance;
	}
	public function form( $instance ) {
		$id = $this->get_field_id( 'title' );
		$for = $this->get_field_id( 'title' );
		$name = $this->get_field_name( 'title' );
		$label = __( 'Title', 'bc-service-custom-widget' );
		$title = '<h2 class="text-center m-0 bc_alternate_font_blue">'.__( 'Our', 'bc-service-custom-widget' ).'</h2>'.'<h3 class="text-center mb-3 bc_primary_content_blue"><strong>'.__( 'SERVICES', 'bc-service-custom-widget' ).'</strong></h3>';
		if ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $for ); ?>"><?php echo esc_html( $label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $title ); ?></textarea>
		</p>
<?php }
}
// register widget
function bc_services_register_widgets() {
	register_widget( 'BC_Services_Widget' );
}
add_action( 'widgets_init', 'bc_services_register_widgets' );
