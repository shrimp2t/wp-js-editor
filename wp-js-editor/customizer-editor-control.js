( function( api ) {
    //console.log( api.controlConstructor );
    $ =  jQuery;

    api.controlConstructor['wp_editor'] = api.Control.extend( {
        ready: function() {
            var control = this;
            control.editing_area = $( '.wp-js-editor-textarea' , control.container );
            control.editing_area.uniqueId();
            control.editing_id = control.editing_area.attr( 'id' ) || '';
            control.preview = $( '<div class="wp-js-editor-preview"></div>');
            control.editing_editor = $( '<div id="wpe-'+control.editing_id+'" class="modal-wp-js-editor"><textarea id="wpe-for-'+control.editing_id+'"></textarea></div>');
            var content = control.editing_area.val();
            // Load default value
            $( 'textarea', control.editing_editor).val( content );
            control.preview.html( content );

            $( 'body' ).on( 'click', '#customize-controls, .customize-section-back', function( e ) {
                e.preventDefault(); // Keep this AFTER the key filter above
                if ( ! $( e.target ).is( control.preview ) ) {
                    control.editing_editor.removeClass( 'wpe-active' );
                }
            } );

            control._init();

        },
        _init: function(  ){
            var control = this;
            $( 'body .wp-full-overlay').append( control.editing_editor );

            $( 'textarea',  control.editing_editor ).wp_js_editor( { sync_id: control.editing_area } );
            control.editing_area.on( 'change', function() {
                control.preview.html( $( this).val() );
            });

            control.preview.on( 'click', function( e ){
                e.preventDefault(); // Keep this AFTER the key filter above
                control.editing_editor.toggleClass( 'wpe-active' );
            } );

            control.container.find( '.wp-js-editor').addClass( 'wp-js-editor-active' );
            control.preview.insertBefore( control.editing_area );
            control.container.on( 'click', '.wp-js-editor-preview', function( e ){
                e.preventDefault();

            } );

        }



    } );

} )( wp.customize );