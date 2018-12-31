<?php
/**
 * Template Name: Page - Homepage
 * The template used for displaying page content in page.php
 */
get_header(); ?>

<section class="container" id="slideshow">

	<div class="row">

		<div class="col-12">
			
			<?php dynamic_sidebar ('slideshow'); ?>
			
		</div>  
		
	</div>

</section>

<section class="container mb-3" id="two">
	
	<div class="row">
		
		<div class="col-12">

			<?php if ( have_posts() ) : ?>

				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content' ); ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

				<?php if ( get_post_type() == 'post') { ?>

					<div class="navigation mb-3"><?php posts_nav_link(); ?></div>

				<?php } ?>

			<?php else : 

				get_template_part( 'no-results' );

			endif; ?>

		</div>  
		
	</div>  
	
</section>

<section class="container" id="three">
	
   <?php if( have_rows('products') ): ?>

	   <div class="row text-center">
		   
		   <?php while ( have_rows('products') ) : the_row(); ?>

				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
					
					<div class="card pt-3 mb-3">

						<a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('name'); ?>" target="_self">

							<img src="<?php the_sub_field('image'); ?>" width="540" class="img-fluid mb-3 card-img-top" />

						</a>
						
						<div class="card-body pb-2 px-1">
							
							<a title="<?php the_sub_field('name'); ?>" target="_self" class="btn text-truncate d-block btn-link" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('name'); ?></a>
							
						</div>

					</div> 
					
				</div> 

			<?php endwhile; ?>

		</div>

	<?php else : endif; ?> 

</section>

<?php get_footer(); ?>