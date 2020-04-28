<?php
/**
 * ServiceArea
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="container p-2 text-center text-lg-left">
    <h4 class="abc mb-0">
    	<a href="javascript:void(0)" class="bc_color_secondary bc_font_alt_1 bc_text_24">Service Areas 
	    	<i id="plus" aria-hidden="true" class="fa fa-plus fa-xs"></i>
	    	<i id="minus" aria-hidden="true" class="fa fa-minus fa-xs"></i>
    	</a>
    </h4>
    <div class="hide_div row">
        <?php echo do_shortcode('[bc-geotargeting]'); ?>
    </div>
</div>
