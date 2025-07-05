<?php
/* Template Name: Services Page */

get_header();

get_template_part('template-parts/top-nav');
?>

<div data-page="services-page" id="page-info"></div>

<!-- top slider section -->
<section>
    <div class="">

        <?php
        $args = array(
            'post_type' => 'slider',
            'meta_key' => '_slider_type',
            'meta_value' => 'services-top',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );

        $servicesHero = new WP_Query($args);

        if ($servicesHero->have_posts()):

            ?>

            <!-- Swiper -->
            <div class="swiper swiper-services-top bg-accent-500 !h-[492px] w-full relative">
                <div class="swiper-wrapper relative">

                    <?php

                    while ($servicesHero->have_posts()) {

                        $servicesHero->the_post();

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
            <div class="swiper swiper-services-top bg-accent-500 !h-[492px] w-full relative">
                <div class="swiper-wrapper relative">


                    <div class="swiper-slide relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-top-1.jpg" alt=""
                            srcset="">
                    </div>

                    <div class="swiper-slide relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-top-2.jpeg" alt=""
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




<!-- services section -->
<section class="container mx-auto px-4 py-10">



<?php

$uncat = get_category_by_slug('uncategorized');
$uncat_id = $uncat ? $uncat->term_id : 1;

// Get 7 categories (exclude empty ones)
$categories = get_categories([
    'number'     => 7,
    // 'hide_empty' => true,
    'exclude'    => [$uncat_id],
]);

if ($categories) :
    echo '<div class="category-cards" style="display:flex; flex-wrap:wrap; gap:20px;">';

    foreach ($categories as $category) :
        echo '<div class="category-card" style="border:1px solid #ddd; padding:20px; width:30%; box-shadow:0 2px 4px rgba(0,0,0,0.1);">';
        
        // Category title
        echo '<h3>' . esc_html($category->name) . '</h3>';

        // Get 5 latest posts in this category
        $posts = get_posts([
            'numberposts' => 5,
            'category'    => $category->term_id,
        ]);

        if ($posts) :
            echo '<ul>';
            foreach ($posts as $post) :
                setup_postdata($post);
                echo '<li><a href="' . get_permalink($post) . '">' . esc_html(get_the_title($post)) . '</a></li>';
            endforeach;
            echo '</ul>';
            wp_reset_postdata();
        else :
            echo '<p>No posts found.</p>';
        endif;

        echo '</div>'; // .category-card
    endforeach;

    echo '</div>'; // .category-cards
else :
    echo '<p>No categories found.</p>';
endif;
?>



</section>





<?php
    get_template_part('template-parts/location-contact');
    get_template_part('template-parts/footer-section');
    
    get_footer();
?>
