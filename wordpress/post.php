<? if ( ! defined ( 'ABSPATH' )) exit (); ?>

<? global $post; ?>

<article>

    <!-- 
    ---- MAIN CONTENS BOX
    --->
    <main>

        <?

            if( $mods->titles_position == 'in-post' ) {

                if ( $mods->title_status ) {

                    ?><h1><?= $post->post_title; ?></h1><?
            
                }
               
                if( $mods->subtitle_status && get_post_meta( $post->ID, 'subtitle_key', true)) {

                    ?>
                        <div class="p-2"></div>
                        <h3 class="mt-2 mb-2 fs-4">
                            <?= get_post_meta( $post->ID, 'subtitle_key', true); ?>
                        </h3>
                    <?
                }
                
                if( $mods->excerpt_status && strlen(get_the_excerpt($target_excerpt) ) ) { 
                    
                    ?><div class="p-2"></div><?
                    echo the_excerpt();

                }

            }

            if( $mods->titles_position == 'in-post' ) {

                if( $mods->title_status || $mods->subtitle_status || $mods->excerpt_status ){
                    ?><div class="p-2"></div><?
                }

            }

            if( $mods->header_banner_mode == 'in-post' )
            echo '<div style="height:40vh; '.get_banner_background($post->ID).'"></div>';

        ?>

        <div class="pb-4">
            <?= the_content($post->ID); //get_post_field('post_content', $post->ID);?> 
        </div>

    </main>

    <!-- 
    ---- AUTHOR BOX
    --->

    <section class="mt-20 mb-20">

        <?

            $pa = $post->post_author;

            $display_name = get_the_author_meta( 'display_name', $pa ).' '.get_the_author_meta( 'display_surname', $pa );
            if ( empty( $display_name ) ) $display_name = get_the_author_meta( 'nickname', $pa );

            $user_description = get_the_author_meta( 'user_description', $pa );
            $user_website = get_the_author_meta('url', $pa);
            $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $pa));

            $user_youtube = get_the_author_meta('youtube_link', $pa);
            $user_facebook = get_the_author_meta('facebook_link', $pa);
            $user_twitter = get_the_author_meta('twitter_link', $pa);
            $user_pinterest = get_the_author_meta('pinterest_link', $pa);
            $user_linkedin = get_the_author_meta('linkedin_link', $pa);
            $user_instagram = get_the_author_meta('instagram_link', $pa);
            $user_whatsapp = get_the_author_meta('whatsapp_link', $pa);
            $user_rss = get_the_author_meta('rss_url_link', $pa);

        ?>

        <div class="border">

            <div class="p-3 justify-content-between">

                <?
                    $avatarurl = get_profile_image( $post->post_author ) ?: get_avatar_url( $post->post_author, 100 );
                    if( empty( $avatarurl ) || str_contains($avatarurl,'d=blank')) $avatarurl = get_template_directory_uri().'/adds/404IMAGE.PNG';
                ?>

                <span class="rounded-circle float-start" style="margin-right: 20px; display: inline-block; vertical-align: middle; aspect-ratio:1/1; width:70px; height:70px; background: url(<?= $avatarurl;?>) center/cover;"></span>

                <span>
                    <p>
                        <b class="h2"><?= $display_name; ?></b><br>
                        <? if(!empty( $user_description )){?>
                            <?= $user_description; ?></p>
                        <? } ?>
                    </p>
                </span>

            </div>

            <div class="border-top p-2">
                <a class="btn link" rel="follow" href="<?= $user_posts; ?>">BIO</a>&nbsp;⋮&nbsp; 
                <a class="btn link" rel="follow" href="<?= $user_website; ?>">WEBSITE</a>&nbsp;⋮&nbsp;
                <? if(!empty($user_youtube) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_youtube; ?>"><i class="bi bi-youtube"></i></a>
                <? if(!empty($user_facebook) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_facebook; ?>"><i class="bi bi-facebook"></i></a>
                <? if(!empty($user_twitter) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_twitter; ?>"><i class="bi bi-twitter"></i></a>
                <? if(!empty($user_pinterest) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_pinterest; ?>"><i class="bi bi-pinterest"></i></a>
                <? if(!empty($user_linkedin) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_linkedin; ?>"><i class="bi bi-linkedin"></i></a>
                <? if(!empty($user_instagram) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_instagram; ?>"><i class="bi bi-instagram"></i></a>
                <? if(!empty($user_whatsapp) )?> <a class="btn link" rel="no-follow" target="_blank" href="<?= $user_whatsapp; ?>"><i class="bi bi-whatsapp"></i></a>
            </div>

        </div>

    </section>

    <!-- 
    ---- META BOX
    --->

    <section>

        <div class="mt-4 mb-4">
            <b><?= print_theme_lang("","posted in date"); ?> : <?= get_post_field('post_date', $post->ID); ?></b>&nbsp;&nbsp;<?$categories = get_the_category(); if($categories){ ?>⋮&nbsp;&nbsp;<b><?= print_theme_lang("","Categories"); ?> :&nbsp;&nbsp;</b> <? foreach ($categories as $cat) {echo '<span class="car"><a class="btn btn-outline-primary btn-sm" href="'.get_category_link($cat->term_id).'"> '.$cat->name.' </a></span>&nbsp; ';}} $tags = get_the_tags(); if($tags) {?> &nbsp;&nbsp;⋮&nbsp;&nbsp;<b><?= print_theme_lang("","Arguments"); ?> :&nbsp;</b> <? foreach ($tags as $tag) {echo '<span class="category"><a class="btn btn-primary btn-sm" href="'.get_tag_link($tag->term_id).'"> '.$tag->name.' </a></span>&nbsp; ';}}?>
        </div>

    </section>

    <!-- 
    ---- COMMENTS BOX
    --->

    <section>

        <h3>
            <?= ($post->comment_count>0) ? "{$post->comment_count} Commenti":null; ?>
        </h3>

        <ol class="list-unstyled">

            <? 

                $comments = get_comments([
                    'post_id' => $post->ID,
                    'status' => 'approve'
                ]);

                wp_list_comments( [
                    'style'      => 'ul',
                    'classes'   => 'list-unstyled pl-3',
                    'short_ping' => true,
                    'callback' => 'bootstrap_comments'
                ], $comments );

                echo'</li>';

            ?>

        </ol>

        <? the_comments_navigation(); ?>

        <? if ( $post->comment_status == 'closed' ) { ?>

            <p class="no-comments">
                <? esc_html_e( 'Comments are closed.', 'msbdtcp' ); ?>
            </p>

        <? } else { ?>

            <? 
                $commenter = wp_get_current_commenter();

                $html_req  = " required='required'";
                $custom_fields = [
                    'author'    => '<div class="row mb-3 comment-input-wrap"><div class="col-sm-4 comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" placeholder="' . __("Name", "msbdtcp") . '" class="form-control"' . $html_req . '></div>',
                    'email'     => '<div class="col-sm-4 comment-form-email"><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes" placeholder="' . __("Email", "msbdtcp") . '" class="form-control"' . $html_req . '></div>',
                    'url'       => '<div class="col-sm-4 comment-form-url"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="form-control" size="30" maxlength="200" placeholder="' . __("Website", "msbdtcp") . '"></div></div>',
                ];
                
                $args = [
                    'fields' => $custom_fields,
                    'comment_field' =>  '<div class="row mb-3"><div class="col comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control" placeholder="' . __("Comment", "msbdtcp") . '"></textarea></div></div>',
                    'class_submit'  => 'submit btn btn-primary'
                ];

                comment_form($args);
            ?>

        <? } ?>

    </section>

</article>

<!-- 
---- COMMENTS BOX
--->