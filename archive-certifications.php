<?php get_header(); ?>

	<div class="container">
		
		<div class="row">

			<div class="col-12">
				
					<?php if ( have_posts() ) : ?>
					
					<main id="main" class="site-main" role="main">
						
						<h1 class="entry-title"><?php post_type_archive_title(); ?></h1>

						<div class="row">
							<div class="col-12">
								<div class="btn-group mt-1 mb-3">
									<button class="btn btn-primary filter-button" data-filter="category-certs">All</button>
									
									<?php 
									$categories = get_categories( array(
										'child_of' => 175,
										'hide_empty' => 1,
										'orderby' => 'name') );
									foreach($categories as $category) { ?>
									<button class="btn btn-primary filter-button" data-filter="category-<?php echo $category->slug; ?>"><?php printf( esc_html($category->name) ); ?><span class="badge badge-light"><?php printf( esc_html($category->category_count) ); ?></span></button>
									
									<?php } ?>
									
									
								</div>
							</div>
						</div>

						<div class="row" id="certifications-wrapper">

							<?php while ( have_posts() ) : the_post(); ?>

								<div <?php post_class('col-12 col-sm-6'); ?>>
									
									<div class="cert-cont card card-body mb-3 pt-0">


										<?php the_title('<h3 class="card-title"><i class="fa fa-file-alt alignleft"></i>','</h3>'); ?>
										<?php the_content(); ?>

									</div>
									
								</div>

							<?php endwhile; ?>
		
						</div>
	
					</main>

				<?php else : ?>
					
					<?php get_template_part( 'no-results', 'index' ); ?>

				<?php endif; ?>
	
			</div>

		</div>

	</div>

<?php get_footer(); ?>