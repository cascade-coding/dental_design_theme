document.addEventListener('DOMContentLoaded', function () {
    let mediaFrame;

    document.querySelectorAll('.upload_image_button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const input = this.closest('td, .form-field').querySelector('#category_image');
            const preview = this.closest('td, .form-field').querySelector('#category-image-preview');
            const removeButton = this.closest('td, .form-field').querySelector('.remove_image_button');

            // Open media frame
            if (mediaFrame) {
                mediaFrame.open();
                return;
            }

            mediaFrame = wp.media({
                title: 'Select or Upload Image',
                button: { text: 'Use this image' },
                multiple: false
            });

            mediaFrame.on('select', function () {
                const attachment = mediaFrame.state().get('selection').first().toJSON();
                input.value = attachment.url;
                preview.innerHTML = `<img src="${attachment.url}" style="max-width:200px; margin-bottom:10px;" />`;
                removeButton.style.display = 'inline-block';
                button.textContent = 'Change Image';
            });

            mediaFrame.open();
        });
    });

    document.querySelectorAll('.remove_image_button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const input = this.closest('td, .form-field').querySelector('#category_image');
            const preview = this.closest('td, .form-field').querySelector('#category-image-preview');
            const uploadButton = this.closest('td, .form-field').querySelector('.upload_image_button');

            input.value = '';
            preview.innerHTML = '';
            this.style.display = 'none';
            uploadButton.textContent = 'Select Image';
        });
    });
});
