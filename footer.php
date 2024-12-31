<?php

/*
 *   WORDPRESS FOOTER
 *   renders as the footer of page layout
 *
 *   @package cpar-website-wp
*/

if ( ! defined( 'ABSPATH' ) ) : exit; endif; // SILENCE IS GOLDEN ?>


<?php require_once CPAR_LAYOUTS . 'panel-mobile.php'; ?>

<?php wp_footer(); ?>

<?php do_action( 'cpar_footer' ); ?>

</body>

</html>