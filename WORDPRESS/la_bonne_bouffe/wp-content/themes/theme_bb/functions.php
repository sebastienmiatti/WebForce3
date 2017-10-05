<?php
 // initialisation de notre menu:

 add_action('init', 'poles_init_menu');

    function poles_init_menu(){
        if(function_exists('register_nav_menu')){
            register_nav_menu('Principal', __('Principal', 'theme_bb'));
        }
    }


 ?>
