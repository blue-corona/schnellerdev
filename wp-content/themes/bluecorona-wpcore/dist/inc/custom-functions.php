<?php
/*Define Excerpt Lenght*/
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
    global $post;
    return 25;
}
/*Hard crop Image for blog post page*/
add_theme_support( 'post-thumbnails' );
add_image_size( 'blogpost-thumbnail', 250, 170, true ); // Hard Crop Mode

/*Create custom field (title) for pages, post, custom posts */
add_action( 'add_meta_boxes', 'bc_create_title_overlay_metabox' );
function bc_create_title_overlay_metabox() {
global $post;
    if(!in_array($post->post_type, array('bc_affiliations','bc_testimonials','bc_schemas') )){
        add_meta_box(
            'bc_title_overlay',
            'Hero Overlay text',
            'bc_title_overlay',
            '',
            'normal'
        );
    }
}
function bc_title_overlay() {
global $post;
$title = get_post_meta( $post->ID, 'title_overlay', true );?>
<textarea class="form-control" rows="6" cols="85" name="bc_title_overlay_heading" id="title"><?= $title ?></textarea>
<?php
wp_nonce_field( 'bc_title_overlay_metabox_nonce', 'bc_title_overlay_metabox_process' );
}
/** Save the metabox */
add_action( 'save_post', 'bc_save_title_overlay', 1, 2 );
function bc_save_title_overlay( $post_id, $post ) {
    if ( !isset( $_POST['bc_title_overlay_metabox_process'] ) ) return;
    if ( !wp_verify_nonce( $_POST['bc_title_overlay_metabox_process'], 'bc_title_overlay_metabox_nonce' ) ) {
        return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }
    if ( !isset( $_POST['bc_title_overlay_heading'] ) ) {
        return $post->ID;
    }
    $sanitizedtitle = wp_filter_post_kses( $_POST['bc_title_overlay_heading'] );
    update_post_meta( $post->ID, 'title_overlay', $sanitizedtitle );
}

add_filter( 'gform_submit_button', 'add_custom_css_class', 10, 2 );
function add_custom_css_class( $button, $form ) {
    if ($form['id'] != 3) return $button;
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $classes = $input->getAttribute( 'class' );
    $classes .= " mt-3";
    $input->setAttribute( 'class', $classes );
    
    return $dom->saveHtml( $input );
}

// Button Style 
add_action( 'wp_head', 'button_style');
function button_style($wp_customize){?>
<style type="text/css">
input[type=button], input[type=submit], input[type=reset],button {
background-color: <?php echo bc_get_theme_mod('bc_theme_options', 'bc_button_color',false, '#00395e');?> ;color: <?php echo bc_get_theme_mod('bc_theme_options', 'bc_button_text_color',false, '#00395e');?>;
}input:hover[type=button], input:hover[type=submit], input:hover[type=reset],button:hover{
background-color: <?php echo bc_get_theme_mod('bc_theme_options', 'bc_button_hover_color',false, '#00395e');?> ;color: <?php echo bc_get_theme_mod('bc_theme_options', 'bc_button_text_hover_color',false, '#00395e');?>;}
</style>
<?php 
}

// Function to set the theme customizer mod values
function bc_get_theme_mod($setting, $key1 = false, $key2 = false, $default = false){
    $theme_mod = get_theme_mod($setting);
    if($key1 && !$key2) {
        if (isset($theme_mod[$key1]) && !empty($theme_mod[$key1])){
            return $theme_mod[$key1];
        } else {
            return $default;
        }
    } else if ($key2) {
        if (isset($theme_mod[$key1][$key2]) && !empty($theme_mod[$key1][$key2])){
            return $theme_mod[$key1][$key2];
        }else{
            return $default;
        }
    }
    return get_theme_mod($setting, $default);
}

/*Shortcode for social media icons*/
add_shortcode( 'social-icons', 'bc_social_shortcode' );
function bc_social_shortcode () {?>
    <div class="bc_social_media pb-3" style="color: #5692b9;">
    <?php
        $data = json_decode(bc_get_theme_mod('bc_theme_social_media','bc_social_media', false, false));
        if(isset($data) && !empty($data)){
        // $order = array_column((array) $data, 'order');
        $order = array_column(json_decode(json_encode($data), true), 'order');
        array_multisort($order, SORT_ASC, $data);
            foreach ($data as $key => $value) {
                if(!empty($value->icon)){
                ?>
                <a target="_blank" class="mr-1 bc_social_media_fb mr-2 fa-lg" title="<?php echo $value->name;?>" href="<?php echo $value->url;?>">
                    <i class="<?php echo $value->icon;?>"></i>
                </a>
            <?php } 
            }
        }
    ?>
    </div>
<style type="text/css">
.bc_social_media a {color:<?php echo bc_get_theme_mod('bc_theme_social_media','bc_social_icon_color', false, false);?>;}
.bc_social_media a:hover {color:<?php echo bc_get_theme_mod('bc_theme_social_media','bc_social_icon_hover_color', false, false);?>; background-color: transparent !important;}
</style>
<?php 
}


/*
Create custom field (title) for pages, post, custom posts
Landing Page Settings for Home Landing Page Template
 */
add_action( 'add_meta_boxes', 'bc_create_landing_page' );
function bc_create_landing_page($post) {
    global $post;
    if(!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-templates/bc-landingpage.php' ){
            add_meta_box(
                'bc_landing_layout',
                'Landing Page Settings',
                'bc_landing_layout',
                'page',
                'side',
                'low');
        }
    }
}

function bc_landing_layout() {
global $post;
$nav_setting = get_post_meta( $post->ID, 'bc_navigation_setting_landing_page_'.$post->ID, true );
$announcement_setting = get_post_meta( $post->ID, 'bc_announcement_setting_landing_page_'.$post->ID, true );
$colorpicker_setting = get_post_meta( $post->ID, 'bc_colorpicker_landing_page_'.$post->ID, true );
$colorpicker_value_setting = get_post_meta( $post->ID, 'bc_colorpicker_value_landing_page_'.$post->ID, true );
?>
<table style="width:100%">
    <tr> 
        <th><label for="bc_navigation_setting_landing_page">Navigation Menu</label></th>
        <td align="left" valign="middle">
            <input name="bc_navigation_setting_landing_page" type="radio" id="bc_navigation_setting_landing_page" value="On" <?php echo (esc_attr($nav_setting)== 'On') ?  "checked" : "" ;  ?>/> On
            <input name="bc_navigation_setting_landing_page" type="radio" id="bc_navigation_setting_landing_page" value="Off" <?php echo (esc_attr($nav_setting)== 'Off') ?  "checked" : "" ;  ?>/> Off
        </td>
    </tr>
    <tr> 
        <th><label for="bc_announcement_setting_landing_page">Announcement Bar</label></th>
        <td align="left" valign="middle">
            <input name="bc_announcement_setting_landing_page" type="radio" id="bc_announcement_setting_landing_page" value="Yes" <?php echo (esc_attr($announcement_setting)== 'Yes') ?  "checked" : "" ;  ?>/> On
            <input name="bc_announcement_setting_landing_page" type="radio" id="bc_announcement_setting_landing_page" value="No" <?php echo (esc_attr($announcement_setting)== 'No') ?  "checked" : "" ;  ?>/> Off
        </td>
    </tr>
    <tr>
        <th><label for="bc_announcement_setting_landing_page">Overlay Color</label></th>
        <script>
        jQuery(document).ready(function($){
            $('.color_field').each(function(){
                $(this).wpColorPicker();
            });
        });
        </script>
        <td align="left" valign="middle">
            <div class="pagebox">
                <input class="color_field" type="text" name="bc_colorpicker_landing_page" value="<?php esc_attr_e( $colorpicker_setting ); ?>" data-default-color="#000063"/>
            </div>
        </td>
    </tr>
    <tr> 
        <th><label for="bc_announcement_setting_landing_page">Overlay Color Opacity(0-99)</label></th>
        <td align="left" valign="middle">
            <div class="pagebox">
               <input type="number" name="bc_colorpicker_value_landing_page" id="bc_colorpicker_value_landing_page" value="<?php echo esc_attr( $colorpicker_value_setting ); ?>" class="form-control" min='0' max='99'>
            </div>
        </td>
    </tr>
</table>

<?php
wp_nonce_field( 'bc_landing_page_overlay_metabox_nonce', 'bc_landing_page_overlay_metabox_process' );
}
/** Save the metabox*/
add_action( 'save_post', 'bc_save_landing_overlay', 1, 2 );
function bc_save_landing_overlay( $post_id, $post ) {
    if ( !isset( $_POST['bc_landing_page_overlay_metabox_process'] ) ) return;
    if ( !wp_verify_nonce( $_POST['bc_landing_page_overlay_metabox_process'], 'bc_landing_page_overlay_metabox_nonce' ) ) {
        return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID )) { return $post->ID;}
    if ( !isset( $_POST['bc_navigation_setting_landing_page'] ) ) { return $post->ID;}
    if ( !isset( $_POST['bc_announcement_setting_landing_page'] ) ) {return $post->ID;}
    if ( !isset( $_POST['bc_colorpicker_landing_page'] ) ) {return $post->ID;}
    if ( !isset( $_POST['bc_colorpicker_value_landing_page'] ) ) { return $post->ID;}
    $sanitizednavigation = wp_filter_post_kses( $_POST['bc_navigation_setting_landing_page'] );
    $sanitizedannouncementbar = wp_filter_post_kses( $_POST['bc_announcement_setting_landing_page'] );
    $sanitizedcolorpicker = wp_filter_post_kses( $_POST['bc_colorpicker_landing_page'] );
    $sanitizedcolorpickervalue = wp_filter_post_kses( $_POST['bc_colorpicker_value_landing_page'] );

    update_post_meta( $post->ID, 'bc_navigation_setting_landing_page_'.$post->ID, $sanitizednavigation );
    update_post_meta( $post->ID, 'bc_announcement_setting_landing_page_'.$post->ID, $sanitizedannouncementbar );
    update_post_meta( $post->ID, 'bc_colorpicker_landing_page_'.$post->ID, $sanitizedcolorpicker );
    update_post_meta( $post->ID, 'bc_colorpicker_value_landing_page_'.$post->ID, $sanitizedcolorpickervalue );
}
/*End HomeLanding Page Overlay Settings */


/*Blog Single Page slider Shortcode : [bc-blog-slider] [bc-blog-slider id='1,2,3']*/
add_shortcode( 'bc-blog-slider', 'bc_blog_slider_shortcode' );
function bc_blog_slider_shortcode( $atts , $content = null ) {
    static $count = 0;
    $count++;
    add_action( 'wp_footer' , function() use($count){
    ?>
        <script>
        var swiper<?php echo $count ?> = new Swiper('#bc_blog_swiper_<?php echo $count ?>', {slidesPerView: 3,spaceBetween: 32,slidesPerGroup: 3,loop: false,loopFillGroupWithBlank: true,
            breakpoints: {
                320: {slidesPerView: 1},
                480: {slidesPerView: 2},
                640: {slidesPerView: 2},
                768: {slidesPerView: 3},
                1000: {slidesPerView: 3}
            },
            pagination: {el: '.swiper-pagination',clickable: false,},
            navigation: {nextEl: '.af-swiper-button-next',prevEl: '.af-swiper-button-prev',},
        });
        </script>
    <?php });
    $Ids = null;
    $args  = array( 'post_type' => 'post', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');
    if(isset($atts['id'])) {
        $Ids = explode(',', $atts['id']);
        $postIds = $Ids;
        $args['post__in'] = $postIds;
    }?>
<div class="container-fluid bc_affiliations_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  text-center">
                <h2 class="bc_font_alt_1 text-capitalize text-center py-5">Our Blog</h2>
                <div id="bc_blog_swiper_<?php echo $count ?>" class="swiper-container bc_affiliation_swiper bc_blog_swiper container  swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper">
                    <?php 
                    $query = new WP_Query( $args );
                        if ( $query->have_posts() ) :
                            while($query->have_posts()) : $query->the_post();?>
                            <div class="swiper-slide swiper-slide-duplicate">
                                <div class="text-center">
                                    <a href="<?php the_permalink();?>">
                                        <?php if (has_post_thumbnail() ): 
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'blogpost-thumbnail' );?>
                                            <img src="<?php echo $image[0]; ?>" class="img-fluid">
                                        <?php endif; ?>
                                        <h3 class="text-center py-2 text-uppercase bc_text_medium bc_text_18"><?php echo wp_trim_words( get_the_title(), 5 ); ?></h3>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; 
                        wp_reset_query();
                        endif;?>
                    </div>
                </div>
                <div class="af-swiper-button-next swiper-button-next d-none d-lg-block" tabindex="0" role="button" aria-label="Next slide"><em class="fa fa-angle-right"></em> </div>
                <div class="af-swiper-button-prev swiper-button-prev d-none d-lg-block" tabindex="0" role="button" aria-label="Previous slide"> <em class="fa fa-angle-left"></em></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn bc_color_primary_bg text-white px-4 mb-5" type="button"> Visit Our Blogs</a>
    </div>
</div>
<?php }