<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="bc_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<span id="searchsubmit" name="submit">
        	<i aria-hidden="true" class="fa fa-search <?php echo $args['icon_color_class']; ?>"></i> &nbsp; 
        </span>
		<input class="transparent-input" id="s" name="s" type="text"
			placeholder="" value="<?php the_search_query(); ?>" style="">
</form>