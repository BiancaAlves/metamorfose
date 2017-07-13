	<!-- FOOTER START -->
		</div> <!-- Fechando o container aberto no index.php (caso a sidebar não tenha sido chamada) -->
	</div> <!-- Fechando o container aberto no index.php (caso a sidebar não tenha sido chamada) -->
	<footer class="footer">
		<div class="well">
			<div class="container">
				<div class="col-xs-12 col-sm-8">
					<div class="footer-content">
						<p>Metamorfose Digital Blog © Todos os direitos reservados</p>
						<small>Desenvolvido por <a href="#">Bianca</a></small>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="footer-pull-right footer-content">
						<?php
							if(is_active_sidebar ('footerbar')){
								dynamic_sidebar('footerbar');
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>


	<?php wp_footer(); ?>

	<!--
	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	-->
</body>
</html>