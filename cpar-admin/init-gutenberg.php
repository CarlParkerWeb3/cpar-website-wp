<?php

/*
 *   CPAR ADMIN (Gutenberg Editor)
 *   customize block editor for website usage
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   BLOCKS CATEGORY
 *   configure for gutenberg blocks
*/

     add_filter( 'block_categories_all', 'cpar_admin_gutenberg_blocks_category', 10, 2 );

     function cpar_admin_gutenberg_blocks_category( $block_categories, $block_editor_context ) {

          return array_merge(

               $block_categories, array(

                    array(

                         'slug'    =>  'cpar-blocks',
                         'title'   =>  __( 'CPar Blocks', 'cpar-website-wp' )

                    )

               )

          );

     }


/*
 *   PATTERNS CATEGORY
 *   configure for gutenberg patterns
*/

     add_action( 'init', 'cpar_admin_gutenberg_patterns_category' );

     function cpar_admin_gutenberg_patterns_category( ) {

          register_block_pattern_category(

               'cpar-patterns',
               array( 'label' => __( 'CPar Patterns', 'cpar-website-wp' ) )

          );

     }


/*
 *   CLEANUP GUTENBERG
 *   remove unnecessary blocks
*/

     // ASSETS

     add_action( 'wp_enqueue_scripts', 'cpar_admin_gutenberg_cleanup_assets' );

     function cpar_admin_gutenberg_cleanup_assets() {

          wp_dequeue_style( 'wp-block-library' );
          wp_dequeue_style( 'wp-block-library-theme' );
          wp_dequeue_style( 'global-styles' );
          wp_dequeue_style( 'classic-theme-styles');

          remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
          remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

     }

     // BLOCKS

     add_filter( 'allowed_block_types_all', 'cpar_admin_gutenberg_cleanup_blocks' );

     function cpar_admin_gutenberg_cleanup_blocks( $allowed_blocks ) {

          // GET ALL REGISTERED BLOCKS

          $blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

          // DEFINE BLOCKS TO DISABLE

          unset( $blocks[ 'core/verse' ] );
          unset( $blocks[ 'core/preformatted' ] );
          unset( $blocks[ 'core/pullquote' ] );
          unset( $blocks[ 'core/quote' ] );
          unset( $blocks[ 'core/freeform' ] );
          unset( $blocks[ 'core/details' ] );
          unset( $blocks[ 'core/table' ] );
          unset( $blocks[ 'core/footnotes' ] );

          unset( $blocks[ 'core/cover' ] );
          unset( $blocks[ 'core/file' ] );
          unset( $blocks[ 'core/gallery' ] );
          unset( $blocks[ 'core/media-text' ] );

          unset( $blocks[ 'core/buttons' ] );
          unset( $blocks[ 'core/more' ] );

          unset( $blocks[ 'core/archives' ] );
          unset( $blocks[ 'core/calendar' ] );
          unset( $blocks[ 'core/categories' ] );
          unset( $blocks[ 'core/html' ] );
          unset( $blocks[ 'core/latest-comments' ] );
          unset( $blocks[ 'core/latest-posts' ] );
          unset( $blocks[ 'core/page-list' ] );
          unset( $blocks[ 'core/rss' ] );
          unset( $blocks[ 'core/latest-rss' ] );
          unset( $blocks[ 'core/latest-search' ] );
          unset( $blocks[ 'core/search' ] );
          unset( $blocks[ 'core/shortcode' ] );
          unset( $blocks[ 'core/social-links' ] );
          unset( $blocks[ 'core/tag-cloud' ] );

          unset( $blocks[ 'core/navigation' ] );
          unset( $blocks[ 'core/site-logo' ] );
          unset( $blocks[ 'core/site-title' ] );
          unset( $blocks[ 'core/site-tagline' ] );
          unset( $blocks[ 'core/query' ] );
          unset( $blocks[ 'core/posts-list' ] );
          unset( $blocks[ 'core/avatar' ] );
          unset( $blocks[ 'core/post-title' ] );
          unset( $blocks[ 'core/post-excerpt' ] );
          unset( $blocks[ 'core/post-featured-image' ] );
          unset( $blocks[ 'core/post-content' ] );
          unset( $blocks[ 'core/post-author' ] );
          unset( $blocks[ 'core/post-date' ] );
          unset( $blocks[ 'core/post-terms' ] );
          unset( $blocks[ 'core/post-navigation-link' ] );
          unset( $blocks[ 'core/read-more' ] );
          unset( $blocks[ 'core/comments-query-loop' ] );
          unset( $blocks[ 'core/post-comments-form' ] );
          unset( $blocks[ 'core/loginout' ] );
          unset( $blocks[ 'core/term-description' ] );
          unset( $blocks[ 'core/query-title' ] );
          unset( $blocks[ 'core/post-author-biography' ] );
          unset( $blocks[ 'core/post-author-name' ] );
          unset( $blocks[ 'core/comments' ] );

          // EMBED CATEGORY

          unset( $blocks[ 'core/embed' ] );

          // OTHERS + INTEGRATIONS

          unset( $blocks[ 'wpseopress/breadcrumbs' ] );
          unset( $blocks[ 'wpseopress/faq-block' ] );
          unset( $blocks[ 'wpseopress/how-to' ] );
          unset( $blocks[ 'wpseopress/local-business' ] );
          unset( $blocks[ 'wpseopress/sitemap' ] );
          unset( $blocks[ 'wpseopress/table-of-contents' ] );

          // RETURN APPROVED BLOCKS

          return array_keys( $blocks );

     }