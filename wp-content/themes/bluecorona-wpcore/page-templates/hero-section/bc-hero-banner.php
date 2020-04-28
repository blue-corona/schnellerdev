<div class="container-fluid p-0 bc_hero_container bc_home_section_bg" style="background-image: url('<?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_upload', false);?>')">
    <div class="hero-overlay-gradient">
        <div class="container px-4 pt-4">
            <div class="row text-center text-lg-left text-md-left">
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-12 m-auto">
                    <?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_image_overlay_text', false);?>

                    <button onclick="window.location.href = '<?php echo get_home_url().bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_button_link', '/promotions')?>';"  class="btn bc_color_primary_bg py-2 mt-2 hero-image"> <?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_button_text', 'Schedule Service Today');?> &nbsp;<i aria-hidden="true" class="fa fa-chevron-circle-right"></i></button>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-12 p-4">
                    <div class=" col-md-12 col-lg-9 col-sm-12 col-xs-12 offset-lg-2">
                        <div class="bc_color_info_bg d-flex py-3 px-4">
                            <div class="m-auto">
                                <img alt="icon" class="img-fluid align-self-center mt-n3" src="<?php echo get_template_directory_uri();?>/img/24icon.png">
                                <span class="bc_color_secondary text-capitalize bc_text_30 bc_font_alt_1 text-center  pt-1">
                                    Emergency Service
                                </span>
                            </div>
                        </div>
                        <div class="entry-content bc_hero_form_body">
                           <?php echo do_shortcode('[gravityform id=2 ajax=true]')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .hero-overlay-gradient-->
    </div>

<style type="text/css">
.hero-image{background-color:<?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_button_color', '#00395e');?>;color:<?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_button_text_color', '#ffffff');?>;}

<?php if(bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_overlay_type', 'gradient') == 'gradient'){ ?>
    .hero-overlay-gradient{background: linear-gradient(<?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_gradient_rotation', false ,false)."deg"; ?>, rgba(<?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_gradient_start', false,false);?>), rgba(<?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_gradient_end',false,false);?>));}
<?php }else if(bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_overlay_type', 'solid') == 'solid'){ ?>
    .hero-overlay-gradient{background: rgba(<?php echo bc_get_theme_mod('bc_theme_home_options', 'background_image', 'bc_background_overlay_solid_color', false ,false);?>);}
<?php }?>
</style>