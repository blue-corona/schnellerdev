<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
get_header();
global $post;
?>
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
	<div class="container-fluid">
		<div class="container">
		    <div class="row">
			    <div class="col-lg-8 col-md-12 col-xs-12 mt-5 px-5">
					<h1 class="bc_font_alt_1 text-capitalize bc_text_30 bc_color_primary pt-2">
						<?php the_title();?>
					</h1>
					<?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
				</div>
			    <!-- geotargeting sidebar starts -->
			    <?php get_template_part( 'sidebar-templates/sidebar', 'geotargetingsidebar' ); ?>
			    <!-- geotargeting sidebar ends -->
		    </div>
		</div>
	</div>
    <!--  Include Heating Services Features file here -->
    <?php get_template_part( 'page-templates/common/bc-heating-services-features' ); ?>
    <?php get_template_part( 'page-templates/common/bc-dont-see-service' ); ?>
    <!--  Include blogs file here -->
    <?php echo do_shortcode('[bc-blog-slider]');?>
    <?php //get_template_part( 'page-templates/common/blogs' ); ?>
    <!--  Include testimonial file here -->
    <?php get_template_part( 'page-templates/common/testimonials' ); ?>
</main>
<?php get_footer();
