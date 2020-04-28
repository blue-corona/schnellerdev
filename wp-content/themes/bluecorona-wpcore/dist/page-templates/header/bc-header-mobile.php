<div class="d-lg-none">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class=" col-9 mr-0 p-2">
                	<a href="<?php echo get_home_url();?>">
                        <img src="<?php echo bc_get_theme_mod('bc_theme_options', 'bc_logo_upload',false, get_template_directory_uri().'/img/logo.jpg'); ?>" class="img-fluid bc_branding_logo" alt="logo">
                	</a>
                </div>
                <div class=" col-3 p-2 text-center m-auto">
                	<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                        <em class="fa fa-bars navbar-toggler-icon"></em>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'page-templates/common/bc-nav-menu' ); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 m-0 p-0">
                <button class="btn rounded-0 w-100 py-3 bc_color_tertiary_bg bc_color_secondary bc_branding_btn_1" >
                    <i class="fa fa-calendar-plus-o " style="font-size:1em" aria-hidden="true"></i>&nbsp;Schedule Service
                </button>
            </div>
            <div class="col-6 m-0 p-0">
                <button class="btn rounded-0 w-100 py-3 bc_color_info_bg bc_color_secondary">
                    <i aria-hidden="true" class="fa fa-mobile" style="font-size:1.2em"></i>&nbsp; <span class="d-none d-lg-block">Call:</span> <strong><?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '(555) 555-5555');?></strong>
                </button>
            </div>
        </div>
    </div>
</div>