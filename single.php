<?php
get_header();

get_template_part('template-parts/top-nav');
?>

<div data-page="single-post" id="page-info"></div>

<main id="primary" class="bg-emerald-950">
    <?php
    while ( have_posts() ) :
        the_post();
    ?>

<div class="container mx-auto px-4 min-h-full">

	<div class="bg-white pb-10">

	<?php if ( has_post_thumbnail() ) : ?>
    <div class="relative border-b-4 border-b-primary-500">
        <?php the_post_thumbnail('full', ['class' => 'w-full max-h-[400px] object-cover']); ?>

        <div class="absolute bottom-0 left-0 w-full bg-neutral-950/50">
            <h1 class="font-primary text-4xl font-bold text-neutral-50 py-6 px-4 
                       truncate whitespace-nowrap overflow-hidden">
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
	<?php endif; ?>

			
		<div class="prose max-w-none post-content">
			<?php the_content(); ?>
		</div>

	</div>

</div>

    <?php endwhile; ?>


</main>

<?php
get_template_part('template-parts/location-contact');
get_template_part('template-parts/footer-section');

get_footer();
?>
