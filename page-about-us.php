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



<!-- doctors -->
<section class="py-10 doctor-section">




<?php

$args = array(
	'post_type'      => 'doctor',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
);

$doctors = new WP_Query($args);

if ($doctors->have_posts()) : ?>
	<div class="doctors-wrapper">
		<?php while ($doctors->have_posts()) : $doctors->the_post(); ?>
			<div class="doctor">
				<?php if (has_post_thumbnail()) : ?>
					<div class="doctor-image">
						<?php the_post_thumbnail('medium'); ?>
					</div>
				<?php endif; ?>

				<h3 class="doctor-name"><?php the_title(); ?></h3>

				<div class="doctor-details">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<?php wp_reset_postdata(); ?>
<?php else : ?>

    <div class="bg-primary-900 card">

        <div class="container mx-auto px-4 py-10 flex items-center lg:items-start justify-between gap-8 flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 flex items-center justify-center lg:justify-start">
                <img class="w-full max-w-[280px] lg:max-w-full h-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor-1.png" alt="" />
            </div>
           
            <div class="text-neutral-50 w-full lg:w-3/4">
                <h3 class="font-primary text-2xl font-semibold">Dr. Nathan Caldwell, DMD</h3>
                <p class="mt-4">
                    Dr. Nathan Caldwell is a dedicated and meticulous dental professional with a deep passion for helping patients achieve healthy, confident smiles. With a reputation for his gentle approach and precise craftsmanship, Dr. Caldwell is especially known for his ability to calm even the most anxious patients, ensuring they feel comfortable every step of the way. His warm demeanor, paired with his keen attention to detail, makes him a trusted choice for individuals seeking expert dental care.
                    <br> <br>
                    A graduate of the University of Pennsylvania School of Dental Medicine, Dr. Caldwell pursued advanced training at the Boston VA Healthcare System, where he gained extensive experience treating veterans with complex dental and medical conditions. His expertise spans a wide range of specialties, including cosmetic and restorative dentistry, dental implantology, and full-mouth rehabilitation. His technical skills, combined with an artist’s eye for aesthetics, allow him to create stunning, natural-looking smiles tailored to each patient’s needs.
                    <br>
                    <br>
                    Dr. Caldwell is also a firm believer in giving back to the community. He actively participates in outreach programs that provide dental care to underserved populations, both locally and internationally. He has volunteered on multiple medical mission trips, offering his skills to those who lack access to quality dental care. Additionally, he mentors aspiring dental students, guiding them toward successful careers in dentistry.
                    <br>
                    <br>
                    When he’s not perfecting smiles, Dr. Caldwell enjoys outdoor adventures, whether it's hiking in the mountains, exploring new travel destinations, or capturing breathtaking landscapes through his passion for photography. He’s also a self-proclaimed coffee connoisseur who’s always on the hunt for the perfect espresso.
                </p>
            </div>
        </div>

    </div>

    <div class="bg-primary-900 card">

        <div class="container mx-auto px-4 py-10 flex items-center lg:items-start justify-between gap-8 flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 flex items-center justify-center lg:justify-start">
                <img class="w-full max-w-[280px] lg:max-w-full h-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor-2.png" alt="" />
            </div>
           
            <div class="text-neutral-50 w-full lg:w-3/4">
                <h3 class="font-primary text-2xl font-semibold">Dr. Evelyn Harper, DDS</h3>
                <p class="mt-4">
                    Dr. Evelyn Harper is a skilled and compassionate dentist dedicated to providing top-tier care with a personalized touch. Raised in the charming city of Charleston, South Carolina, she developed an early appreciation for precision and artistry—qualities that now define her approach to dentistry. Her philosophy revolves around patient education, transparency, and ensuring each individual feels at ease in the dental chair.
                    Dr. Harper earned her Doctorate of Dental Surgery (DDS) from the University of Michigan, graduating with honors and receiving recognition from the Omicron Kappa Upsilon National Dental Honor Society. She further honed her expertise during her residency at the Johns Hopkins Hospital, where she served as chief resident. There, she gained extensive experience in complex restorations, cosmetic dentistry, and treating patients with dental anxiety. Whether performing full-mouth rehabilitations or simple routine care, she blends technical precision with a gentle touch to create lasting, healthy smiles.
                    <br>
                    <br>
                    Passionate about service, Dr. Harper actively participates in community outreach programs, offering dental care to underserved populations. She has volunteered on medical missions abroad and frequently donates her time to local initiatives that provide free dental services to children and seniors in need.
                </p>
            </div>
        </div>

    </div>

    <div class="bg-primary-900 card">

        <div class="container mx-auto px-4 py-10 flex items-center lg:items-start justify-between gap-8 flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 flex items-center justify-center lg:justify-start">
                <img class="w-full max-w-[280px] lg:max-w-full h-auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor-3.png" alt="" />
            </div>
           
            <div class="text-neutral-50 w-full lg:w-3/4">
                <h3 class="font-primary text-2xl font-semibold">Dr. Thomas Wexler, DDS</h3>
                <p class="mt-4">
                    With decades of hands-on experience, Dr. Thomas Wexler has built a career on precision, innovation, and patient-first care. A graduate of the New York University College of Dentistry, he refined his expertise during an advanced residency at Mount Sinai Hospital, focusing on restorative and cosmetic procedures. His practice is rooted in a deep commitment to evolving with the latest technology while maintaining a warm, approachable presence that puts patients at ease.
                    <br>
                    <br>
                    Dr. Wexler’s journey in dentistry spans over 40 years, during which he has cultivated a reputation for meticulous attention to detail and a sharp eye for aesthetic dentistry. He thrives on problem-solving complex dental cases, blending science and artistry to create natural, functional smiles. Patients appreciate his honest, straightforward approach—he believes in educating rather than just treating, empowering individuals to take charge of their oral health.
                    <br>
                    <br>
                    Beyond the dental chair, Dr. Wexler is always on the move. Whether it's sailing along the East Coast, refining his golf swing, or capturing breathtaking landscapes through his camera lens, he approaches life with the same precision and enthusiasm that he brings to his practice. A longtime resident of Westchester, he enjoys weekend road trips, experimenting with new cuisines, and spending time with his growing family.
                    This version leans into a refined yet modern style, making Dr. Wexler feel distinct and engaging while maintaining a professional edge. Let me know if you want a different spin!
                </p>
            </div>
        </div>

    </div>

<?php endif; ?>









</section>



<?php
    get_template_part('template-parts/location-contact');
    get_template_part('template-parts/footer-section');
    
    get_footer();
?>
