<?php
/*
Plugin Name: MDB - Menu Dropdown
Description: Personaliza o Menu Dropdown
Version: 1.0
Author: Bianca Alves
*/

class Main_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if ( array_search( 'menu-item-has-children', $item->classes ) ) {
            $output .= sprintf( "\n<li class='dropdown %s'><a href='%s' class=\"dropdown-toggle\" data-toggle=\"dropdown\" >%s<span class=\"caret\"></span></a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->url, $item->title );
        } else {
            $output .= sprintf( "\n<li %s><a href='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes) ) ? ' class="active"' : '', $item->url, $item->title );
        }
    }

    function start_lvl( &$output, $depth=0, $args = array()) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"dropdown-menu\" role=\"menu\">\n";
    }
}

?>