<?php

/*
 *   MAIN INDEX TEMPLATE
 *   https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN ?>


<?php get_header(); ?>

<div data-cpar-layout="default">

     <?php require_once CPAR_LAYOUTS . 'header.php'; ?>

     <main data-cpar-region="body">

          <?php require_once CPAR_LAYOUTS . 'content.php'; ?>

     </main>

     <?php require_once CPAR_LAYOUTS . 'footer.php'; ?>

</div>

<?php get_footer(); ?>