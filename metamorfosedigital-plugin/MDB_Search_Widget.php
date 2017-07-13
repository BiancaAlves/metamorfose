<?php
/*
Plugin Name: MDB - Widget de Pesquisa
Description: Widget de Pesquisa do site Metamorfose Digital Blog
Version: 1.0
Author: Bianca Alves
*/

function my_search_form( $form ) {
    $home_url = home_url( '/' );
    $form='
    <form class="navbar-form pull-left search" role="search" method="get" id="searchform" class="searchform" action=" ' . $home_url . ' ">
		<div class="form-group">
			<input type="text" placeholder="Pesquisar" class="form-control search-input" value="' . get_search_query() . '" name="s" id="s">
		</div>
		<div class="form-group">
    		<button type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) . '"  class="btn btn-default search-button"><i class="fa fa-search"></i>
    		</button>
		</div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );
?>