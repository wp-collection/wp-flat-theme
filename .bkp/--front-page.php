<?php 

    echo '<hr><h3>YOU ARE IN FRONT PAGE<h3><hr>';

    $looptype='front-page';

    get_header();

    include 'include/design-site-heading.php';

    include 'include/design-wrap-start.php';

    if(is_woocommerce()){

        echo '<p><b>woo condition...</b></p>';
        woocommerce_content();

    }else{

        if( contents_access($post) ){

            include 'include/contents-page-body.php';

        }

    }

    include 'include/design-wrap-end.php';

    include 'include/design-site-ending.php';

    get_footer();

?>