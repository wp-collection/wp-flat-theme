<?php 

    // add_theme_support( 'woocommerce', array(
    //     'thumbnail_image_width' => 1100,
    //     'single_image_width' => 1100,
    // ) );

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // add category header image

    // add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
    // function woocommerce_category_image() {
    //     if ( is_product_category() ){
    //         global $wp_query;
    //         $cat = $wp_query->get_queried_object();
    //         $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
    //         $image = wp_get_attachment_url( $thumbnail_id );
    //         if ( $image ) {
    //             echo '<div class="woo-category-thumbnail" alt="'.$cat->name.'" style="height:350px; background-image:url('.$image.'); background-size:cover; background-position:center; margin:20px auto;"></div>';
    //         }
    //     }
    // }


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // edit woocommerce product page via sectors
    // exemple: https://quadlayers.com/edit-woocommerce-product-page-programmatically/
    // exemple: https://www.businessbloomer.com/woocommerce-visual-hook-guide-single-product-page/

    /*
        //add video on feauterd gallery
        //https://blueliner.io/woocommerce-product-videos/
        add_action( 'woocommerce_product_options_general_product_data', 'product_video_field' );
        function product_video_field() {
            $args = array(
                'id'    => 'product_video_field',
                'label'    => sanitize_text_field( 'Product Video' ),
                'placeholder'   => 'Cut and paste video embed code here',
                'desc_tip'    => true,
                'style'    => 'height:120px'

            );
            echo woocommerce_wp_textarea_input( $args );
        }
        add_action( 'woocommerce_process_product_meta', 'product_video_field_save' );
    */


    // // product: add banner on feauterd field (the record)

    // add_action( 'woocommerce_product_options_general_product_data', 'make_product_banner_field' );
    // function make_product_banner_field() {
    //     $args = array(
    //         'id'    => 'product_banner_field',
    //         'label'    => sanitize_text_field( 'Banner del Prodotto' ),
    //         'placeholder'   => 'Copia e incolla un URL di una copertina tra i media',
    //         'desc_tip'    => true,
    //         'style'    => 'height:20px'

    //     );
    //     echo woocommerce_wp_text_input( $args );
    // }


    // // product: add banner on feauterd field (the real field)

    // add_action( 'woocommerce_process_product_meta', 'save_product_banner_field' );
    // function save_product_banner_field($post_id) {
    //     $product_banner_field = $_POST['product_banner_field'];
    //     update_post_meta($post_id, 'product_banner_field', $product_banner_field);
    // }


    // // product: print banner from feauterd assets
    // add_action( 'woocommerce_before_main_content', 'print_product_banner', 18, 0 );
    // function print_product_banner () {

    //     $checktype = "forced";
    //     //"from-input" = from the normal field and add in the url,
    //     //"from-label" = make product_banner_url custom field and add in the url,
    //     //"from-thumb" = get the image from main product thumbnail,
    //     //"forced" = if not have a field or label, is the product image
        
    //     if(is_product())
    //     {

    //         $banner_from_field = get_post_meta(get_the_ID(), 'product_banner_field', true );
    //         $banner_from_label = get_post_meta( get_the_ID(),'product_banner_url',true );

    //         if( $checktype=="forced" || ($banner_from_field && $checktype=="from-input" ) )
    //         {

    //             //print banner
    //             echo '<div class="woo-product-thumbnail" style="height:350px; background-image:url('.$banner_from_field.'); background-size:cover; background-position:center; margin:20px auto 20px auto;"></div>';
    //         }

    //         elseif( $checktype=="forced" || ($production_banner && $checktype=="from-label" ) )
    //         {
    //             //print banner
    //             echo '<div class="woo-product-thumbnail" style="height:350px; background-image:url('.$production_banner.'); background-size:cover; background-position:center; margin:20px auto 20px auto;"></div>';

    //         }

    //         elseif($checktype=="forced" || ($checktype=="from-thumb" && !($production_banner && $checktype=="from-label")) )
    //         {
                
    //             global $product;
    //             $image_id  = $product->get_image_id();
    //             $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                
    //             //try remove it from gallery
    //             clean_featured_image_from_gallery ();

    //             //print banner
    //             echo '<div class="woo-product-thumbnail" style="height:350px; background-image:url('.$image_url.'); background-size:cover; background-position:center; margin:20px auto 20px auto;"></div>';
                
    //         }

    //     }

    // }


    // // product: remove the banner from gallery

    // function clean_featured_image_from_gallery () {

    //     add_filter( 'woocommerce_single_product_image_thumbnail_html', 'hide_thumbnails_except_featured_image', 99, 2 );
    //     function hide_thumbnails_except_featured_image( $html, $attachment_id ) {

    //         global $product;
    //         $new_html = '';

    //         // gets the featured image of the product
    //         $featuted_image_id = $product->get_image_id();

    //         // hide all thumbnails except the featured image
    //         if( $featuted_image_id != $attachment_id ) $new_html = $html;

    //         return $new_html;
    //     }
    // }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // // mod mini product box in lists

    // // TRANSFORM PRODUCT THUMBNAIL INSIDE LISTS
    // // https://stackoverflow.com/questions/50773845/customizing-loop-product-image-via-a-hook-in-woocommerce

    // remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
    // add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 ); //
    // function custom_loop_product_thumbnail() {

    //     global $product;

    //     $image_size = apply_filters( 'single_product_archive_thumbnail_size', 'woocommerce_thumbnail'/*it's the size*/ ); 
    //     $image_url = $product->get_image( $image_size ) ? get_the_post_thumbnail_url( $product->ID,  $image_size ) : wc_placeholder_img( $image_size );
    //     if ( $image_url ) echo '<div class="miniproductbanner" style="height:150px; background-image:url('.$image_url.'); background-size:cover; background-position:center; margin:0 auto;"></div>';
    //     //standard image: echo $product ? '<img src="'.$product->get_image( $image_size ).'</div>"> : '';

    //     //you can access on all parts of $product!
    //     //echo '<p> '.wp_trim_words( $product->short_description, 10 ).'</p>';


    // }

    // // ADD MICRO DESCRITION ON PRODUCT BOX
    // // https://code.tutsplus.com/tutorials/woocommerce-adding-the-product-short-description-to-archive-pages--cms-25435

    // add_action( 'woocommerce_after_shop_loop_item_title', 'tutsplus_excerpt_in_product_archives', 40 );
    // function tutsplus_excerpt_in_product_archives() {
    // echo '<p>'.wp_trim_words( get_the_excerpt(), 10 ).'</p>';
    // }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // // change category/products columns quantity
    // // other exemple: https://stackoverflow.com/questions/33615903/woocommerce-choose-grid-or-list-view-for-each-category
    // //4 for category list : 4 in products list
    // add_filter('loop_shop_columns', 'loop_columns', 999);
    // function loop_columns() {
    //     return is_product_category() ? 4 : 4; 
    // }

    // /*
        // add_filter( 'loop_shop_per_page', 'redefine_products_per_page', 999 );
        // function redefine_products_per_page( $per_page ) {
        // return 12;
        // }
    // */

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // // related product refined

    // add_filter( 'woocommerce_get_related_product_cat_terms', 'remove_related_product_categories', 10, 2 );
    // function remove_related_product_categories( $terms_ids, $product_id  ){
    //     return array();
    // }

    /*- - - - - - - - - - - - - - - - - - - - - - - -*/

    // // remove sidebars on pages

    // add_filter( 'generate_sidebar_layout', function( $layout ) {
    //     // If we are on a woocommerce page, set the sidebar
    //     if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
    //         return 'no-sidebar';
    //     }
    //     // Or else, set the regular layout
    //     return $layout;
    //  } );
    
    
    /*
        Other type of functions for same goal
        
        function mb_remove_sidebar() { return false; }
        add_filter( 'is_active_sidebar', 'mb_remove_sidebar', 10, 2 );
        
        add_action( 'wp', 'remove_sidebar_product_pages' );
        function remove_sidebar_product_pages() {
            if (is_product()||is_product_category()) remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
        }
        
        function remove_wc_sidebar_conditional( $array ) {
        if ( is_product()||is_product_category() ) {return false;}
        else { return $array; }
        }
        add_filter( 'is_active_sidebar', 'remove_wc_sidebar_conditional', 10, 2 );
    */


    /*- - - - - - - - - - - - - - - - - - - - - - - -*/


    // add cart to menu

    // // Add Font Awesome to site.
    // add_action( 'wp_enqueue_scripts', 'dcwd_include_font_awesome_css' );
    // function dcwd_include_font_awesome_css() {
    //     // Enqueue Font Awesome from a CDN.
    //     wp_enqueue_style( 'font-awesome-cdn', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    // }


    // // Style the cart count number.
    // add_action( 'wp_head', 'dcwd_cart_count_styles' );
    // function dcwd_cart_count_styles() {
    // ?>
     <style>
     /* #menu-main-menu .cart { position: relative; }
     #menu-main-menu .count { background: #666; color: #fff; border-radius: 2em; height: 18px; line-height: 18px; position: absolute; right: 5px; text-align: center; top: 90%; transform: translateY(-100%) translateX(15%); width: 18px; } */
     </style>
     <?php
    // }


    // // Append cart item (and cart count) to end of main menu.
    // add_filter( 'wp_nav_menu_main-menu_items', 'am_append_cart_icon', 10, 2 );
    // function am_append_cart_icon( $items, $args ) {
    //     $cart_item_count = WC()->cart->get_cart_contents_count();
    //     $cart_count_span = '';
    //     if ( $cart_item_count ) {
    //         $cart_count_span = '<span class="count">'.$cart_item_count.'</span>';
    //     }
    //     $cart_link = '<li class="cart menu-item menu-item-type-post_type menu-item-object-page"><a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '"><i class="fa fa-shopping-bag"></i>'.$cart_count_span.'</a></li>';

    //     // Add the cart link to the end of the menu.
    //     $items = $items . $cart_link;

    //     return $items;
    // }
?>