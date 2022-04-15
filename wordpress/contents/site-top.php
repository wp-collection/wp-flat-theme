
<? 
    $css_banner ='';
    if( $mods->header_banner_mode == 'in-head' )
    $css_banner = get_banner_background( get_the_ID() );
?>


<div class="bg-light" id="page-heading-title">

    <div style="<?= $mods->heading_size; ?>" class="<?= $mods->heading_frame; ?>">

        <div style="position:relative;height:100%;width:100%; <?= $mods->heading_status && !$mods->header_banner_frame ? $css_banner : '' ; ?>" >

            <? if( $mods->top_menu_status ) { ?>

                <div style="position:absolute;width:100%;">
                    <nav class="navbar navbar-expand-lg bg-dark" role="navigation">

                        <div class="<?= ($mods->top_menu_layout == 'framed' ? 'container' : 'wide'); ?>" style="display:flex;justify-content:space-between;width:100%;padding:0 15px;">

                            <button class="navbar-toggler bg-light rounded-3" type="button" data-toggle="collapse" data-target="#navbar_collapse_main_menu" aria-controls="navbar_collapse_main_menu" aria-expanded="false">
                                <span class="navbar-toggler-icon">
                                    <i class="bi bi-list"></i>
                                </span>
                            </button>

                            <div>

                                <?
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                    if(has_custom_logo()){
                                        echo $mods->custom_logo_flyout
                                                ? '<a class="navbar-brand" style="float:left; padding:0; width:'.$mods->custom_logo_ratio.'px; position:absolute;aspect-ratio:1;top:0;" href="<?= home_url();?>"><img style="height:100%;"  src="'.esc_url( $logo[0] ).'" alt=" ... "></a>'
                                                : '<a class="navbar-brand" style="float:left; padding:0;" href="<?= home_url();?>"><img style="width:'.$mods->custom_logo_ratio.'px; aspect-ratio: 1; display:flex;"  src="'.esc_url( $logo[0] ).'" alt=" ... "></a>';
                                    }

                                ?>

                                <? if($mods->custom_logo_title || $mods->custom_logo_slogan) { ?>
                                    <span style="float:left; clear: right;  <?=  $mods->custom_logo_flyout ? 'position:relative; left:'.(intval($mods->custom_logo_ratio)+20).'px;' : 'transform: translate(0, -50%); top: 50%; position: absolute;'; ?>">
                                        <?

                                            if( $mods->custom_logo_title )
                                            echo '<p class="m-0 text-light"><strong>'.$mods->custom_logo_title.'</strong></p>';

                                            if( $mods->custom_logo_slogan )
                                            echo '<p class="m-0 text-secondary">'.$mods->custom_logo_slogan.'</p>';

                                        ?>
                                    </span>
                                <?}?>

                            </div>


                            <div class="row" <?= $mods->top_menu_row_type; ?>>

                                <div class="col">
                                    <div>
                                        <?

                                            // original wp:
                                            // wp_nav_menu( [
                                            //    'theme_location' => 'desktop-site-menu',
                                            //    'menu_id' => 'primary-menu',
                                            //    'container_class'=> 'ms-auto ',
                                            //    'menu_class'=>'navbar-nav']
                                            // );

                                            wp_nav_menu([
                                                'theme_location'  => 'desktop-site-menu',
                                                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                                'container'       => 'nav',
                                                'container_class' => 'collapse navbar-collapse '.$mods->top_menu_position,
                                                'container_id'    => 'navbar_collapse_main_menu',
                                                'menu_class'      => 'navbar-nav mr-auto',
                                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                                'walker'          => new WP_Bootstrap_Navwalker(),
                                            ]);

                                        ?>
                                    </div>
                                </div>

                                <? if( $mods->top_finder_status ) { ?>

                                    <div class="col d-none d-sm-none d-md-block" style="max-width: 300px;">
                                        <form class="form-inline my-2 my-lg-0" style="display:flex;gap:10px;" role="search" method="get" id="searchform" action="<?= get_bloginfo('url').'/search/'.get_search_query(); ?>" >
                                            <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" value="<?= get_search_query(); ?>" name="s" id="s" />
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchsubmit"><i class="bi bi-search"></i></button>
                                        </form>
                                    </div>

                                <? } ?> 

                            </div>

                        </>

                    </nav>
                </div>

            <? } ?>


            <? if( $mods->heading_status ) { ?>

                <div <?= $mods->header_banner_frame ? 'class="container p-0" style="height:100%;width:100%; '.$css_banner.'"':''; ?>>

                    <div style="background:rgba(0,0,0,.5);width:100%;height:100%;display:grid;align-items:center;">

                        <div class="text-white text-center">
                            
                            <?

                                $title = get_the_title();
                                if($title) echo '<h1>'.$title.'</h1>';

                                elseif( !empty(get_option('blogname')) )
                                echo '<h1>'.get_option( 'blogname' ).'</h1>';

                            ?>

                            <?

                                if(! empty(get_option( 'blogdescription' )))
                                echo '<h2>'.get_option( 'blogdescription' ).'</h2>';
                            
                            ?>
                            
                        </div>

                    </div>

                </div>

            </div>

        <? } ?>

    </div>

</div>