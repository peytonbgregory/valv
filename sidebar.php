<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>

<?php if (is_active_sidebar('sidebar-1')) { ?>

<div class="col-12 col-sm-12 col-md-4 col-lg-3">
	
	
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		
		<?php if( get_post_type() == 'products') { 
	
			get_template_part('includes/sidemenu'); 
		
		} ?>
		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
</div>

<?php } ?>