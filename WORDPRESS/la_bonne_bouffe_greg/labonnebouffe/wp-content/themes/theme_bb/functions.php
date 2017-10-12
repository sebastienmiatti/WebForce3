<?php


// initialisation de notre menu : 
add_action('init', 'poles_init_menu');

function poles_init_menu(){
	
	if(function_exists('register_nav_menu')){
		register_nav_menu('Principal', __('Principal', 'theme_bb'));
	}
}

// --- REGION / WIDGET
add_action('widgets_init','eprojet_init_sidebar'); // j'execute la fonction nommé "eprojet_init_sidebar"

function eprojet_init_sidebar() // fonction qui contient la déclaration de mes régions
{
	if(function_exists('register_sidebar')) // si la fonction register_sidebar existe(c'est une fonction interne à wprdpress), alors je déclare des régions
	{
		register_sidebar(array(
			'name'  		=> __('region-entete', 'eprojet'),
			'id'			=> 'region-entete',
			'description' 	=> __('vous pouvez placer les widgets dans la region entete','eprojet')	
		));
		
		register_sidebar(array(
			'name'  		=> __('colonne de droite', 'eprojet'),
			'id'			=> 'colonne-droite',
			'description' 	=> __('vous pouvez placer les widgets dans la colonne de doite','eprojet')	
		));
		
		register_sidebar(array(
			'name'  		=> __('region-footer', 'eprojet'),
			'id'			=> 'region-footer',
			'description' 	=> __('vous pouvez placer les widgets dans le footer','eprojet')	
		));
	}
}

// cette fonction permet d'ajouter une clé API de sécurité pour la google MAP de l'extension ACF
function my_acf_google_map_api( $api )
{ 
	$api['key'] = 'AIzaSyBrkQzBpUEWqF7fN45QGhZ3g9frSqVfYV4'; 
	return $api; 
} 
	
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// fonction permettant de récupérer les informations sur un champ

function getField($field)
{
	$info = get_field_object($field); // permet de récupérer desx information sur un champ
	$obj = new StdClass();
	$obj->label = $info['label'];
	$obj->value = $info['value'];
	return $obj;
}
 
// notre fonction getField() va construire un objet avec les informations à l'intérieur 

//-----------------------------------------------
//--- affichage catégorie

function showCategory()
{
	$cat = '';
	$categories = get_categories(array(
		'category_name' => 'ville',
		'orderby'  		=> 'name',
		'exclude'		=> 1	
	));
	
	//echo '<pre>'; print_r($categories); echo '</pre>';
	foreach($categories as $category) 
	{
		$cat .= '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a><br>';
		//echo '<pre>'; print_r($category); echo '</pre>';
	}
	return $cat;
}	

//---------------------------------------------------
//------ fonction permettant de relier un restaurant à une catégorie
function showCategoryByPostType($type)
{
	$current_cat = get_query_var('cat');
	query_posts("post_type=$type&cat=$current_cat");
}

//---------------------------------------------------
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













