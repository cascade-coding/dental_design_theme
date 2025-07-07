<?php

function dental_design_register_feature_image_toggle_meta() {
    register_post_meta('post', '_show_feature_image', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'boolean',
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ]);
}
add_action('init', 'dental_design_register_feature_image_toggle_meta');



function dental_design_enqueue_editor_assets() {
    wp_enqueue_script(
        'dental_design-editor-script',
        get_template_directory_uri() . '/build/index.js',
        ['wp-plugins', 'wp-edit-post', 'wp-components', 'wp-element', 'wp-data', 'wp-compose'],
        filemtime(get_template_directory() . '/build/index.js'),
        true
    );
}
add_action('enqueue_block_editor_assets', 'dental_design_enqueue_editor_assets');




