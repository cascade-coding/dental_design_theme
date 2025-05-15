<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="appointment-form bg-primary-900 w-full p-4">
    <input type="hidden" name="action" value="submit_appointment_form">
    <?php wp_nonce_field('appointment_form_nonce', 'appointment_nonce'); ?>

    <div class="flex flex-col gap-y-4">
        <input type="text" name="full_name" placeholder="Full Name (Required)" required class="appointment_field">

        <input type="email" name="email" placeholder="Email (Required)" required class="appointment_field">

        <input type="tel" name="phone" placeholder="Phone Number (Required)" required class="appointment_field">
    </div>

    <button type="submit" class="btn-submit px-4 py-3 bg-accent-500 hover:bg-accent-400 transition-all font-primary text-lg font-medium text-neutral-900 cursor-pointer w-full mt-4">Request an Appointment</button>
</form>