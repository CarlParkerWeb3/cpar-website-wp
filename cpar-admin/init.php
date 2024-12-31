<?php

/*
 *   CPAR ADMIN
 *   baseline configurations for website usage
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN


/*
 *   WORDPRESS
 *   https://developer.wordpress.org/
*/

     require_once 'init-wordpress.php';


/*
 *   GUTENBERG EDITOR
 *   https://developer.wordpress.org/block-editor/
*/

     require_once 'init-gutenberg.php';


/*
 *   ADVANCED CUSTOM FIELDS PRO
 *   https://www.advancedcustomfields.com/resources/
*/

     require_once 'init-acf.php';