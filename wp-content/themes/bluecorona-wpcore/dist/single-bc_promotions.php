<?php
/**
 * Template Name: Single Promotions Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="icon" href="<?php echo bc_get_theme_mod('bc_theme_options', 'bc_favicon_upload',false, get_template_directory_uri().'/img/favicon.ico'); ?>">

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <script data-search-pseudo-elements defer src="https://use.fontawesome.com/releases/latest/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
</head>
<body>
<style type="text/css">@media print{.no-print, .no-print *{display: none !important;}}</style>
<script type="text/javascript">function printPreview(){window.print();}</script>
    <main>
        <div class="container-fluid" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 mt-2 px-5">
                        <?php 
                        global $post;
                        $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
                        if($promotion_type == 'Builder'){
                            $date = get_post_meta( get_the_ID(), 'promotion_expiry_date1', true );
                            if(strtotime($date) >= strtotime(current_time('m/d/Y'))){
                                $title = get_post_meta( get_the_ID(), 'promotion_title1', true );
                                $color = get_post_meta( get_the_ID(), 'promotion_color', true );
                                $subheading = get_post_meta( get_the_ID(), 'promotion_subheading', true );
                                $footer_heading = get_post_meta( get_the_ID(), 'promotion_footer_heading', true ); ?>
                            <div class="row text-center">
                                <div class="col-sm-12 p-2 text-center">
                                    <div class="bc_color_secondary bc_color_primary_bg p-3 mb-3"  style="background-color: <?php echo $color;?>"">
                                        <div class="py-4 px-3 pt-0 border-white bc_coupon_container">
                                            <span class="pb-3  bc_font_alt_1 bc_text_36 d-block"><?php echo $title; ?></span>
                                            <span class="bc_text_30 d-block my-2"><?php echo $subheading;?></span>
                                            <span class="mt-3 bc_text_16">expires <?php echo $date;?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        }else if($promotion_type == 'Image'){
                           $date2 = get_post_meta( get_the_ID(), 'promotion_expiry_date2', true );
                            if(strtotime($date2) >= strtotime(current_time('m/d/Y'))){
                                $title2 = get_post_meta( get_the_ID(), 'promotion_title2', true );
                                $promotion_custom_image = get_post_meta( get_the_ID(), 'promotion_custom_image', true ); 
                            ?>
                            <div class="col-md-4 col-lg-4 p-2 text-center">
                                <a href="#">
                                    <img src="<?php echo $promotion_custom_image;?>" style="width:350px;height:228px;">
                                </a>
                            </div>
                        <?php }
                        }
                        ?>
                        
                        <div class="no-print">
                            <button class="btn bc_color_tertiary_bg p-3 mr-2 mb-2" onclick="printPreview()">
                            <span class=""><i class="fa fa-print" style="font-size:1em" aria-hidden="true"></i>&nbsp;Print</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>


