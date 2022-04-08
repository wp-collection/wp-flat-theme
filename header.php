<?

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    wc_print_notices();

?>

<? global $mods; ?>

<!DOCTYPE html>
<html lang="it">

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">

        <title>

            <? 
                $titles = explode(',', get_option( 'blogname' ).','.get_the_title());
                echo implode(' : ',$titles);
            ?>
            
        </title>

        <meta name="description" content="<?= get_bloginfo( 'description' ); ?>" />
        <meta name="keywords" content="<?= generateKeywords(); ?>">

        <link rel="shortcut icon"  type="image/x-icon" href="<?= get_template_directory_uri().'/favicon.png'; ?>" />
        
        <? wp_head(); ?>
    
    </head>
    
    <body>



        <? if ( $mods->debug_path_line ){ ?>
            <p style="background:#8b8b8b;font-size:10px;margin:0;padding:3px 5px;"> 
                you are in : <b><?=$filename;?></b> / option type : <b><?=$looptype['type']?></b> / type post data: <b><?=get_post_type();?></b>  / ...
            </p>';
        <? } ?>
        
        <? if ( $mods->top_warning ) { ?>
            <div class="bg-warning text-center">
                <p class="p-2 m-0"><?= $mods->top_warning; ?></p>
            </div>
        <? } ?>

        <header>

            <? require_once __DIR__.'/layout-top.php'; ?>

        </header>

        <div class="container p-3">

            <div class="row">

                <? require_once __DIR__.'/layout-left.php'; ?>