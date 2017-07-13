<?php

if ( post_password_required() )
    return;
?>
 
<div class="col-xs-12 single-block single-comments" id="comments">
 
    <?php if ( have_comments() ) : ?>
            <?php
            	$walker = new MDB_Walker_Comment();
                wp_list_comments( array(
                	'walker'      => $walker,
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </ul><!-- .comment-list -->
 
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-posts">Comentários desativados para essa postagem.</p>
        <?php endif; ?>
    <?php endif; // have_comments() ?>
 
    <?php 

  $comments_args = array(
  			'fields' => array(
			    'author' =>'<div class="form-group"><div class="col-xs-12 col-md-6"><label for="author"><i class="fa fa-asterisk obg"></i> Nome: </label><input class="form-control" id="author" name="author" placeholder="Ex.: João da Silva" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			      '" size="30"' . $aria_req . ' /></div>',

			    'email' =>'<div class="col-xs-12 col-md-6"><label for="email"><i class="fa fa-asterisk obg"></i> E-mail: </label><input class="form-control" id="email" name="email" placeholder="Ex.: joao.silva@email.com" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			      '" size="30"' . $aria_req . ' /></div></div>',

			    'url' =>
			      '<div class="form-group"><div class="col-xs-12"><label for="url">Site: </label><input class="form-control" id="url" name="url" placeholder="Ex.: joaodasilva.com" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			      '" size="30" /></div></div>'
			),
			// Remove "Text or HTML to be displayed after the set of comment fields".
	        'comment_notes_before' => '',
	        'comment_notes_after' => '',
  			// Change the title of send button 
  			'class_form'   =>'form-horizontal',
	        'label_submit' => __( 'Enviar', 'textdomain' ),
	        // Change the title of the reply section
	        'title_reply' => __( 'Deixe um comentário', 'textdomain' ),
            'title_reply_after' => '</h3><p>Campos obrigatórios estão marcados com <i class="fa fa-asterisk obg"></i>: </p>',
            'title_reply_to' => __('Leave a Reply to %s'),
            'cancel_reply_before' => '<span style="display: none;">',
            'cancel_reply_after' => '</span>',
	        
	        // Redefine your own textarea (the comment body).
	        'comment_field' => '<div class="form-group"><div class="col-xs-12"><label for="comment">Comentário: </label><textarea class="form-control" name="comment" type="text" placeholder="Seu comentário" rows="3"></textarea></div></div>',
	        'submit_button' => '<button type="submit" class="btn btn-primary pull-right" name="submit" d="submit">Enviar</button>'
 	);
	comment_form( $comments_args );
    cancel_comment_reply_link('<button type="submit" class="btn btn-danger pull-right" name="submit" d="submit" style="margin-right: 6px;">Cancelar resposta</button>');
    ?>


 
</div><!-- #comments -->