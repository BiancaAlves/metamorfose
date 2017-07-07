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

// Funções para posts mais populares @ https://digwp.com/2016/03/diy-popular-posts/
function shapeSpace_popular_posts($post_id) {
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

function shapeSpace_track_posts($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');

//Registrando a sidebar

if(function_exists('register_sidebar')){
        register_sidebar(array(
            'name'          => 'Topo do site',
            'id'            => 'navbar',
            'description'   => 'Widgets na barra de navegação',
            'before_widget' => '<div class="navbar-nav btn-toolbar navbar-right social-group">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => ''
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

// Widget para redes sociais

// Register and load the widget
add_action('widgets_init', function(){
    register_widget ('MDB_Redes_Sociais');
});
// Creating the widget 
class MDB_Redes_Sociais extends WP_Widget {

    public function __construct(){
        $widget_options = array (
            'classname'     => 'MDB_Redes_Sociais',
            'description'   => 'Link para uma Rede Social'
        );
        parent::__construct('redes_sociais', 'Rede Social', $widget_options);
    }

    // Creating widget front-end

    public function widget($args, $instance) {
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        ?>
        <a href="<?php echo $instance['link']; ?>">
            <button type="button" class="btn btn-default navbar-btn navbar-right social-button <?php echo $instance['rede']; ?>"><i class="fa fa-<?php echo $instance['rede']; ?>"></i></button>
        </a>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form($instance) {
        $rede = $instance['rede'];
        if (isset($instance['link'])){
            $link = $instance['link'];
        } else {
            $link = '#';
        }
        // Widget admin form
        ?>
       <p>
            <fieldset>
                <label for="<?php echo $this->get_field_id('rede'); ?>">Rede: </label>
                <select class="widefat" id="<?php echo $this->get_field_id('rede'); ?>" name="<?php echo $this->get_field_name('rede'); ?>">
                <?php 
                    $redes = array(
                        'facebook', 
                        'google-plus', 
                        'instagram', 
                        'twitter'
                    );

                    foreach ($redes as $the_rede) {
                        $rede_name = ($the_rede === 'google-plus') ? 'Google+' : ucfirst($the_rede);
                        ?>
                        <option name="<?php echo $the_rede; ?>" value="<?php echo $the_rede; ?>" <?php echo $the_rede === $rede ? "selected" : ""; ?>><?php echo $rede_name?></option>
                        <?php
                    }
                ?>
                </select>
            </fieldset>
        </p>
        <p>
            <fieldset>
                <label for="<?php echo $this->get_field_id('link'); ?>"> Link: </label> 
                <input class="widefat" id="'<?php echo $this->get_field_id('link'); ?>'" name="'<?php echo $this->get_field_name('link'); ?>'" type="text" value = "<?php echo $link; ?>" placeholder="Cole o link aqui" />
            </fieldset>
        </p>
        <?php 
    }
        
    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['rede'] = strip_tags($new_instance['rede']);
        $instance['link'] = strip_tags($new_instance['link']);
        return $instance;
    }
} // Widget para redes sociais termina aqui


//Widget para posts mais lidos

add_action('widgets_init', function(){
    register_widget ('MDB_Mais_Lidos');
});
// Creating the widget 
class MDB_Mais_Lidos extends WP_Widget {

    public function __construct(){
        $widget_options = array (
            'classname'     => 'MDB_Mais_Lidos',
            'description'   => 'Lista de posts mais lidos'
        );
        parent::__construct('mdb_mais_lidos', 'Posts Mais Lidos', $widget_options);
    }


    public function widget($args, $instance){
        echo $args['before-widget'];
        echo $args['before-title'];
        echo $instance['title'];
        echo $args['after-title'];
        ?>
        <ul class="media-list">
            <?php $popular = new WP_Query(array('posts_per_page'=>$instance['posts_per_page'], 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
                while ($popular->have_posts()) : $popular->the_post(); ?>
                
            <li class="media mini-post">
                <a href="<?php the_permalink(); ?>" class="mini-post-img">
                    <?php the_post_thumbnail('thumbnail', ['alt' => get_the_title()]); ?>
                </a>                            
                <a href="<?php the_permalink(); ?>">
                    <h4 class="media-heading"><?php the_title(); ?></h4>
                    <?php
                        echo '<p>'. get_secondary_title() .'</p>';
                    ?>
                </a>                            
            </li>

            <?php 
                endwhile; 
                wp_reset_postdata(); 
            ?>
        </ul>
        <?php 
        echo $args['after-widget'];
    }

    public function form($instance) {
        if(isset($instance['title'])){
            $title = $instance['title'];
        } else {
            $title = "Mais lidos";
        }
        if(isset($instance['posts_per_page'])){
            $posts_per_page = $instance['posts_per_page'];
        } else {
            $posts_per_page = 4;
        }
        ?>
        <p>
            <fieldset>
                <label for="<?php echo $this->get_field_id('title'); ?>"> Título: </label> 
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value = "<?php echo $title; ?>" placeholder="Título" />
            </fieldset>
        </p>
        <p>
            <fieldset>
                <label for="<?php echo $this->get_field_id('posts_per_page'); ?>"> Quantidade de posts a exibir: </label> 
                <input class="widefat" id="'<?php echo $this->get_field_id('posts_per_page'); ?>'" name="'<?php echo $this->get_field_name('posts_per_page'); ?>'" type="number" min="1" max="10" value = "<?php echo $posts_per_page; ?>"/>
            </fieldset>
        </p>
        <?php
    }

    public function update ($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['posts_per_page'] = strip_tags($new_instance['posts_per_page']);
        return $instance;
    }
}