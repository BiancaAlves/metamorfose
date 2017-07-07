<?php 
/* Template name: Sobre */
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
				<?php 
					if(!has_post_thumbnail()):
				?>
					<h1><?php the_title(); ?></h1>
				<?php 
					endif;
				?>
				<div class="pull-left profile">
					<img src="img/example_2.jpg" alt="Sobre o blog">
				</div>
				<p>
					<?php the_content(); ?>
				</p>
				<div class="single-social">
					<a href="#">
						<button type="button" class="btn btn-default social-button gplus"><i class="fa fa-google-plus"></i></button>
					</a>
					<a href="#">
						<button type="button" class="btn btn-default social-button instagram"><i class="fa fa-instagram"></i></button>
					</a>
					<a href="#">
						<button type="button" class="btn btn-default social-button facebook"><i class="fa fa-facebook"></i>
					</button>
					</a>
				</div>

				<?php 
					//Abrimos novamente o código PHP para terminar o while e dizer o que acontecerá se não existirem posts
					endwhile;
					else:
				?>
					<p class="no-posts">Esse blog não tem página sobre.</p>
				<?php
					endif;
				?>
			</div>

<?php get_sidebar();?>
<?php get_footer(); ?>