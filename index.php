	<?php get_header(); ?>
	<!-- HOME STARTS -->
	<!-- Carousel -->
	<?php 
		if(have_posts()):
	?>
	<div class="carousel-container">
		<div class="row mdb-carousel">
			<div id="carousel01" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php 
   					// the query
   					$the_query = new WP_Query( array(
     					'category_name' => 'Destaque',
      					'posts_per_page' => 6,
   					)); 
				?>

				<?php if ( $the_query->have_posts() ) : ?>
  				<?php 
  					$count = 0;
  					while ( $the_query->have_posts() ) : $the_query->the_post();
  				?>

  					<?php 
  						if($count===0){
  							echo '<div class="item active carousel-img">';
  						} else {
  							echo '<div class="item carousel-img">';
  						}
  						$count++;
  					?>
						<?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
						<div class="carousel-caption">
							<?php MDB_Categories(); ?>
               			<a href="<?php the_permalink(); ?>">
							<h1><?php the_title(); ?></h1>		
							<h2><?php echo get_secondary_title(); ?></h2>
						</a>
						</div>
					</div>

  			<?php endwhile; ?>
  			<?php wp_reset_postdata(); ?>

			<?php else : ?>
  				<p><?php __('No News'); ?></p>
			<?php endif; ?>
			</div>
			<a class="left carousel-control" href="#carousel01" role="button" data-slide="prev">
				<i class="fa fa-angle-left fa-2x"></i>
			</a>

			<a class="right carousel-control" href="#carousel01" role="button" data-slide="next">
				<i class="fa fa-angle-right fa-2x"></i>
			</a>

			</div>
		</div>
	</div>
	<?php 
		endif;
	?>

	<!-- Posts -->

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-7">
				<?php 
					if(have_posts()):
					while(have_posts()) : the_post();
				?>
				<div class="row home-post">
					<div class="post-img">						
						<?php the_post_thumbnail('large', ['class' => 'img-responsive', 'alt' => get_the_title()]); ?>
					</div>
					<div class="post-text">
						<p>
							<?php MDB_Categories(); ?>
						</p>
						<a href="<?php the_permalink(); ?>">
							<h1><?php the_title(); ?></h1>
							<h2><?php echo get_secondary_title(); ?></h2>
						</a>
						<p><?php echo the_content(); ?></p>
					</div>
					<a href="<?php the_permalink(); ?>">
						<button type="button" class="btn btn-default pull-right body-btn">Continue lendo <span class="glyphicon glyphicon-arrow-right"></span></button>
					</a>
					
				</div>

			<?php 
					//Abrimos novamente o código PHP para terminar o while e dizer o que acontecerá se não existirem posts

					endwhile;
				else:
			?>
					<p class="no-posts">Esse blog ainda não tem nenhuma postagem.</p>
			<?php
				endif;
			?>

				<!-- Paginação -->
				<?php MDB_Numeric_Pagination(); ?>
			</div>

			<!-- HOME END -->
			<?php get_sidebar(); ?>
			<?php get_footer(); ?>