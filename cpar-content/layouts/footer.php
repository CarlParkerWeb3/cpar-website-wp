<?php

/*
 *   CPAR CONTENT (Default Footer)
 *   load content elements for website usage
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN ?>


<footer data-cpar-region="footer">

     <div class="footer-copyright">

          <?php echo '    &copy; '. date( 'Y' ) .' ' . get_bloginfo( 'name' ); ?>

     </div>

     <div class="footer-credits">

          <a href="https://carlparker.net" title="a WordPress Webmaster in Monterey, CA" target="_blank">

               <?php echo __( 'a Carl Parker website', 'cpar-website-wp' ); ?>

          </a>

     </div>

</footer>