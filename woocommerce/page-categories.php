<? if ( ! defined( 'ABSPATH' ) ) exit; ?>

<? bootsrapped_breadcrumb(); ?>

<hr class="mb-5">

<div class="row">

<?

    // pagination of terms : https://github.com/understrap/understrap/issues/610#issuecomment-375925026

    $paged          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $per_page       = 6;
    $offset         = ($per_page * $paged) - $per_page ;
    $allelements    = wp_count_terms( 'product_cat', ['hide_empty' => true] ); 
    $totalpages     = ceil( $allelements / $per_page );

    $categories = get_terms(
        'product_cat',
        [
            'orderby' => 'id',
            'order' => 'DESC',
            'hide_empty' => true,
            'number' => $per_page,
            'offset' => $offset,
        ]
    );
    
    // if your first category is main category:
    // foreach( $categories as $category ) $category->parent==0 ? $shopid = $category->term_id : null ;
    // and set if: $category->parent!=0

    foreach( $categories as $category ){
        if( $category->parent==0 && $category->name!='Uncategorized' ) {
            
            ?>

                <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

                    <div class="archivie-post card mx-auto">

                        <div style="height:200px; <?= get_banner_background($category->term_id); ?>"></div>

                        <div class="card-body">

                            <h2 class="card-title"><?= $category->name; ?></h2>

                            <div class="card-text" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                                <p>
                                    <?
                                         $abstract = $category->description;
                                         print strlen($abstract)>=150 ? substr($abstract,0,150) : $abstract;
                                    ?>
                                </p>
                            </div>

                            <a class="btn card-link" href="<?= get_category_link($category->term_id); ?>">Read now ...</a>

                        </div>

                    </div>

                </div>
            <?
        }
    }

    if($totalpages>1){

        $pages = paginate_links( [
            'base'      => str_replace( 999, '%#%', esc_url( get_pagenum_link( 999 ) ) ),
            'total'     => $totalpages,
            'current'   => max( 1, get_query_var('paged') ),
            'format'    => '?paged=%#%',
            'type'      => 'array',
        ] );

        if( is_array( $pages ) ) {

            echo '<div class="d-flex justify-content-center"><nav aria-label="Page navigation"><ul class="pagination">';

            foreach ( $pages as $page )
            echo '<li class="page-item">'.preg_replace('/page-numbers/','page-numbers page-link',$page).'</li>';

            echo '</ul></nav></div>';
        }

    }

?>

</div>
