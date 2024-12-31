/*
 *   GLOBAL FRONT-END SCRIPTS
*/


/* -- PANELS -- */

jQuery( document ).ready( function( $ ) {

     if ( $( '[data-cpar-region^="panel"]' ).length ) {

          // CONFIGS

          var panelSpeed = 375;

          // HELPER - CLOSE ACTIVE PANELS

          function cparPanels_close() {

               $( '[data-cpar-region^="panel"]:visible' ).stop().animate( { width: 'toggle' }, panelSpeed, 'linear' );

          }

          // ACTIONS - OPEN SPECIFIC PANEL ON CLICK

          $( '.cpar-panel-open, .cpar-panel-open a' ).click( function() {

               // GET HREF TARGET OF CLICKED LINK

               panelName = $( this ).attr( 'href' ); // get link href value
               panelName = panelName.replace('#', '').toLowerCase(); // remove # from it

               // CLOSE ACTIVE PANELS

               cparPanels_close();

               // DISPLAY SELECTED PANEL

               $( '[data-cpar-region^="'+ panelName +'"]' ).stop().delay( panelSpeed ).animate( { width: 'toggle' }, panelSpeed, 'linear' );

               // DISABLE BODY SCROLLING

               $( 'body' ).css( { 'overflow-y': 'hidden' } );

          } );

          // ACTIONS - CLOSE PANELS ON CLICK

          $( '.cpar-panel-close' ).click( function() {

               // HIDE PANELS

               $( '[data-cpar-region^="panel"]:visible' ).stop().animate( { width: 'toggle' }, panelSpeed, 'linear' );

               // ENABLE BODY SCROLLING

               $( 'body' ).css( { 'overflow-y': 'auto' } );

          } );

     }

} );