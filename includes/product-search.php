<div class="modal fade" id="mySearch" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header">	  
        <h5 class="modal-title">Product Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<h3>Seclect a Product Category</h3>
		<form>
		  <select id="cat">
			<option value="a">Metal Seated Ball Valves</option>
			<option value="b">Trunnion</option>
			<option value="c">Coking Valves</option>
			<option value="d">Switching Valves</option>
			<option value="e">Parallel Slide Gate</option>
			<option value="f">Control Valves</option>
			<option value="g">Low-emission Valves</option>
			<option value="h">Slurry Valves</option>
			<option value="i">Electronic Relief Valves</option>
			<option value="j">ValvExpress®</option>
			<option value="k">Acid Injection Valves</option>
			<option value="l">Double Block and Bleed Valves</option>
			<option value="m">Turbine Bypass System</option>
			<option value="n">Check Valves</option>
			<option value="o">ValvTechnologies Specialty Products</option>
		  </select>
		  <h3>Select a ValvTechnologies’ Product</h3>
		  <select id="item">
		  </select>
			<div class="modal-footer mt-4">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input class="btn btn-primary" type="button" value="Submit" id="goto">
			</div>
		</form>
	     </div>
    </div>
  </div>
</div>
<script>	
jQuery(document).ready(function($) {	
var dict = {
a: [
	{ name: "V1-1: 1/4-4 900-4500#", url: '/products/metal-seated-ball-valves/v1-1/'}, 
	{ name: 'V1-1 Light-Weight Compact Solution', url: '/products/metal-seated-ball-valves/v1-1-compact/' },
	{ name: 'V1-2: 1/2-36 150-600#', url: '/products/metal-seated-ball-valves/v1-2/' },
	{ name: 'V1-3: 1/2-2, 150-600#', url: '/products/metal-seated-ball-valves/v1-3/' },
	{ name: 'V1-4: 4-36 900-4500#', url: '/products/metal-seated-ball-valves/v1-4/' }
],

b: [ 
	{ name: 'NexTech® R Series Valves', url: '/products/trunnion-ball-valves/trunnion-nextech-r/'},
	{ name: 'NexTech® E Series Valves', url: '/products/trunnion-ball-valves/trunnion-nextech-e/' },
	{ name: 'TrunTech® Valves', url: '/products/trunnion-ball-valves/truntech/' },
	{ name: 'PulseJet Valves', url: '/products/low-emission-valves/' }
	],
	
c: [ 
	{ name: 'Coking Isolation Valves', url: '/products/coking-valves/coking-isolation-valves/'},
	{ name: 'Coking Switch Valves', url: '/products/coker-switch-valves/' }
	],
	
d: [
  { name: 'Three-Way Valves', url: '/products/three-way-valves/'},
  { name: 'Four-Way Valves', url: '/four-way-valves/' }
],
e: [
  { name: 'IsoTech®', url: '/products/isotech/'}
],
f: [
  { name: 'Xactrol® Mark I Valves', url: '/products/control-valves/xactrol-valves-mark-i/'},
  { name: 'Xactrol® Mark II Valves', url: '/products/control-valves/xactrol-valves-mark-ii/' },
  { name: 'Xactrol® Mark III Valves', url: '/products/control-valves/xactrol-valves-mark-iii/' }
],
g: [
  { name: 'PulseJet Valves', url: '/products/low-emission-valves/'},
  { name: 'EcoPack®', url: '/products/ecopack-fugitive-emissions-packing/' }
],
h: [
  { name: 'AbrasoCheck® Slurry Check Valves', url: '/abrasocheck-slurry-check-valves/'},
  { name: 'AbrasoTech® Slurry Ball Valves', url: '/abrasotech-slurry-ball-valves/' }
],
i: [
  { name: 'Electronic Relief Valves', url: '/products/electronic-relief-valve/'}
],
j: [
  { name: 'ValvXpress® Automated Valve Packages', url: '/products/valvxpress/'}
],
k: [
  { name: 'Acid Injection Valves', url: '/acid-injection-valves/'}
],
l: [
  { name: 'Double Block-and-Bleed Valves', url: '/products/valvtechnologies-specialty-products/double-block-bleed/'}
],
m: [
  { name: 'Turbine Bypass System', url: '/products/turbine-bypass-systems/'}
],
n: [
  { name: 'Check Valves', url: '/products/check-valves/'}
],
o: [
  { name: 'ValvXpress®', url: '/products/metal-seated-ball-valves/v1-1/'},
  { name: 'EcoPack®', url: '/products/ecopack-fugitive-emissions-packing/' },
  { name: 'ValvPerformance Testing®', url: '/products/valvtechnologies-specialty-products/valvperformance-testing/' },
  { name: 'Slurry Valves', url: '/abrasocheck-slurry-check-valves/'},
  { name: 'Acid Injection Valves', url: '/acid-injection-valves/' },
  { name: 'Double Block-and-bleed Valves', url: '/products/valvtechnologies-specialty-products/double-block-bleed/' },
  { name: 'Rhinoite® Hardfacing', url: '/products/rhinoite-hardfacing/' },
  { name: 'Switch Valves', url: '/products/switching-valves/' },
  { name: 'HVOF RiTech', url: '/hvof-ritech/'},
  { name: 'Cryogenic Valves', url: '/products/valvtechnologies-specialty-products/cryogenic-valves/' }
  ]	
};
  // cache the elements so that you don't have to re-search the DOM for these elements
  var $category = $('#cat'),
    $items = $('#item'),
    $button = $('#goto');
	
var	$siteurl = window.location.origin;

  $category.change(populateSelect).trigger('change');
  $button.click(redirectToURL);

  // we are wrapping the functions within the document.ready, so that they have access to the cached elements
  function populateSelect() {
    $items.html('');

    if (dict.hasOwnProperty(this.value)) {
      dict[this.value].forEach(function(product) {
        // you can store the URL in HTML5-data attribute to use it later
        $items.append('<option data-url="' + product.url + '">' + product.name + '</option>');
      });
    }
  }

  function redirectToURL() {
    // get the URL from the selected option and redirect to it
    window.location.href = $siteurl + $items.find(':selected').data('url');
  }
});	
</script> 