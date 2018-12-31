<?php
/**
 * The template for displaying search forms.
 *
 */
?>
<form action="/" method="get" class="search-form input-group">	   
	   
	   <input type="search" class="search-field form-control form-control-sm"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	
	<div class="input-group-append">
		
		<input type="submit" class="search-submit btn btn-light btn-sm" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
		
	</div>
	
</form>