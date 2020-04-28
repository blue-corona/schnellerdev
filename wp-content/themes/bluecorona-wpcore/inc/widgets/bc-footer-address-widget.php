<?php 
/*Custom widget*/
// BC Footer Address Widget
class BC_Footer_Address_Widget extends WP_Widget {
    public function __construct() {

        $id = 'BC_Footer_Address_widget';
        $title = esc_html__('BC Footer Identity', 'bc-footer-address-custom-widget');
        $options = array(
            'classname' => 'bc-footer-address-markup-widget',
            'description' => esc_html__('Add Custom HTML in inputbox', 'bc-footer-address-custom-widget')
        );
        parent::__construct( $id, $title, $options );
    }
    
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        ?>

    <div class="col-12 px-5 px-md-0 bc_color_secondary">
        <img alt="footer logo" src="<?php echo get_template_directory_uri();?>/img/footerlogo.png">
        <hr class="mx-3 mx-lg-0" style="background-color:#5692b9;">
        <h4 class="text-uppercase bc_color_secondary"><em aria-hidden="true" class="fa fa-mobile"></em> <?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '(555) 555-5555');?></h4>
        <div class="row">
            <div class="col-lg-1 pr-0"><h4 class="bc_color_secondary"><em aria-hidden="true" class="far fa-map-marker-alt"></em></h4></div>
            <div class="col-lg-9">
                <p class="bc_color_secondary" style="font-size: 14px; line-height: 20px">
                <?php echo bc_get_theme_mod('bc_theme_options', 'bc_address',false, '1401 Central Avenue, Suite 11 Charlotte, NC 28205');?>
                 </p>
            </div>
            <div class="ml-lg-3 m-auto m-lg-0">License - <?php echo bc_get_theme_mod('bc_theme_options', 'bc_license',false, 'CLT140111');?></div>
        </div>
        <?php echo do_shortcode('[social-icons]');?>
    </div>
    <?php echo $args['after_widget'];
    }
}
// register widget
function bc_footer_address_register_widgets() {
    register_widget( 'BC_Footer_Address_Widget' );
}
add_action( 'widgets_init', 'bc_footer_address_register_widgets' );
?>
