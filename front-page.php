<?php
get_header();
?>


<nav class="bg-primary-950 text-neutral-100" id="main_nav_wrapper">
    <div class="mx-auto max-w-7xl px-2 lg:px-6 xl:px-8">
        <div class="relative flex min-h-[90px] items-center justify-between">

            <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center lg:hidden">
                <button id="toggle-mobile-menu" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>

                    <svg id="menu_icon" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg id="close_icon" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- logo -->
            <div class="flex flex-1 items-center justify-center lg:items-end lg:self-end lg:pb-2 lg:justify-start">
                <div class="flex shrink-0 items-center">

                    <div class="custom-logo">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                                <img class="h-10 w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-md.png" alt="Site Logo">
                            </a>
                        <?php endif; ?>
                    </div>


                </div>
            </div>

            <!-- menu -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                <div class="hidden sm:ml-6 lg:flex lg:flex-col">

                    <!-- Action button -->
                    <div class="flex justify-end items-center gap-x-4 pt-3">
                        <div class="flex items-center gap-x-2 ">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-neutral-300" fill-rule="evenodd" clip-rule="evenodd" d="M5.05002 4.05C6.36284 2.73718 8.14341 1.99964 10 1.99964C11.8566 1.99964 13.6372 2.73718 14.95 4.05C16.2628 5.36282 17.0004 7.14339 17.0004 9C17.0004 10.8566 16.2628 12.6372 14.95 13.95L10 18.9L5.05002 13.95C4.39993 13.3 3.88425 12.5283 3.53242 11.6789C3.1806 10.8296 2.99951 9.91931 2.99951 9C2.99951 8.08069 3.1806 7.17038 3.53242 6.32105C3.88425 5.47173 4.39993 4.70002 5.05002 4.05ZM10 11C10.5304 11 11.0392 10.7893 11.4142 10.4142C11.7893 10.0391 12 9.53043 12 9C12 8.46957 11.7893 7.96086 11.4142 7.58579C11.0392 7.21071 10.5304 7 10 7C9.46958 7 8.96088 7.21071 8.5858 7.58579C8.21073 7.96086 8.00002 8.46957 8.00002 9C8.00002 9.53043 8.21073 10.0391 8.5858 10.4142C8.96088 10.7893 9.46958 11 10 11Z" />
                            </svg>

                            <p class="text-neutral-50 primary-medium">
                                <?php if (get_theme_mod('dental_design_address')) : ?>
                                    <span class="business-address"> <?php echo esc_html(get_theme_mod('dental_design_address')); ?></span>
                                <?php else : ?>
                                    <span class="business-address">850 Madison Ave, Suite 205, New York, NY 10021</span>
                                <?php endif; ?>
                            </p>


                        </div>

                        <button class="flex items-center justify-center gap-x-3 bg-accent-500 hover:bg-accent-300 px-6 py-1.5 rounded-full cursor-pointer">
                            <div>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-neutral-950" d="M2 3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H5.153C5.38971 2.00011 5.6187 2.08418 5.79924 2.23726C5.97979 2.39034 6.10018 2.6025 6.139 2.836L6.879 7.271C6.91436 7.48222 6.88097 7.69921 6.78376 7.89003C6.68655 8.08085 6.53065 8.23543 6.339 8.331L4.791 9.104C5.34611 10.4797 6.17283 11.7293 7.22178 12.7782C8.27072 13.8272 9.52035 14.6539 10.896 15.209L11.67 13.661C11.7655 13.4695 11.9199 13.3138 12.1106 13.2166C12.3012 13.1194 12.5179 13.0859 12.729 13.121L17.164 13.861C17.3975 13.8998 17.6097 14.0202 17.7627 14.2008C17.9158 14.3813 17.9999 14.6103 18 14.847V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H15C7.82 18 2 12.18 2 5V3Z" />
                                </svg>
                            </div>
                            <span class="text-neutral-950 primary-medium">

                                <?php if (get_theme_mod('dental_design_phone_number')) : ?>
                                    <a href="tel:<?php echo esc_attr(get_theme_mod('dental_design_phone_number')); ?>" class="!no-underline phone-number">
                                        <?php echo esc_html(get_theme_mod('dental_design_phone_number')); ?>
                                    </a>

                                <?php else : ?>
                                    <a href="tel:(555) 123-4567" class="!no-underline phone-number">
                                        (555) 123-4567
                                    </a>
                                <?php endif; ?>

                            </span>
                        </button>
                    </div>

                    <!-- links -->
                    <div class="flex justify-end space-x-4 mt-3 pb-2 !font-primary main-navigation-lg" id="main-navigation">

                        <?php if (has_nav_menu('menu-1')) : ?>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    'fallback_cb'    => false,
                                )
                            );
                            ?>
                        <?php else : ?>
                            <div>
                                <ul id="primary-menu" class="menu">
                                    <li><a href="#">Home</a></li>
                                </ul>
                            </div>

                        <?php endif; ?>


                    </div>
                </div>

            </div>
        </div>
    </div>




    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
        <div class="flex space-x-4 mt-3 pb-2 !font-primary main-navigation-sm" id="main-navigation">

            <?php if (has_nav_menu('menu-1')) : ?>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'fallback_cb'    => false,
                    )
                );
                ?>
            <?php else : ?>
                <div>
                    <ul id="primary-menu" class="menu">
                        <li><a href="#">Home</a></li>
                    </ul>
                </div>

            <?php endif; ?>

        </div>
    </div>

</nav>




<!-- top hero slider -->
<section>


    <div class="appointment-popup w-full h-full fixed top-0 z-10 bg-primary-950/95 opacity-0 pointer-events-none flex flex-col items-center justify-center">
        <div class="w-[95%] sm:w-[380px]" id="appointment_popup_form">
            <?php get_template_part('template-parts/appointment-form'); ?>
        </div>
    </div>


    <?php
    $args = array(
        'post_type' => 'slider',
        'meta_key' => '_slider_type',
        'meta_value' => 'home-top',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );

    $slider_query = new WP_Query($args);

    if ($slider_query->have_posts()) :

    ?>


        <!-- Swiper -->
        <div class="swiper swiper-home-top bg-accent-500 !h-[600px]">
            <div class="swiper-wrapper relative">

                <?php

                while ($slider_query->have_posts()) {

                    $slider_query->the_post();

                    $heading = get_post_meta(get_the_ID(), '_slider_heading', true);
                    $subtext = get_post_meta(get_the_ID(), '_slider_subtext', true);
                    $button_text = get_post_meta(get_the_ID(), '_slider_button_text', true);
                    $button_link = get_post_meta(get_the_ID(), '_slider_button_link', true);
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $title = get_the_title();

                    if (!$image_url) {
                        continue;
                    }

                ?>



                    <div class="swiper-slide relative">
                        <img src="<?php echo esc_url($image_url); ?>" alt="" srcset="">
                        <?php if ($heading): ?>
                            <div class="absolute left-1/2 transform -translate-x-1/2 container bottom-0 right-4 min-h-36 hidden lg:block ">
                                <div class="absolute right-4 bg-primary-100/50 py-4 px-6 pr-10 w-xl">
                                    <h3 class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900"><?php echo esc_html($heading); ?></h3>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>






                <?php
                    wp_reset_postdata();
                }


                ?>


                <div class="absolute left-1/2 transform -translate-x-1/2 container h-full z-50 top-0">
                    <div class="absolute top-10 right-4 w-[380px] hidden lg:block">
                        <?php get_template_part('template-parts/appointment-form'); ?>
                    </div>

                    <div class="absolute top-0 w-full h-full lg:hidden block">
                        <div class="w-full mb-10 flex justify-center items-center absolute bottom-0">
                            <button type="button" class="appointment-trigger-btn w-[280px] rounded-full px-4 py-3 bg-accent-500 hover:bg-accent-400 transition-all font-primary text-lg font-medium text-neutral-900 cursor-pointer mt-4">Make an Appointment</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php

    else : ?>


        <!-- Swiper -->
        <div class="swiper swiper-home-top bg-accent-500 !h-[600px]">
            <div class="swiper-wrapper relative">
                <div class="swiper-slide relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-top-1.jpeg" alt="" srcset="">
                    <div class="absolute left-1/2 transform -translate-x-1/2 container bottom-0 right-4 min-h-36 hidden lg:block ">
                        <div class="absolute right-4 bg-primary-100/50 py-4 px-6 pr-10 w-xl">
                            <h3 class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900">Expert Care. Tailored Smiles.</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-top-2.jpg" alt="" srcset="">
                    <div class="absolute left-1/2 transform -translate-x-1/2 container bottom-0 right-4 min-h-36 hidden lg:block ">
                        <div class="absolute right-4 bg-primary-100/50 py-4 px-6 pr-10 w-xl">
                            <h3 class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900">Give you and your family <br>
                                the best personalized dental experience!</h3>
                        </div>
                    </div>
                </div>

                <div class="absolute left-1/2 transform -translate-x-1/2 container h-full z-50 top-0">
                    <div class="absolute top-10 right-4 w-[380px] hidden lg:block">
                        <?php get_template_part('template-parts/appointment-form'); ?>
                    </div>

                    <div class="absolute top-0 w-full h-full lg:hidden block">
                        <div class="w-full mb-10 flex justify-center items-center absolute bottom-0">
                            <button type="button" class="appointment-trigger-btn w-[280px] rounded-full px-4 py-3 bg-accent-500 hover:bg-accent-400 transition-all font-primary text-lg font-medium text-neutral-900 cursor-pointer mt-4">Make an Appointment</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    <?php
    endif;

    ?>

</section>

<!-- intro section -->
<section class="container mx-auto px-4 py-10">

    <div class="flex items-start justify-between gap-x-6 flex-col-reverse lg:flex-row gap-y-6">
        <div class="w-full lg:w-1/2">

            <h2 class="font-primary text-3xl font-semibold leading-relaxed tracking-wide vid-intro-title">
                <?php if (get_theme_mod('dental_design_intro_title')) : ?>
                    <?php echo esc_html(get_theme_mod('dental_design_intro_title')); ?>
                <?php else : ?>
                    Welcome to Dental Design
                <?php endif; ?>
            </h2>



            <p class="leading-relaxed mt-4 vid-intro-detail">

                <?php if (get_theme_mod('dental_design_intro_detail')) : ?>
                    <?php echo wp_kses_post(get_theme_mod('dental_design_intro_detail')); ?>
                <?php else : ?>

                    At Dental Design, we’re dedicated to delivering exceptional dental care to families across the New York area, serving patients of all ages. Our comprehensive services are tailored to meet each patient's unique oral health needs. We believe in the power of listening, taking the time to understand your individual goals, concerns, and lifestyle, so we can offer personalized solutions that enhance your health and transform your smile into something radiant.
                    <br>
                    <br>
                    Located at 850 Madison Ave, Suite 205, New York, NY 10021, we’re now accepting new patients. Schedule your appointment today by calling 212-548-3261.
                <?php endif; ?>

            </p>


        </div>


        <div class="w-full lg:w-1/2 vid-intro-video">
            <?php

            $video_file_id = get_theme_mod('dental_design_intro_video_file');
            $video_url  = get_theme_mod('dental_design_intro_video_url');

            if ($video_file_id) {
                $video_src = wp_get_attachment_url($video_file_id);

                echo '<video controls class="w-full h-auto">
                <source src="' . esc_url($video_src) . '" type="video/mp4">
                Your browser does not support the video tag.
              </video>';
            } elseif ($video_url) {
                // You can embed YouTube/Vimeo or direct URL fallback here
                echo '<iframe class="w-full h-[300px] md:h-[400px] 2xl:h-[440px]"  src="' . esc_url($video_url) . '" frameborder="0" allowfullscreen></iframe>';
            } else {
                echo '<video controls class="w-full h-auto">
                <source src="' . esc_url(get_template_directory_uri() . '/assets/videos/intro_video.mp4') . '" type="video/mp4">
                Your browser does not support the video tag.
              </video>';
            }

            ?>


        </div>

    </div>

</section>


<!-- offer section -->

<section>
    <div class="pt-6">






        <?php
        $args = array(
            'post_type' => 'slider',
            'meta_key' => '_slider_type',
            'meta_value' => 'home-middle',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );

        $offers = new WP_Query($args);

        if ($offers->have_posts()) :

        ?>


            <!-- Swiper -->
            <div class="swiper swiper-home-middle bg-accent-500 !h-[492px] w-full relative">
                <div class="swiper-wrapper relative">

                    <?php

                    while ($offers->have_posts()) {

                        $offers->the_post();

                        $heading = get_post_meta(get_the_ID(), '_slider_heading', true);
                        $subtext = get_post_meta(get_the_ID(), '_slider_subtext', true);
                        $button_text = get_post_meta(get_the_ID(), '_slider_button_text', true);
                        $button_link = get_post_meta(get_the_ID(), '_slider_button_link', true);
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $title = get_the_title();

                        if (!$image_url) {
                            continue;
                        }

                    ?>






                        <div class="swiper-slide relative">
                            <img src="<?php echo esc_url($image_url); ?>" alt="" srcset="">

                            <div class="absolute inset-0 bg-black opacity-40 z-10"></div>

                            <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 container min-h-36 z-50">
                                <div class="flex items-center justify-center flex-col h-full px-4">

                                    <?php if ($heading): ?>
                                        <h3 class="text-4xl font-primary font-bold text-neutral-50 tracking-wide leading-relaxed"><?php echo esc_html($heading); ?></h3>
                                    <?php endif; ?>

                                    <?php if ($subtext): ?>
                                        <p class="text-neutral-50 font-semibold mt-2.5"><?php echo esc_html($subtext); ?></p>
                                    <?php endif; ?>

                                    <?php if ($button_text): ?>
                                        <a href="<?php echo $button_link ? esc_url($button_link) : '#'; ?>" class="!no-underline bg-secondary-500 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-secondary-600 transition-all min-w-36 block"><?php echo esc_html($button_text); ?></a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>



                    <?php
                        wp_reset_postdata();
                    }


                    ?>




                </div>


                <!-- Pagination Dots -->
                <div class="swiper-pagination absolute bottom-0 py-2 w-full"></div>
            </div>
        <?php

        else : ?>



            <!-- Swiper -->
            <div class="swiper swiper-home-middle bg-accent-500 !h-[492px] w-full relative">
                <div class="swiper-wrapper relative">


                    <div class="swiper-slide relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-middle-1.jpg" alt="" srcset="">
                        <div class="absolute inset-0 bg-black opacity-40 z-10"></div>

                        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 container min-h-36 z-50">
                            <div class="flex items-center justify-center flex-col h-full px-4">
                                <h3 class="text-4xl font-primary font-bold text-neutral-50 tracking-wide leading-relaxed">Your Smile, Reimagined.</h3>
                                <p class="text-neutral-50 font-semibold mt-2.5">Explore cutting-edge cosmetic treatments that bring out the best in your smile.</p>
                                <a href="#" class="!no-underline bg-secondary-500 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-secondary-600 transition-all min-w-36 block">Discover Cosmetic Solutions</a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-middle-2.jpg" alt="" srcset="">
                        <div class="absolute inset-0 bg-black opacity-40 z-10"></div>

                        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 container min-h-36 z-50">
                            <div class="flex items-center justify-center flex-col h-full px-4">
                                <h3 class="text-4xl font-primary font-bold text-neutral-50 tracking-wide leading-relaxed">Gentle Dentistry & Personalized Care.</h3>
                                <p class="text-neutral-50 font-semibold mt-2.5">We use state-of-the-art technology for faster, safer, and more precise care.</p>
                                <a href="#" class="!no-underline bg-secondary-500 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-secondary-600 transition-all min-w-36 block">Learn About Our Technology</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination Dots -->
                <div class="swiper-pagination absolute bottom-0 py-2 w-full"></div>
            </div>


        <?php

        endif; ?>

    </div>
</section>

<!-- our team section -->
<section class="container mx-auto px-4 py-10">
    <div class="flex items-start justify-between gap-x-6 flex-col lg:flex-row gap-y-6">
        <div class="w-full lg:w-1/2">
            <h3 class="font-primary text-3xl font-semibold our-team-title">

                <?php if (get_theme_mod('dental_design_our_team_title')) : ?>
                    <?php echo esc_html(get_theme_mod('dental_design_our_team_title')); ?>
                <?php else : ?>
                    Our Team
                <?php endif; ?>

            </h3>

            <p class="mt-6 our-team-text">


                <?php if (get_theme_mod('dental_design_our_team_text')) : ?>
                    <?php echo esc_html(get_theme_mod('dental_design_our_team_text')); ?>
                <?php else : ?>

                    <b>
                        Dr. Chase Hughes, DDS, and the team at Dental Design are committed to providing top-quality dental care in New York. We take a comprehensive approach to oral health, combining expert treatment with patient education to promote lasting wellness.
                    </b>
                    <br>
                    <br>
                    From the moment you walk through our doors, our friendly and attentive staff ensure a comfortable, stress-free experience. We believe in building genuine relationships with our patients, listening to their concerns, and delivering personalized care at every step—whether scheduling an appointment, completing paperwork, undergoing an exam, or receiving treatment.
                    <br>
                    <br>
                    Our team stays at the forefront of advanced dental techniques, allowing us to offer the latest innovations in dentistry. At Dental Design, your health, comfort, and confidence in your smile are our top priorities.

                <?php endif; ?>


            </p>

            <?php
            $about_url = get_theme_mod('dental_design_our_team_about_url');
            $about_button_text = get_theme_mod('dental_design_our_team_about_button_text');
            ?>

            <div>
                <a href="<?php echo $about_url ? esc_url($about_url) : '#'; ?>" class="!no-underline bg-primary-800 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-primary-900 transition-all min-w-36 inline-block text-center our-team-about-button-text">
                    <?php echo $about_button_text ? esc_html($about_button_text) : 'Read More About Us'; ?>
                </a>
            </div>
        </div>
        <div class="w-full lg:w-1/2 self-center our-team-photo">
            <?php
            $team_photo_id = get_theme_mod('dental_design_our_team_photo');
            $team_photo = wp_get_attachment_url($team_photo_id);
            $final_image = $team_photo ? $team_photo : get_template_directory_uri() . '/assets/images/our-team.jpg';
            ?>
            <img src="<?php echo esc_url($final_image); ?>" alt="Team Image" />

        </div>
    </div>

</section>

<!-- our reviews -->
<section class="py-10">
    <h3 class="font-primary text-3xl font-semibold tracking-wide leading-relaxed text-center">Some of our Reviews</h3>

    <div class="mt-12 container mx-auto px-4">





        <?php
        $args = array(
            'post_type' => 'review',
            'posts_per_page' => -1,
        );

        $reviews = new WP_Query($args);

        if ($reviews->have_posts()) :

        ?>


            <!-- Swiper -->
            <div class="swiper swiper-home-reviews bg-white min-h-[220px] w-full relative">
                <div class="swiper-wrapper">


                    <?php

                    while ($reviews->have_posts()) {

                        $reviews->the_post();

                        $reviewer_name = get_post_meta(get_the_ID(), '_reviewer_name', true);
                        $review_stars = get_post_meta(get_the_ID(), '_review_stars', true);
                        $review_text = get_post_meta(get_the_ID(), '_review_text', true);
                        $reviewer_photo = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $title = get_the_title();



                        if (!$reviewer_name || !$review_stars || !$review_text) {
                            continue;
                        }

                    ?>


                        <div class="swiper-slide px-4">

                            <div class="flex bg-neutral-50 h-[180px] rounded-2xl">
                                <div class="w-3/12 h-full overflow-hidden rounded-l-2xl">
                                    <img class="w-full h-full object-contain object-top" src="<?php echo esc_url($reviewer_photo); ?>" alt="" srcset="">
                                </div>
                                <div class="w-9/12 py-4 overflow-y-auto no-scrollbar">
                                    <p class="px-2 pr-4 text-left"><?php echo esc_html($review_text); ?></p>
                                    <h5 class="text-left font-medium mt-2.5 px-2"><?php echo esc_html($reviewer_name); ?></h5>

                                    <div class="text-left px-1 mt-2">
                                        <?php
                                        $stars = intval($review_stars);
                                        for ($i = 0; $i < 5; $i++) {
                                            echo $i < $stars ? '⭐' : '☆';
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- 
                        <div class="swiper-slide relative">
                            <img src="<?php echo esc_url($image_url); ?>" alt="" srcset="">

                            <div class="absolute inset-0 bg-black opacity-40 z-10"></div>

                            <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 container min-h-36 z-50">
                                <div class="flex items-center justify-center flex-col h-full px-4">

                                    <?php if ($heading): ?>
                                        <h3 class="text-4xl font-primary font-bold text-neutral-50 tracking-wide leading-relaxed"><?php echo esc_html($heading); ?></h3>
                                    <?php endif; ?>

                                    <?php if ($subtext): ?>
                                        <p class="text-neutral-50 font-semibold mt-2.5"><?php echo esc_html($subtext); ?></p>
                                    <?php endif; ?>

                                    <?php if ($button_text): ?>
                                        <a href="<?php echo $button_link ? esc_url($button_link) : '#'; ?>" class="!no-underline bg-secondary-500 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-secondary-600 transition-all min-w-36 block"><?php echo esc_html($button_text); ?></a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div> -->



                    <?php
                        wp_reset_postdata();
                    }


                    ?>




                </div>


                <!-- Pagination Dots -->
                <div class="swiper-pagination absolute bottom-0 py-2 w-full"></div>
            </div>
        <?php

        else : ?>

            <!-- Swiper -->
            <div class="swiper swiper-home-reviews bg-white min-h-[220px] w-full relative">
                <div class="swiper-wrapper">

                    <div class="swiper-slide px-4">

                        <div class="flex bg-neutral-50 h-[180px] rounded-2xl">
                            <div class="w-3/12 h-full overflow-hidden rounded-l-2xl">
                                <img class="w-full h-full object-contain object-top" src="<?php echo get_template_directory_uri(); ?>/assets/images/review-3.jpg" alt="" srcset="">
                            </div>
                            <div class="w-9/12 py-4 overflow-y-auto no-scrollbar">
                                <p class="px-2 pr-4 text-left">"Such a great experience at Dental Design! The staff was super friendly, and the whole visit was quick and painless. So glad I found this place!"</p>
                                <h5 class="text-left font-medium mt-2.5 px-2">Sarah Hughes</h5>
                                <div class="text-left px-1 mt-2">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-slide px-4">

                        <div class="flex bg-neutral-50 h-[180px] rounded-2xl">
                            <div class="w-3/12 h-full overflow-hidden rounded-l-2xl">
                                <img class="w-full h-full object-contain object-top" src="<?php echo get_template_directory_uri(); ?>/assets/images/review-4.jpg" alt="" srcset="">
                            </div>
                            <div class="w-9/12 py-4 overflow-y-auto no-scrollbar">
                                <p class="px-2 pr-4 text-left">"Such a great experience at Dental Design! The staff was super friendly, and the whole visit was quick and painless. So glad I found this place!"</p>
                                <h5 class="text-left font-medium mt-2.5 px-2">Tina Robert</h5>
                                <div class="text-left px-1 mt-2">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-slide px-4">

                        <div class="flex bg-neutral-50 h-[180px] rounded-2xl">
                            <div class="w-3/12 h-full overflow-hidden rounded-l-2xl">
                                <img class="w-full h-full object-contain object-top" src="<?php echo get_template_directory_uri(); ?>/assets/images/review-1.jpg" alt="" srcset="">
                            </div>
                            <div class="w-9/12 py-4 overflow-y-auto no-scrollbar">
                                <p class="px-2 pr-4 text-left">"Such a great experience at Dental Design! The staff was super friendly, and the whole visit was quick and painless. So glad I found this place!"</p>
                                <h5 class="text-left font-medium mt-2.5 px-2">Mark River</h5>
                                <div class="text-left px-1 mt-2">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>

                    </div>



                </div>

                <!-- Pagination Dots -->
                <div class="swiper-pagination absolute bottom-0 py-2 w-full"></div>
            </div>


        <?php endif; ?>



    </div>
</section>



<!-- Location & Contact Information section -->
<section class="bg-neutral-50 text-neutral-900 mt-4">
    <div class="container mx-auto px-4 py-10">
        <h3 class="text-3xl font-primary tracking-wide leading-relaxed font-semibold contact-title">
            <?php if (get_theme_mod('dental_design_contact_2_title')) : ?>
                <?php echo esc_html(get_theme_mod('dental_design_contact_2_title')); ?>
            <?php else : ?>
                Location & Contact Information
            <?php endif; ?>
        </h3>

        <p class="mt-4 contact-subtext">
            <?php if (get_theme_mod('dental_design_contact_2_subtext')) : ?>
                <?php echo esc_html(get_theme_mod('dental_design_contact_2_subtext')); ?>
            <?php else : ?>
                At Dental Design, we’re here to take care of all your dental needs. <br>
                Need to schedule an appointment or have questions about billing? Call us at (555) 123-4567. <br> <br>

                Prefer us to reach out? Just provide your details, and we’ll be in touch soon to confirm your visit. See you soon!
            <?php endif; ?>
        </p>

        <div class="flex items-start justify-between gap-x-10 flex-col lg:flex-row gap-y-6 mt-12">
            <div class="w-full lg:w-1/2">
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="bg-neutral-200 w-full p-4">
                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                    <input type="hidden" name="action" value="submit_contact_form">

                    <div class="flex flex-col gap-y-4">
                        <input type="text" name="full_name" placeholder="Full Name (Required)" required class="contact_field">

                        <input type="email" name="email" placeholder="Email (Required)" required class="contact_field">

                        <input type="tel" name="phone" placeholder="Phone Number (Required)" required class="contact_field">

                        <textarea name="message" placeholder="Message (Required)" required class="contact_field no-scrollbar min-h-[140px]"></textarea>
                    </div>

                    <button type="submit" class="btn-submit px-4 py-3 rounded-md bg-secondary-500 hover:bg-secondary-400 transition-all text-lg font-medium text-neutral-50 cursor-pointer min-w-[120px] mt-4">Submit</button>
                </form>
            </div>

            <div class="w-full lg:w-1/2 self-stretch bg-primary-950 text-neutral-100 px-4 py-3.5 flex flex-col gap-y-6">
                <div class="flex items-center justify-start gap-x-2.5">
                    <svg class="w-7 h-7" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.58498 6.88502C10.8168 4.65322 13.8437 3.39941 17 3.39941C20.1562 3.39941 23.1832 4.65322 25.415 6.88502C27.6468 9.11682 28.9006 12.1438 28.9006 15.3C28.9006 18.4563 27.6468 21.4832 25.415 23.715L17 32.13L8.58498 23.715C7.47983 22.61 6.60318 21.2981 6.00507 19.8542C5.40696 18.4104 5.09912 16.8629 5.09912 15.3C5.09912 13.7372 5.40696 12.1897 6.00507 10.7458C6.60318 9.30195 7.47983 7.99005 8.58498 6.88502ZM17 18.7C17.9017 18.7 18.7665 18.3418 19.4041 17.7042C20.0418 17.0666 20.4 16.2018 20.4 15.3C20.4 14.3983 20.0418 13.5335 19.4041 12.8959C18.7665 12.2582 17.9017 11.9 17 11.9C16.0982 11.9 15.2334 12.2582 14.5958 12.8959C13.9582 13.5335 13.6 14.3983 13.6 15.3C13.6 16.2018 13.9582 17.0666 14.5958 17.7042C15.2334 18.3418 16.0982 18.7 17 18.7Z" class="fill-neutral-300" />
                    </svg>

                    <span class="inline-block w-6/12 business-address">
                        <?php if (get_theme_mod('dental_design_address')) : ?>
                            <?php echo esc_html(get_theme_mod('dental_design_address')); ?>
                        <?php else : ?>
                            850 Madison Ave, Suite 205, New York, NY 10021
                        <?php endif; ?>
                    </span>


                </div>
                <div class="flex items-center justify-start gap-x-2.5">
                    <svg class="w-7 h-7" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.40002 5.0999C3.40002 4.64903 3.57913 4.21663 3.89794 3.89782C4.21675 3.57901 4.64916 3.3999 5.10002 3.3999H8.76012C9.16252 3.40009 9.55181 3.54301 9.85874 3.80324C10.1657 4.06348 10.3703 4.42415 10.4363 4.8211L11.6943 12.3606C11.7544 12.7197 11.6977 13.0886 11.5324 13.413C11.3672 13.7374 11.1021 14.0001 10.7763 14.1626L8.14472 15.4767C9.08841 17.8153 10.4938 19.9397 12.277 21.7229C14.0602 23.5061 16.1846 24.9115 18.5232 25.8552L19.839 23.2236C20.0014 22.8981 20.2639 22.6333 20.588 22.4681C20.912 22.3028 21.2805 22.2459 21.6393 22.3056L29.1788 23.5636C29.5758 23.6296 29.9365 23.8343 30.1967 24.1412C30.4569 24.4481 30.5998 24.8374 30.6 25.2398V28.8999C30.6 29.3508 30.4209 29.7832 30.1021 30.102C29.7833 30.4208 29.3509 30.5999 28.9 30.5999H25.5C13.294 30.5999 3.40002 20.7059 3.40002 8.4999V5.0999Z" class="fill-neutral-300" />
                    </svg>


                    <span class="inline-block w-6/12">

                        <?php if (get_theme_mod('dental_design_phone_number')) : ?>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('dental_design_phone_number')); ?>" class="!no-underline phone-number">
                                <?php echo esc_html(get_theme_mod('dental_design_phone_number')); ?>
                            </a>

                        <?php else : ?>
                            <a href="tel:(555) 123-4567" class="!no-underline phone-number">
                                (555) 123-4567
                            </a>
                        <?php endif; ?>

                    </span>
                </div>

                <div class="flex items-start justify-start gap-x-2.5">
                    <svg class="w-7 h-7" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.08333 31.1666C6.30417 31.1666 5.63715 30.8892 5.08229 30.3343C4.52743 29.7794 4.25 29.1124 4.25 28.3333V8.49992C4.25 7.72075 4.52743 7.05374 5.08229 6.49888C5.63715 5.94402 6.30417 5.66659 7.08333 5.66659H8.5V2.83325H11.3333V5.66659H22.6667V2.83325H25.5V5.66659H26.9167C27.6958 5.66659 28.3628 5.94402 28.9177 6.49888C29.4726 7.05374 29.75 7.72075 29.75 8.49992V16.5395C29.3014 16.327 28.841 16.1499 28.3687 16.0083C27.8965 15.8666 27.4125 15.7603 26.9167 15.6895V14.1666H7.08333V28.3333H16.0083C16.1736 28.8527 16.3684 29.3485 16.5927 29.8208C16.817 30.293 17.0826 30.7416 17.3896 31.1666H7.08333ZM25.5 32.5833C23.5403 32.5833 21.8698 31.8926 20.4885 30.5114C19.1073 29.1301 18.4167 27.4596 18.4167 25.4999C18.4167 23.5402 19.1073 21.8697 20.4885 20.4885C21.8698 19.1072 23.5403 18.4166 25.5 18.4166C27.4597 18.4166 29.1302 19.1072 30.5115 20.4885C31.8927 21.8697 32.5833 23.5402 32.5833 25.4999C32.5833 27.4596 31.8927 29.1301 30.5115 30.5114C29.1302 31.8926 27.4597 32.5833 25.5 32.5833ZM27.8729 28.8645L28.8646 27.8728L26.2083 25.2166V21.2499H24.7917V25.7833L27.8729 28.8645Z" class="fill-neutral-300" />
                    </svg>

                    <div class="flex flex-col gap-y-4 w-11/12 edit_business_hours">
                        <dl class="flex justify-between items-center w-full">
                            <dt>Monday:</dt>
                            <dd class="w-8/12 text-left edit_business_hours_monday">
                                <?php if (get_theme_mod('business_hours_monday')) : ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_monday')); ?>
                                <?php else : ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex justify-between items-center w-full">
                            <dt>Tuesday:</dt>
                            <dd class="w-8/12 text-left edit_business_hours_tuesday">
                                <?php if (get_theme_mod('business_hours_tuesday')) : ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_tuesday')); ?>
                                <?php else : ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex justify-between items-center w-full">
                            <dt>Wednesday:</dt>
                            <dd class="w-8/12 text-left edit_business_hours_wednesday">
                                <?php if (get_theme_mod('business_hours_wednesday')) : ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_wednesday')); ?>
                                <?php else : ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex justify-between items-center w-full">
                            <dt>Thursday:</dt>
                            <dd class="w-8/12 text-left edit_business_hours_thursday">
                                <?php if (get_theme_mod('business_hours_thursday')) : ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_thursday')); ?>
                                <?php else : ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>

                        </dl>
                        <dl class="flex justify-between items-center w-full">
                            <dt>Friday:</dt>
                            <dd class="w-8/12 text-left edit_business_hours_friday">
                                <?php if (get_theme_mod('business_hours_friday')) : ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_friday')); ?>
                                <?php else : ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex justify-between items-center w-full">
                            <dt>Saturday:</dt>
                            <dd class="w-8/12 text-left edit_business_hours_saturday">
                                <?php if (get_theme_mod('business_hours_saturday')) : ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_saturday')); ?>
                                <?php else : ?>
                                    8:30AM to 5:00PM
                                <?php endif; ?>
                            </dd>
                        </dl>
                        <dl class="flex justify-between items-center w-full">
                            <dt>Sunday:</dt>
                            <dd class="w-8/12 text-left edit_business_hours_sunday">
                                <?php if (get_theme_mod('business_hours_sunday')) : ?>
                                    <?php echo esc_html(get_theme_mod('business_hours_sunday')); ?>
                                <?php else : ?>
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

<?php
get_footer();
?>