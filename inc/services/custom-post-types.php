<?php

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



// Register Custom Post Type: Doctors
function register_doctors_post_type()
{
	$labels = array(
		'name' => 'Doctors',
		'singular_name' => 'Doctor',
		'menu_name' => 'Doctors',
		'add_new' => 'Add New Doctor',
		'add_new_item' => 'Add New Doctor',
		'edit_item' => 'Edit Doctor',
		'new_item' => 'New Doctor',
		'view_item' => 'View Doctor',
		'search_items' => 'Search Doctors',
		'not_found' => 'No doctors found.',
		'not_found_in_trash' => 'No doctors found in Trash.',
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-id',
		'supports' => array('title', 'editor', 'thumbnail'),
		'show_in_rest' => true,
	);

	register_post_type('doctor', $args);
}
add_action('init', 'register_doctors_post_type');




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

