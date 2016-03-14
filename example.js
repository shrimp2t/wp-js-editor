jQuery(  document ).ready( function( $ ){



    $( 'textarea').wp_js_editor();
    $( 'textarea').on( 'change keyup', function(){
        console.log( $( this).val() );
    } );

    $( window).on( 'my_tinymce_setup', function(){
        console.log( 'triggerd' );
    } );
    $( '.test_btn').on( 'click', function ( e ) {
        e.preventDefault();
        $( 'textarea').wp_js_editor( 'remove' );

    } );



} );