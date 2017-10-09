<!DOCTYPE html>
<html lang = 'fr-fr'>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>"
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); wp_title("-"); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <div id="informations">
                <a href="<?= get_site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/restaurant.png" alt="logo" class="logo"></a>
            </div>

            <nav>
            <!-- comment ajouter un espace menu sachant que le menu sera administré depuis l'admin. -->
            <?php wp_nav_menu(array('theme_location' => 'Principal')); ?>
            </nav>
            <div id="description">
                <p class="text-description"><?php bloginfo('description'); ?></p>
            </div>
            <?php do_shortcode('[ultimate_ajax_login template=popmodal]'); ?>
        </header>
            <div class="clear"></div>
            <?php get_sidebar('entete'); // appel le fichier sidebar_entete.php ?>
            <div class="clear"></div>
        <section>
            <div class="conteneur">
