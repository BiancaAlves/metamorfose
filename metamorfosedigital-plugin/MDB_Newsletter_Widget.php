<?php
/*
Plugin Name: MDB - Widget de Newsletter
Description: Widget de Newsletter do site Metamorfose Digital Blog
Version: 1.0
Author: Bianca Alves
*/

// Registra e carrega o Widget
add_action('widgets_init', function(){
    register_widget ('MDB_Newsletter_Widget');
});

// Cria o Widget
class MDB_Newsletter_Widget extends WP_Widget {

    public function __construct(){
        $widget_options = array (
            'classname'     => 'MDB_Newsletter_Widget',
            'description'   => 'Formulário para Newsletter'
        );
        parent::__construct('newsletter_widget', 'Newsletter', $widget_options);
    }

	public function widget($args, $instance){
        echo $args['before_widget'];
		?>
		<h3><?php echo $instance['title']; ?></h3>
		<p><?php echo $instance['text']; ?></p>
		<form>
			<div class="form-group">
				<input type="text" name="nome" class="form-control" placeholder="Nome" />
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="E-mail" />
			</div>
				<button type="button" class="btn btn-default btn-block body-btn">Enviar</button>
		</form>
		<?php
		echo $args['after_widget'];
	}

	public function form($instance) {
        if (isset($instance['title'])){
            $title = $instance['title'];
        } else {
            $title = "Fique atualizado!";
        }

        if (isset($instance['text'])){
            $text = $instance['text'];
        } else {
            $text = "Assine nossa newsletter e fique por dentro de tudo sobre trabalho na Internet!";
        }

        ?>
        <p>
            <fieldset>
                <label for="<?php echo $this->get_field_id('title'); ?>"> Título: </label> 
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value = "<?php echo $title; ?>"/>
            </fieldset>
        </p>
        <p>
            <fieldset>
                <label for="<?php echo $this->get_field_id('text'); ?>"> Texto: </label> 
                <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value = "<?php echo $text; ?>"/>
            </fieldset>
        </p>
        <?php 
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);
        return $instance;
    }

}
?>