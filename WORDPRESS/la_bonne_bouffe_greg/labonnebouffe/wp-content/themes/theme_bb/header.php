<!Doctype html>
<html>
	<head>
		<title><?php bloginfo('name'); wp_title('-')?></title>
		<meta name="viewport" content="width=device-with, initial-scale=1" />
		<meta charset="<?php bloginfo('charset'); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<header>
			<div id="informations">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/logo.png" id="logo"/></a>
			</div>
			
			<nav>
			<!-- On verra plus tard comment ajouter un espace pour le menu ici. Sachant que le menu sera administré depuis l'admin. -->
			<?php wp_nav_menu(array('theme_location' => 'Principal')) ?>
			</nav>
		
			<div id="description">
				<p class="text-description"><?php bloginfo('description'); ?></p>
			</div>
			<?php do_shortcode('[ultimate_ajax_login template=popmodal]'); ?>
		</header>
			<div class="clear"></div>
				<?php get_sidebar('entete'); // appel le fichier sidebar-entete.php ?>
			<div class="clear"></div>
		<section>
			<div class="conteneur">
		
		
		
		