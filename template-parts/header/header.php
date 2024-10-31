<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- description -->
  <meta name="description" content="<?php if ( is_single() ) {
    single_post_title( '', true ); 
  } else {
    bloginfo( 'name' ); echo " - "; bloginfo( 'description' );
  }
  ?>" />
  
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <main class="site-main">
    <div class="site">
      <div class="wrapper">
        <div class="row">
          <div>
            <?php if( function_exists( 'the_custom_logo' ) ){
              the_custom_logo();
            }else{  ?>
              <a href="<?php esc_attr_e( esc_url( home_url( '/' ) ) )?>"><?php bloginfo( 'name' ); ?></a>
            <?php } ?>
          </div>
        </div>
      </div>