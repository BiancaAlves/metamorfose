<?php
/*
Plugin Name: MDB - Comentários
Description: Comentários personalizados para o site Metamorfose Digital Blog
Version: 1.0
Author: Bianca Alves
*/

class MDB_Walker_Comment extends Walker_Comment {
    
    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>
        
        <h3>Comentários</h3>
        <ul class="comment">
        
    <?php }
    
    /** START_LVL 
     * Starts the list before the CHILD elements are added. Unlike most of the walkers,
     * the start_lvl function means the start of a nested comment. It applies to the first
     * new level under the comments that are not replies. Also, it appear that, by default,
     * WordPress just echos the walk instead of passing it to &$output properly. Go figure.  */
    function start_lvl( &$output, $depth = 0, $args = array() ) {       
        $GLOBALS['comment_depth'] = $depth + 1; ?>

                <ul>
    <?php }

    /** END_LVL 
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        </ul><!-- /.children -->
        
    <?php }
    
    /** START_EL */

    function start_el(&$output, $comment, $depth = 0, $args = Array(), $id = 0) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment; 
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
        
        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
            <div class="pull-left profile">
                <?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>
            </div>
            <div class="comment-body">
                <cite class="fn n author-name"><?php echo get_comment_author_link(); ?></cite>
                <p id="comment-content-<?php comment_ID(); ?>">
                    <?php if( !$comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation">Seu comentário está aguardando aprovação.</em>
                    
                    <?php else: comment_text(); ?>
                    <?php endif; ?>
                </p>
                <div class="comment-options">
                    <span>
                    <a href="<?php echo htmlspecialchars( get_comment_link( get_comment_ID() ) ) ?>"><?php printf( _x( 'Há %s', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );?></a> &bullet; <?php edit_comment_link( '(Editar)' ); ?>
                    </span>
                    <!--
                    <span class="fa-lg fa-angle-up comment-up"></span>
                    <span class="fa-lg fa-angle-down comment-down"></span>
                    <span>Responder</span>
                    -->
                    <span>
                        <?php $reply_args = array(
                            'add_below' => $add_below, 
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'] );

                        comment_reply_link( array_merge( $args, $reply_args ) ); ?>
                    </span><!-- /.reply -->
                </div>
            </div>

    <?php }

    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
        
        </li><!-- /#comment-' . get_comment_ID() . ' -->
        
    <?php }
    
    /** DESTRUCTOR
     * I just using this since we needed to use the constructor to reach the top 
     * of the comments list, just seems to balance out :) */
    function __destruct() { ?>
    
    </ul><!-- /#comment-list -->

    <?php }
}

?>