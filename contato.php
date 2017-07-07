<?php 
/* Template name: Contato */
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
					<h1><?php the_title(); ?></h1>
					<?php 
						endif;
					?>
					<p><?php the_content(); ?></p>
					<form class="form-horizontal">
						<div class="form-group">
							<label for="text" class="col-xs-12 col-md-2 control-label">Nome </label>
							<div class="col-xs-12 col-md-10">
								<input type="name" class="form-control" id="name">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-xs-12 col-md-2 control-label">E-mail </label>
							<div class="col-xs-12 col-md-10">
								<input type="email" class="form-control" id="email">
							</div>
						</div>
						<div class="form-group">
							<label for="assunto" class="col-xs-12 col-md-2 control-label">Assunto </label>
							<div class="col-xs-12 col-md-10">
								<input type="email" class="form-control" id="assunto">
							</div>
						</div>
						<div class="form-group">
							<label for="mensagem" class="col-xs-12 col-md-2 control-label">Mensagem </label>
							<div class="col-xs-12 col-md-10">
								<textarea class="form-control" row="10" id="mensagem">
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