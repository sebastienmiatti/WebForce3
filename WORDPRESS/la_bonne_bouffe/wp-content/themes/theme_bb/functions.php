<?php
 // initialisation de notre menu:

 add_action('init', 'poles_init_menu');

    function poles_init_menu(){
        if(function_exists('register_nav_menu')){
            register_nav_menu('Principal', __('Principal', 'theme_bb'));
        }
    }


 // -- REGION / WIDGET

add_action('widgets_init', 'eprojet_init_sidebar'); // j'éxécute la fonction nommé 'poles_init_sidebar'

    function eprojet_init_sidebar(){ // fonction qui contient la déclaration de mes régions
        if(function_exists('register_sidebar')){ // si la fonction register_sidebar existe(c'est une fonction interne a WP), alors de déclare mes régions
            register_sidebar(array(
                'name' => __('region_entete', 'eprojet'),
                'id' => 'region_entete',
                'description' => __('Vous pouvez placer les widgets dans la region_entete', 'eprojet')
            ));

            register_sidebar(array(
                'name' => __('colonne de droite', 'eprojet'),
                'id' => 'colonne de droite',
                'description' => __('Vous pouvez placer les widgets dans la colonne de droite', 'eprojet')
            ));

            register_sidebar(array(
                'name' => __('region_footer', 'eprojet'),
                'id' => 'region_footer',
                'description' => __('Vous pouvez placer les widgets dans le footer', 'eprojet')
            ));

        }

    }


    function my_acf_google_map_api( $api ){ // code pour la google maps on rajout la clé api ensuite

    	$api['key'] = 'AIzaSyAFo1LGQyd1b4F1w8OJUQg4uXVEf9-m7qU';

    	return $api;

    }

    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

    // fonction permettant de récupérer des informations sur un champ

function getField($field){
    $info = get_field_object($field); // la fonction get_field_object me permet de récupérer les informations sur les champs
    $obj = new  stdClass();
    $obj->label = $info['label'];
    $obj->value = $info['value'];
    return $obj;
}

// notre fonction get_field() va construire un objet avec les informations à l'intérieur.

//---- affichage catégorie

 function showCategory(){
     $cat = '';
     $categories =  get_categories(array(
        'category_name' => 'ville',
        'orderby' => 'name',
        'exclude' => 1,
     ));

//echo '<pre>'; print_r($categories); echo '</pre>';

     foreach($categories as $category){
         $cat .= '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a><br><br>';
     }
     return $cat;
 }

// ----------------------
//---- fonction permettant de relier un restaurant a une catégorie
function showCategoryByPostType($type){
    $current_cat = get_query_var('cat');
    query_posts("post_type=$type&cat=$current_cat");
}
//-----------------------
function getImage(){
    $content = '';
    $images = get_children('post_parent' . get_the_ID() . '&post_type=attachement&post_mime_type=image&post_per_page=10');
        foreach($images as $image_id => $a){
            $content .= wp_get_attachement_image($image_id, 'medium');
        }
        return $content;
}

 ?>
