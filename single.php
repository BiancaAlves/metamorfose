<?php 
	require_once('header.php');
?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 single-post-img">
				<?php if( have_posts() ) the_post(); ?>
				<?php the_post_thumbnail('full', ['class' => 'img-responsive', 'alt' => get_the_title()]); ?>
			</div>
			<div class="col-xs-12 col-md-7 no-padding">
				<div class="col-xs-1 single-social">
					<a href="#">
						<button type="button" class="btn btn-default social-button google-plus"><i class="fa fa-google-plus"></i></button>
						</a>
						<a href="#">
						<button type="button" class="btn btn-default social-button instagram"><i class="fa fa-instagram"></i></button>
						</a>
						<a href="#">
						<button type="button" class="btn btn-default social-button facebook"><i class="fa fa-facebook"></i>
						</button>
					</a>
				</div>
				<div class="col-xs-11 single-post">
					<h1><?php the_title(); ?></h1>
					<h2><?php echo get_secondary_title(); ?></h2>
					<p class="post-info"> 
						<span>
							<i class="fa fa-calendar-o"></i>
							<?php echo 'Há ' . human_time_diff( get_the_time('U'), current_time('timestamp') ); ?>
						</span>
						<span>
							<i class="fa fa-pencil"></i>
							Escrito por <b><?php the_author(); ?></b>
						</span>
					</p>
					<p class="post-tags">
						<?php MDB_Categories(); ?>
					</p>
					<div class="content">
						<?php the_content(); ?>
					</div>
					
				</div>

				<!-- Fim da postagem, início dos blocos que vêm após ela -->
				<div class="col-xs-12 single-block single-about">
					<?php
						$author_link = get_the_author_link(); 
						$hasLink = stripos($link, "href=");
					?>
					<h3><small>Sobre o autor</small><br/> <?php echo empty(!$hasLink) ? the_author_link() : the_author_posts_link(); ?></h3>
					<div class="pull-left profile">
						<?php echo get_avatar( get_the_author_meta( 'ID' ) , 80); ?>
					</div>
					<p>
						<?php the_author_description(); ?>
					</p>
					<div class="single-social pull-right">
						<?php my_author_box(); ?>
					</div>
				</div>

					<?php MDB_Related_Posts(); ?>
					<?php comments_template( '', true ); ?>

			</div>

<?php 
	require_once('sidebar.php');
	require_once('footer.php');
?>

