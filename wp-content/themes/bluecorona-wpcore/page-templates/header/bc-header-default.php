<div class="container-fluid d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class=" col-md-4 col-lg-4 col-sm-4 col-12 mr-0 p-4">
            	<a href="<?php echo get_home_url();?>">
                    <img src="<?php echo bc_get_theme_mod('bc_theme_options', 'bc_logo_upload',false, get_template_directory_uri().'/img/logo.jpg'); ?>" class="bc_branding_logo" alt="logo" style="max-width:<?php echo bc_get_theme_mod('bc_theme_options', 'bc_max_width',false, 250);?>px">
            	</a>
            </div>

            <div class="col-md-5 offset-md-3 offset-lg-2 col-lg-6 col-sm-8  my-auto col-xs-12 text-center">
                <span class="">
                    <button class="btn bc_color_tertiary_bg p-3 mr-2 mb-2 bc_color_secondary bc_branding_btn_1" >
                        <span class="">
                            <i class="fa fa-calendar-plus-o " style="font-size:1em" aria-hidden="true"></i>&nbsp;Schedule Service
                        </span>
                    </button>
                    <button class="btn p-3  mr-2 mb-2 bc_color_info_bg bc_color_secondary ">
                        <i aria-hidden="true" class="fa fa-mobile" style="font-size:1.2em"></i>&nbsp; Call: <strong><?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '(555) 555-5555');?></strong>
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>