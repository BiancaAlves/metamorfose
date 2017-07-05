	<?php
	//Chamando o header
		require_once('header.php');
	?>
	<!-- HOME STARTS -->
	<!-- Carousel -->

	<div class="carousel-container">
		<div class="row mdb-carousel">
			<div id="carousel01" class="carousel slide" data-ride="carousel">

			<div class="carousel-inner">
				<div class="item active carousel-img">
					<img src="img/example_1.jpg" alt="Foto 1">
					<div class="carousel-caption">
						<span class="label label-danger">Hashtag 1</span>
						<span class="label label-success">Hashtag 2</span>
						<h1>Nulla feugiat vitae elit eget rhoncus</h1>		
						<p>Praesent euismod enim nibh, at egestas nulla rutrum eget</p>
					</div>
				</div>
				<div class="item carousel-img">
					<img src="img/example_2.jpg" alt="Foto 2">
					<div class="carousel-caption">
						<span class="label label-danger">Hashtag 1</span>
						<span class="label label-success">Hashtag 2</span>
						<h1>Donec blandit interdum bibendum</h1>		
						<p>Vivamus at risus accumsan, pharetra mauris ut, convallis nibh</p>
					</div>
				</div>
				<div class="item carousel-img">
					<img src="img/example_3.jpg" alt="Foto 3">
					<div class="carousel-caption">
						<span class="label label-danger">Hashtag 1</span>
						<span class="label label-success">Hashtag 2</span>
						<h1>Duis feugiat, libero non fermentum interdum, mauris mauris sodales turpis</h1>		
						<p>Vestibulum finibus orci vitae odio aliquam condimentum</p>
					</div>
				</div>
				<div class="item carousel-img">
					<img src="img/example_4.jpg" alt="Foto 4">
					<div class="carousel-caption">
						<span class="label label-danger">Hashtag 1</span>
						<span class="label label-success">Hashtag 2</span>
						<h1>Mauris vestibulum dolor sit amet commodo dignissim</h1>		
						<p>Sed at ex ut risus consequat posuere a eu enim</p>
					</div>
				</div>
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

	<!-- Posts -->

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-7">
				<div class="row home-post">
					<div class="post-img">
						<img src="img/example_1.jpg" class="img-responsive">
					</div>
					<div class="post-text">
						<h1>Lorem ipsum dolor sit amet, </h1>
						<h2>Sed vehicula mollis fringilla. Donec ac rutrum nisl. Suspendisse pretium euismod imperdiet.</h2>
						<a href="single.php">
							<button type="button" class="btn btn-default pull-right body-btn">Continue lendo <span class="glyphicon glyphicon-arrow-right"></span></button>
						</a>
					</div>
				</div>
				
				<div class="row home-post">
					<div class="post-img">
						<img src="img/example_2.jpg" class="img-responsive">
					</div>
					<div class="post-text">
						<h1>Lorem ipsum dolor sit amet, </h1>
						<h2>Sed vehicula mollis fringilla. Donec ac rutrum nisl. Suspendisse pretium euismod imperdiet.</h2>
						<a href="single.php">
							<button type="button" class="btn btn-default pull-right body-btn">Continue lendo <span class="glyphicon glyphicon-arrow-right"></span></button>
						</a>
					</div>
				</div>
				
				<div class="row home-post">
					<div class="post-img">
						<img src="img/example_3.jpg" class="img-responsive">
					</div>
					<div class="post-text">
						<h1>Lorem ipsum dolor sit amet, </h1>
						<h2>Sed vehicula mollis fringilla. Donec ac rutrum nisl. Suspendisse pretium euismod imperdiet.</h2>
						<a href="single.php">
							<button type="button" class="btn btn-default pull-right body-btn">Continue lendo <span class="glyphicon glyphicon-arrow-right"></span></button>
						</a>
					</div>
				</div>

				<!-- Paginação -->
				<div class="row">
					<div class="pagination center-block text-center">
						<button type="button" class="btn btn-default">1</button>
						<button type="button" class="btn btn-default">2</button>
						<button type="button" class="btn btn-default">3</button>
						<button type="button" class="btn btn-default">4</button>
						<button type="button" class="btn btn-default">5</button>
						<button type="button" class="btn btn-default body-btn">Next <span class="fa-angle-double-right"></span></button>
					</div>
				</div>
			</div>

			<!-- HOME END -->
			<?php
			//Chamando a sidebar e o footer
				require_once('sidebar.php');
				require_once('footer.php');
			?>