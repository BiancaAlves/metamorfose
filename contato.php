<?php 
/* Template name: Contato */

//response generation function
$response = "";
 
  //function to generate response
function my_contact_form_generate_response($type, $message){
	global $response;
 
	if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>"; 
}

//response messages
$missing_content = "Por favor, preencha todos os campos.";
$email_invalid   = "Endereço de e-mail inválido.";
$message_unsent  = "A mensagem não pôde ser enviada. Tente novamente.";
$message_sent    = "Obrigada! Sua mensagem foi enviada.";
 
//user posted variables
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
 
//php mailer variables
$to = get_option('admin_email');
$subject = get_bloginfo('name') . ": Você recebeu uma mensagem";
$headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";

//validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  my_contact_form_generate_response("error", $email_invalid);
else //email is valid
{
  //validate presence of name and message
  //send email
}

//validate presence of name and message
if(empty($name) || empty($message)){
  my_contact_form_generate_response("error", $missing_content);
}
else //ready to go!
{
  //send email
}

$sent = wp_mail($to, $subject, strip_tags($message), $headers);
if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
?>

<?php get_header(); ?>
	<?php 
		if(have_posts()):
		while(have_posts()) : the_post();
		if(has_post_thumbnail()):
	?>
	<div class="carousel-custom-container">
		<div class="row mdb-carousel">
			<div id="carousel02" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active carousel-img">
					<?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
					<div class="carousel-caption">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php 
		endif;
	?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-7">
				<div class="row">
					<?php 
						if(!has_post_thumbnail()):
					?>
					<h1 class="content-title"><?php the_title(); ?></h1>
					<?php 
						endif;
					?>
					<p><?php the_content(); ?></p>
					<?php echo $response; ?>
					<form class="form-horizontal" action="<?php the_permalink(); ?>" method="post">
						<div class="form-group">
							<label for="text" class="col-xs-12 col-md-2 control-label">Nome <i class="fa fa-asterisk obg"></i></label>
							<div class="col-xs-12 col-md-10">
								<input type="name" class="form-control" id="name" name="name" value="<?php echo esc_attr($_POST['name']); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-xs-12 col-md-2 control-label">E-mail <i class="fa fa-asterisk obg"></i></label>
							<div class="col-xs-12 col-md-10">
								<input type="email" class="form-control" id="email" name="email" value="<?php echo esc_attr($_POST['email']); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="assunto" class="col-xs-12 col-md-2 control-label">Assunto </label>
							<div class="col-xs-12 col-md-10">
								<input type="text" class="form-control" id="assunto" name="subject" value="<?php echo esc_attr($_POST['subject']); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="mensagem" class="col-xs-12 col-md-2 control-label">Mensagem </label>
							<div class="col-xs-12 col-md-10">
								<textarea class="form-control" row="10" id="mensagem" name="message" value="<?php echo esc_attr($_POST['message']); ?>">
								</textarea>
							</div>
						</div>
						<div class="col-xs-12">
							<button type="submit" class="btn btn-primary pull-right">Enviar</button>
						</div>
					</form>
					<?php 
						//Abrimos novamente o código PHP para terminar o while e dizer o que acontecerá se não existirem posts
						endwhile;
						else:
					?>
						<p class="no-posts">Esse blog não tem página de contato.</p>
					<?php
						endif;
					?>
				</div>
			</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>