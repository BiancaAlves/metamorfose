			<!-- SIDEBAR START: A sidebar ocupa 4 colunas médias -->
			<div class="col-xs-12 col-md-4 col-md-offset-1">
				<?php
					if(is_active_sidebar ('sidebar')){
						dynamic_sidebar('sidebar');
					}
				?>
			</div>
		</div>
	</div> <!-- Fecha o container que vem depois do header, o container de conteúdo da página -->

	<!-- SIDEBAR END -->