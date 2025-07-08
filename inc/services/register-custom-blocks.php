<?php



function dental_design_register_blocks() {
    // Shared build script
    wp_register_script(
        'dental-design-blocks',
        get_template_directory_uri() . '/build/index.js',
        ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-block-editor'],
        filemtime(get_template_directory() . '/build/index.js'),
        true
    );

    // Section block style
    wp_register_style(
        'dental-design-section-style',
        get_template_directory_uri() . '/src/blocks/section-block/style.css',
        [],
        filemtime(get_template_directory() . '/src/blocks/section-block/style.css')
    );

    register_block_type('dental_design/section-block', [
        'editor_script' => 'dental-design-blocks',
        'style'         => 'dental-design-section-style',
    ]);

    // Appointment block style
    wp_register_style(
        'dental-design-appointment-style',
        get_template_directory_uri() . '/src/blocks/appointment-button/style.css',
        [],
        filemtime(get_template_directory() . '/src/blocks/appointment-button/style.css')
    );

    register_block_type('dental_design/appointment-button', [
        'editor_script' => 'dental-design-blocks',
        'style'         => 'dental-design-appointment-style',
    ]);
}
add_action('init', 'dental_design_register_blocks');


// Editor styles
add_action('after_setup_theme', function () {
    add_theme_support('editor-styles');
    add_editor_style('tw.css');
});



// Inject appointment form if block is used


add_filter('the_content', function ($content) {
    if (strpos($content, '<!-- APPOINTMENT_FORM_PLACEHOLDER -->') !== false) {
        ob_start();
        get_template_part('template-parts/appointment-form');
        $form = ob_get_clean();
        $content = str_replace('<!-- APPOINTMENT_FORM_PLACEHOLDER -->', $form, $content);
    }
    return $content;
});


