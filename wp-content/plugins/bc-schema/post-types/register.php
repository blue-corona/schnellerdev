<?php
function bc_schema_register_schema_type() {
    $labels = array( 
        'name' => __( 'Schema', BCSCHEMADOMAIN ),
        'singular_name' => __( 'Schema', BCSCHEMADOMAIN ),
        'archives' => __( 'Schema', BCSCHEMADOMAIN ),
        'add_new' => __( 'Add New Schema', BCSCHEMADOMAIN ),
        'add_new_item' => __( 'Add New Schema', BCSCHEMADOMAIN ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'has_archive' => 'schema',
        'rewrite' => array( 'has_front' => true ),
        'menu_icon' => 'dashicons-groups',
        'supports' => false,
        'show_in_rest' => true,
    );
    register_post_type( 'bc_schemas', $args );
}
