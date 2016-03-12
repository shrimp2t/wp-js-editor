<?php


function wp_js_editor_load_scripts() {
    wp_enqueue_script('jquery');
    if ( ! class_exists( '_WP_Editors' ) ) {
        require( ABSPATH . WPINC . '/class-wp-editor.php' );
    }
    ?>
    <script id="_wp-mce-editor-tpl" type="text/html">
        <?php wp_editor( '', '__wp_mce_editor__' ); ?>
    </script>
    <?php
    wp_enqueue_script( 'wp_js_editor', WP_JS_EDITOR_URL . 'wp-js-editor/wp-js-editor.js', array( 'jquery' ), '1.0.0', true );
}


function wp_js_editor_admin_scripts(){
    if ( is_admin() ){
        add_action( 'admin_footer', 'wp_js_editor_load_scripts', -1 );
    }
}

function wp_js_editor_frontend_scripts(){
    if ( ! is_admin() ){
        add_action( 'wp_footer', 'wp_js_editor_load_scripts', -1 );
    }
}



