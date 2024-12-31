<?php

/*
 *   CPAR ADMIN (WordPress)
 *   customize platform for website usage
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   FEATURES
 *   configure features to improve performance and/or experience
*/

     // DISABLE FILE EDITOR

     define( 'DISALLOW_FILE_EDIT', true );

     // ADMIN BAR

     add_filter( 'show_admin_bar', '__return_false' );

     // ADMIN EMAIL CHECK

     add_filter( 'admin_email_check_interval', '__return_false' );

     // LOAD BLOCK ASSETS ONLY IF USED

     add_filter( 'should_load_separate_core_block_assets', '__return_true' );

     // LOAD JQUERY IN FOOTER

     add_action( 'wp_enqueue_scripts', 'cpar_admin_jquery_footer' );

     function cpar_admin_jquery_footer() {

          wp_scripts()->add_data( 'jquery', 'group', 1 );
          wp_scripts()->add_data( 'jquery-core', 'group', 1 );
          wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

     }

     // DASHBOARD WIDGETS

     add_action( 'wp_dashboard_setup', 'cpar_admin_dashboard_widgets' );

     function cpar_admin_dashboard_widgets() {

          remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
          remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
          remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
          remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

          remove_meta_box( 'dashboard_php_nag', 'dashboard', 'normal' );
          remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal' );
          remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
          remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
          remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
          remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
          remove_meta_box( 'network_dashboard_right_now', 'dashboard', 'normal' );
          remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
          remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
          remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );

     }

     // DISABLE CORE SIZES

     add_filter( 'intermediate_image_sizes_advanced', 'cpar_admin_media_sizes' );

     function cpar_admin_media_sizes( $sizes ) {

          unset( $sizes[ 'thumbnail' ] );
          unset( $sizes[ 'medium' ] );
          unset( $sizes[ 'medium_large' ] );
          unset( $sizes[ 'large' ] );
          unset( $sizes[ '1536x1536' ] );
          unset( $sizes[ '2048x2048' ] );

          return $sizes;

     }

     // LOGIN ERROR MESSAGE

     add_filter( 'login_errors', 'cpar_admin_login_error_message' );

     function cpar_admin_login_error_message( $error ) {

          return __( 'incorrect login', 'cpar-website-wp' );

     }

     // EMOJIS DISABLED

     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );

     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

     add_filter( 'tiny_mce_plugins', 'cpar_admin_emojis_tinymce' );

     function cpar_admin_emojis_tinymce( $plugins ) {

          if ( is_array( $plugins ) ) :

               return array_diff( $plugins, array( 'wpemoji' ) );

          else :

               return array();

          endif;

     }


/*
 *   SOURCE URL VERSION
 *   improve caching conflicts with version removal from source url
*/

     add_filter( 'script_loader_src', 'cpar_admin_sourceurl_ver', 10, 2 );
     add_filter( 'style_loader_src', 'cpar_admin_sourceurl_ver', 10, 2 );

     function cpar_admin_sourceurl_ver(  $src, $handle ) {

          return remove_query_arg( 'ver', $src );

     }