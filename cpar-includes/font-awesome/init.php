<?php

/*
 *   CPAR INCLUDES (Font Awesome)
 *   https://docs.fontawesome.com
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   ENQUEUE ASSETS
 *   enqueue feature when helper function is called
*/

     add_action( 'wp_enqueue_scripts', 'cpar_fontawesome_enqueue' );

     function cpar_fontawesome_enqueue() {

          // SITE KIT ID

          $siteKitID = 'XXXXXXXXX'; // enter site kit id

          // ENQUEUE

          wp_enqueue_script(

               'Font Awesome',
               'https://kit.fontawesome.com/'. $siteKitID .'.js',
               array( 'jquery' ),
               '',
               true

          );

          // ADD ATTRIBUTE - CROSS ORIGIN

          add_filter( 'script_loader_tag', 'cpar_fontawesome_crossorigin', 10, 3 );

          function cpar_fontawesome_crossorigin( $tag, $handle, $source ) {

               if ( 'Font Awesome' === $handle ) :

                    $tag = '<script id="'. $handle .'" src="' . $source . '" crossorigin="anonymous"></script>';

               endif;

               return $tag;

          }

     }