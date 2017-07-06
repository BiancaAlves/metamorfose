<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>Metamorfose Digital :: Trabalho na Internet e negócios online</title>
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

					<div class="navbar-nav btn-toolbar navbar-right social-group">
						<a href="#">
						<button type="button" class="btn btn-default navbar-btn navbar-right social-button gplus"><i class="fa fa-google-plus"></i></button>
						</a>
						<a href="#">
						<button type="button" class="btn btn-default navbar-btn navbar-right social-button instagram"><i class="fa fa-instagram"></i></button>
						</a>
						<a href="#">
						<button type="button" class="btn btn-default navbar-btn navbar-right social-button facebook"><i class="fa fa-facebook"></i>
						</button>
						</a>
					</div>

					<form class="navbar-form navbar-right form-inline search" role="search">
						<div class="form-group">
							<input type="text" placeholder="Pesquisar" class="form-control search-input">
						</button>
						</div>
						<button type="submit" value="Enviar" class="btn btn-default search-button">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</form>
				</div>
			</div>
		</div>
	</nav>

	<!-- Logo -->
	<div class="container-fluid">
		<div class="row logo">
			<div class="col-xs-8 col-xs-offset-2 col-sm-5 col-sm-offset-0 col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1">
				<img src="img/logo.png" class="img-responsive center-block  mdb-logo" alt="Metamorfose Digital">
			</div>
		</div>
	</div>

	<!-- HEADER ENDS -->