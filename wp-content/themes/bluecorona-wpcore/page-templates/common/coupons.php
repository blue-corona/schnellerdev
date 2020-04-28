<?php
/**
 * Coupons
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php
// Plugin is active
//if( is_plugin_active( 'bc-promotions-master/bc-promotions.php' ) ) { ?>
<div class="container-fluid bc_about_bg">
    <div class="container pb-5">
        <h2 class="bc_font_alt_1 text-capitalize text-center py-5">Our Promotions</h2>
        <div class="col-md-12">
            <div class="row text-center">
	            <?php echo do_shortcode('[bc-promotion]'); ?>
            </div>
        </div>
    </div>    
</div>
<?php //}?>