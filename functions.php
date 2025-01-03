<?php

// this is for boostrapnavworker
require_once('bootsrapNavWorker.php') ;

// this is function to add custom styles

function hicham_add_style(){
    wp_enqueue_style("boostrap_styling" , get_template_directory_uri()."/css/bootstrap.min.css") ;
    wp_enqueue_style("the-fonts" , get_template_directory_uri()."/css/v5-font-face.min.css") ;
    wp_enqueue_style("main-css" , get_template_directory_uri()."/css/main.css" );
}

// this is function to add custom scripts

function hicham_add_scripts(){
    wp_deregister_script('jquery') ; // remove regestration of jquery
    wp_register_script("jquery" , includes_url("/js/jquery/jquery.js") , array() , false , true) ; // regester jquery again but it will  called in footer
    wp_enqueue_script("boostsrap-js" , get_template_directory_uri()."/js/bootstrap.min.js" , array("jquery"),false , true ) ;
    wp_enqueue_script("main-js" , get_template_directory_uri()."/js/main.js" , array(),false , true ) ;
}

// adding the styles and scripts using [wp_enqueue_scripts]
add_action( 'wp_enqueue_scripts', 'hicham_add_style' );
add_action( 'wp_enqueue_scripts', 'hicham_add_scripts' );

/*
* this is for adding custom menu to our them to have abalty
* of custom menu
*/
function add_custom_menu(){
    // register_nav_menu('primaray' , __("primary menu"));
    register_nav_menus(array(
        "primaray"=>"primary menu",
        "footer menu" =>"menu for footer" ,
    ));
}
add_action("init" , "add_custom_menu" );
// this is function is to add menu to a choised place i DOM

function add_menu_to_dom(){
    wp_nav_menu(
        array(
            "theme_location"=>"primaray",
            "menu_class"=>"navbar-nav" ,
            'container' => false ,
            "depth"=>2 ,
            "walker"=>new bootstrap_5_wp_nav_menu_walker() , // from the bootsrapNavWolker included
        )
    );
}
/*
*add featured iamge to our them
*/
function add_featured_image(){
  add_theme_support('post-thumbnails');

}
add_action('after_setup_theme', 'add_featured_image');
// function to control how many words should be
// dipslay when we use excerpt wp built in function
function control_excerp_length($length){
    return 10 ;
}
add_filter("excerpt_length" , "control_excerp_length");
