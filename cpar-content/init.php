<?php

/*
 *   CPAR CONTENT
 *   load content elements for website usage
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   FIELDS
 *   https://www.advancedcustomfields.com/resources/local-json/
*/

     // SAVE LOCAL JSON

     add_filter( 'acf/settings/save_json', 'cpar_fields_localjson_save' );

     function cpar_fields_localjson_save( $path ) {

          $path = CPAR_THEME_PATH . CPAR_FIELDS;

          return $path;

     }

     // LOAD LOCAL JSON

     add_filter( 'acf/settings/load_json', 'cpar_fields_localjson_load' );

     function cpar_fields_localjson_load( $paths ) {

          unset( $paths[ 0 ] );

          $paths[] = CPAR_THEME_PATH . CPAR_FIELDS;

          return $paths;

     }



/*
 *   FORMS
 *   load acf front-end forms
*/

     foreach ( glob( CPAR_THEME_PATH . CPAR_CONTENT . 'forms/*/form.php' ) as $form ) :

          require_once $form;

     endforeach;


/*
 *   BLOCKS
 *   load acf gutenberg blocks
*/

     foreach ( glob( CPAR_THEME_PATH . CPAR_CONTENT . 'blocks/*/block.php' ) as $block ) :

          require_once $block;

     endforeach;