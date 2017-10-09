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


 ?>
