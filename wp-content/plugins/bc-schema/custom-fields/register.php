<?php
function bc_schema_create_metabox() {
    add_meta_box(
        'bc_schema_metabox',
        'Schema',
        'bc_schema_metabox',
        'bc_schemas',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'bc_schema_create_metabox' );



function bc_schema_metabox() {
global $post; // Get the current post data
$type = get_post_meta( $post->ID, 'schema_type', true );
?>
<!-- https://github.com/bueltge/wordpress-admin-style/tree/master/patterns -->
<div>
    <!-- <label><?php _e( 'Schema' ); ?></label> -->
    <input class="large-text" type="hidden" id="schema_type" name="schema_type" value='<?= $type?>' required />
</div>

<?php require_once( BCSCHEMAPATH . '/schema-app/schema.php' );?>

<?php
    wp_nonce_field( 'bc_schema_form_metabox_nonce', 'bc_schema_form_metabox_process' );
}

//add form html outside post form
add_filter('admin_footer','angular_app_load');

function angular_app_load(){
    global $pagenow,$typenow;   
    if (!in_array( $pagenow, array( 'post.php', 'post-new.php' )))
        return;

//once we get here we are on the right page so we echo form html:
?>
    <form method="post" target="_blank" action="https://search.google.com/test/rich-results">
        <textarea name="code_snippet" class="hide"></textarea>
    </form>
    <form id="google-form" method="post" target="_blank" action="https://search.google.com/structured-data/testing-tool">
        <textarea name="code" class="hide"></textarea>
    </form>

<?php
}

function bc_schema_save_metabox( $post_id, $post ) {
    if ( !isset( $_POST['bc_schema_form_metabox_process'] ) ) return;
    if ( !wp_verify_nonce( $_POST['bc_schema_form_metabox_process'], 'bc_schema_form_metabox_nonce' ) ) {
        return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }
    if ( !isset( $_POST['schema_type'] ) ) {
        return $post->ID;
    }

    $sanitizedname = wp_filter_post_kses( $_POST['schema_type'] );
    
    update_post_meta( $post->ID, 'schema_type', $sanitizedname );
}
add_action( 'save_post', 'bc_schema_save_metabox', 1, 2 );

// Change Title on insert and update of location title
add_filter('wp_insert_post_data', 'bc_schema_change_title');
function bc_schema_change_title($data){
    if($data['post_type'] != 'bc_schemas'){
        return $data;
    }
    if ( !isset( $_POST['schema_type'] ) ) {
        return $data;
    }
    $data['post_title'] = $_POST['schema_type'];
    return $data;
}
