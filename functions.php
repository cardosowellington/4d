<?php

// 
//function to add new scripts and styles
//
function wp_cpw_load_scripts(){
  // script
  wp_enqueue_script( '4d-app', get_stylesheet_directory_uri(). '/dist/app.js', array( 'jquery' ), true );

  // style
  wp_enqueue_style( '4d-style', get_stylesheet_uri(), array(), '1.0', 'all' );
  wp_enqueue_style( '4d-app', get_stylesheet_directory_uri() .'/dist/app.css', array( '4d-style' ), '1.0', 'all' );

}
add_action( 'wp_enqueue_scripts', 'wp_cpw_load_scripts' );


//
//this is theme support setting 
//
function wp_cpw_config(){

  // register menu
  register_nav_menus(
    array(
      'wp_cpw_main_menu'  => esc_html__( 'Main menu', '4d' ),
      'wp_cpw_footer_menu'  => esc_html__( 'Footer menu', '4d' )
    )
  );

  add_theme_support( 'post-thumbnails' );
  //logo header
  add_theme_support(
    'custom-logo', 
    array(
      'width'         => true,
      'height'        => true,
      'flex-height'   => true,
      'flex-width'    => true
    )
  );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'html5', 
    array( 
      'comment-list', 
      'comment-form', 
      'search-form', 
      'gallery', 
      'caption', 
      'style', 
      'script'
    ) 
  );

  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );

  // theme support gutenberg
  add_theme_support( 'responsive-embeds' );
  add_theme_support( 'editor-styles' );
  add_editor_style( 'style-editor.css' );
  add_theme_support( 'wp-block-styles' );    
}
add_action( 'after_setup_theme', 'wp_cpw_config',0 );

function wp_cpw_register_block_styles(){
  wp_register_style( 'wp-cpw-style-block', get_template_directory_uri() . '/style-block.css' );
  register_block_style(
    'core/quote',
    array(
      'name' => 'primary-quote',
      'label' => 'Primary Quote',
      'is_default' => true,
      'style_handle' => 'wp-cpw-style-block',
    )
  );
}
add_action( 'init', 'wp_cpw_register_block_styles' );

//
// this is body class
//
function wp_modify_body_classes( $classes, $class ){
  if( is_front_page() ){
    $class[] = 'cardoso-wellington';
    $classes = array_merge( $classes, $class );
  }
  return $classes;
}
add_filter( 'body_class', 'wp_modify_body_classes', 10, 2 );

// if the wp version is less then 5.2 we will create the wp_body_open function
if( ! function_exists( 'wp_body_open' ) ){
  function wp_body_open(){
    do_action( 'wp_body_open' );
  }
}