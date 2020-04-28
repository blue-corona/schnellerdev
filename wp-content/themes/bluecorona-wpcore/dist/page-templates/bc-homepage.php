<?php
/**
 * Template Name: HomePage Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

  <main role="main">
    <?php 
        if(bc_get_theme_mod('bc_theme_home_options', 'bc_hero_type', false, 'background_image') == 'background_image'){
            get_template_part( 'page-templates/hero-section/bc-hero-banner' );
        }else if(bc_get_theme_mod('bc_theme_home_options', 'bc_hero_type', false, 'image_slider') == 'image_slider'){
            get_template_part( 'page-templates/hero-section/bc-hero-swiper' );
        }
        else if(bc_get_theme_mod('bc_theme_home_options', 'bc_hero_type', false, 'video') == 'video'){
            get_template_part( 'page-templates/hero-section/bc-hero-video' );
        }
    ?>
    <?php 
    if ( have_posts() ) : 
    	while ( have_posts() ) : the_post();
			the_content();
		endwhile;
	endif;
	?>


    
    <?php get_template_part( 'page-templates/common/bc-locations-section' ); ?>
	
    <!--  Include coupons file here -->
	<?php get_template_part( 'page-templates/common/coupons' ); ?>

    <!--  Include testimonial file here -->
	<?php get_template_part( 'page-templates/common/testimonials' ); ?>
    <!-- Include affiliations file here -->
    <?php get_template_part( 'page-templates/common/affiliations' ); ?>

</main>
<?php function serviceAreaJavascript() {?>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery(".hide_div").hide();
    jQuery("#minus").toggle();
    jQuery(".abc").click(function(){
        jQuery("#minus").toggle();
        jQuery("#plus").toggle();
        jQuery(".hide_div").toggle(500);
    });
});
</script>
<?php }
add_action( 'wp_footer' , 'serviceAreaJavascript' );?>
<?php get_footer(); ?>
