<?php
/* Template Name: About Us Page */

get_header();

get_template_part('template-parts/top-nav');
?>

<div data-page="about-page" id="page-info"></div>

<!-- top slider section -->
<section>
    <div class="">

        <?php
        $args = array(
            'post_type' => 'slider',
            'meta_key' => '_slider_type',
            'meta_value' => 'about-top',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );

        $aboutHero = new WP_Query($args);

        if ($aboutHero->have_posts()):

            ?>

            <!-- Swiper -->
            <div class="swiper swiper-home-middle bg-accent-500 !h-[492px] w-full relative">
                <div class="swiper-wrapper relative">

                    <?php

                    while ($aboutHero->have_posts()) {

                        $aboutHero->the_post();

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

                            <?php if ($heading || $subtext || $button_text): ?>
                                      
                            <div class="absolute inset-0 bg-black opacity-40 z-10"></div>

                            <?php endif; ?>


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
                    </div>

                    <div class="swiper-slide relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-middle-2.jpg" alt=""
                            srcset="">
                    </div>

                </div>

                <!-- Pagination Dots -->
                <div class="swiper-pagination absolute bottom-0 py-2 w-full"></div>
            </div>

            <?php

        endif; ?>

    </div>
</section>




<!-- intro section -->
<section class="container mx-auto px-4 py-10">

    <div class="flex items-start justify-between gap-x-6 flex-col-reverse lg:flex-row gap-y-6">
        <div class="w-full lg:w-1/2">

            <h2 class="font-primary text-3xl font-semibold leading-relaxed tracking-wide about-vid-intro-title">
                <?php if (get_theme_mod('dental_design_about_intro_title')): ?>
                    <?php echo esc_html(get_theme_mod('dental_design_about_intro_title')); ?>
                <?php else: ?>
                    New York Dental Design
                <?php endif; ?>
            </h2>

            <p class="leading-relaxed mt-4 about-vid-intro-detail">

                <?php if (get_theme_mod('dental_design_about_intro_detail')): ?>
                    <?php echo wp_kses_post(get_theme_mod('dental_design_about_intro_detail')); ?>
                <?php else: ?>
                    We are a trusted family dental practice in New York, dedicated to providing top-quality care for patients of all ages. Using state-of-the-art technology, we offer a full range of services, including routine checkups, cleanings, crowns, veneers, and more.
<br><br>
                    Our team also specializes in emergency dental care, handling everything from root canals to bonding and bridges. As a local practice, we value lasting relationships with our patients and strive to create a comfortable, stress-free experience.
<br><br>
                    Call us at (555) 123-4567 to book an appointment and see why so many families choose us for their dental care!
                <?php endif; ?>

            </p>

        </div>


        <div class="w-full lg:w-1/2 about-vid-intro-video">
            <?php

            $video_file_id = get_theme_mod('dental_design_about_intro_video_file');
            $video_url = get_theme_mod('dental_design_about_intro_video_url');

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






<?php
    get_template_part('template-parts/location-contact');
    get_template_part('template-parts/footer-section');
    
    get_footer();
?>
