<?php
/**
 * Template Name: HomeLanding Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('landing-variant');
global $post;
?>

<main role="main">
    <div class="container-fluid p-0 bc_landing_page_hero_container bc_home_section_bg" <?php if (has_post_thumbnail() ) { $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id() ), 'single-post-thumbnail' ); ?> style="background-image: url('<?php echo $image[0]; ?>');" <?php }?>>
        <div class="landing_page_hero_layer" style="background-color:<?php echo get_post_meta( $post->ID, 'bc_colorpicker_landing_page_'.$post->ID, true ).get_post_meta( $post->ID, 'bc_colorpicker_value_landing_page_'.$post->ID, true )?>">
            <div class="container px-4 pt-4">
                <div class="row text-center text-lg-left text-md-left">
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12 py-5 text-center">
                    <?php $title = get_post_meta( $post->ID, 'title_overlay', true );
                    if(isset($title) && !empty($title)){
                        echo $title;
                    }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--  Include coupons file here -->
    <?php get_template_part( 'page-templates/common/coupons' ); ?>

    <div class="container-fluid p-0 bc_contact_us_container" style="background-image: url('<?php echo get_template_directory_uri();?>/img/contact.svg'); background-color: #01385e;">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-2 m-auto text-center text-lg-left text-md-left">
                    <h1 class="bc_primary_heading_white">24/7</h1>
                    <h1 class="bc_primary_heading_white">SERVICE</h1>
                </div>
                <div class="col-md-8 text-center">
                    <h3 class=" bc_color_secondary text-capitalize bc_font_alt_1">Contact Us</h3>
                    <div class="entry-content ">
                        <?php echo do_shortcode('[gravityform id=1]')?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid p-5">
        <div class="container overflow-auto bc_choose_us_text text-center">
        <span class="bc_font_alt_1 text-capitalize bc_text_30 bc_color_primary ">Why Choose Us</span>
        <h2 class="bc_font_alt_2 my-2  bc_text_36">BLUE CORONA HEATING &amp; COOLING</h2>
            <div class="row">
                <div class="col-md-12 mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                </div>
            </div>
        </div>
    </div>

    <!--  Include Heating Services Features file here -->
    <?php get_template_part( 'page-templates/common/bc-heating-services-features' ); ?>
    <!--  Include testimonial file here -->
	<?php get_template_part( 'page-templates/common/testimonials' ); ?>
    <!-- Include affiliations file here -->
    <?php get_template_part( 'page-templates/common/affiliations' ); ?>

</main>
<?php get_footer('variant'); ?>