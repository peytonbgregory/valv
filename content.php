<article id="post-<?php the_ID(); ?>" <?php post_class( 'row mb-3' ); ?>>
	
	<?php if ( has_post_thumbnail() && get_post_type() == 'post') { ?>

		<div class="col-2 col-sm-3 col-md-3 col-lg-2 d-flex align-items-center">

			<a href="<?php the_permalink (); ?>">

				<?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>

			</a>

		</div>

	<?php } ?>
	
	<div class="col">
		
		<?php if (is_home() || is_front_page()) : ?> 
		
			<?php else : ?>

				<header class="entry-header">	

					<?php if( is_search() || is_archive() ) : ?>

						<h3 class="post-title"><a href="<?php the_permalink (); ?>"><?php the_title();?></a></h3>

					<?php else :

						the_title('<h1 class="text-dark text-capitalize border-bottom pb-1 mb-1">','</h1>'); 

					endif; ?>

					<?php if (get_post_type() == 'post' && is_single()) { ?>

						<div class="meta small text-muted mb-3">Posted: <?php the_time('l, F jS, Y') ?> | By: <?php the_author(); ?></div>

					<?php } ?>

				</header><!-- .entry-header -->

			<?php endif; ?>
		
		<?php if ( is_search() || is_home() || is_archive() || is_category() ) : // Only display Excerpts for Search ?>
		
			<div class="entry-summary">

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

		<?php else : ?>

			<div class="entry-content">
				
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'valv')); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'valv' ),
						'after'  => '</div>',
					));
				?>
				
			</div><!-- .entry-content -->

		<?php endif; ?>	

		<?php if (is_page() && !is_archive()) { ?>

			<?php if (is_user_logged_in()) {  edit_post_link( __( 'Edit', 'valv' ), '<span class="edit-link text-muted small mb-3">', '</span>' );} ?>

		<?php } ?>
	
	</div>
	
	<?php if ( is_search() || is_home() || is_archive() || is_category() ) { ?>
	
	<div class="col-12">
		
		<div class="entry-meta small justify-content-between border-bottom d-flex pb-3 mb-3 align-items-end text-muted">Published: <?php the_date(); ?> <a href="<?php the_permalink(); ?>" class="btn btn-light btn-sm" title="<?php the_title();?>">Read More</a>
		</div>
		
	</div>
	
	<?php } ?>
	
</article><!-- #post-## -->
