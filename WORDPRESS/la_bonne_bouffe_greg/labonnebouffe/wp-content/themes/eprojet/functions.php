<?php
//-------------------------------------------------------------------------------------------------------
add_shortcode( 'liste_pages', 'custom_shortcode' );
function custom_shortcode() {
wp_list_pages("depth=1&title_li=");
}
//-------------------------------------------------------------------------------------------------------
// --- MENU
add_action( 'init', 'eprojet_init_menu' );
function eprojet_init_menu()
{
	if(function_exists('register_nav_menu'))
	{
		register_nav_menu( 'primary', __( 'Primary Menu', 'astoned' ) );
	}
}
//-------------------------------------------------------------------------------------------------------
// --- REGION/WIDGET
add_action( 'widgets_init', 'eprojet_init_sidebar' );
function eprojet_init_sidebar()
{
	if(function_exists('register_sidebar'))
	{
		register_sidebar( array(
			'name'          => __( 'region-entete', 'eprojet' ),
			'id'            => 'region-entete',
			'description'   => __( 'Add widgets here to appear in your entete region.', 'eprojet' )
		) );
		register_sidebar( array(
			'name'          => __( 'ma-region', 'eprojet' ),
			'id'            => 'ma-region',
			'description'   => __( 'Add widgets here to appear in your ma-region region.', 'eprojet' )
		) );
		register_sidebar( array(
			'name'          => __( 'region-footer', 'eprojet' ),
			'id'            => 'region-footer',
			'description'   => __( 'Add widgets here to appear in your region.', 'eprojet' )
		) );
	}
}
//-------------------------------------------------------------------------------------------------------
function showCategory()
{
	$cat = '';
	$categories = get_categories( array('category_name' =>  'ville', 'orderby' => 'name' , 'exclude' => 1));  // on exclude la catégorie 1 appartenant a "non classé".
	// print'<pre>'; 	print_r($categories); print '</pre>';
	foreach ( $categories as $category ) {
		$cat .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><br />';
	}
	return $cat;
}
//-------------------------------------------------------------------------------------------------------
function getImage()
{
	$content = '';
	$images = get_children('post_parent='.get_the_ID() . '&post_type=attachment&post_mime_type=image&post_per_page=10');
		foreach($images as $image_id => $a)
		{
			$content .= wp_get_attachment_image($image_id, 'medium');
		}
	return $content;
}
//-------------------------------------------------------------------------------------------------------
function showCategoryByPostType($type)
{
	$current_cat = get_query_var('cat');
	query_posts("post_type=$type&cat=$current_cat");
}
//-------------------------------------------------------------------------------------------------------
function getField($field)
{
	$info = get_field_object($field);	 // permet de récupérer des informations sur un champ. //var_dump($field);
	$obj = new StdClass();
	$obj->label = $info['label'];
	$obj->value = $info['value'];
	return $obj;
}
//-------------------------------------------------------------------------------------------------------
// add_filter('the_content', 'truncate_long_title'); // cela me permettrait d'exécuter une fonction lorsque le contenu est affiché.
// add_action('save_post', 'ma_fonction', 20); // lorsqu'un contenu est enregistré.
add_filter('the_title', 'truncate_long_title');  // exécute une fonction lorsque le titre est affiché.
function truncate_long_title($title)
{
	if (strlen($title) > 50) {
		$title = substr($title, 0, 50).'...';
	}
	return $title;
}