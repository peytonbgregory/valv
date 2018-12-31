<?php
/**
 * Template Name: Distribution Network
 */
get_header(); ?>

<?php 
$args = array (
'post_type'         => 'distributors',
'order'             => 'ASC',
'orderby'           => 'menu_order',
'posts_per_page' 	=> -1,


); ?>

<?php $my_query = new WP_Query($args); ?>

<div class="container">

	<div class="row">
	
			<header class="col-12 entry-header">
				<h1 class="entry-title border-bottom text-dark mb-1 pb-1">Distribution Network</h1>
			</header>
	

		<aside class="col-12 col-md-4">

			<section class="well my-3">

				<form action="" method="POST" id="distFilter">

					<div id="countryhide">				
						<label>Select your Country</label>			
						<?php					
						  $categories = get_categories('taxonomy=distributor_categories&parent=0');
						  $select = "<select name='country-select' id='countrySelect' class='postform filterby'>n";
						  $select.= "<option value='-1'>Select Country</option>n";

						  foreach($categories as $category){
							if($category->count > 0){
								$select.= "<option value='distributor_categories-".$category->slug."'>".$category->name."</option>";
							}
						  }

						  $select.= "</select>";

						  echo $select;
						?>
					</div>

					<div id="statehide">			
						<label>Select your State</label>		
						<?php					
						  $subcategories = get_categories('taxonomy=distributor_categories&parent=1857');

						  $subselect = "<select name='state-select' value='' id='stateSelect' class='postform filterby'>n";
						  $subselect.= "<option value='type-distributors'>Select State</option>n";

						  foreach($subcategories as $subcategory){
							if($subcategory->count > 0){
								$subselect.= "<option value='distributor_categories-".$subcategory->slug."'>".$subcategory->name."</option>";
							}
						  }

						  $subselect.= "</select>";
						  echo $subselect;
						?>
					</div>

					<div id="industryhide">								
						<label>Select your Industry</label>
						<?php					
						$industries = get_categories('taxonomy=distributor_industry');

						$industryselect = "<select name='industry-select' id='industrySelect' class='postform filterby'>n";
						$industryselect.= "<option value='status-publish'>Select Industry</option>n";

						foreach($industries as $industry){
						if($industry->count > 0){
							$industryselect.= "<option value='distributor_industry-".$industry->slug."'>".$industry->name."</option>";
						}
						}

						$industryselect.= "</select>";
						echo $industryselect;
						?>
					</div>	

				</form>
				
			</section>

			
			<section class="well my-3" id="formResults">

				<h2 class="text-dark" id="resultsHeader">Results:</h2>

				<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>	

				<div <?php post_class('border-bottom mb-3 card card-body animated fadeInUp'); ?>>

					<?php the_title('<h4 class="card-title">','</h4>');?>
						
						
							
						<?php if( class_exists('acf') ) : ?>

							<ul class="list-unstyled distributor-info">

								<?php if( get_field('phone') ) { ?>	
								<li><strong>Phone: </strong>
									<a href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a>
								</li>
								<?php } ?>

								<?php if( get_field('website') ) { ?>	
								<li><strong>Website: </strong>
								<a href="<?php the_field('website'); ?>" target="_blank"><?php the_field('website'); ?></a>
								</li>
								<?php } ?>	

								<?php if( get_field('email') ) { ?>	
								<li><strong>E-mail: </strong>
								<a href="mailto:<?php the_field('email'); ?>" target="_blank"><?php the_field('email'); ?></a>
								</li>
								<?php } ?>	



								<li><strong>Industry: </strong>
									<?php 	
								$terms = wp_get_post_terms($post->ID, 'distributor_industry');
								$count = count($terms);
								if ( $count > 0 ) {
									foreach ( $terms as $term ) {
										echo $term->name . ", ";
									}
								}
								?>
								</li>


								<?php if( get_field('country') ) { ?>			
								<li><strong>Country: </strong>
									<?php the_field('country'); ?>
								</li>
								<?php } ?>	

							</ul>

						<?php else :

							the_content();

						endif; ?>


					<?php if (is_user_logged_in()) { echo '<a class="small edit-link" href="' .get_edit_post_link() .'">Edit Entry</a>';} ?>
							
					

				</div>

				<?php endwhile; ?>


			</section>

		</aside>

			<main id="main" class="site-main col-12 col-md-8" role="main">


				<div class="embed-responsive animated fadeInUp delay-2s shadow my-3 embed-responsive-16by9">

					<div class="acf-map embed-responsive-item">

					<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

					<?php 
					$location = get_field('locationmap');
					$locationlat = get_field('lat');
					$locationlng = get_field('lng');
					?>

							<div <?php post_class('filter-wrap marker animated fadeInDown'); ?> data-lat="<?php echo $locationlat; ?>" data-lng="<?php echo $locationlng; ?>">
								<?php the_title('<h3>','</h3>');?>
								<p class="address"><?php // echo $location['address']; ?></p>
								<p><?php the_content(); ?></p>
								<?php if (is_user_logged_in()) { echo '<a href="' .get_edit_post_link() .'">Edit</a>';} ?>
							</div>


					<?php endwhile; ?>

					</div>

				</div>

			</main><!-- #main -->

		</div>
		
	</div>
	
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#resultsHeader').hide(); // hide the state field unless United States is selected
	$('#statehide').hide(); // hide the state field unless United States is selected
	$('#formResults .distributors').hide(); // hide results until a selection is made
	$("select.filterby").change(function(){	
		var filters = $.map($("select.filterby").toArray(), function(e){ // filters using select fields with .filterby class
		return $(e).val();
			
	}).join(".");		
	$('#resultsHeader').show(); 
	$("#formResults").find("div.distributors").hide();
	$("#formResults").find("div.distributors." + filters).show();
		
	if($("#countrySelect").val() == 'distributor_categories-united-states') {
	   $('#statehide').show();
	    } else {
			$('#statehide').hide();
		}
	});
});
</script>
<?php get_footer(); ?>