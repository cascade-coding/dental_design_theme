<?php
get_header();

get_template_part('template-parts/top-nav');
?>

<div data-page="not-found-page" id="page-info"></div>


<main>
	<div class="flex items-center justify-center py-10">
		<p class="text-2xl text-neutral-950">Oops! No content was found.</p>
	</div>
</main>




<?php
    get_template_part('template-parts/footer-section');
    
    get_footer();
?>