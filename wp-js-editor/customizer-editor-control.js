( function( api ) {
    //console.log( api.controlConstructor );
    $ =  jQuery;

    api.controlConstructor['wp_editor'] = api.Control.extend( {
        ready: function() {
            var control = this;
            control.editing_area = $( '.wp-js-editor-textarea' , control.container );
            control.editing_area.uniqueId();
            control.editing_id = control.editing_area.attr( 'id' ) || '';
            control.editor_id = 'wpe-for-'+control.editing_id;
            control.preview = $( '<div id="preview-'+control.editing_id+'" class="wp-js-editor-preview"></div>');
            control.editing_editor = $( '<div id="wrap-'+control.editing_id+'" class="modal-wp-js-editor"><textarea id="'+control.editor_id+'"></textarea></div>');
            var content = control.editing_area.val();
            // Load default value
            $( 'textarea', control.editing_editor).val( content );
            control.preview.html( content );

            $( 'body' ).on( 'click', '#customize-controls, .customize-section-back', function( e ) {
                if ( ! $( e.target ).is( control.preview ) ) {
                    /// e.preventDefault(); // Keep this AFTER the key filter above
                    control.editing_editor.removeClass( 'wpe-active' );
                }
            } );

            control._init();

            $( window ) .on( 'resize', function(){
                control._resize();
            } );

        },

        _init: function(  ){

            var control = this;
            $( 'body .wp-full-overlay').append( control.editing_editor );

            $( 'textarea',  control.editing_editor ).wp_js_editor( {
                sync_id: control.editing_area,
                init_instance_callback: function( editor ){
                    var w =  $( '#wp-'+control.editor_id+ '-wrap' );
                    $( '.wp-editor-tabs', w).append( '<button class="wp-switch-editor close-wp-editor"  type="button"><span class="dashicons dashicons-no-alt"></span></button>' );
                    w.on( 'click', '.close-wp-editor', function( e ) {
                        e.preventDefault();
                        control.editing_editor.removeClass( 'wpe-active' );
                    } );
                }
            } );
            control.editing_area.on( 'change', function() {
                control.preview.html( $( this).val() );
            });

            control.preview.on( 'click', function( e ){
                $( '.modal-wp-js-editor').removeClass( 'wpe-active' );
                control.editing_editor.toggleClass( 'wpe-active' );
                tinyMCE.get( control.editor_id ).focus();
                control._resize();
                return false;
            } );

            control.container.find( '.wp-js-editor').addClass( 'wp-js-editor-active' );
            control.preview.insertBefore( control.editing_area );
            control.container.on( 'click', '.wp-js-editor-preview', function( e ){
                e.preventDefault();
            } );

        },

        _resize: function(){
            var control = this;
            var w =  $( '#wp-'+control.editor_id+ '-wrap' );
            var height = $( window ).height();
            var tb_h = $( '.mce-toolbar-grp',  w).eq(0).height();
            tb_h += $( '.wp-editor-tools', w ).eq(0).height();
            tb_h += 80;
            var width = $( window ).width();
            var editor = tinymce.get( control.editor_id );
            if ( width > 700 ) {
                if ( width - 301 > 500 ) {
                    control.editing_editor.width( '' );
                } else {
                    control.editing_editor.width( width - 330 );
                }
                editor.theme.resizeTo('100%', height - tb_h );
            } else {
                control.editing_editor.width( '' );
                editor.theme.resizeTo('100%', height- ( tb_h + 150 ) );
            }
        }

    } );

} )( wp.customize );