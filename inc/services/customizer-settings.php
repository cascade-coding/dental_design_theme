<?php


// ! customizer settings

// add phone number customizer option
function dental_design_customize_register_contact_info_1($wp_customize)
{
	$wp_customize->add_section('dental_design_contact_section', array(
		'title'    => __('Contact Info', 'dental_design'),
		'priority' => 30,
	));

	// Phone number
	$wp_customize->add_setting('dental_design_phone_number', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh', // for live preview
	));

	$wp_customize->add_control('dental_design_phone_number', array(
		'label'    => __('Phone Number', 'dental_design'),
		'section'  => 'dental_design_contact_section',
		'settings' => 'dental_design_phone_number',
		'type'     => 'text',
	));

	// Address
	$wp_customize->add_setting('dental_design_address', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_address', array(
		'label'    => __('Business Address', 'dental_design'),
		'section'  => 'dental_design_contact_section',
		'settings' => 'dental_design_address',
		'type'     => 'text',
	));

	// Selective refresh partials (for pencil icon)
	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('dental_design_phone_number', array(
			'selector'        => '.phone-number',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_phone_number', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_address', array(
			'selector'        => '.business-address',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_address', ''));
			},
		));
	}
}

add_action('customize_register', 'dental_design_customize_register_contact_info_1');




// add video intro block customizer option
function dental_design_customize_register_video_intro_section($wp_customize)
{
	$wp_customize->add_section('dental_design_video_intro_section', array(
		'title'       => __('Introduction', 'dental_design'),
		'priority'    => 30,
		'description' => __('Upload a video file or enter an external video URL. If both are set, the uploaded file will be used.', 'dental_design'),
	));

	// Intro Title
	$wp_customize->add_setting('dental_design_intro_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_intro_title', array(
		'label'    => __('Intro Title', 'dental_design'),
		'section'  => 'dental_design_video_intro_section',
		'settings' => 'dental_design_intro_title',
		'type'     => 'text',
	));

	// Intro Detail
	$wp_customize->add_setting('dental_design_intro_detail', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_intro_detail', array(
		'label'    => __('Intro Detail', 'dental_design'),
		'section'  => 'dental_design_video_intro_section',
		'settings' => 'dental_design_intro_detail',
		'type'     => 'textarea',
	));


	// Intro Video File Upload
	$wp_customize->add_setting('dental_design_intro_video_file', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint',
		'type' => 'theme_mod',
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'dental_design_intro_video_file', array(
		'label'       => __('Upload Intro Video', 'dental_design'),
		'description' => __('Upload an intro video file (MP4, WebM, etc.). This will override the video URL if set.', 'dental_design'),
		'section'     => 'dental_design_video_intro_section',
		'mime_type'   => 'video',
		'settings'    => 'dental_design_intro_video_file',
	)));

	// Intro Video URL
	$wp_customize->add_setting('dental_design_intro_video_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('dental_design_intro_video_url', array(
		'label'       => __('Intro Video URL', 'dental_design'),
		'description' => __('Paste a YouTube, Vimeo, or direct video URL here. Ignored if a video file is uploaded above.', 'dental_design'),
		'section'     => 'dental_design_video_intro_section',
		'settings'    => 'dental_design_intro_video_url',
		'type'        => 'url',
	));

	// Selective refresh for title and detail
	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('dental_design_intro_title', array(
			'selector'        => '.vid-intro-title',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_intro_title', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_intro_detail', array(
			'selector'        => '.vid-intro-detail',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_intro_detail', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_intro_video_url', array(
			'selector'        => '.vid-intro-video',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_intro_video_url', ''));
			},
		));
	}
}

add_action('customize_register', 'dental_design_customize_register_video_intro_section');




// add video intro block customizer option for about page
function dental_design_customize_register_about_video_intro_section($wp_customize)
{
	$wp_customize->add_section('dental_design_about_video_intro_section', array(
		'title'       => __('About Introduction', 'dental_design'),
		'priority'    => 30,
		'description' => __('Upload a video file or enter an external video URL. If both are set, the uploaded file will be used.', 'dental_design'),
	));

	// Intro Title
	$wp_customize->add_setting('dental_design_about_intro_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_about_intro_title', array(
		'label'    => __('Intro Title', 'dental_design'),
		'section'  => 'dental_design_about_video_intro_section',
		'settings' => 'dental_design_about_intro_title',
		'type'     => 'text',
	));

	// Intro Detail
	$wp_customize->add_setting('dental_design_about_intro_detail', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_about_intro_detail', array(
		'label'    => __('Intro Detail', 'dental_design'),
		'section'  => 'dental_design_about_video_intro_section',
		'settings' => 'dental_design_about_intro_detail',
		'type'     => 'textarea',
	));


	// Intro Video File Upload
	$wp_customize->add_setting('dental_design_about_intro_video_file', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'absint',
		'type' => 'theme_mod',
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'dental_design_about_intro_video_file', array(
		'label'       => __('Upload Intro Video', 'dental_design'),
		'description' => __('Upload an intro video file (MP4, WebM, etc.). This will override the video URL if set.', 'dental_design'),
		'section'     => 'dental_design_about_video_intro_section',
		'mime_type'   => 'video',
		'settings'    => 'dental_design_about_intro_video_file',
	)));

	// Intro Video URL
	$wp_customize->add_setting('dental_design_about_intro_video_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('dental_design_about_intro_video_url', array(
		'label'       => __('Intro Video URL', 'dental_design'),
		'description' => __('Paste a YouTube, Vimeo, or direct video URL here. Ignored if a video file is uploaded above.', 'dental_design'),
		'section'     => 'dental_design_about_video_intro_section',
		'settings'    => 'dental_design_about_intro_video_url',
		'type'        => 'url',
	));

	// Selective refresh for title and detail
	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('dental_design_about_intro_title', array(
			'selector'        => '.about-vid-intro-title',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_about_intro_title', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_about_intro_detail', array(
			'selector'        => '.about-vid-intro-detail',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_about_intro_detail', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_about_intro_video_url', array(
			'selector'        => '.about-vid-intro-video',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_about_intro_video_url', ''));
			},
		));
	}
}

add_action('customize_register', 'dental_design_customize_register_about_video_intro_section');



// add our team section info customizer option
function dental_design_customize_register_our_team_info($wp_customize)
{
	$wp_customize->add_section('dental_design_our_team_section', array(
		'title'    => __('Our Team Info', 'dental_design'),
		'priority' => 30,
	));

	// Section Title
	$wp_customize->add_setting('dental_design_our_team_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_our_team_title', array(
		'label'    => __('Title', 'dental_design'),
		'section'  => 'dental_design_our_team_section',
		'settings' => 'dental_design_our_team_title',
		'type'     => 'text',
	));


	// Section text
	$wp_customize->add_setting('dental_design_our_team_text', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_our_team_text', array(
		'label'    => __('Text', 'dental_design'),
		'section'  => 'dental_design_our_team_section',
		'settings' => 'dental_design_our_team_text',
		'type'     => 'textarea',
	));

	// Section about URL
	$wp_customize->add_setting('dental_design_our_team_about_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_our_team_about_url', array(
		'label'    => __('About Us URL', 'dental_design'),
		'section'  => 'dental_design_our_team_section',
		'settings' => 'dental_design_our_team_about_url',
		'type'     => 'text',
	));

	// Section about button text
	$wp_customize->add_setting('dental_design_our_team_about_button_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_our_team_about_button_text', array(
		'label'    => __('About Us Button Text', 'dental_design'),
		'section'  => 'dental_design_our_team_section',
		'settings' => 'dental_design_our_team_about_button_text',
		'type'     => 'text',
	));


	// Section Team Photo
	$wp_customize->add_setting('dental_design_our_team_photo', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		'type'              => 'theme_mod',
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'dental_design_our_team_photo', array(
		'label'       => __('Upload About Section Image', 'dental_design'),
		'description' => __('Upload a photo of the team.', 'dental_design'),
		'section'     => 'dental_design_our_team_section',
		'mime_type'   => 'image',
		'settings'    => 'dental_design_our_team_photo',
	)));


	// Selective refresh partials (for pencil icon)
	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('dental_design_our_team_title', array(
			'selector'        => '.our-team-title',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_our_team_title', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_our_team_text', array(
			'selector'        => '.our-team-text',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_our_team_text', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_our_team_about_button_text', array(
			'selector'        => '.our-team-about-button-text',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_our_team_about_button_text', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_our_team_photo', array(
			'selector'        => '.our-team-photo',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_our_team_photo', ''));
			},
		));
	}
}

add_action('customize_register', 'dental_design_customize_register_our_team_info');





// add contact section info customizer option
function dental_design_customize_register_contact_section_info_2($wp_customize)
{
	$wp_customize->add_section('dental_design_contact_section_2', array(
		'title'    => __('Contact Form Section', 'dental_design'),
		'priority' => 30,
	));

	// Section Title
	$wp_customize->add_setting('dental_design_contact_2_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_contact_2_title', array(
		'label'    => __('Title', 'dental_design'),
		'section'  => 'dental_design_contact_section_2',
		'settings' => 'dental_design_contact_2_title',
		'type'     => 'text',
	));

	// Section Subtext
	$wp_customize->add_setting('dental_design_contact_2_subtext', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_contact_2_subtext', array(
		'label'    => __('Text', 'dental_design'),
		'section'  => 'dental_design_contact_section_2',
		'settings' => 'dental_design_contact_2_subtext',
		'type'     => 'textarea',
	));

	// Selective refresh partials (for pencil icon)
	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('dental_design_contact_2_title', array(
			'selector'        => '.contact-title',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_contact_2_title', ''));
			},
		));

		$wp_customize->selective_refresh->add_partial('dental_design_contact_2_subtext', array(
			'selector'        => '.contact-subtext',
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_contact_2_subtext', ''));
			},
		));
	}
}

add_action('customize_register', 'dental_design_customize_register_contact_section_info_2');


// add business hours info
function dental_design_customize_register_business_hours_section($wp_customize)
{
	$days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

	$wp_customize->add_section('dental_design_business_hours_section', [
		'title'    => __('Business Hours', 'dental_design'),
		'priority' => 30,
	]);

	foreach ($days as $day) {
		$setting_id = "business_hours_{$day}";

		// Register the setting
		$wp_customize->add_setting($setting_id, [
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		]);

		// Add the control
		$wp_customize->add_control($setting_id, [
			'label'   => __(ucfirst($day), 'dental_design'),
			'section' => 'dental_design_business_hours_section',
			'type'    => 'text',
		]);

		if (isset($wp_customize->selective_refresh)) {
			$wp_customize->selective_refresh->add_partial($setting_id, [
				'selector'        => ".edit_business_hours_{$day}",
				'render_callback' => function () use ($setting_id) {
					return esc_html(get_theme_mod($setting_id, ''));
				},
			]);
		}
	}
}


add_action('customize_register', 'dental_design_customize_register_business_hours_section');



// add location map link
function dental_design_customize_register_location_map_link($wp_customize)
{

	$wp_customize->add_section('dental_design_location_map_link', [
		'title'    => __('Office Location Map', 'dental_design'),
		'priority' => 30,
	]);



	// Map Link
	$wp_customize->add_setting('dental_design_location_map_link_text', array(
		'default'           => '',
		'sanitize_callback' => 'dental_design_extract_iframe_src',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('dental_design_location_map_link_text', array(
		'label'    => __('Google Link', 'dental_design'),
		'section'  => 'dental_design_location_map_link',
		'description' => __('Paste the Google Maps embed code OR just the embed URL (src).', 'dental_design'),
		'settings' => 'dental_design_location_map_link_text',
		'type'     => 'text',
	));

	function dental_design_extract_iframe_src($input) {
		if (preg_match('/src="([^"]+)"/', $input, $matches)) {
			return esc_url_raw($matches[1]);
		}
		return esc_url_raw($input); // fallback
	}


	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('dental_design_location_map_link_text', [
			'selector'        => ".location_map_link_text",
			'render_callback' => function () {
				return esc_html(get_theme_mod('dental_design_location_map_link_text', ''));
			},
		]);
	}
	
}


add_action('customize_register', 'dental_design_customize_register_location_map_link');





