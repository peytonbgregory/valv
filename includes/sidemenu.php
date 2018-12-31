<?php if( have_rows('product_group' , 'options') ): $i = 0; ?>   
    <div class="widget product-widget card bg-light mb-3">
    <h2 class="widget-title mb-1 pb-1 card-body">Products</h2>
		<?php while( have_rows('product_group' , 'options') ): $i++; the_row(); ?>
            
            <div aria-multiselectable="true" class="card-group sidebar-menu product-menu" id="accordion" role="tablist">
                <div class="card border-0">
                    <div class="card-header border-0" id="headingOne" role="tab">
                        <h4 class="card-title d-flex justify-content-between mb-0">
                            <a class="text-dark btn-link" href="<?php the_sub_field('main_product' , 'options'); ?>">
                                <?php the_sub_field('main_page_title' , 'options'); ?>
                            </a> 
                            <?php if( have_rows('accordion' , 'options') ): ?>
                            	<a aria-controls="section-<?php echo $i; ?>" class="expander" aria-expanded="true" data-toggle="collapse" href="#section-<?php echo $i; ?>" role="button"><i class="fas fa-plus-circle"></i></a>
	 						<?php endif;?>
                        </h4>
                    </div>
                    <?php if( have_rows('accordion' , 'options') ): ?>
                        <div aria-labelledby="headingOne" class="card-collapse collapse" id="section-<?php echo $i; ?>" role="tabcard">
                            <div class="border-top">
                                <ul class="nav flex-column">
                                    <?php while( have_rows('accordion' , 'options') ): the_row(); ?>
                                        <li class="nav-item border-bottom">
                                        <a class="nav-link" href="<?php the_sub_field('sub_product' , 'options'); ?>">
                                            <?php the_sub_field('sub_product_title' , 'options'); ?>
                                        </a> 
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        <?php endwhile;?>
    </div>
<?php endif;?>