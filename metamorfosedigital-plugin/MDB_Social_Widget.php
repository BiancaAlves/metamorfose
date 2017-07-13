<?php
/*
Plugin Name: MDB - Widget Rede Social
Description: Widget que exibe um link para Rede Social
Version: 1.0
Author: Bianca Alves
*/


// Registra e carrega o Widget
add_action('widgets_init', function(){
    register_widget ('MDB_Social_Widget');
});

// Cria o Widget
class MDB_Social_Widget extends WP_Widget {

    public function __construct(){
        $widget_options = array (
            'classname'     => 'MDB_Redes_Sociais',
            'description'   => 'Link para uma Rede Social'
        );
        parent::__construct('redes_sociais', 'Rede Social', $widget_options);
    }

    // Cria o front do widget

    public function widget($args, $instance) {
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        ?>
        <a href="<?php echo $instance['link']; ?>" target="_blank">
            <button type="button" class="btn btn-default navbar-btn social-button <?php echo $instance['rede']; ?>"><i class="fa fa-<?php echo $instance['rede']; ?>"></i></button>
        </a>
        <?php
        echo $args['after_widget'];
    }

    // Cria o back do widget 
    public function form($instance) {
        $rede = $instance['rede'];
        if (isset($instance['link'])){
            $link = $instance['link'];
        } else {
            $link = '#';
        }
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
        
    // Faz o Update do Widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['rede'] = strip_tags($new_instance['rede']);
        $instance['link'] = strip_tags($new_instance['link']);
        return $instance;
    }

    //Exibir redes sociais em outros lugares
    public static function show_links($redes){
        foreach ($redes as $nome => $link) {
            if($link){
                ?>
                <a href="<?php echo $link; ?>" target="_blank">
                    <button type="button" class="btn btn-default navbar-btn social-button <?php echo $nome==='Google+' ? 'google-plus' : lcfirst($nome); ?>"><i class="fa fa-<?php echo $nome==='Google+' ? 'google-plus' : lcfirst($nome); ?>"></i></button>
                </a>
                <?php
            }
        }
    }

}