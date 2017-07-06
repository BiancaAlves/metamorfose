<?php 

//Abaixo, as funções responsáveis por carregar as folhas de estilo e scripts

function load_scripts(){
	wp_enqueue_script('jquery', get_template_directory_uri() . "/node_modules/jquery/dist/jquery.min.js", array(), null, true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . "/node_modules/bootstrap-custom/js/bootstrap.min.js", array('jquery'), null, true);
	wp_enqueue_script('main', get_template_directory_uri() . "/js/main.js", array('jquery'), null, true);

	wp_enqueue_style('bootstrap', get_template_directory_uri() . "/node_modules/bootstrap-custom/css/bootstrap.min.css", array(), "all");
	wp_enqueue_style('font-awesome', get_template_directory_uri() . "/node_modules/font-awesome/css/font-awesome.min.css", array(), "all");
	wp_enqueue_style('style', get_template_directory_uri() . "/css/style.css", array('bootstrap', 'font-awesome'), "all");
}

add_action("wp_enqueue_scripts", "load_scripts");


//Registrando o menu

register_nav_menus(
	array(
		'main_menu' => 'Menu Principal'
	)
);

//Classe que personaliza o menu dropdown

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

//Permitindo que as postagens tenham uma imagem representativa
add_theme_support( 'post-thumbnails' );