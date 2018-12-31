<?php
/**
 * The main template file.
 *
 */
get_header(); ?>

	<div class="container">
		
		<div class="row">
			
			<div class="col">
				
				<main id="main" class="site-main" role="main">
				
					<?php if ( have_posts() ) : ?>

							<?php if (is_search()) { ?>

								<h1 class="text-dark border-bottom pb-1 mb-3"><?php printf( __( 'Search Results for: %s'), '<span class="text-primary">' . get_search_query() . '</span>' ); ?></h1>

							<?php } ?>
							
							<?php if (is_archive() || is_category()) { ?>

								<h1 class="text-dark border-bottom pb-1 mb-3"><?php echo get_the_archive_title(); ?></h1>

							<?php } ?>

							<?php while ( have_posts() ) : the_post(); 
								
								if( get_post_type() == 'products' ) :

									get_template_part( 'content-products' );
										
								else :

									get_template_part( 'content' );
					
								endif; ?>

								<?php if( class_exists('acf') && is_page('ebrochures')) {
 
									get_template_part( 'content-ebrochure' );

								} ?>

							<?php endwhile; // end of the loop. ?>

						<?php if ( get_post_type() == 'post') { ?>

						<div class="navigation mb-3"><?php posts_nav_link(); ?></div>
					
						<div class="mb-3 d-flex justify-content-between">
							
							<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
							<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
							
						</div>

						<?php } ?>

					<?php else : 

					get_template_part( 'no-results' );

					endif; ?>
			
				</main><!-- #main -->
				
			</div><!-- col -->
			
            <?php get_sidebar(); ?>
			
		</div>
		
	</div>

<?php get_footer(); ?>