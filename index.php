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
      					'posts_per_page' => 3,
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
							<?php
								$categories = get_the_category();
                    			$limit=3; // Set limit here
                    			$counter=0;
                    			foreach ( $categories as $category ) {
                    				if($counter < $limit){
                    					if($category->name != 'Destaque'){
                    		?>
											<a href="<?php echo esc_url( get_category_link( $category -> term_id ) ); ?>">
												<?php 
													$labels = array('label-primary', 'label-warning', 'label-danger', 'label-success');
													$n = rand(0, 3);
													echo '<span class="label ' .  $labels[$n] . '">' 
												?>
													<?php echo $category->name; ?>
												</span>
											</a>                            	
							<?php 
										}
								$counter++; 
                    				}
                   				}
                   			?>
							<h1><?php the_title(); ?></h1>		
							<h2><?php echo get_secondary_title(); ?></h2>
						</div>
					</div>

  			<?php endwhile; ?>
  			<?php wp_reset_postdata(); ?>

			<?php else : ?>
  				<p><?php __('No News'); ?></p>
			<?php endif; ?>
			</div>
			<a class="left carousel-control" href="#carousel01" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>

			<a class="right carousel-control" href="#carousel01" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
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
						<h1><?php the_title(); ?></h1>
						<h2><?php echo get_secondary_title(); ?></h2>
						<p>
							<?php
								$categories = get_the_category();
                    			$limit=3; // Set limit here
                    			$counter=0;
                    			foreach ( $categories as $category ) {
                    				if($counter < $limit){
                    					if($category->name != 'Destaque'){
                    		?>
											<a href="<?php echo esc_url( get_category_link( $category -> term_id ) ); ?>">
												<?php 
													$labels = array('label-primary', 'label-warning', 'label-danger', 'label-success');
													$n = rand(0, 3);
													echo '<span class="label ' .  $labels[$n] . '">' 
												?>
													<?php echo $category->name; ?>
												</span>
											</a>                            	
							<?php 
										}
								$counter++; 
                    				}
                   				}
                   			?>
						</p>
						<a href="<?php the_permalink(); ?>">
							<button type="button" class="btn btn-default pull-right body-btn">Continue lendo <span class="glyphicon glyphicon-arrow-right"></span></button>
						</a>
					</div>
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
				<?php 
					if(have_posts()):
				?>
				<div class="row">
					<div class="pagination center-block text-center">
						<button type="button" class="btn btn-pagination-active">1</button>
						<button type="button" class="btn btn-pagination">2</button>
						<button type="button" class="btn btn-pagination">3</button>
						<button type="button" class="btn btn-pagination">4</button>
						<button type="button" class="btn btn-pagination">5</button>
						<button type="button" class="btn btn-default body-btn"><span class="fa-angle-double-right"></span></button>
					</div>
				</div>
				<?php 
					endif;
				?>
			</div>

			<!-- HOME END -->
			<?php get_sidebar(); ?>
			<?php get_footer(); ?>