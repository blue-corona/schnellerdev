<footer class="page-footer font-small blue">
    <div class="container-fluid bc_color_info_bg">
    <!-- Include servicearea file here -->
        <div class="container py-4"></div>
    </div>

    <!-- Footer Links -->
    <div class="container-fluid bc_color_primary_bg text-md-left pl-0">
        <img alt="footer man" height="340px" class="position-absolute d-none d-lg-block " src="<?php echo get_template_directory_uri();?>/img/footer_eng.png">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-12 offset-0  col-md-12">
                    <div class="row">
                        <div class="col-md-3 m-auto text-center px-5 px-md-0 bc_color_secondary">
                            <img class="img-fluid" alt="footer logo" src="<?php echo bc_get_theme_mod('bc_theme_options', 'bc_logo_upload',false, get_template_directory_uri().'/img/logo.jpg'); ?>">
                            <hr style="background-color:#5692b9;" class="my-2 mx-3 mx-lg-0">
                            <?php echo do_shortcode('[social-icons]');?>

                            <h4 class="text-uppercase bc_color_secondary mb-4"> 
                            <em aria-hidden="true" class="fa fa-mobile"></em>  <?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '(555) 555-5555');?></h4>
                            <div class="row bc_color_secondary">
                                <div class="col-lg-9 m-auto pb-3">
                                    <p class="bc_color_secondary" style="font-size: 14px; line-height: 20px;margin-bottom:2px"> <?php echo bc_get_theme_mod('bc_theme_options', 'bc_address',false, '1401 Central Avenue, Suite 11 Charlotte, NC 28205');?> </p>
                                </div>
                                <div class="m-auto">License - <?php echo bc_get_theme_mod('bc_theme_options', 'bc_license',false, 'CLT140111');?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'page-templates/common/bc-copyright' ); ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>