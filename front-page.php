<?php
get_header();

get_template_part('template-parts/top-nav');
?>


<!-- top hero slider -->
<section>
    <div
        class="appointment-popup w-full h-full fixed top-0 z-10 bg-primary-950/95 opacity-0 pointer-events-none flex flex-col items-center justify-center">
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

    if ($slider_query->have_posts()):

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
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 container bottom-0 right-4 min-h-36 hidden lg:block ">
                                <div class="absolute right-4 bg-primary-100/50 py-4 px-6 pr-10 w-xl">
                                    <h3
                                        class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900">
                                        <?php echo esc_html($heading); ?>
                                    </h3>
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
                            <button type="button"
                                class="appointment-trigger-btn w-[280px] rounded-full px-4 py-3 bg-accent-500 hover:bg-accent-400 transition-all font-primary text-lg font-medium text-neutral-900 cursor-pointer mt-4">Make
                                an Appointment</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php

    else: ?>


        <!-- Swiper -->
        <div class="swiper swiper-home-top bg-accent-500 !h-[600px]">
            <div class="swiper-wrapper relative">
                <div class="swiper-slide relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-top-1.jpeg" alt=""
                        srcset="">
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 container bottom-0 right-4 min-h-36 hidden lg:block ">
                        <div class="absolute right-4 bg-primary-100/50 py-4 px-6 pr-10 w-xl">
                            <h3
                                class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900">
                                Expert Care. Tailored Smiles.</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-top-2.jpg" alt=""
                        srcset="">
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 container bottom-0 right-4 min-h-36 hidden lg:block ">
                        <div class="absolute right-4 bg-primary-100/50 py-4 px-6 pr-10 w-xl">
                            <h3
                                class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900">
                                Give you and your family <br>
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
                            <button type="button"
                                class="appointment-trigger-btn w-[280px] rounded-full px-4 py-3 bg-accent-500 hover:bg-accent-400 transition-all font-primary text-lg font-medium text-neutral-900 cursor-pointer mt-4">Make
                                an Appointment</button>
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
                <?php if (get_theme_mod('dental_design_intro_title')): ?>
                    <?php echo esc_html(get_theme_mod('dental_design_intro_title')); ?>
                <?php else: ?>
                    Welcome to Dental Design
                <?php endif; ?>
            </h2>



            <p class="leading-relaxed mt-4 vid-intro-detail">

                <?php if (get_theme_mod('dental_design_intro_detail')): ?>
                    <?php echo wp_kses_post(get_theme_mod('dental_design_intro_detail')); ?>
                <?php else: ?>

                    At Dental Design, we’re dedicated to delivering exceptional dental care to families across the New York
                    area, serving patients of all ages. Our comprehensive services are tailored to meet each patient's
                    unique oral health needs. We believe in the power of listening, taking the time to understand your
                    individual goals, concerns, and lifestyle, so we can offer personalized solutions that enhance your
                    health and transform your smile into something radiant.
                    <br>
                    <br>
                    Located at 850 Madison Ave, Suite 205, New York, NY 10021, we’re now accepting new patients. Schedule
                    your appointment today by calling 212-548-3261.
                <?php endif; ?>

            </p>


        </div>


        <div class="w-full lg:w-1/2 vid-intro-video">
            <?php

            $video_file_id = get_theme_mod('dental_design_intro_video_file');
            $video_url = get_theme_mod('dental_design_intro_video_url');

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

        if ($offers->have_posts()):

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

                            <div
                                class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 container min-h-36 z-50">
                                <div class="flex items-center justify-center flex-col h-full px-4">

                                    <?php if ($heading): ?>
                                        <h3 class="text-4xl font-primary font-bold text-neutral-50 tracking-wide leading-relaxed">
                                            <?php echo esc_html($heading); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if ($subtext): ?>
                                        <p class="text-neutral-50 font-semibold mt-2.5"><?php echo esc_html($subtext); ?></p>
                                    <?php endif; ?>

                                    <?php if ($button_text): ?>
                                        <a href="<?php echo $button_link ? esc_url($button_link) : '#'; ?>"
                                            class="!no-underline bg-secondary-500 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-secondary-600 transition-all min-w-36 block"><?php echo esc_html($button_text); ?></a>
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

        else: ?>



            <!-- Swiper -->
            <div class="swiper swiper-home-middle bg-accent-500 !h-[492px] w-full relative">
                <div class="swiper-wrapper relative">


                    <div class="swiper-slide relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-middle-1.jpg" alt=""
                            srcset="">
                        <div class="absolute inset-0 bg-black opacity-40 z-10"></div>

                        <div
                            class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 container min-h-36 z-50">
                            <div class="flex items-center justify-center flex-col h-full px-4">
                                <h3 class="text-4xl font-primary font-bold text-neutral-50 tracking-wide leading-relaxed">
                                    Your Smile, Reimagined.</h3>
                                <p class="text-neutral-50 font-semibold mt-2.5">Explore cutting-edge cosmetic treatments
                                    that bring out the best in your smile.</p>
                                <a href="#"
                                    class="!no-underline bg-secondary-500 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-secondary-600 transition-all min-w-36 block">Discover
                                    Cosmetic Solutions</a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-middle-2.jpg" alt=""
                            srcset="">
                        <div class="absolute inset-0 bg-black opacity-40 z-10"></div>

                        <div
                            class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 container min-h-36 z-50">
                            <div class="flex items-center justify-center flex-col h-full px-4">
                                <h3 class="text-4xl font-primary font-bold text-neutral-50 tracking-wide leading-relaxed">
                                    Gentle Dentistry & Personalized Care.</h3>
                                <p class="text-neutral-50 font-semibold mt-2.5">We use state-of-the-art technology for
                                    faster, safer, and more precise care.</p>
                                <a href="#"
                                    class="!no-underline bg-secondary-500 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-secondary-600 transition-all min-w-36 block">Learn
                                    About Our Technology</a>
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

                <?php if (get_theme_mod('dental_design_our_team_title')): ?>
                    <?php echo esc_html(get_theme_mod('dental_design_our_team_title')); ?>
                <?php else: ?>
                    Our Team
                <?php endif; ?>

            </h3>

            <p class="mt-6 our-team-text">


                <?php if (get_theme_mod('dental_design_our_team_text')): ?>
                    <?php echo esc_html(get_theme_mod('dental_design_our_team_text')); ?>
                <?php else: ?>

                    <b>
                        Dr. Chase Hughes, DDS, and the team at Dental Design are committed to providing top-quality dental
                        care in New York. We take a comprehensive approach to oral health, combining expert treatment with
                        patient education to promote lasting wellness.
                    </b>
                    <br>
                    <br>
                    From the moment you walk through our doors, our friendly and attentive staff ensure a comfortable,
                    stress-free experience. We believe in building genuine relationships with our patients, listening to
                    their concerns, and delivering personalized care at every step—whether scheduling an appointment,
                    completing paperwork, undergoing an exam, or receiving treatment.
                    <br>
                    <br>
                    Our team stays at the forefront of advanced dental techniques, allowing us to offer the latest
                    innovations in dentistry. At Dental Design, your health, comfort, and confidence in your smile are our
                    top priorities.

                <?php endif; ?>


            </p>

            <?php
            $about_url = get_theme_mod('dental_design_our_team_about_url');
            $about_button_text = get_theme_mod('dental_design_our_team_about_button_text');
            ?>

            <div>
                <a href="<?php echo $about_url ? esc_url($about_url) : '#'; ?>"
                    class="!no-underline bg-primary-800 px-6 py-2 rounded-full text-neutral-50 mt-5 text-lg font-medium hover:bg-primary-900 transition-all min-w-36 inline-block text-center our-team-about-button-text">
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

        if ($reviews->have_posts()):

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
                                    <img class="w-full h-full object-contain object-top"
                                        src="<?php echo esc_url($reviewer_photo); ?>" alt="" srcset="">
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

        else: ?>

            <!-- Swiper -->
            <div class="swiper swiper-home-reviews bg-white min-h-[220px] w-full relative">
                <div class="swiper-wrapper">

                    <div class="swiper-slide px-4">

                        <div class="flex bg-neutral-50 h-[180px] rounded-2xl">
                            <div class="w-3/12 h-full overflow-hidden rounded-l-2xl">
                                <img class="w-full h-full object-contain object-top"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/review-3.jpg" alt=""
                                    srcset="">
                            </div>
                            <div class="w-9/12 py-4 overflow-y-auto no-scrollbar">
                                <p class="px-2 pr-4 text-left">"Such a great experience at Dental Design! The staff was
                                    super friendly, and the whole visit was quick and painless. So glad I found this place!"
                                </p>
                                <h5 class="text-left font-medium mt-2.5 px-2">Sarah Hughes</h5>
                                <div class="text-left px-1 mt-2">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-slide px-4">

                        <div class="flex bg-neutral-50 h-[180px] rounded-2xl">
                            <div class="w-3/12 h-full overflow-hidden rounded-l-2xl">
                                <img class="w-full h-full object-contain object-top"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/review-4.jpg" alt=""
                                    srcset="">
                            </div>
                            <div class="w-9/12 py-4 overflow-y-auto no-scrollbar">
                                <p class="px-2 pr-4 text-left">"Such a great experience at Dental Design! The staff was
                                    super friendly, and the whole visit was quick and painless. So glad I found this place!"
                                </p>
                                <h5 class="text-left font-medium mt-2.5 px-2">Tina Robert</h5>
                                <div class="text-left px-1 mt-2">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-slide px-4">

                        <div class="flex bg-neutral-50 h-[180px] rounded-2xl">
                            <div class="w-3/12 h-full overflow-hidden rounded-l-2xl">
                                <img class="w-full h-full object-contain object-top"
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/review-1.jpg" alt=""
                                    srcset="">
                            </div>
                            <div class="w-9/12 py-4 overflow-y-auto no-scrollbar">
                                <p class="px-2 pr-4 text-left">"Such a great experience at Dental Design! The staff was
                                    super friendly, and the whole visit was quick and painless. So glad I found this place!"
                                </p>
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


<?php
    get_template_part('template-parts/location-contact');
    get_template_part('template-parts/footer-section');
    
    get_footer();
?>