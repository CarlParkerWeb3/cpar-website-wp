<?php

/*
 *   WORDPRESS FUNCTIONS
 *   https://developer.wordpress.org/themes/basics/theme-functions/
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   DEFINITIONS
 *   define values needed for website usage
*/

     define( 'CPAR_DOMAIN', $_SERVER[ 'SERVER_NAME' ] );

     // THEME

     define( 'CPAR_THEME', 'cpar-website-wp' );
     define( 'CPAR_THEME_PATH', trailingslashit( get_template_directory() ) );
     define( 'CPAR_THEME_URL', trailingslashit( get_template_directory_uri() ) );

     // DIRECTORIES

     define( 'CPAR_ADMIN', trailingslashit( 'cpar-admin' ) );
     define( 'CPAR_CONTENT', trailingslashit( 'cpar-content' ) );
     define( 'CPAR_INCLUDES', trailingslashit( 'cpar-includes' ) );

     define( 'CPAR_BLOCKS', trailingslashit( CPAR_CONTENT . 'blocks' ) );
     define( 'CPAR_FIELDS', trailingslashit( CPAR_CONTENT . 'fields' ) );
     define( 'CPAR_FORMS', trailingslashit( CPAR_CONTENT . 'forms' ) );
     define( 'CPAR_LAYOUTS', trailingslashit( CPAR_CONTENT . 'layouts' ) );

     define( 'CPAR_ASSETS', trailingslashit( 'assets' ) );
     define( 'CPAR_ASSETS_CSS', trailingslashit( CPAR_ASSETS . 'css' ) );
     define( 'CPAR_ASSETS_FONTS', trailingslashit( CPAR_ASSETS . 'fonts' ) );
     define( 'CPAR_ASSETS_IMAGES', trailingslashit( CPAR_ASSETS . 'images' ) );
     define( 'CPAR_ASSETS_JS', trailingslashit( CPAR_ASSETS . 'js' ) );


/*
 *   BASELINE
 *   initialize theme only if ACF Pro plugin is active
*/

     if ( class_exists( 'ACF_PRO' ) ) :

          require_once CPAR_ADMIN . 'init.php';
          require_once CPAR_INCLUDES . 'init.php';
          require_once CPAR_CONTENT . 'init.php';

          add_action( 'after_setup_theme', 'cpar_theme_setup' );
          add_action( 'wp_enqueue_scripts', 'cpar_theme_assets_front', 999999998 );
          add_action( 'admin_enqueue_scripts', 'cpar_theme_assets_back', 999999998 );

     endif;


/*
 *   THEME SETUP
 *   define theme configurations
*/

     function cpar_theme_setup() {

          // FEATURES

          add_post_type_support( 'page', 'excerpt' );

          add_theme_support( 'align-wide' );
          add_theme_support( 'automatic-feed-links' );
          add_theme_support( 'block-template-parts' );
          add_theme_support( 'custom-units', 'rem' );
          add_theme_support( 'editor-styles' );
          add_theme_support( 'html5' , array(

               'search-form',
               'comment-form',
               'comment-list',
               'caption',
               'style',
               'script'

          ) );

          add_theme_support( 'post-thumbnails' );
          add_theme_support( 'responsive-embeds' );
          add_theme_support( 'title-tag' );

          add_theme_support( 'disable-custom-colors' );
          add_theme_support( 'disable-custom-gradients' );
          add_theme_support( 'disable-custom-font-sizes' );
          add_theme_support( 'disable-custom-line-height' );
          add_theme_support( 'disable-custom-spacing' );

          remove_theme_support( 'core-block-patterns' );

          // POST THUMBNAIL

          set_post_thumbnail_size( 1920, 1080 );

          // NAV MENUS

          register_nav_menus( array(

               'cpar-menu-footer-default'    => 'Default Footer',
               'cpar-menu-header-default'    => 'Default Header',
               'cpar-menu-panel-default'     => 'Default Panel'

          ) );

     }


/*
 *   ASSETS
 *   enhance layout and user experience
*/

     // FRONT-END

     function cpar_theme_assets_front() {

          // STYLESHEET

          wp_enqueue_style(

               'CPar Website (Global)',
               CPAR_THEME_URL . 'style.css',
               array(),
               null,
               'all'

          );

          // STYLESHEET - PRINT

          wp_enqueue_style(

               'CPar Website (Print)',
               CPAR_THEME_URL . 'style-print.css',
               array( 'CPar Website (Global)' ),
               null,
               'all'

          );

          // SCRIPTS

          wp_enqueue_script(

               'CPar Website (Global)',
               CPAR_THEME_URL . 'script.js',
               array( 'jquery' ),
               null,
               true

          );

     }

     // ADMIN AREA

     function cpar_theme_assets_back() {

          // STYLESHEET

          wp_enqueue_style(

               'CPar Website (Admin)',
               CPAR_THEME_URL . CPAR_ADMIN . CPAR_ASSETS_CSS . 'admin.css',
               array(),
               null,
               'all'

          );

     }