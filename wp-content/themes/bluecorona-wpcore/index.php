<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main>
	<div class="container-fluid p-0 ">
        <img class="w-100 " alt="ourblog" src="<?php echo get_template_directory_uri();?>/img/ourblog.jpg ">
    </div>

	<div class="container-fluid">
		<div class="container">
		  <div class="row">
		    <div class="col-lg-8 col-md-12 col-xs-12">
		      <h2 class="py-3 bc_font_alt_1 text-capitalize ">Our Blog</h2>
		     	<?php 
		     	if ( have_posts() ) :
		     		while ( have_posts() ) : the_post();
		     			get_template_part( 'loop-templates/content', get_post_format() );
					endwhile; else :
					get_template_part( 'loop-templates/content', 'none' );
				endif;
				?>
		      	<!-- Pagination -->
		      	<?php understrap_pagination(); ?>
		    </div>
		    <!-- rIGHT sidebar starts -->
		    <?php get_template_part( 'sidebar-templates/sidebar', 'blogrightside' ); ?>
		    <!-- right sidebar ends -->
		  </div>
		</div>
	</div>
	<!-- Coupon starts -->
	<?php get_template_part( 'page-templates/common/coupons' ); ?>
	<!-- Coupon ends -->
</main>
<?php get_footer()?>

