
<div>

    <div class="mb-5 border-bottom border-dark">

        <? if ( is_category() && !is_category('blog') ) { ?>
            
            <p class="h1">Category Posts :</p>

        <? } else if ( is_tag() ) { ?>

            <p class="h1">Posts whit Tag :</p>
                
        <? } else  { ?> 

            <p class="h1">Posts of Blog</p>

        <?php } ?>

    </div>

    <div class="row">

        <?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>

            <?php if ( ! post_password_required() ) { ?>

                <div class="col-md-4 col-sm-6 col-xs-12 mb-4">

                    <div class="archivie-post card mx-auto">

                        <?php

                            $bkgUrl = get_the_post_thumbnail_url( get_the_ID() );

                            if($bkgUrl)
                            echo '<div style="height:200px; background: url('.$bkgUrl.') center/cover;"></div>';

                            else
                            echo '<div style="height:200px; background: url('.bloginfo('template_directory').'/adds/404IMAGE.PNG) center/cover;"></div>';

                        ?>

                        <div class="card-body">

                            <h2 class="card-title"><?php the_title();?></h2>
                            <p class="card-date"><?php get_the_date();?></p>
                            <div class="card-text" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                                <p><?php the_excerpt();?></p>
                            </div>
                            <a class="btn card-link" href="<?php the_permalink();?>">Read now ...</a>

                        </div>

                    </div>

                </div>

            <?php } else { include 'include/contents-not-accessible.php'; } ?>

        <?php } } else { include 'include/contents-not-in-database.php'; } ?>

    </div>

    <?php loop_pagination($wp_query); ?>

</div>