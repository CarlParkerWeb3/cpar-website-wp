<?php

/*
 *   CPAR INCLUDES
 *   include custom functionality for website usage
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   INIT
 *   load custom features built into the theme
*/

     add_action( 'after_setup_theme', 'cpar_theme_includes' );

     function cpar_theme_includes() {

          foreach ( glob( CPAR_THEME_PATH . CPAR_INCLUDES . '*/init.php' ) as $feature ) :

               require_once $feature;

          endforeach;

     }