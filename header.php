<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title><?php echo get_bloginfo('name') . " :: " . get_bloginfo('description'); ?></title>
	<?php wp_head(); ?>
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,800" rel="stylesheet">
</head>
<body>
	<!-- HEADER STARTS -->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
					<button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#elementoCollapse1" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
			      	</button>
		      	<div class="collapse navbar-collapse" id="elementoCollapse1">
		      		<?php wp_nav_menu(array(
		      			'theme_location'=>'main_menu',
		      			'container' => 'ul',
		      			'menu_class' => 'nav navbar-nav',
		      			'walker' => new Main_Walker_Nav_Menu()
		      		));
		      		?>
		      		<div class="navbar-right social-group">
			      		<?php 
			      			get_sidebar('navbar');
			      		?>
		      		</div>
				</div>
			</div>
		</div>
	</nav>

	<!-- Logo -->
	<div class="container">
		<div class="row logo">
			<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-0">
				<div class="logo-box">
					<a href="<?php echo home_url('/'); ?>">
						<?php 
							$custom_logo_id = get_theme_mod('custom_logo');
							$logo = wp_get_attachment_image_src($custom_logo_id , 'full' );
							if ( has_custom_logo() ) {
							        echo '<img src="'. esc_url( $logo[0] ) .'" class="img-responsive center-block mdb-logo">';
							        echo '<h2>' . get_bloginfo('description') .'</h2>';
							} else {
							        echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
							}
						?>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-md-7 col-md-offset-1">
				<div class="ad"></div>
			</div>
		</div>
	</div>

	<!-- HEADER ENDS -->