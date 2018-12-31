<?php $hidedata = get_field( 'data_toggle' ); ?>

<section id="post-<?php the_ID(); ?>" <?php post_class('valv-product mb-5'); ?>>
	
	<header class="entry-header mb-5">
		
		<h1 class="text-dark mb-1 pb-1 border-bottom"><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent ); ?></h1>
		
        <h2><?php the_title(); ?></h2>
	
	</header>
	
	<div class="row no-gutters">
		
    	<?php if ( $hidedata ) { } else { ?>
		
			<?php if (has_post_thumbnail()) { ?>
		
				<figure class="col-12 col-md-4">

					<a data-toggle="modal" data-target="#myProduct">
						
						<?php the_post_thumbnail('medium' ,array ( 'class' => 'img-fluid mb-3')); ?>
					
						<div class="text-muted small text-center font-italic">Click Image to Enlarge</div>
						
					</a>
					
				</figure>
			
			<?php } ?>
		
        <main class="col-12 col-md-8">
			
			<div class="card technical-data">
				
        	<div class="d-flex card-title align-items-center pt-3 px-3 mb-0 justify-content-between">
				
            	<div class="h2 text-dark mb-0 d-inline-flex">Technical Data</div>
				
				<div class="btn-group">
					<a class="btn btn-secondary" title="Email to a Friend" href="mailto:?subject=I wanted to share this post with you from <?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>&#32;&#32;<?php the_permalink(); ?>" title="Email to a friend/colleague">Email</a>
					<a class="btn btn-secondary" title="Print Product Infomation" href="javascript:window.print()">Print</a>
					<a class="btn btn-secondary" title="Go to eBrochures Page" href="<?php echo get_bloginfo('url'); ?>/ebrochures/">Literature</a>
				</div>
				
            </div>
			
            <div class="card-body pb-2 small">
				
					   <?php if(get_field('tech_data_size')) { 
						
						echo '<div class="row border-bottom mb-2 pb-2">
                            <div class="col-md-4 col-12 text-muted strong data">Sizes</div>
                            <div class="col-md-8 col-12 spec">' . get_field('tech_data_size') . '</div>
                        </div>'; 

						} ?>
                        
                        <?php if(get_field('tech_data_pressure')) { 
						
						echo '<div class="row border-bottom mb-2 pb-2">
                            <div class="col-md-4 col-12 text-muted strong data">Pressure Classes</div>
                            <div class="col-md-8 col-12 spec">' . get_field('tech_data_pressure') . '</div>
                        </div>'; 

						} ?>
                         
                          <?php if(get_field('tech_data_materitals')) { 
						
						echo '<div class="row border-bottom mb-2 pb-2">
                            <div class="col-md-4 col-12 text-muted strong data">Materials of Construction</div>
                            <div class="col-md-8 col-12 spec">' . get_field('tech_data_materitals') . '</div>
                        </div>'; 

						} ?>
                        
                        <?php if(get_field('tech_data_compliance')) { 
						
						echo '<div class="row border-bottom mb-2 pb-2">
                            <div class="col-md-4 col-12 text-muted strong data">In Compliance</div>
                            <div class="col-md-8 col-12 spec">' . get_field('tech_data_compliance') . '</div>
                        </div>'; 

						} ?>
                        
                  
                        <?php if(get_field('tech_data_conections')) { 
						
						echo '<div class="row border-bottom mb-2 pb-2">
                            <div class="col-md-4 col-12 text-muted strong data">End Connections</div>
                            <div class="col-md-8 col-12 spec">' . get_field('tech_data_conections') . '</div>
                        </div>'; 

						} ?>
                        
                        <?php if(get_field('tech_data_options')) { 
						
						echo '<div class="row">
                            <div class="col-md-4 col-12 text-muted strong data">Shutoff</div>
                            <div class="col-md-8 col-12 spec">' . get_field('tech_data_options') . '</div>
                        </div>'; 

						} ?>
				
                   </div>
				
			</div>
			
        	<?php } ?>
			
        </main>
		
	</div>
	
</section>

<section class="product-info">

	<ul class="nav nav-tabs" role="tablist" id="productsTabs">

		<li class="nav-item" role="presentation"><a class="nav-link active" href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>

		<?php if(get_field('design_features')) { ?>

			<li class="nav-item" role="presentation"><a class="nav-link" href="#features" aria-controls="features" role="tab" data-toggle="tab">Features</a></li>

		<?php } ?>

		<?php if(get_field('key_benefits')) { ?>

			<li class="nav-item" role="presentation"><a class="nav-link" href="#benefits" aria-controls="benefits" role="tab" data-toggle="tab">Benefits</a></li>

		<?php } ?>

		<?php if(get_field('case_studies')) { ?>

			<li class="nav-item" role="presentation"><a class="nav-link" href="#case_studies" aria-controls="case_studies" role="tab" data-toggle="tab">Case Studies</a></li>

		<?php } ?>

		<?php if(get_field('specs')) { ?>

			<li class="nav-item" role="presentation"><a class="nav-link" href="#specifications" aria-controls="specifications" role="tab" data-toggle="tab">Specs</a></li>

		<?php }  ?>

		<?php if(get_field('options')) { ?>

			<li class="nav-item" role="presentation"><a class="nav-link" href="#options" aria-controls="options" role="tab" data-toggle="tab">Options</a></li>

		<?php } ?>

		<?php if(get_field('warranty')) { ?>

			<li class="nav-item" role="presentation"><a class="nav-link" href="#warranty" aria-controls="warranty" role="tab" data-toggle="tab">Warranty</a></li>

		<?php } ?>

		<?php if(get_field('application')) { ?>

			<li class="nav-item" role="presentation"><a class="nav-link" href="#application" aria-controls="application" role="tab" data-toggle="tab">Applications</a></li>

		<?php } ?>

		<?php if(get_field('videos')) { ?>

			<li class="nav-item" role="presentation"><a class="nav-link" href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Videos</a></li>

		<?php } ?>

	</ul>

	<div class="tab-content border-left border-right border-bottom mb-3 p-3">

		<div role="tabpanel" class="tab-pane active" id="details">

			<?php the_content(); ?>

		</div>


		<?php if(get_field('design_features')) { echo '<div role="tabpanel" class="tab-pane" id="features"><p>' . get_field('design_features') . '</p></div>'; } ?>
		<?php if(get_field('key_benefits')) { echo '<div role="tabpanel" class="tab-pane" id="benefits"><p>' . get_field('key_benefits') . '</p></div>'; } ?>
		<?php if(get_field('case_studies')) { echo '<div role="tabpanel" class="tab-pane" id="case_studies"><p>' . get_field('case_studies') . '</p></div>'; } ?>

			<div role="tabpanel" class="tab-pane" id="specifications">

				<?php if( have_rows('specs') ): ?>

					<?php while ( have_rows('specs') ) : the_row();?>
				
						 <?php $hidelabel = get_sub_field( 'hide_label' ); if ( $hidelabel ) {?> 
							 <div class="row row-space">
								 <?php if(get_sub_field('label')) { echo '<div class="col-md-12"><strong>' . get_sub_field('label') . '</strong></div>'; } ?>
								 <?php if(get_sub_field('label_description')) { echo '<div class="col-md-12">' . get_sub_field('label_description') . '</div>'; } ?>
							 </div>
						 <?php } else { ?>    
							 <div class="row row-space">
								 <?php if(get_sub_field('label')) { echo '<div class="col-md-2"><strong>' . get_sub_field('label') . '</strong></div>'; } ?>
								 <?php if(get_sub_field('label_description')) { echo '<div class="col-md-10">' . get_sub_field('label_description') . '</div>'; } ?>
							 </div>
						 <?php } ?>
				
					<?php endwhile; else : ?>

				<?php endif; ?>

			</div>

		<?php if(get_field('options')) { echo '<div role="tabpanel" class="tab-pane" id="options"><p>' . get_field('options') . '</p></div>'; } ?>
		<?php if(get_field('application')) { echo '<div role="tabpanel" class="tab-pane" id="application"><p>' . get_field('application') . '</p></div>'; } ?>
		<?php if(get_field('warranty')) { echo '<div role="tabpanel" class="tab-pane" id="warranty"><p>' . get_field('warranty') . '</p></div>'; } ?>
		
		<?php if( have_rows('videos') ): ?>
		
			<div role="tabpanel" class="tab-pane" id="videos">
				
				<?php while ( have_rows('videos') ) : the_row();?>
				
					<?php the_sub_field('video'); ?>
				
				<?php endwhile; else : ?>
				
			</div>
		
		<?php endif; ?>
		
	</div> <!-- tab content --> 
	
</section>		

<div class="modal fade" id="myProduct" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">	  
        <h5 class="modal-title"><?php the_title(); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?php the_post_thumbnail('large' ,array ( 'class' => 'img-fluid')); ?>
		<div class="modal-footer border-0 p-0">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	  </div>
    </div>
  </div>
</div>
<?php wp_reset_postdata(); ?>
<script>
jQuery(document).ready(function($) {
	$('#productsTabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});
});
</script> 