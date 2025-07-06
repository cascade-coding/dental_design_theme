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


// add custom features
require_once get_template_directory() . '/inc/services/custom-post-types.php';

require_once get_template_directory() . '/inc/services/enqueue-scripts-styles.php';

require_once get_template_directory() . '/inc/services/customizer-settings.php';




// start session
function start_session_for_flash_message()
{
	if (!session_id()) {
		session_start();
	}
}
add_action('init', 'start_session_for_flash_message');





// ! insert default post categories

function dental_design_create_default_categories() {
    $default_categories = apply_filters('dental_design_default_categories', array(
        'Cosmetic Dental Services',
        'Almost Invisible Braces',
        'Dental Implant Services',
        'Dental Emergency!',
		'Routine Dental Care',
		'Teeth Whitening Services',
        'Denture Services'
    ));

    foreach ($default_categories as $category_name) {
        if (!term_exists($category_name, 'category')) {
            wp_insert_term($category_name, 'category');
        }
    }
}
add_action('after_switch_theme', 'dental_design_create_default_categories');


















// ADD FORM (create new category)
add_action('category_add_form_fields', 'custom_category_image_add_form');
function custom_category_image_add_form() {
    ?>
    <div class="form-field">
        <label for="category_image">Category Image</label>
        <div id="category-image-preview" style="margin-bottom:10px;"></div>
        <input type="hidden" name="category_image" id="category_image" value="" />
        <button type="button" class="upload_image_button button">Select Image</button>
        <button type="button" class="remove_image_button button" style="display:none;">Remove</button>
        <p class="description">Optional image for this category.</p>
    </div>
    <?php
}

// EDIT FORM (edit existing category)
add_action('category_edit_form_fields', 'custom_category_image_edit_form');
function custom_category_image_edit_form($term) {
    $image = get_term_meta($term->term_id, 'category_image', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="category_image">Category Image</label></th>
        <td>
            <div id="category-image-preview">
                <?php if ($image): ?>
                    <img src="<?php echo esc_url($image); ?>" style="max-width: 200px; margin-bottom:10px;" />
                <?php endif; ?>
            </div>
            <input type="hidden" name="category_image" id="category_image" value="<?php echo esc_attr($image); ?>" />
            <button type="button" class="upload_image_button button"><?php echo $image ? 'Change Image' : 'Select Image'; ?></button>
            <button type="button" class="remove_image_button button" style="<?php echo $image ? '' : 'display:none;'; ?>">Remove</button>
            <p class="description">Optional image for this category.</p>
        </td>
    </tr>
    <?php
}







// Save category image when a new category is created
add_action('created_category', 'save_category_image_meta', 10, 2);

// Save category image when a category is updated
add_action('edited_category', 'save_category_image_meta', 10, 2);

function save_category_image_meta($term_id, $tt_id) {
    if (isset($_POST['category_image'])) {
        update_term_meta($term_id, 'category_image', esc_url_raw($_POST['category_image']));
    }
}
