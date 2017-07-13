<?php
/*
Plugin Name: MDB - Widget Posts Mais Lidos
Description: Widget que exibe os posts mais lidos
Version: 1.0
Author: Bianca Alves
*/

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

// Criando o widget
class MDB_Mais_Lidos extends WP_Widget {

    public function __construct(){
        $widget_options = array (
            'classname'     => 'MDB_Mais_Lidos',
            'description'   => 'Lista de posts mais lidos'
        );
        parent::__construct('mdb_mais_lidos', 'Posts Mais Lidos', $widget_options);
    }


    public function widget($args, $instance){
        // Widget não exibido na página search.php
        if(!is_search()) {
            echo $args['before_widget'];
            echo $args['before_title'];
            echo $instance['title'];
            echo $args['after_title'];
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
            echo $args['after_widget'];
        }
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

add_action('widgets_init', function(){
    register_widget ('MDB_Mais_Lidos');
});

?>