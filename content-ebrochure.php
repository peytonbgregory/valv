<?php if( have_rows('ebrochure') ): ?>

	<section class="row text-center" id="ebrochure-wrapper">

		<?php while ( have_rows('ebrochure') ) : the_row(); ?>

			<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">

				<figure id="ebrochure-<?php the_ID(); ?>" class="card bg-light">

					<a href="<?php the_sub_field('upload_ebrochure'); ?>" target="_blank" title="<?php the_sub_field('title'); ?>">

						<img src="<?php the_sub_field('ebrochure_thumbnail'); ?>" class="img-fluid card-img-top" />

					</a>

					<div class="card-body border-top px-2">

						<a class="text-truncate d-block" href="<?php the_sub_field('upload_ebrochure'); ?>" target="_blank" title="<?php the_sub_field('title'); ?>"><?php the_sub_field('title'); ?></a>

					</div>

				</figure>

			</div>

		<?php endwhile;?>

	</section>

<?php endif; ?>