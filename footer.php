<?php
/**
 * The Footer.
 */
$options = get_option( 'theme_settings' ); 
$hideindustry = get_field( 'industries_toggle' );
$hidesearch = get_field( 'search_toggle' );
?>

    <div class="push"></div>

</div><!--#wrapper-->

<?php if ( $hideindustry ) { } else { ?>

   <section class="container mb-3" id="four">
        
          <?php if( have_rows('industries' , 'options') ): ?>
          
	   <div class="row no-gutters">
       
		   <?php while ( have_rows('industries' , 'options') ) : the_row(); ?>         
                    
           <div class="col-12 col-sm-6 col-md-6 col-lg-3">
			   
                <div class="ih-item border-0 square effect6 from_top_and_bottom">
					
                    <a href="<?php the_sub_field('link' , 'options'); ?>" title="<?php the_sub_field('name' , 'options'); ?> Industry">
						
                    <div class="img">
						
                        <img src="<?php the_sub_field('image' , 'options'); ?>" class="img-fluid industry-thumb" alt="<?php the_sub_field('name' , 'options'); ?>" />
						
                    </div>
						
                    <div class="info d-flex justify-content-center">
						
                        <h3 class="m-0 align-self-center w-100 text-center"><?php the_sub_field('name' , 'options'); ?></h3>
						
                    </div>
						
                    </a>
					
                </div>
			   
            </div>
		   
		   <?php endwhile; endif; ?>         
                    
	   </div>
	   
    </section>
<?php } ?>

<?php if ( $hidesearch ) { } else { ?>
	<section class="container text-center" id="prefooter">

		<div class="row">
			<div class="col-md-4 col-12 mb-3 ">
			   <a type="button" data-toggle="modal" data-target="#mySearch" id="searchBtn"><img src="<?php echo get_template_directory_uri();?>/images/valv-footer-1.png" alt="product search button" class="img-fluid" /></a>
			</div>  
			 <div class="col-md-4 col-12 mb-3">
			   <a href="/resources/distribution-network/"><img src="<?php echo get_template_directory_uri();?>/images/valv-footer-2.png" alt="locate a distribution center button" class="img-fluid" /></a>
			</div>  
			 <div class="col-md-4 col-12 mb-3">
			   <a href="/authorized-repair-centers/"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/repair-center.jpg" alt="locate a repair center button" class="img-fluid" /></a>
			</div>            
		</div>     

	</section>

<!-- Modal -->

        <?php include 'includes/product-search.php'; ?>
 

<?php } ?>

<footer class="container-fluid p-3 bg-primary text-light small">
	
	<div class="row">   
		
		<div class="container"> 
			
			<div class="row flex-row align-items-center">  
				
				<div class="col-12 col-md-auto text-center">
					
					<a class="footer-logo-link " href="<?php echo get_site_url(); ?>" rel="home" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<img src="<?php echo get_template_directory_uri();?>/images/valv-logo.jpg" class="img-fluid main-logo mt-1 mt-md-0 mb-3 mb-md-0 mx-auto mr-3" width="125" />
					</a>
					
				</div>
				
				<div class="col-12 col-sm text-center text-md-left"> 
					
					©1987-<?php echo date("Y"); ?> ValvTechnologies. All Rights Reserved. Four-year warranty applies to power applications only. | <a class="text-light" href="<?php echo get_site_url(); ?>/wp-content/uploads/2018/03/2018-Terms-and-Conditions.pdf" target="_blank">Terms &amp; Conditions</a>
					<span class="sep"> | </span>
					<a class="text-light" href="http://theideacenter.com/" rel="nofollow" title="Site Designed by The Idea Center" target="_blank" class="credits-link">Design</a>
						
					
				</div>
				
				<div class="col-12 d-block text-center mt-3 d-md-none">
				
					<ul class="nav flex-column">
						
						<li class="nav-item"><a class="nav-link pl-sm-0 text-light" target="_blank" href="http://vendor.valv.com/">Login</a></li>
						<li class="nav-item"><a class="nav-link pl-sm-0 text-light" target="_blank" href="https://portal.valv.com/">Distributor Portal</a>
						<li class="nav-item"><a class="text-light nav-link pr-sm-0 phone-number" href="tel:7138600400" title="Click to Call 7138600400">CORPORATE: 713.860.0400</a></li>
						<li class="nav-item"><a class="text-light nav-link pr-sm-0 phone-number" href="tel:8326523607" title="Click to Call 8326523607">EMERGENCY: 832.652.3607</a></li>
						
					</ul>
					
				</div>
				
				<div class="col-12 col-md-auto">
	
					<div class="animated bounceIn delay-2s" id="socialWrapper">
						
						<a href="http://www.facebook.com/pages/ValvTechnologies/109409515744971" target="_blank" title="Follow us on Facebook" rel="follow" class="btn btn-sm btn-dark"><i class="fab fa-facebook"></i></a>
						<a href="https://www.linkedin.com/company/valvtechnologies-inc-?trk=top_nav_home" target="_blank" title="Follow us on Linkedin" rel="follow" class="btn btn-sm btn-social btn-dark"><i class="fab fa-linkedin"></i></a>
						<a href="http://www.twitter.com/ZeroLeakageValv" target="_blank" title="Follow us on Twitter" rel="follow" class="btn btn-sm btn-dark"><i class="fab fa-twitter"></i></a>
						<a href="http://www.youtube.com/user/ValvTechnologies" target="_blank" title="Follow us on YouTube" rel="follow" class="btn btn-sm btn-dark"><i class="fab fa-youtube"></i></a>
						<a href="https://www.instagram.com/zeroleakagevalv/?hl=en" target="_blank" title="Follow us on Instagram" rel="follow" class="btn btn-sm btn-dark"><i class="fab fa-instagram"></i></a>	
						
					</div><!-- #Social Media -->		
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</footer>

<?php wp_footer(); ?>

<?php if (is_archive('certifications')) { ?>
	<script>
		jQuery(document).ready(function() { 
			jQuery("#certifications-wrapper").filter();
		});

		jQuery(document).ready(function($){
			$(".filter-button").click(function(){
				var value = $(this).attr('data-filter');
				if(value == "all")
				{
					$('.certifications').show('1000');
				}
				else
				{
					$(".certifications").not('.'+value).hide('3000');
					$('.certifications').filter('.'+value).show('3000');    
				}
			});
		});

		jQuery(document).ready(function($) {
			$('a[href$=".pdf"]').attr('target', '_blank');  
		});	
	</script>
<?php } // Certifications Archive Filter  BS4 3.0 ?>



<?php if (is_page('wtf')) { ?>
<script>

jQuery(document).ready(function($){

//, attr, order

var sortSelect = function (select, attr, order) {
    if(attr === 'text'){
        if(order === 'asc'){
            $(select).html($(select).children('option').sort(function (x, y) {
                return $(x).text().toUpperCase() < $(y).text().toUpperCase() ? -1 : 1;
            }));
            $(select).get(0).selectedIndex = 0;
            e.preventDefault();
        }// end asc
        if(order === 'desc'){
            $(select).html($(select).children('option').sort(function (y, x) {
                return $(x).text().toUpperCase() < $(y).text().toUpperCase() ? -1 : 1;
            }));
            $(select).get(0).selectedIndex = 0;
            e.preventDefault();
        }// end desc
    }

};
	
sortSelect('#iphorm_37_1_5a007ff122f69', 'text', 'asc');
});


</script>
<?php } // Certifications Archive Filter Script ?>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-21009086-1', 'auto');
  ga('send', 'pageview');

</script>


<script type="text/javascript">

(function($) {
function new_map( $el ) {
// var
var $markers = $el.find('.marker');
// vars
var args = {
zoom		: 16,
center		: new google.maps.LatLng(0, 0),
mapTypeId	: google.maps.MapTypeId.ROADMAP
};
// create map	        	
var map = new google.maps.Map( $el[0], args);
// add a markers reference
map.markers = []; 
// add markers
$markers.each(function(){
add_marker( $(this), map );
});
// center map
center_map( map );
// return
return map;
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

// var
var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

// create marker
var marker = new google.maps.Marker({
position	: latlng,
map			: map
});

// add to array
map.markers.push( marker );

// if marker contains HTML, add it to an infoWindow
if( $marker.html() )
{
// create info window
var infowindow = new google.maps.InfoWindow({
content		: $marker.html()
});

// show info window when marker is clicked
google.maps.event.addListener(marker, 'click', function() {

infowindow.open( map, marker );

});
}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

// vars
var bounds = new google.maps.LatLngBounds();

// loop through all markers and create bounds
$.each( map.markers, function( i, marker ){

var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

bounds.extend( latlng );

});

// only 1 marker?
if( map.markers.length == 1 )
{
// set center of map
map.setCenter( bounds.getCenter() );
map.setZoom( 16 );
}
else
{
// fit to bounds
map.fitBounds( bounds );
}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

$('.acf-map').each(function(){

// create map
map = new_map( $(this) );

});

});

})(jQuery);
</script>
<script>
jQuery(document).ready(function($) {
	
	
var width = $(window).width(); 
var height = $(window).height(); 

if ((width >= 991  ) && (height>=768)) {
	
	$('.navbar .dropdown').hover(
		function() {

	$(this).find('.dropdown-menu').first().stop(true, true).delay(150).slideDown();

	}, function() {
	$(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

	});

	$('.navbar .dropdown > a').click(function(){
	location.href = this.href;
	});
	
}
else {
//do something else
}	
	
	



});
</script>



</body>
</html>