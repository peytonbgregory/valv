<?php $menu_name = 'accordion_nav';

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $menu_list = '<div class="accordion" id="menu-' . $menu_name . '">';

    foreach ( (array) $menu_items as $key => $menu_item ) {
        $title = $menu_item->title;
        $url = $menu_item->url;

        if ($menu_item->menu_item_parent == 0 ) {
        if ($parent > 0) {
        $menu_list .= "</ul>\n</div>\n</div>\n</div>\n\n";
        }
        $menu_list .= "<div class=\"accordion-group\">\n";
        $menu_list .= "<div class=\"accordion-heading\">\n";
                $menu_list .=  "<a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#menu-". $menu_name ."\" href=\"#acc-" . sanitize_title($title) . "\">\n";
                $menu_list .= $title ."\n </a>\n</div>";
                $menu_list .= "<div id=\"acc-" . sanitize_title($title) . "\" class=\"accordion-body collapse\">\n";
        $menu_list .= "<div class=\"accordion-inner\">\n";
        $menu_list .= "<ul class=\"accordion-menu\">\n";
        $parent .= +1;
        } else {
        $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
        }
    }
    $menu_list .= "</ul>\n</div>\n</div>\n</div>\n</div>\n";
    } else {
    $menu_list = '<h4>Menu "' . $menu_name . '" not defined.</h4>';
    }
echo "<!-- START ACCORDION --!>";
 echo $menu_list;
echo "<!-- END ACCORDION --!>";