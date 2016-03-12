jQuery(  document ).ready( function( $ ){

    // console.log( tinyMCEPreInit );
    //console.log( tinyMCE.get('__test_editor') );

    $( 'textarea').wp_js_editor();

    $( window).on( 'my_tinymce_setup', function(){
        console.log( 'triggerd' );
    } );
    $( '.test_btn').on( 'click', function ( e ) {
        e.preventDefault();
        $( 'textarea').wp_js_editor( 'remove' );

    } );

    /*
     $( '.test_btn').on( 'click', function ( e ) {
     e.preventDefault();

     var editor = tinyMCE.get("__test_editor");
     editor.setContent('<b>This content set by js</b> bla bla bal');
     editor.onKeyUp.add( function( ed, l) {
     console.debug('Editor contents was modified. Contents: ' + l.content);
     });


     } );
     */


} );