<?php
/*
Plugin Name: MDB - Redes Sociais
Description: Permite adicionar Redes Sociais na página sobre
Version: 1.0
Author: Bianca Alves
*/

add_action( 'add_meta_boxes', 'about_social_meta_boxes' );
function about_social_meta_boxes() {
    add_meta_box( 'about_social', __( 'Redes Sociais', 'textdomain' ), 'about_social_form', 'page', 'normal','high' );
}

//Função do formulário exibido no backend
function about_social_form( $post ) {
	$values = get_post_custom();
	$facebook = isset($values['facebook'] ) ? esc_attr( $values['facebook'][0] ) : '';
	$googlePlus = isset($values['googlePlus'] ) ? esc_attr( $values['googlePlus'][0] ) : '';
	$instagram = isset($values['instagram'] ) ? esc_attr( $values['instagram'][0] ) : '';
	$twitter = isset($values['twitter'] ) ? esc_attr( $values['twitter'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <table class="form-table">
		<?php 
		$redes = array(
			'Facebook' => 'facebook',
			'Google+' => 'googlePlus',
			'Instagram' => 'instagram',
			'Twitter' => 'twitter'
			);
		foreach ($redes as $redeName => $redeSlug) {
			?>
		<tr>
			<th><label for="<?php echo $redeSlug; ?>"><?php echo $redeName; ?></label></th>

			<td>
				<input type="text" name="<?php echo $redeSlug; ?>" id="<?php echo $redeSlug; ?>" value="<?php echo ${$redeSlug}; ?>" class="regular-text" /><br />
				<span class="description">Informe o link do <?php echo $redeName; ?></span>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
    <?php
}

//Função que salva o conteúdo atualizado

add_action('save_post', 'about_social_form_save');
function about_social_form_save($post_id) {
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	if( !current_user_can( 'edit_post' ) ) return;

	$allowed = array(
		'a' => array(
			'href' => array()
		)
	);

	if( isset( $_POST['facebook'] ) )
	update_post_meta( $post_id, 'facebook', esc_attr( $_POST['facebook'] ) );

	if( isset( $_POST['googlePlus'] ) )
	update_post_meta( $post_id, 'googlePlus', wp_kses( $_POST['googlePlus'], $allowed ) );
	
	if( isset( $_POST['instagram'] ) )
	update_post_meta( $post_id, 'instagram', wp_kses( $_POST['instagram'], $allowed ) );

	if( isset( $_POST['twitter'] ) )
	update_post_meta( $post_id, 'twitter', wp_kses( $_POST['twitter'], $allowed ) );
}

//Função que exibe o conteúdo no frontend

function about_social($facebook, $googlePlus, $instagram, $twitter) {
		$links = array (
			'Facebook' => $facebook,
			'Google+' => $googlePlus,
			'Instagram' => $instagram,
			'Twitter' => $twitter
			);

		MDB_Social_Widget::show_links($links);
}

?>