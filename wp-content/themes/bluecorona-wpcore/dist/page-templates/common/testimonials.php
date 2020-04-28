<?php
/**
 * Testimonials
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="container-fluid bc_testimonials_container bc_home_section_bg py-5  text-center" style="background-image:url('<?php echo get_template_directory_uri();?>/img/testimonial_bg.png'); background-position:center;">
    <div class="text-center"><h2 class="bc_font_alt_1 pb-4 text-capitalize">Testimonials</h2></div>
    <div class="container">
        <?php echo do_shortcode('[bc-testimonial]'); ?>
    </div>
    <br>
    <button class="btn bc_color_primary_bg mt-2 mb-2 px-4 text-white " type="button">Read Testimonials</button>
    <br>
</div>

