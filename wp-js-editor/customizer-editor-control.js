( function( api ) {
    //console.log( api.controlConstructor );

    api.controlConstructor['wp_editor'] = api.Control.extend( {
        ready: function() {
            var control = this;
            //console.log( settingValue );
            //new RepeatableCustomize( control, jQuery );
            console.log( control );

        },
        _init: function( $container ){

        }

    } );

} )( wp.customize );