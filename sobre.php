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
					<?php echo get_avatar( get_the_author_meta( 'ID' ) , 100); ?>
				</div>
				<div class="content">
					<?php the_content(); ?>
				</div>
				<div class="single-social">
				<?php 
					$facebook = get_post_meta($post->ID, $field['facebook'], true); 
					$googlePlus = get_post_meta($post->ID, $field['googlePlus'], true); 
					$instagram = get_post_meta($post->ID, $field['instagram'], true); 
					$twitter = get_post_meta($post->ID, $field['twitter'], true); 
					about_social($facebook[facebook][0], $googlePlus[googlePlus][0], $instagram[instagram][0], $twitter[twitter][0]); ?>
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