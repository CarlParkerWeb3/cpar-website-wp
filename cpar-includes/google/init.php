<?php

/*
 *   CPAR INCLUDES (Google)
 *   https://developer.google.com
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   GOOGLE TAG MANAGER
 *   https://developers.google.com/tag-platform/tag-manager
*/

     // GTM ID

     function cpar_google_tagmanager_id() {

          return 'GTM-XXXXXXX'; // enter gtm id here

     }

     // HEAD MARKUP

     add_action( 'cpar_head', 'cpar_google_tagmanager_head' );

     function cpar_google_tagmanager_head() {

          $gtmID = cpar_google_tagmanager_id();

          echo "

               <!-- Google Tag Manager -->

               <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
               new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
               j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
               'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
               })(window,document,'script','dataLayer','". $gtmID ."');</script>

               <!-- End Google Tag Manager -->

          ";

     }

     // BODY MARKUP

     add_action( 'cpar_body', 'cpar_google_tagmanager_body' );

     function cpar_google_tagmanager_body() {

          $gtmID = cpar_google_tagmanager_id();

          echo "

               <!-- Google Tag Manager (noscript) -->

               <noscript><iframe src='https://www.googletagmanager.com/ns.html?id=". $gtmID ."' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>

               <!-- End Google Tag Manager (noscript) -->

          ";

     }