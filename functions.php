<?php

/**
 * dental_design functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dental_design
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dental_design_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dental_design, use a find and replace
		* to change 'dental_design' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('dental_design', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary Header Navigation', 'dental_design'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dental_design_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'dental_design_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dental_design_content_width()
{
	$GLOBALS['content_width'] = apply_filters('dental_design_content_width', 640);
}
add_action('after_setup_theme', 'dental_design_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dental_design_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'dental_design'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'dental_design'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'dental_design_widgets_init');

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

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



// start session
function start_session_for_flash_message()
{
	if (!session_id()) {
		session_start();
	}
}
add_action('init', 'start_session_for_flash_message');





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



// ! custom post types

// Register Custom Post Type: Slider
function register_slider_post_type()
{
	$labels = array(
		'name' => 'Sliders',
		'singular_name' => 'Slider',
		'menu_name' => 'Sliders',
		'add_new' => 'Add New Slider',
		'add_new_item' => 'Add New Slider',
		'edit_item' => 'Edit Slider',
		'new_item' => 'New Slider',
		'view_item' => 'View Slider',
		'search_items' => 'Search Sliders',
		'not_found' => 'No sliders found.',
		'not_found_in_trash' => 'No sliders found in Trash.',
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-images-alt2',
		'supports' => array('title', 'thumbnail'),
		'show_in_rest' => true,
	);

	register_post_type('slider', $args);
}
add_action('init', 'register_slider_post_type');

// Add Meta Box for Slider
function add_slider_meta_box()
{
	add_meta_box(
		'slider_meta_box',
		'Slider Details',
		'render_slider_meta_box',
		'slider',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'add_slider_meta_box');

// Render the Meta Box HTML
function render_slider_meta_box($post)
{
	wp_nonce_field('slider_meta_box_nonce', 'slider_meta_box_nonce_field');

	$heading = get_post_meta($post->ID, '_slider_heading', true);
	$subtext = get_post_meta($post->ID, '_slider_subtext', true);
	$button_text = get_post_meta($post->ID, '_slider_button_text', true);
	$button_link = get_post_meta($post->ID, '_slider_button_link', true);
	$slider_type = get_post_meta($post->ID, '_slider_type', true);
?>
	<p>
		<label>Heading:</label><br>
		<input type="text" name="slider_heading" value="<?php echo esc_attr($heading); ?>" style="width:100%;" />
	</p>
	<p>
		<label>Subtext:</label><br>
		<input type="text" name="slider_subtext" value="<?php echo esc_attr($subtext); ?>" style="width:100%;" />
	</p>
	<p>
		<label>Button Text:</label><br>
		<input type="text" name="slider_button_text" value="<?php echo esc_attr($button_text); ?>" style="width:100%;" />
	</p>
	<p>
		<label>Button Link:</label><br>
		<input type="text" name="slider_button_link" value="<?php echo esc_attr($button_link); ?>" style="width:100%;" />
	</p>
	<p>
		<label>Slider Type / Location:</label><br>
		<select name="slider_type" style="width:100%;">
			<option value="">Select a location</option>
			<option value="home-top" <?php selected($slider_type, 'home-top'); ?>>Home Top</option>
			<option value="home-middle" <?php selected($slider_type, 'home-middle'); ?>>Home Middle</option>
			<option value="about-top" <?php selected($slider_type, 'about-top'); ?>>About Top</option>
			<option value="services-top" <?php selected($slider_type, 'services-top'); ?>>Services Top</option>
		</select>
	</p>
<?php
}

// Save Meta Box Data
function save_slider_meta_box($post_id)
{
	if (
		!isset($_POST['slider_meta_box_nonce_field']) ||
		!wp_verify_nonce($_POST['slider_meta_box_nonce_field'], 'slider_meta_box_nonce')
	) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;

	if (isset($_POST['slider_heading'])) {
		update_post_meta($post_id, '_slider_heading', sanitize_text_field($_POST['slider_heading']));
	}

	if (isset($_POST['slider_subtext'])) {
		update_post_meta($post_id, '_slider_subtext', sanitize_text_field($_POST['slider_subtext']));
	}

	if (isset($_POST['slider_button_text'])) {
		update_post_meta($post_id, '_slider_button_text', sanitize_text_field($_POST['slider_button_text']));
	}

	if (isset($_POST['slider_button_link'])) {
		update_post_meta($post_id, '_slider_button_link', esc_url_raw($_POST['slider_button_link']));
	}

	if (isset($_POST['slider_type'])) {
		update_post_meta($post_id, '_slider_type', sanitize_text_field($_POST['slider_type']));
	}
}

add_action('save_post', 'save_slider_meta_box');




// ! Register Custom Post Type: Appointment Request
function register_appointment_request_post_type()
{
	register_post_type('appointment_request', [
		'labels' => [
			'name'               => 'Appointment Requests',
			'singular_name'      => 'Appointment Request',
			'add_new_item'       => 'Add New Request',
			'edit_item'          => 'Edit Request',
			'menu_name'          => 'Appointments',
		],
		'public'      => false,
		'show_ui'     => true,
		'menu_icon'   => 'dashicons-calendar-alt',
		'supports'    => []
	]);
}
add_action('init', 'register_appointment_request_post_type');


function hide_appointment_title_field()
{
	$screen = get_current_screen();
	if ($screen->post_type === 'appointment_request') {
		echo '<style>#titlediv { display: none !important; }</style>';
	}
}

function remove_editor_from_appointment_request()
{
	remove_post_type_support('appointment_request', 'editor');
}

add_action('admin_init', 'remove_editor_from_appointment_request');

add_action('admin_head', 'hide_appointment_title_field');


// Add Meta Box to Appointment Request
function add_appointment_meta_box()
{
	add_meta_box(
		'appointment_details',
		'Appointment Details',
		'render_appointment_meta_box',
		'appointment_request',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'add_appointment_meta_box');

// Render the Meta Box UI
function render_appointment_meta_box($post)
{
	wp_nonce_field('appointment_meta_box_nonce', 'appointment_meta_box_nonce_field');

	$full_name = get_post_meta($post->ID, 'full_name', true);
	$email     = get_post_meta($post->ID, 'email', true);
	$phone     = get_post_meta($post->ID, 'phone', true);
?>

	<table class="form-table">
		<tr>
			<th><label for="full_name">Full Name</label></th>
			<td><input type="text" id="full_name" name="full_name" value="<?php echo esc_attr($full_name); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<th><label for="email">Email</label></th>
			<td><input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<th><label for="phone">Phone</label></th>
			<td><input type="text" id="phone" name="phone" value="<?php echo esc_attr($phone); ?>" class="regular-text" /></td>
		</tr>
	</table>

<?php
}

// Save Meta Box Data
function save_appointment_meta_box($post_id)
{
	if (
		!isset($_POST['appointment_meta_box_nonce_field']) ||
		!wp_verify_nonce($_POST['appointment_meta_box_nonce_field'], 'appointment_meta_box_nonce')
	) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	if (get_post_type($post_id) !== 'appointment_request') return;

	if (isset($_POST['full_name'])) {
		update_post_meta($post_id, 'full_name', sanitize_text_field($_POST['full_name']));
	}

	if (isset($_POST['email'])) {
		update_post_meta($post_id, 'email', sanitize_email($_POST['email']));
	}

	if (isset($_POST['phone'])) {
		update_post_meta($post_id, 'phone', sanitize_text_field($_POST['phone']));
	}
}
add_action('save_post', 'save_appointment_meta_box');


// Handle Frontend Form Submission
add_action('admin_post_nopriv_submit_appointment_form', 'handle_appointment_form');
add_action('admin_post_submit_appointment_form', 'handle_appointment_form');

function handle_appointment_form()
{
	if (!isset($_POST['appointment_nonce']) || !wp_verify_nonce($_POST['appointment_nonce'], 'appointment_form_nonce')) {
		wp_die('Security check failed.');
	}

	$name  = sanitize_text_field($_POST['full_name']);
	$email = sanitize_email($_POST['email']);
	$phone = sanitize_text_field($_POST['phone']);

	$post_id = wp_insert_post([
		'post_type'    => 'appointment_request',
		'post_title'   => $name . ' - ' . current_time('mysql'),
		'post_status'  => 'publish',
	]);

	if ($post_id) {
		update_post_meta($post_id, 'full_name', $name);
		update_post_meta($post_id, 'email', $email);
		update_post_meta($post_id, 'phone', $phone);

		// Optional: Email admin (commented out)
		/*
        $to      = get_option('admin_email');
        $subject = 'New Appointment Request';
        $message = "Name: $name\nEmail: $email\nPhone: $phone";
        wp_mail($to, $subject, $message);
        */
	}

	wp_redirect(home_url('/thank-you'));
	exit;
}







// Register Custom Post Type: Reviews
function register_reviews_post_type()
{
	$labels = array(
		'name' => 'Reviews',
		'singular_name' => 'Review',
		'add_new_item' => 'Add New Review',
		'edit_item' => 'Edit Review',
		'new_item' => 'New Review',
		'view_item' => 'View Review',
		'all_items' => 'All Reviews',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-star-filled',
		'supports' => array('title', 'thumbnail'),
		'has_archive' => true,
		'rewrite' => array('slug' => 'reviews'),
		'show_in_rest' => true,
	);

	register_post_type('review', $args);
}
add_action('init', 'register_reviews_post_type');


// Add Meta Box for Reviews

function add_review_meta_boxes()
{
	add_meta_box('review_details', 'Review Details', 'render_review_meta_box', 'review', 'normal', 'high');
}

add_action('add_meta_boxes', 'add_review_meta_boxes');

function render_review_meta_box($post)
{
	$reviewer_name = get_post_meta($post->ID, '_reviewer_name', true);
	$stars = get_post_meta($post->ID, '_review_stars', true);
	$review_text = get_post_meta($post->ID, '_review_text', true);
?>
	<label>Name:</label><br>
	<input type="text" name="reviewer_name" value="<?php echo esc_attr($reviewer_name); ?>" style="width:100%;" /><br><br>

	<label>Stars (1-5):</label><br>
	<input type="number" name="review_stars" value="<?php echo esc_attr($stars); ?>" min="1" max="5" /><br><br>

	<label>Review Text:</label><br>
	<input type="text" name="review_text" value="<?php echo esc_attr($review_text); ?>" style="width:100%;" /><br><br>
<?php
}

function save_review_meta($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	if (isset($_POST['reviewer_name'])) {
		update_post_meta($post_id, '_reviewer_name', sanitize_text_field($_POST['reviewer_name']));
	}
	if (isset($_POST['review_stars'])) {
		update_post_meta($post_id, '_review_stars', intval($_POST['review_stars']));
	}
	if (isset($_POST['review_text'])) {
		update_post_meta($post_id, '_review_text', sanitize_text_field($_POST['review_text']));
	}
}
add_action('save_post', 'save_review_meta');











// Register Custom Post Type: Contact Request
function register_contact_request_post_type()
{
	register_post_type('contact_request', [
		'labels' => [
			'name'               => 'Contact Requests',
			'singular_name'      => 'Contact Request',
			'add_new_item'       => 'Add New Contact',
			'edit_item'          => 'Edit Contact',
			'menu_name'          => 'Contacts',
		],
		'public'      => false,
		'show_ui'     => true,
		'menu_icon'   => 'dashicons-email-alt2',
		'supports'    => []
	]);
}
add_action('init', 'register_contact_request_post_type');

function hide_contact_title_field()
{
	$screen = get_current_screen();
	if ($screen->post_type === 'contact_request') {
		echo '<style>#titlediv { display: none !important; }</style>';
	}
}
add_action('admin_head', 'hide_contact_title_field');

function remove_editor_from_contact_request()
{
	remove_post_type_support('contact_request', 'editor');
}
add_action('admin_init', 'remove_editor_from_contact_request');


function add_contact_meta_box()
{
	add_meta_box(
		'contact_details',
		'Contact Details',
		'render_contact_meta_box',
		'contact_request',
		'normal',
		'default'
	);
}

add_action('add_meta_boxes', 'add_contact_meta_box');

function render_contact_meta_box($post)
{
	wp_nonce_field('contact_meta_box_nonce', 'contact_meta_box_nonce_field');

	$full_name = get_post_meta($post->ID, 'full_name', true);
	$email     = get_post_meta($post->ID, 'email', true);
	$phone     = get_post_meta($post->ID, 'phone', true);
	$message   = get_post_meta($post->ID, 'message', true);
?>
	<table class="form-table">
		<tr>
			<th><label for="full_name">Full Name</label></th>
			<td><input type="text" id="full_name" name="full_name" value="<?php echo esc_attr($full_name); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<th><label for="email">Email</label></th>
			<td><input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<th><label for="phone">Phone</label></th>
			<td><input type="text" id="phone" name="phone" value="<?php echo esc_attr($phone); ?>" class="regular-text" /></td>
		</tr>
		<tr>
			<th><label for="message">Message</label></th>
			<td><textarea id="message" name="message" rows="5" class="large-text"><?php echo esc_textarea($message); ?></textarea></td>
		</tr>
	</table>
<?php
}


function save_contact_meta_box($post_id)
{
	if (
		!isset($_POST['contact_meta_box_nonce_field']) ||
		!wp_verify_nonce($_POST['contact_meta_box_nonce_field'], 'contact_meta_box_nonce')
	) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (get_post_type($post_id) !== 'contact_request') return;

	update_post_meta($post_id, 'full_name', sanitize_text_field($_POST['full_name'] ?? ''));
	update_post_meta($post_id, 'email', sanitize_email($_POST['email'] ?? ''));
	update_post_meta($post_id, 'phone', sanitize_text_field($_POST['phone'] ?? ''));
	update_post_meta($post_id, 'message', sanitize_textarea_field($_POST['message'] ?? ''));
}
add_action('save_post', 'save_contact_meta_box');


add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form');
add_action('admin_post_submit_contact_form', 'handle_contact_form');

function handle_contact_form()
{
	if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
		wp_die('Security check failed.');
	}

	$name    = sanitize_text_field($_POST['full_name']);
	$email   = sanitize_email($_POST['email']);
	$phone   = sanitize_text_field($_POST['phone']);
	$message = sanitize_textarea_field($_POST['message']);

	$post_id = wp_insert_post([
		'post_type'   => 'contact_request',
		'post_title'  => $name . ' - ' . current_time('mysql'),
		'post_status' => 'publish',
	]);

	if ($post_id) {
		update_post_meta($post_id, 'full_name', $name);
		update_post_meta($post_id, 'email', $email);
		update_post_meta($post_id, 'phone', $phone);
		update_post_meta($post_id, 'message', $message);

		// Optional: Send email to admin
		/*
		$to      = get_option('admin_email');
		$subject = 'New Contact Message';
		$body    = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
		wp_mail($to, $subject, $body);
		*/
	}

	// $_SESSION['flash_message'] = 'Thank you for contacting us.';
	// $_SESSION['sumbition_type'] = 'contact';

	wp_redirect(home_url('/thank-you'));
	exit;
}
