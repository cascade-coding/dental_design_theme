<?php

/**
 * Enqueue scripts and styles.
 */
function dental_design_scripts()
{
	wp_enqueue_style('dental_design-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('dental_design-style', 'rtl', 'replace');

	wp_enqueue_style(
		'dental_design-tw',
		get_template_directory_uri() . '/tw.css',
		array('dental_design-style'),
		filemtime(get_template_directory() . '/tw.css')
	);


	wp_enqueue_script('dental_design-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	// swiperjs
	wp_enqueue_style(
		'swiper-css',
		get_template_directory_uri() . '/assets/css/swiperjs.css',
		array('dental_design-tw'),
		filemtime(get_template_directory() . '/assets/css/swiperjs.css')
	);



	wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiperjs.js', [], null, true);


	wp_enqueue_script(
		'custom-js',
		get_template_directory_uri() . '/assets/js/app.js', // file path
		['swiper-js'],
		null,
		true
	);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'dental_design_scripts');