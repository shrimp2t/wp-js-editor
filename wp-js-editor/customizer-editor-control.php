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
        wp_register_style( 'customizer-editor-control',  get_template_directory_uri() . '/assets/css/customizer.css' );
        wp_register_script( 'wp_js_editor', WP_JS_EDITOR_URL . 'wp-js-editor/wp-js-editor.js', array( 'customize-controls' ) );
        wp_register_script( 'customizer-editor-control', WP_JS_EDITOR_URL . 'wp-js-editor/customizer-editor-control.js', array( 'customize-controls' ) );

        wp_enqueue_script( 'wp_js_editor' );
        wp_enqueue_script( 'customizer-editor-control' );
        wp_enqueue_style( 'customizer-editor-control' );

        add_action( 'customize_controls_print_footer_scripts', 'enqueue_editor' );
    }

    static function enqueue_editor(){

        if ( ! class_exists( '_WP_Editors' ) ) {
            require( ABSPATH . WPINC . '/class-wp-editor.php' );
        }

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
            <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            <p class="description"><?php echo $this->description ?></p>
        </div>
    <?php
    }
}