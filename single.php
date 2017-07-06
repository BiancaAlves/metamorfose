<?php 
	require_once('header.php');
?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 single-post-img">
				<img src="img/example_8.jpg" class="img-responsive" alt="Título da postagem">
			</div>
			<div class="col-xs-12 col-md-7 single-no-padding">
				<div class="col-xs-1 single-social">
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
				<div class="col-xs-11 single-post">
					<h1>Maecenas eros purus, blandit vel sollicitudin et, tincidunt ultricies lacus</h1>
					<h2>Curabitur ullamcorper dolor rutrum libero venenatis, at aliquam dolor pretium</h2>
					<p class="post-info"> 
						<span>
							<i class="fa fa-calendar-o"></i>
							<?php echo 'Há ' . human_time_diff( get_the_time('U'), current_time('timestamp') ); ?>
						</span>
						<span>
							<i class="fa fa-pencil"></i>
							Escrito por <b><?php the_autor();s ?></b>
						</span>
					</p>
					<p class="post-tags">
						<?php the_tags('<span class="label label-primary">', '</span><span class="label label-primary">', '</span>');?>
					</p>
					<p>
						<?php the_content(); ?>
					</p>
					<p>Nunc sed eros sapien. Praesent neque ex, bibendum in risus non, ornare vestibulum diam. Donec et odio vel ante varius cursus. Mauris elementum mi massa, a tempus mi aliquet id. Aliquam pellentesque vulputate metus, euismod scelerisque purus eleifend nec. Pellentesque sit amet laoreet turpis, auctor accumsan arcu. Suspendisse vel arcu libero. Praesent posuere consectetur augue sit amet consectetur. Praesent nec leo eros. Nam condimentum erat id justo ullamcorper scelerisque. Proin tempor ullamcorper purus. Maecenas rhoncus tellus ut massa lacinia efficitur. Sed faucibus libero at turpis sodales, non fermentum turpis suscipit. Suspendisse interdum et enim eget mollis. Ut facilisis lectus eu turpis facilisis tempor et ac libero.</p>
					
					<figure>
						<img src="img/example_6.jpg" alt="Imagem na postagem" class="img-responsive">
						<figcaption>Quisque nunc tortor, placerat in turpis nec, consectetur venenatis nunc</figcaption>
					</figure>
					
					<p>Nunc fermentum urna eu lorem congue, ac mattis elit luctus. Duis commodo imperdiet eros, facilisis malesuada metus egestas in. Aliquam molestie sodales dolor eget iaculis. Cras hendrerit nec orci eget elementum. Maecenas eros purus, blandit vel sollicitudin et, tincidunt ultricies lacus. Morbi in turpis vel massa aliquam consequat. Quisque interdum rhoncus massa eu consequat. Vestibulum viverra bibendum dapibus.</p>

					<p>Aliquam ut leo aliquam velit sollicitudin fermentum. Proin tempus elementum dui vitae commodo. Fusce efficitur convallis libero, ac efficitur orci. Fusce sit amet molestie augue. Phasellus sit amet sapien ut ex mattis venenatis. Aliquam erat volutpat. Curabitur fringilla aliquam elit, vitae ornare urna aliquam id. Nunc vel nisl ac dui fringilla volutpat eget a ipsum. Curabitur ullamcorper dolor rutrum libero venenatis, at aliquam dolor pretium. </p>
					
				</div>

				<!-- Fim da postagem, início dos blocos que vêm após ela -->
				<div class="col-xs-12 single-block single-about">
					<h3>Sobre o autor</h3>
					<div class="pull-left profile">
						<img src="img/slider_4.jpg" >
					</div>
					<p>
						Nunc fermentum urna eu lorem congue, ac mattis elit luctus. Duis commodo imperdiet eros, facilisis malesuada metus egestas in. Aliquam molestie sodales dolor eget iaculis. Cras hendrerit nec orci eget elementum. 
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
				</div>

				<div class="col-xs-12 single-block single-related">
					<h3>Posts relacionados</h3>
					<ul class="media-list">
						<li class="media mini-post">
							<a href="#" class="mini-post-img">
								<img src="img/example_1.jpg">
							</a>							
									<a href="#">
										<h4 class="media-heading">Ut aliquam, metus et tristique vehicula, erat felis dapibus est</h4>
										<p>Sed at ex ut risus consequat posuere a eu enim.</p>
									</a>							
						</li>

						<li class="media mini-post">
							<a href="#" class="mini-post-img">
								<img src="img/example_2.jpg">
							</a>
								<a href="#">
									<h4 class="media-heading">Nulla quis lacus volutpat</h4>
									<p>Donec blandit interdum bibendum.</p>
								</a>							
						</li>

						<li class="media mini-post">
							<a href="#" class="mini-post-img">
								<img src="img/example_3.jpg">
							</a>
								<a href="#">
									<h4 class="media-heading">Nulla at nulla massa.</h4>
									<p>Nulla non tellus ante.

</p>
								</a>
						</li>

						<li class="media mini-post">
							<a href="#" class="mini-post-img">
								<img src="img/example_4.jpg">
							</a>
								<a href="#">
									<h4 class="media-heading">Curabitur eget odio dolor</h4>
									<p>Ut facilisis lectus eu turpis facilisis tempor et ac libero

</p>
								</a>
						</li>

					</ul>
				</div>

				<div class="col-xs-12 single-block single-comments">
					<h3>Comentários</h3>
					<ul class="comment">
						<li>
							<div class="pull-left profile">
								<img src="img/slider_4.jpg" >
							</div>
							<div class="comment-body">
								<p>
									Nunc fermentum urna eu lorem congue, ac mattis elit luctus. Duis commodo imperdiet eros, facilisis malesuada metus egestas in. Aliquam molestie sodales dolor eget iaculis. Cras hendrerit nec orci eget elementum. 
								</p>
								<p> 
									Suspendisse interdum et enim eget mollis. Ut facilisis lectus eu turpis facilisis tempor et ac libero.
								</p>
								<div class="comment-options">
									<span class="fa-lg fa-angle-up comment-up"></span>
									<span class="fa-lg fa-angle-down comment-down"></span>
									<span>Responder</span>
								</div>
							</div>
							<ul>
								<li>
									<div class="pull-left profile">
										<img src="img/slider_4.jpg" >
									</div>
									<div class="comment-body">
										<p>
											Nunc fermentum urna eu lorem congue, ac mattis elit luctus. Duis commodo imperdiet eros, facilisis malesuada metus egestas in. Aliquam molestie sodales dolor eget iaculis. Cras hendrerit nec orci eget elementum. 
										</p>
										<p> 
											Suspendisse interdum et enim eget mollis. Ut facilisis lectus eu turpis facilisis tempor et ac libero.
										</p>
										<div class="comment-options">
											<span class="fa-lg fa-angle-up comment-up"></span>
											<span class="fa-lg fa-angle-down comment-down"></span>
											<span>Responder</span>
										</div>
									</div>
								</li>
								<li>
									<div class="pull-left profile">
										<img src="img/slider_4.jpg" >
									</div>
									<div class="comment-body">
										<p>
											Nunc fermentum urna eu lorem congue, ac mattis elit luctus. Duis commodo imperdiet eros, facilisis malesuada metus egestas in. Aliquam molestie sodales dolor eget iaculis. Cras hendrerit nec orci eget elementum. 
										</p>
										<p> 
											Suspendisse interdum et enim eget mollis. Ut facilisis lectus eu turpis facilisis tempor et ac libero.
										</p>
										<div class="comment-options">
											<span class="fa-lg fa-angle-up comment-up"></span>
											<span class="fa-lg fa-angle-down comment-down"></span>
											<span>Responder</span>
										</div>
									</div>
									<ul>
										<li>
											<div class="pull-left profile">
												<img src="img/slider_4.jpg" >
											</div>
											<div class="comment-body">
												<p>
													Nunc fermentum urna eu lorem congue, ac mattis elit luctus. Duis commodo imperdiet eros, facilisis malesuada metus egestas in. Aliquam molestie sodales dolor eget iaculis. Cras hendrerit nec orci eget elementum. 
												</p>
												<p> 
													Suspendisse interdum et enim eget mollis. Ut facilisis lectus eu turpis facilisis tempor et ac libero.
												</p>
												<div class="comment-options">
													<span class="fa-lg fa-angle-up comment-up"></span>
													<span class="fa-lg fa-angle-down comment-down"></span>
													<span>Responder</span>
												</div>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
					<form class="form-group">
						<textarea class="form-control" name="comment" type="text" placeholder="Comente aqui..." rows="3"></textarea>
						<button class="btn btn-default pull-right">Enviar</button>
					</form>
				</div>

			</div>

<?php 
	require_once('sidebar.php');
	require_once('footer.php');
?>

