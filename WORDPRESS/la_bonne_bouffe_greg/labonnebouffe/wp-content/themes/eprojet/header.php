<!Doctype html>
<html>
	<head <?php language_attributes(); // langue du site ?>>
	
	<title><?php bloginfo( 'name' ); /*nom du site en title*/  wp_title('-', true, 'right'); /* https://developer.wordpress.org/reference/functions/wp_title/ */ ?></title>
	<meta charset="<?php bloginfo( 'charset' ); //charset du site ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); // chemin vers le dossier du thème actif ?>/style.css">
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<?php wp_head(); // intégre des éléments indispensable à WP. Comme la barre d'administration côté FrontEnd. ?>
	</head>
    <body <?php body_class(); // correspond plus ou moins au nom de la ressource en classe css. https://codex.wordpress.org/Function_Reference/body_class ?>>
		<header>
			<div id="informations">
				<a href="<?php echo get_site_url(); // url du site dans backOffice/réglages/généraux. ?>/" class="nomDuSite"> <?php bloginfo('name'); ?></a>
			</div>
			<nav> <!-- proposer barre de menu fixed!! -->
				<?php wp_nav_menu(array('theme_location' => 'primary')); // menu principal (pourrait aussi être géré en région/widget). ?>
				<div class="clear"></div>
			</nav>
			<div id="description">
				<p class="texte-description"><?php bloginfo('description'); // description du site dans backOffice/réglages/généraux. ?></p>
			</div>
			<?php do_shortcode('[ultimate_ajax_login template=popmodal] ' ); ?>
		</header>
		<div class="clear"></div>
		<?php get_sidebar('entete'); ?>
		<div class="clear"></div>
		<section>
			<div class="conteneur">
		
		
<?php // var_dump(get_defined_vars()); // liste de toutes les variables déclarées. ?>
<!--	<div class="conteneur-video">
			<video preload poster="" autoplay>
				<source src="<?php //bloginfo('template_directory'); ?>/assets/video.webm">
				<source src="<?php //bloginfo('template_directory'); ?>/assets/video.mp4">
			</video>
		</div>
-->