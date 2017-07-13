<?php
/*
Plugin Name: MDB - Posts Relacionados
Description: Exibe Posts Relacionados
Version: 1.0
Author: Bianca Alves
*/

// Related posts function

function MDB_Related_Posts() {
    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
        $tag_ids = array();
            
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

        $args=array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=>4, // Number of related posts that will be shown.
            'caller_get_posts'=>1
        );
        $my_query = new wp_query( $args );
        if( $my_query->have_posts() ) {
        echo '<div class="col-xs-12 single-block single-related"><h3>Posts relacionados</h3>
            <ul class="media-list">';
        while( $my_query->have_posts() ) {
            $my_query->the_post(); ?>

            <li class="media mini-post">
                <a href="#" class="mini-post-img">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </a>
                <a href="<? the_permalink()?>">
                    <h4 class="media-heading"><?php the_title(); ?></h4>
                    <p><?php echo get_secondary_title(); ?></p>
                </a>                            
            </li>
            <? }
            echo '</ul></div>';
        }
    }
    $post = $orig_post;
    wp_reset_query();
}

?>