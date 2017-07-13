<?php
/*
Plugin Name: MDB - Categorias
Description: Exibe as categorias
Version: 1.0
Author: Bianca Alves
*/
function MDB_Categories(){
	$categories = get_the_category();
	$limit=4; // Set limit here
	$counter=0;
	foreach ( $categories as $category ) {
		if($counter < $limit){
			if($category->name != 'Destaque' && $category->name != 'Sem categoria'){
	?>
				<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
					<?php 
						$labels = array('label-danger', 'label-primary', 'label-warning', 'label-success');
						if ($category->term_id % 2 === 0){
							$n = 2;
						} else if ($category->term_id % 3 === 0){
							$n = 3;
						} else if ($category->term_id % 5 === 0){
							$n = 1;
						} else {
							$n = 0;
						}
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
}
?>