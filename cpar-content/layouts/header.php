<?php

/*
 *   CPAR CONTENT (Default Header)
 *   load content elements for website usage
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN ?>


<header data-cpar-region="header">

     <div class="header-main">

          <div class="main-logo">

               <a href="/" title="<?php echo get_bloginfo( 'name' ); ?>">

                    <img src="#" alt="#" />

               </a>

          </div>

          <?php

               wp_nav_menu( array(

                    'menu'                  => 'Default Header',
                    'menu_id'               => '',
                    'menu_class'            => '',
                    'container'             => 'nav',
                    'container_id'          => '',
                    'container_class'       => 'main-menu',
                    'container_aria_label'  => ''

               ) );

          ?>

     </div>

</header>