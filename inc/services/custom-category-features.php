<?php


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



// add feature image upload option for category
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

