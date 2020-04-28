<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main>
	<div class="container-fluid p-0">
        <img class="w-100 " alt="ourblog" src="<?php echo get_template_directory_uri();?>/img/ourblog.jpg ">
    </div>

	<div class="container-fluid">
		<div class="container">
		  <div class="row">
		    <div class="col-lg-8 col-md-12 col-xs-12 p-3">
		     	<?php 
		     	while ( have_posts() ) : the_post();
		     	get_template_part( 'loop-templates/content', 'single' ); 
		     	endwhile; // end of the loop.
		     	?>
		    </div>
		    <!-- rIGHT sidebar starts -->
		    <?php get_template_part( 'sidebar-templates/sidebar', 'singleblogrightside' ); ?>
		    <!-- right sidebar ends -->
		  </div>
		</div>
	</div>
	<!--  Include blogs file here -->
    <div class="bc_about_bg">
    	<?php echo do_shortcode('[bc-blog-slider]');?>
    	<?php //get_template_part( 'page-templates/common/blogs' ); ?>
    </div>
</main>
<?php get_footer()?>
