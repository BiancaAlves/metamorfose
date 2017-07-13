<?php
/*
Plugin Name: MDB - Widget Sobre
Description: Widget que exibe um trecho da página Sobre
Version: 1.0
Author: Bianca Alves
*/

// 4. Widget Sobre

add_action('widgets_init', function(){
    register_widget ('MDB_Sobre');
});

// Criando o widget 
class MDB_Sobre extends WP_Widget {

    public function __construct(){
        $widget_options = array (
            'classname'     => 'MDB_Sobre',
            'description'   => 'Parte da página Sobre'
        );

        parent::__construct('mdb_sobre', 'Sobre', $widget_options);
    }

    public function widget($args, $instance){
        ?>
            <?php 
            // Conseguindo a ID da página sobre
            $page_args = [
                'post_type' => 'page',
                'fields' => 'ids',
                'nopaging' => true,
                'meta_key' => '_wp_page_template',
                'meta_value' => 'sobre.php'
            ];
            
            $pages = get_posts( $page_args );
            
            foreach ( $pages as $page ) 
                $sobreid = $page;

            //Não exibirá o widget se o usuário já está na página sobre
            if(!is_page($sobreid)){
                // Instanciando a classe WP_Query com a id da página sobre
                $post_args = array(
                  'p'         => $sobreid,
                  'post_type' => 'page'
                );
                $sobre = new WP_Query($post_args);
                if ($sobre->have_posts()){
                    $sobre->the_post();
                }
                // Agora temos a página sobre. Abaixo, o front do widget
                echo $args['before_widget'];
                echo $args['before_title'];
                the_title();
                echo $args['after_title'];
                ?>
                <div class="media">
                    <div class="pull-left profile">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 80); ?>
                    </div>
                    <div class="media-body">
                        <p><?php the_content('...', true); ?></p>
                        <a href="<?php the_permalink(); ?>">
                            <button type="button" class="btn btn-default pull-right body-btn">Continue lendo <span class="glyphicon glyphicon-arrow-right"></span></button>
                        </a>
                    </div>
                </div>
                <?php 
                wp_reset_postdata(); 
                echo $args['after_widget'];
            }
    }

    public function form($instance) {
        ?>
        <?php
    }

    public function update ($new_instance, $old_instance){
        $instance = array();
        return $instance;
    }
}
?>