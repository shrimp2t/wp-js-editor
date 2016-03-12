<?php
class WP_Editor_Custom_Control extends WP_Customize_Control
{
    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'wp_editor';

    /**
     * Enqueue scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue() {

        wp_enqueue_script( 'wp_js_editor', WP_JS_EDITOR_URL . 'wp-js-editor/wp-js-editor.js', array( 'customize-controls' ) );
        wp_register_style( 'customizer-editor-control',   WP_JS_EDITOR_URL . 'wp-js-editor/customizer-editor.css' );
        wp_register_script( 'wp_js_editor', WP_JS_EDITOR_URL . 'wp-js-editor/wp-js-editor.js', array( 'customize-controls' ) );
        wp_register_script( 'customizer-editor-control', WP_JS_EDITOR_URL . 'wp-js-editor/customizer-editor-control.js', array( 'customize-controls' ) );

        wp_enqueue_script( 'wp_js_editor' );
        wp_enqueue_script( 'customizer-editor-control' );
        wp_enqueue_style( 'customizer-editor-control' );


        if ( ! class_exists( '_WP_Editors' ) ) {
            require( ABSPATH . WPINC . '/class-wp-editor.php' );
        }

        add_action( 'customize_controls_print_footer_scripts', array( __CLASS__, 'enqueue_editor' ),  2 );
        add_action( 'customize_controls_print_footer_scripts', array( '_WP_Editors', 'editor_js' ), 50 );
        add_action( 'customize_controls_print_footer_scripts', array( '_WP_Editors', 'enqueue_scripts' ), 1 );
    }

    static function enqueue_editor(){

        ?>
        <script id="_wp-mce-editor-tpl" type="text/html">
            <?php wp_editor( '', '__wp_mce_editor__' ); ?>
        </script>
        <?php
    }
    public function render_content() {
        ?>
        <div class="wp-js-editor">
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            </label>
            <textarea class="wp-js-editor-textarea large-text" cols="20" rows="5" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            <p class="description"><?php echo $this->description ?></p>
        </div>
    <?php
    }
}