			<!-- SIDEBAR START: A sidebar ocupa 4 colunas médias -->
			<div class="col-xs-12 col-md-4 col-md-offset-1">
				<?php
					if(is_active_sidebar ('sidebar')){
						dynamic_sidebar('sidebar');
					}
				?>

				<div class="row sidebar-block">
					<h3>Sobre a autora</h3>
						<div class="media">
							<div class="pull-left profile">
								<img src="img/slider_4.jpg" >
							</div>
							<div class="media-body">
								<p>Texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto</p>

								<button type="button" class="btn btn-default pull-right body-btn">Continue lendo <span class="glyphicon glyphicon-arrow-right"></span></button>
							</div>
						</div>
				</div>

				<div class="row sidebar-block">
					<h3>Fique atualizado</h3>
					<p>Assine nossa newsletter e fique por dentro de tudo sobre trabalho na Internet!</p>
					<form>
						<div class="form-group">
							<input type="text" name="nome" class="form-control" placeholder="Nome" />
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="E-mail" />
						</div>
							<button type="button" class="btn btn-default btn-block body-btn">Enviar</button>
					</form>
				</div>

			</div>
		</div>
	</div> <!-- Fecha o container que vem depois do header, o container de conteúdo da página -->

	<!-- SIDEBAR END -->