<?php 

//Abaixo, as funções responsáveis por carregar as folhas de estilo e scripts

function load_scripts(){
	wp_enqueue_script('jquery', get_template_directory_uri() . "/node_modules/jquery/dist/jquery.min.js", array(), null, true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . "/node_modules/bootstrap-custom/js/bootstrap.min.js", array('jquery'), null, true);
	wp_enqueue_script('main', get_template_directory_uri() . "/js/main.js", array('jquery'), null, true);

	wp_enqueue_style('bootstrap', get_template_directory_uri() . "/node_modules/bootstrap-custom/css/bootstrap.min.css", array(), "all");
	wp_enqueue_style('font-awesome', get_template_directory_uri() . "/node_modules/font-awesome/css/font-awesome.min.css", array(), "all");
	wp_enqueue_style('style', get_template_directory_uri() . "/css/style.css", array('bootstrap', 'font-awesome'), "all");
    if (is_single() || is_page_template('sobre.php') || is_page_template('contato.php'))
        wp_enqueue_style('single', get_template_directory_uri() . "/css/single.css", array('bootstrap', 'font-awesome'), "all");
    $cat_id = get_query_var('cat');
    if (is_search() || !empty($cat_id) || is_author() || is_archive())
        wp_enqueue_style('results', get_template_directory_uri() . "/css/results.css", array('bootstrap', 'font-awesome'), "all");
    if (is_page_template('sobre.php') || is_page_template('contato.php'))
        wp_enqueue_style('content', get_template_directory_uri() . "/css/content.css", array('bootstrap', 'font-awesome'), "all");
}

add_action("wp_enqueue_scripts", "load_scripts");


//Registrando o menu

register_nav_menus(
	array(
		'main_menu' => 'Menu Principal'
	)
);

//Ativando alguns themes-supports
add_theme_support('post-thumbnails');
add_theme_support('custom-background');
function theme_prefix_setup() {
    
    add_theme_support( 'custom-logo', array(
        'height'      => 'auto',
        'width'       => 272,
        'flex-width' => true,
    ) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup');

//Registrando a sidebar

if(function_exists('register_sidebar')){
        register_sidebar(array(
            'name'          => 'Topo do site',
            'id'            => 'navbar',
            'description'   => 'Widgets na barra de navegação',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<span style="display:none;">',
            'after_title'   => '</span>'
        )
    );
}

if(function_exists('register_sidebar')){
        register_sidebar(array(
            'name'          => 'Ad no topo',
            'id'            => 'header_ad',
            'description'   => 'Propaganda ao lado da logo (Adicione apenas um widget)',
            'before_widget' => '<div class="footer-pull-right footer-content">',
            'after_widget'  => '</div>',
            'before_title'  => '<span style="display:none;">',
            'after_title'   => '</span>'
        )
    );
}

if(function_exists('register_sidebar')){
        register_sidebar(array(
            'name'          => 'Barra lateral',
            'id'            => 'sidebar',
            'description'   => 'Widgets na barra lateral do site',
            'before_widget' => '<div class="row sidebar-block">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        )
    );
}

if(function_exists('register_sidebar')){
        register_sidebar(array(
            'name'          => 'Rodapé',
            'id'            => 'footerbar',
            'description'   => 'Widgets no rodapé do site',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<span style="display:none;">',
            'after_title'   => '</span>'
        )
    );
}