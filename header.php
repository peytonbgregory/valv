<?php /* * The Header for our theme. */?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<script>
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	jQuery(document).ready(function( $ ) {
	$(window).on('load',function() {
		// Animate loader off screen
		$(".pg-pre-con").fadeOut("slow");;
		
	});
});
</script>
</head>
<body <?php body_class(); ?>>
	
	<div class="pg-pre-con"></div>
	
	<div class="wrapper">
	
        <header class="border-bottom bg-white mb-3" id="site-header">
			
			<section class="bg-black py-1">
				
				<div class="container">
					
					<div class="row flex-row no-gutters justify-content-between align-items-center">
						
					 <div class="col-auto d-none d-sm-block">
						 
						<ul class="nav small">
							
							<li class="nav-item"><a class="nav-link pl-sm-0 text-light" target="_blank" href="http://vendor.valv.com/">Login</a></li>
							<li class="nav-item"><a class="nav-link pl-sm-0 text-light" target="_blank" href="https://portal.valv.com/">Distributor Portal</a></li>
							<li class="nav-item align-items-center d-none d-lg-flex"><?php get_search_form(); ?></li>
							
						</ul>
						 
					</div>
						
					<div class="col-auto text-center text-sm-right">
						
						<ul class="nav small">
							
							<li class="nav-item"><a class="text-light nav-link pr-sm-0 phone-number" href="tel:7138600400" title="Click to Call 7138600400">CORPORATE: 713.860.0400</a></li>
							<li class="nav-item"><a class="text-light nav-link pr-sm-0 phone-number" href="tel:8326523607" title="Click to Call 8326523607">EMERGENCY: 832.652.3607</a></li>
							
						</ul>
						
					</div>
						
				</div><!-- #Social Media -->
					
			</section>

	<div class="container">

		<nav class="navbar navbar-light navbar-expand-lg p-0" id="siteNav" role="navigation">

			 <a class="main-logo-link navbar-brand main-logo-link align-self-center align-self-center" href="<?php echo home_url(); ?>" rel="home" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				
				 <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'medium' );
				if ( has_custom_logo() ) {
						echo '<img width="230" class="img-fluid main-logo" src="'. esc_url( $logo[0] ) .'">';
				} else {
						echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
				} ?>

			</a>
			
			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-controls="bs-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<?php wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             => 2,
				'menu_id'           => 'main-menu',
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse order-2 order-lg-1',
				'container_id'      => 'bs-navbar-collapse',
				'menu_class'        => 'nav navbar-nav ml-auto',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker(),
			) ); ?>	

		</nav>

	</div>

</header>