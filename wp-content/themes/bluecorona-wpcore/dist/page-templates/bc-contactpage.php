<?php
/**
 * Template Name: ContactPage Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('variant-announcement-bar');?>
<main role="main">
    <div class="container-fluid p-0 ">
		<?php if (has_post_thumbnail() ): 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id() ), 'single-post-thumbnail' );?>
		<img src="<?php echo $image[0]; ?>" alt="ourblog" class="w-100">
		<?php endif; ?>
	</div>
    <!-- Contact Form and section -->
    <?php 
    if ( have_posts() ) : 
    	while ( have_posts() ) : the_post();
			the_content();
		endwhile;
	endif;
	?>

    <!--  Include testimonial file here -->
	<?php get_template_part( 'page-templates/common/testimonials' ); ?>
</main>
<?php get_footer();?>
