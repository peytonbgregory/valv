<?php
/**
 * The template part for displaying a message that posts cannot be found.
 */
?>
<section class="error-404 text-center no-results not-found">
						
	<header class="page-header">

		<h1 class="display-1 text-muted h1">404</h1>
		<h1 class="page-title"><?php __( 'Oops! This page cannot be found. Try using the search bar below', 'valv'); ?></h1>

	</header><!-- .page-header -->

	<div class="page-content card bg-light p-3 my-3">

		<h1>Search <small><?php echo get_bloginfo('url')?></small></h1>

		<?php get_search_form(); ?>

	</div><!-- .page-content -->

</section><!-- .error-404 -->