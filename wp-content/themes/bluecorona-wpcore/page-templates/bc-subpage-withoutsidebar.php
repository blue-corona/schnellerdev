<?php
/**
 * Template Name: SubPage Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();?>

<main>
    <div class="container-fluid p-0 bc_hero_container bc_home_section_bg py-5" <?php if (has_post_thumbnail() ) { $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id() ), 'single-post-thumbnail' ); ?> style="background-image: url('<?php echo $image[0]; ?>');" <?php }?>>
        <div class="container p-4">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="bc_subpage_hero_overlay d-block d-md-flex text-center">
                        <?php $title = get_post_meta( $post->ID, 'title_overlay', true );
                        if(isset($title) && !empty($title)){
                            echo $title;
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 bc_contact_us_container" style="background-image: linear-gradient(to right, #3a76b1 50%, #00395e 50%); background-size:cover;background-repeat:no-repeat;">
        <div class="container" style="background-image: url('<?php echo get_template_directory_uri();?>/img/contact_small.svg'); background-color: #01385e; background-size:cover;background-repeat:no-repeat;">
            <div class="row">
                <div class="col-md-2 m-auto text-center text-lg-left text-md-left bc_text_48 bc_line_height">
                    <span class="bc_primary_heading_white">24/7</span>
                    <span class="bc_primary_heading_white">SERVICE</span>
                </div>
                <div class="col-md-8 text-center ">
                    <div class="entry-content "><?php echo do_shortcode('[gravityform id=4]')?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- The Content Starts -->
    <?php 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
    <!-- The Content ends --> 

    <!--  Include Heating Services Features file here -->
    <?php get_template_part( 'page-templates/common/bc-heating-services-features' ); ?>

    <!-- heating services ends -->

    <?php get_template_part( 'page-templates/common/bc-dont-see-service' ); ?>
    
    <!--  Include blogs file here -->
    <?php echo do_shortcode('[bc-blog-slider]');?>
    <?php //get_template_part( 'page-templates/common/blogs' ); ?>
    <!--  Include testimonial file here -->
    <?php get_template_part( 'page-templates/common/testimonials' ); ?>
</main>
<?php get_footer();?>