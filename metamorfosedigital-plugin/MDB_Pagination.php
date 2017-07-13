<?php
/*
Plugin Name: MDB - Paginação
Description: Paginação personalizada do site Metamorfose Digital Blog
Version: 1.0
Author: Bianca Alves
*/

function MDB_Numeric_Pagination() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo "<div class='row'><div class='pagination center-block text-center'>" . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf(get_previous_posts_link('<button type="button" class="btn btn-default body-btn"><span class="fa-angle-double-left"></span></button>') );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $active = 1 == $paged ? 'btn-pagination-active' : 'btn-pagination';
        printf( '<a href="%s"><button type="button" class="btn %s">%s</button></a>' . "\n", esc_url( get_pagenum_link( 1 ) ), $active , '1' );

        if ( ! in_array( 2, $links ) )
            echo '<button type="button" class="btn btn-pagination-active">…</button>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $active = $paged == $link ? 'btn-pagination-active' : 'btn-pagination';
        printf( '<a href="%s"><button type="button" class="btn %s">%s</button></a>' . "\n", esc_url( get_pagenum_link( $link ) ), $active , $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<button type="button" class="btn btn-pagination-active">…</button>' . "\n";

        $active = $paged == $max ? 'btn-pagination-active' : 'btn-pagination';
        printf( '<a href="%s"><button type="button" class="btn %s">%s</button></a>' . "\n", esc_url( get_pagenum_link( $max ) ), $active , $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf(get_next_posts_link('<button type="button" class="btn btn-default body-btn"><span class="fa-angle-double-right"></span></button>') );

    echo '</div></div>' . "\n";

}

?>