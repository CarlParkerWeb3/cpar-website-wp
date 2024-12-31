<?php

/*
 *   CPAR CONTENT (Mobile Panel)
 *   load content elements for website usage
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN ?>


<aside data-cpar-region="panel-mobile">

     <div class="cpar-panel-container">

          <div class="cpar-panel-close">

               <i class="fa-solid fa-xmark"></i>

          </div>

          <div class="cpar-panel-body">

               <?php

                    wp_nav_menu( array(

                         'menu'                  => 'Default Panel',
                         'menu_id'               => '',
                         'menu_class'            => 'panel-menu',
                         'container'             => 'ul',
                         'container_id'          => '',
                         'container_aria_label'  => ''

                    ) );

               ?>

          </div>

     </div>

</aside>