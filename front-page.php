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

                            <!-- <div class="contact-info">
                                <span class="phone-number"><?php echo esc_html(get_theme_mod('dental_design_phone_number', '')); ?></span>
                                <span class="business-address"><?php echo esc_html(get_theme_mod('dental_design_address', '')); ?></span>
                            </div> -->

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

                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>




    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
        <div class="flex space-x-4 mt-3 pb-2 !font-primary main-navigation-sm" id="main-navigation">

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>

        </div>
    </div>

</nav>





<!-- top hero slider -->

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

                $subtext = get_post_meta(get_the_ID(), '_slider_subtext', true);
                $button_text = get_post_meta(get_the_ID(), '_slider_button_text', true);
                $button_link = get_post_meta(get_the_ID(), '_slider_button_link', true);
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $title = get_the_title();

                if (!$image_url) {
                    break;
                }

            ?>



                <div class="swiper-slide relative">
                    <img src="<?php echo esc_url($image_url); ?>" alt="" srcset="">
                    <?php if ($subtext): ?>
                        <div class="absolute bottom-0 right-16 min-h-36 bg-primary-100/50 py-4 px-6 pr-16 hidden lg:block">
                            <p class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900"><?php echo esc_html($subtext); ?></p>
                        </div>
                    <?php endif; ?>
                </div>


            <?php
                wp_reset_postdata();
            }


            ?>

            <div class="absolute w-full h-full z-50 top-0">
                <div class="absolute top-10 right-16 w-[380px] hidden lg:block">
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
                <div class="absolute bottom-0 right-16 min-h-36 bg-primary-100/50 py-4 px-6 pr-16 hidden lg:block">
                    <p class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900">Expert Care. Tailored Smiles.</p>
                </div>
            </div>
            <div class="swiper-slide relative">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-slider-top-2.jpg" alt="" srcset="">
                <div class="absolute bottom-0 right-16 min-h-36 bg-primary-100/50 py-4 px-6 pr-16 hidden lg:block">
                    <p class="font-primary text-4xl leading-relaxed tracking-wide font-bold text-left max-w-4xl text-neutral-900">Give you and your family <br>
                        the best personalized dental experience!</p>
                </div>
            </div>

            <div class="absolute w-full h-full z-50 top-0">
                <div class="absolute top-10 right-16 w-[380px] hidden lg:block">
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




<?php
get_footer();
?>





<!-- 
        <div class="slider-item">
            <?php if ($image_url): ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
            <?php endif; ?>

            <?php if ($title): ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

          
            <?php if ($button_text && $button_link): ?>
                <a href="<?php echo esc_url($button_link); ?>" class="slider-button">
                    <?php echo esc_html($button_text); ?>
                </a>
            <?php endif; ?>
        </div> -->