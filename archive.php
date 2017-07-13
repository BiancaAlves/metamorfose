<?php get_header(); ?>

	<div class="container">
		<div class="row">
			<?php 
				$cat_id = get_query_var('cat');
				if(is_author()){
					?>
					<h2 class="search-result">Posts escritos por "<?php the_author(); ?>"</h2>;
					<?php
				} else if (!empty($cat_id)){
					?>
					<h2 class="search-result">Posts na categoria "<?php echo get_cat_name($cat_id); ?>"</h2>;
					<?php
				} else {
					?>
					<h2 class="search-result">Resultados da pesquisa para "<?php the_search_query(); ?>"</h2>
					<?php
				}
			?>
			<div class="col-xs-12 col-md-7">
				<?php 
					if(have_posts()):
					while(have_posts()) : the_post();
				?>

				<div class="row home-post">
					<div class="search-post-img">						
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('large', ['class' => 'img-responsive', 'alt' => get_the_title()]); ?>
						</a>
					</div>
					<div class="post-text">
						<a href="<?php the_permalink(); ?>">
							<p><?php MDB_Categories(); ?></p>
							<h1><?php the_title(); ?></h1>
							<h2><?php echo get_secondary_title(); ?></h2>
							<p><?php echo the_content(); ?></p>
						</a>
					</div>
				</div>

			<?php 
					//Abrimos novamente o código PHP para terminar o while e dizer o que acontecerá se não existirem posts
					endwhile;
				else:
			?>
					<p class="no-posts">Não há posts desse autor.</p>
			<?php
				endif;
			?>

				<!-- Paginação -->
				<?php MDB_Numeric_Pagination(); ?>
			</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>