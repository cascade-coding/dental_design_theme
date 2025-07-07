<?php

function dental_design_register_section_block() {
    wp_register_script(
        'dental_design-section-block',
        get_template_directory_uri() . '/build/index.js',
        ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-block-editor'],
        filemtime(get_template_directory() . '/build/index.js'),
        true
    );

    wp_register_style(
        'dental_design-section-block-style',
        get_template_directory_uri() . '/src/blocks/section-block/style.css',
        [],
        filemtime(get_template_directory() . '/src/blocks/section-block/style.css')
    );

    register_block_type('dental_design/section-block', [
        'editor_script' => 'dental-design-section-block',
        'style'         => 'dental-design-section-block-style',
    ]);

   
}
add_action('init', 'dental_design_register_section_block');



add_action('after_setup_theme', function() {
    add_theme_support('editor-styles');
    add_editor_style('tw.css'); 
});
