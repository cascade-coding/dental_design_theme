
<!-- Location & Contact Information section -->
<section class="bg-neutral-50 text-neutral-900 pt-4">
    <div class="container mx-auto px-4 py-10">
        <h3 class="text-3xl font-primary tracking-wide leading-relaxed font-semibold contact-title">
            <?php if (get_theme_mod('dental_design_contact_2_title')): ?>
                <?php echo esc_html(get_theme_mod('dental_design_contact_2_title')); ?>
            <?php else: ?>
                Location & Contact Information
            <?php endif; ?>
        </h3>

        <p class="mt-4 contact-subtext">
            <?php if (get_theme_mod('dental_design_contact_2_subtext')): ?>
                <?php echo esc_html(get_theme_mod('dental_design_contact_2_subtext')); ?>
            <?php else: ?>
                At Dental Design, we’re here to take care of all your dental needs. <br>
                Need to schedule an appointment or have questions about billing? Call us at (555) 123-4567. <br> <br>

                Prefer us to reach out? Just provide your details, and we’ll be in touch soon to confirm your visit. See you
                soon!
            <?php endif; ?>
        </p>

        <div class="flex items-start justify-between gap-x-10 flex-col lg:flex-row gap-y-6 mt-12">
            <div class="w-full lg:w-1/2">
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                    class="bg-neutral-200 w-full p-4">
                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                    <input type="hidden" name="action" value="submit_contact_form">

                    <div class="flex flex-col gap-y-4">
                        <input type="text" name="full_name" placeholder="Full Name (Required)" required
                            class="contact_field">

                        <input type="email" name="email" placeholder="Email (Required)" required class="contact_field">

                        <input type="tel" name="phone" placeholder="Phone Number (Required)" required
                            class="contact_field">

                        <textarea name="message" placeholder="Message (Required)" required
                            class="contact_field no-scrollbar min-h-[140px]"></textarea>
                    </div>

                    <button type="submit"
                        class="btn-submit px-4 py-3 rounded-md bg-secondary-500 hover:bg-secondary-400 transition-all text-lg font-medium text-neutral-50 cursor-pointer min-w-[120px] mt-4">Submit</button>
                </form>
            </div>

            <div class="w-full lg:w-1/2 self-stretch bg-primary-950 text-neutral-100 px-4 py-3.5 flex flex-col gap-y-6">
                <div class="flex items-center justify-start gap-x-2.5">
                    <svg class="w-7 h-7" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.58498 6.88502C10.8168 4.65322 13.8437 3.39941 17 3.39941C20.1562 3.39941 23.1832 4.65322 25.415 6.88502C27.6468 9.11682 28.9006 12.1438 28.9006 15.3C28.9006 18.4563 27.6468 21.4832 25.415 23.715L17 32.13L8.58498 23.715C7.47983 22.61 6.60318 21.2981 6.00507 19.8542C5.40696 18.4104 5.09912 16.8629 5.09912 15.3C5.09912 13.7372 5.40696 12.1897 6.00507 10.7458C6.60318 9.30195 7.47983 7.99005 8.58498 6.88502ZM17 18.7C17.9017 18.7 18.7665 18.3418 19.4041 17.7042C20.0418 17.0666 20.4 16.2018 20.4 15.3C20.4 14.3983 20.0418 13.5335 19.4041 12.8959C18.7665 12.2582 17.9017 11.9 17 11.9C16.0982 11.9 15.2334 12.2582 14.5958 12.8959C13.9582 13.5335 13.6 14.3983 13.6 15.3C13.6 16.2018 13.9582 17.0666 14.5958 17.7042C15.2334 18.3418 16.0982 18.7 17 18.7Z"
                            class="fill-neutral-300" />
                    </svg>

                    <span class="inline-block w-6/12 business-address">
                        <?php if (get_theme_mod('dental_design_address')): ?>
                            <?php echo esc_html(get_theme_mod('dental_design_address')); ?>
                        <?php else: ?>
                            850 Madison Ave, Suite 205, New York, NY 10021
                        <?php endif; ?>
                    </span>


                </div>
                <div class="flex items-center justify-start gap-x-2.5">
                    <svg class="w-7 h-7" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.40002 5.0999C3.40002 4.64903 3.57913 4.21663 3.89794 3.89782C4.21675 3.57901 4.64916 3.3999 5.10002 3.3999H8.76012C9.16252 3.40009 9.55181 3.54301 9.85874 3.80324C10.1657 4.06348 10.3703 4.42415 10.4363 4.8211L11.6943 12.3606C11.7544 12.7197 11.6977 13.0886 11.5324 13.413C11.3672 13.7374 11.1021 14.0001 10.7763 14.1626L8.14472 15.4767C9.08841 17.8153 10.4938 19.9397 12.277 21.7229C14.0602 23.5061 16.1846 24.9115 18.5232 25.8552L19.839 23.2236C20.0014 22.8981 20.2639 22.6333 20.588 22.4681C20.912 22.3028 21.2805 22.2459 21.6393 22.3056L29.1788 23.5636C29.5758 23.6296 29.9365 23.8343 30.1967 24.1412C30.4569 24.4481 30.5998 24.8374 30.6 25.2398V28.8999C30.6 29.3508 30.4209 29.7832 30.1021 30.102C29.7833 30.4208 29.3509 30.5999 28.9 30.5999H25.5C13.294 30.5999 3.40002 20.7059 3.40002 8.4999V5.0999Z"
                            class="fill-neutral-300" />
                    </svg>


                    <span class="inline-block w-6/12">

                        <?php if (get_theme_mod('dental_design_phone_number')): ?>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('dental_design_phone_number')); ?>"
                                class="!no-underline phone-number">
                                <?php echo esc_html(get_theme_mod('dental_design_phone_number')); ?>
                            </a>

                        <?php else: ?>
                            <a href="tel:(555) 123-4567" class="!no-underline phone-number">
                                (555) 123-4567
                            </a>
                        <?php endif; ?>

                    </span>
                </div>

                <div class="flex items-start justify-start gap-x-2.5">
                    <svg class="w-7 h-7" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.08333 31.1666C6.30417 31.1666 5.63715 30.8892 5.08229 30.3343C4.52743 29.7794 4.25 29.1124 4.25 28.3333V8.49992C4.25 7.72075 4.52743 7.05374 5.08229 6.49888C5.63715 5.94402 6.30417 5.66659 7.08333 5.66659H8.5V2.83325H11.3333V5.66659H22.6667V2.83325H25.5V5.66659H26.9167C27.6958 5.66659 28.3628 5.94402 28.9177 6.49888C29.4726 7.05374 29.75 7.72075 29.75 8.49992V16.5395C29.3014 16.327 28.841 16.1499 28.3687 16.0083C27.8965 15.8666 27.4125 15.7603 26.9167 15.6895V14.1666H7.08333V28.3333H16.0083C16.1736 28.8527 16.3684 29.3485 16.5927 29.8208C16.817 30.293 17.0826 30.7416 17.3896 31.1666H7.08333ZM25.5 32.5833C23.5403 32.5833 21.8698 31.8926 20.4885 30.5114C19.1073 29.1301 18.4167 27.4596 18.4167 25.4999C18.4167 23.5402 19.1073 21.8697 20.4885 20.4885C21.8698 19.1072 23.5403 18.4166 25.5 18.4166C27.4597 18.4166 29.1302 19.1072 30.5115 20.4885C31.8927 21.8697 32.5833 23.5402 32.5833 25.4999C32.5833 27.4596 31.8927 29.1301 30.5115 30.5114C29.1302 31.8926 27.4597 32.5833 25.5 32.5833ZM27.8729 28.8645L28.8646 27.8728L26.2083 25.2166V21.2499H24.7917V25.7833L27.8729 28.8645Z"
                            class="fill-neutral-300" />
                    </svg>

                    <div class="flex flex-col gap-y-4 w-11/12 edit_business_hours">
                        <dl class="flex flex-col gap-y-2 sm:flex-row justify-between items-center w-full">
                            <dt class="w-full sm:w-auto">Monday:</dt>
                            <dd class="w-full sm:w-8/12 text-left edit_business_hours_monday">
                                <?php if (get_theme_mod('business_hours_monday')): ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_monday')); ?>
                                <?php else: ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex flex-col gap-y-2 sm:flex-row justify-between items-center w-full">                            
                            <dt class="w-full sm:w-auto">Tuesday:</dt>
                            <dd class="w-full sm:w-8/12 text-left edit_business_hours_tuesday">
                                <?php if (get_theme_mod('business_hours_tuesday')): ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_tuesday')); ?>
                                <?php else: ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex flex-col gap-y-2 sm:flex-row justify-between items-center w-full">                            
                            <dt class="w-full sm:w-auto">Wednesday:</dt>
                            <dd class="w-full sm:w-8/12 text-left edit_business_hours_wednesday">
                                <?php if (get_theme_mod('business_hours_wednesday')): ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_wednesday')); ?>
                                <?php else: ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex flex-col gap-y-2 sm:flex-row justify-between items-center w-full">                            
                            <dt class="w-full sm:w-auto">Thursday:</dt>
                            <dd class="w-full sm:w-8/12 text-left edit_business_hours_thursday">
                                <?php if (get_theme_mod('business_hours_thursday')): ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_thursday')); ?>
                                <?php else: ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>

                        </dl>
                        <dl class="flex flex-col gap-y-2 sm:flex-row justify-between items-center w-full">                            
                            <dt class="w-full sm:w-auto">Friday:</dt>
                            <dd class="w-full sm:w-8/12 text-left edit_business_hours_friday">
                                <?php if (get_theme_mod('business_hours_friday')): ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_friday')); ?>
                                <?php else: ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex flex-col gap-y-2 sm:flex-row justify-between items-center w-full">                            
                            <dt class="w-full sm:w-auto">Saturday:</dt>
                            <dd class="w-full sm:w-8/12 text-left edit_business_hours_saturday">
                                <?php if (get_theme_mod('business_hours_saturday')): ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_saturday')); ?>
                                <?php else: ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex flex-col gap-y-2 sm:flex-row justify-between items-center w-full">                            
                            <dt class="w-full sm:w-auto">Sunday:</dt>
                            <dd class="w-full sm:w-8/12 text-left edit_business_hours_sunday">
                                <?php if (get_theme_mod('business_hours_sunday')): ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_sunday')); ?>
                                <?php else: ?>
                                    Closed
                                <?php endif; ?>
                            </dd>
                        </dl>
                    </div>


                </div>

            </div>
        </div>
    </div>
</section>

<!-- location map -->
<section class="bg-neutral-50 text-neutral-900 pt-4">
    <div class="location_map_link_text py-4 pl-10 text-transparent select-none"></div>
    <div class="py-5 text-transparent" style="width: 100%; height: 400px;">
        <?php
        $custom_map_url = esc_url(get_theme_mod('dental_design_location_map_link_text'));
        $default_map_url = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d70262.93622330455!2d103.84806056939001!3d1.3296669344919727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da176f0c417b17%3A0x56790d0de871bee0!2sToa%20Payoh!5e0!3m2!1sen!2ssg!4v1750793289899!5m2!1sen!2ssg';

        $map_url = !empty($custom_map_url) ? $custom_map_url : $default_map_url;
        ?>
        <iframe
            src="<?php echo $map_url; ?>"
            class="w-full"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

