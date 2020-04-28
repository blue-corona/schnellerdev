<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="container-fluid bc_color_info_bg">
    <!-- Include servicearea file here -->
    <?php if ( is_front_page() ) {?>
        <?php get_template_part( 'page-templates/common/servicearea' ); ?>
    <?php }else{?>
        <div class="container py-3"></div>
    <?php } ?>
    </div>
    <!-- Footer Links -->
    <div class="container-fluid bc_color_primary_bg text-md-left pl-0 pt-5">
        <img alt="footer man" height="323px" class="position-absolute d-none d-lg-block " src="<?php echo get_template_directory_uri();?>/img/footer_eng.png">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-10 offset-0 offset-lg-2 col-md-12 text-center text-lg-left">
                    <div class="row">
                        <?php dynamic_sidebar( 'footer' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'page-templates/common/bc-copyright' ); ?>
</footer>

<div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-labelledby="disclaimerLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <button type="button" class="close bc_color_secondary_hover_bg" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fal fa-times fa-2x"></i></span>
        </button>
      </div>
      <div class="modal-body px-5 pb-5 col-md-10 offset-1">
        <h1 id="disclaimerLabel" class="bc_color_black">Disclaimer</h1>
            <p class="bc_color_black">The information on this website is for informational purposes only; it is deemed accurate but not guaranteed. It does not constitute professional advice. All information is subject to change at any time without notice. <a class="text-danger bc_text_bold" href="<?php echo get_site_url()?>/contact-us" target="_blank">Contact us</a> for complete details.</p>
      </div>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
