<?php
/**
 * Copyright
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php echo bc_get_theme_mod('bc_theme_options', 'footer','copyright_text', '<div class="bc_footer_copyright_bar text-center py-4 py-lg-2 bc_font_alt_3">
   © 2019 Blue Corona Heating & Cooling <span class="d-none d-lg-inline-block">&nbsp;|&nbsp;</span> <span class="d-block d-lg-inline-block">Web Design by
   <a class="bc_footer_copyright_links no_hover_underline bc_text_16" href="#"><img src="'.get_template_directory_uri().'/img/bc_logo.png">&nbsp;Blue Corona</a> </span>
  <span class="d-none d-lg-inline-block d-none">&nbsp; | &nbsp;</span><a class="bc_footer_copyright_links no_hover_underline bc_text_16" href="#" data-toggle="modal" data-target="#disclaimer">Disclaimer</a>
  <span class="d-inline-block">&nbsp; | &nbsp;</span><a class="bc_text_16 bc_footer_copyright_links no_hover_underline" href="#">Privacy Policy</a>
</div>');?>