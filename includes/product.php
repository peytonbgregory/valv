<?php
/*
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="parent-page-title"><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent ); ?></h1>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		
	</header><!-- .entry-header -->
	<div class="row">
    	<?php $hide = get_field( 'data_toggle' ); if ( $hide ) { } else { ?>
        	<div class="col-md-4">
				<a data-toggle="modal" data-target="#myModal">
				<?php the_post_thumbnail('medium' ,array ( 'class' => 'img-responsive img-thumbnail single-product-feature')); ?>
                </a>
        	</div>
		
        <div class="col-md-8">
        	<div class="tech-contact">
            <span class="entry-title tech-heading">Technical Data</span>
            <ul class="contact-wrap">
            	<li><a href="mailto:?subject=I wanted to share this post with you from <?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>&#32;&#32;<?php the_permalink(); ?>" title="Email to a friend/colleague">Email</a></li>
                <li><a href="javascript:window.print()">Print</a></li>
                <li><a href="/ebrochures/">Literature</a></li>
            </ul>
            </div>
            <div class="tech-data tech-header">
					   <?php if(get_field('tech_data_size')) { echo '<div class="row">
                            <div class="col-md-3 data">Sizes</div>
                            <div class="col-md-9 spec">' . get_field('tech_data_size') . '</div>
                        </div><!-- row -->'; } ?>
                        
                        <?php if(get_field('tech_data_pressure')) { echo '<div class="row">
                            <div class="col-md-3 data">Pressure Classes</div>
                            <div class="col-md-9 spec">' . get_field('tech_data_pressure') . '</div>
                        </div><!-- row -->'; } ?>
                         
                          <?php if(get_field('tech_data_materitals')) { echo '<div class="row">
                            <div class="col-md-3 data">Materials of Construction</div>
                            <div class="col-md-9 spec">' . get_field('tech_data_materitals') . '</div>
                        </div><!-- row -->'; } ?>
                        
                        <?php if(get_field('tech_data_compliance')) { echo '<div class="row">
                            <div class="col-md-3 data">In Compliance</div>
                            <div class="col-md-9 spec">' . get_field('tech_data_compliance') . '</div>
                        </div><!-- row -->'; } ?>
                        
                  
                        <?php if(get_field('tech_data_conections')) { echo '<div class="row">
                            <div class="col-md-3 data">End Connections</div>
                            <div class="col-md-9 spec">' . get_field('tech_data_conections') . '</div>
                        </div><!-- row -->'; } ?>
                        
                        <?php if(get_field('tech_data_options')) { echo '<div class="row">
                            <div class="col-md-3 data">Shutoff</div>
                            <div class="col-md-9 spec">' . get_field('tech_data_options') . '</div>
                        </div><!-- row -->'; } ?>
                   </div><!--tech data -->
                   <?php } ?>
        </div>
	</div>
</article><!-- #post-## -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal product-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <div class="modal-body">
      <?php the_post_thumbnail('full' ,array ( 'class' => 'img-responsive')); ?>
      </div>
    </div>
  </div>
</div>
