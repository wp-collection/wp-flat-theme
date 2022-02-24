<header id="page-heading-standard bg-light">

    <?php

        $topmenu_status = get_theme_mod( 'topmenu_status_settings' ) ; 
        if(get_theme_mod( 'topmenu_layout_settings' )=='relative') $topmenu_layout = false;
        else $topmenu_layout = get_theme_mod( 'topmenu_layout_settings' );

        $heading_status = str_contains( get_theme_mod( $pagetype.'_header_style_settings' ),'off' ) ? false : true;
        $heading_frame  = str_contains( get_theme_mod( $pagetype.'_header_style_settings' ),'framed' ) ? 'container' : null;
        $heading_size   = str_contains( get_theme_mod( $pagetype.'_header_style_settings' ),'big' ) ? 'height:33vh"' : null;

        echo '<h2> PAGE TYPE: '.$pagetype.'</h2>';
    ?>

    <nav class=" navbar navbar-expand-lg bg-dark" role="navigation">

        <div class="<?php if(!$topmenu_layout){ echo $heading_frame; }elseif($topmenu_layout=='framed'){ echo 'container'; } ?>">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#">Navbar</a>

            <?php

                wp_nav_menu([

                    'theme_location'  => 'desktop-site-menu',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse text-light',
                    'container_id'    => 'bs-example-navbar-collapse-1',
                    'menu_class'      => 'navbar-nav mr-auto',
                    'menu_style'      => 'align-items: center;',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),

                ]);

                // original wp:
                // wp_nav_menu( [
                //    'theme_location' => 'desktop-site-menu',
                //    'menu_id' => 'primary-menu',
                //    'container_class'=> 'ms-auto ',
                //    'menu_class'=>'navbar-nav']
                // );

            ?>

            <?php if(get_theme_mod( 'topmenu_search_settings' )) { ?>

                <form class="form-inline my-2 my-lg-0" style="display:flex;gap:10px;" role="search" method="get" id="searchform" action="<?php home_url( '/' ) ?>" >
                    <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" value="<?php get_search_query(); ?>" name="s" id="s" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchsubmit"><i class="bi bi-search"></i></button>
                </form>

            <?php } ?> 

        </div>
    </nav>

    <?php if($heading_status) { ?>

        <div class="bg-light" id="page-heading-title">
            <div style="<?php echo $heading_size; ?>">
                <div class="<?php echo $heading_frame; ?>">

                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom-logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) echo '<img src="'.esc_url( $logo[0] ).'" alt=" ... ">';
                    ?>
                        <!-- <img src="<?php// echo the_custom_logo(); ?>" alt="..." > -->

                    <h1>
                        <?php
                            if( !empty(get_option('blogname')) ) echo get_option( 'blogname' ); else get_the_title();
                        ?>
                    </h1>

                    <?php
                        if( !empty(get_option( 'blogdescription' )) ) echo '<h2>'.get_option( 'blogdescription' ).'</h2>'; 
                    ?>

                </div>
            </div>
        </div>

    <?php } ?>

</header>