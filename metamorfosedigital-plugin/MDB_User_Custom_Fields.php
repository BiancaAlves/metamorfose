<?php
/*
Plugin Name: MDB - Campos customizados para usuário
Description: Permite que o usuário Wordpress adicione Redes Sociais
Version: 1.0
Author: Bianca Alves
*/

//Criando o campo personalizado

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Redes Sociais</h3>

	<table class="form-table">
		<?php 
		$redes = array(
			'Facebook' => 'facebook',
			'Google+' => 'google-plus',
			'Instagram' => 'instagram',
			'Twitter' => 'twitter'
			);
		foreach ($redes as $redeName => $redeSlug) {
			?>
		<tr>
			<th><label for="<?php echo $redeSlug; ?>"><?php echo $redeName; ?></label></th>

			<td>
				<input type="text" name="<?php echo $redeSlug; ?>" id="<?php echo $redeSlug; ?>" value="<?php echo esc_attr( get_the_author_meta($redeSlug, $user->ID)); ?>" class="regular-text" /><br />
				<span class="description">Informe seu link do <?php echo $redeName; ?>.</span>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
<?php
}

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'google-plus', $_POST['google-plus'] );
	update_usermeta( $user_id, 'instagram', $_POST['instagram'] );
}

function my_author_box() {
		$links = array (
			'Facebook' => get_the_author_meta('facebook'),
			'Google+' => get_the_author_meta('google-plus'),
			'Instagram' => get_the_author_meta('instagram'),
			'Twitter' => get_the_author_meta('twitter'),
			);

		MDB_Social_Widget::show_links($links);
}
?>