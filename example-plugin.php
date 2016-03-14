<?php
/*
Plugin Name: WP JS Editor
*/

define( 'WP_JS_EDITOR_URL', trailingslashit( plugins_url( '', __FILE__) ) );

require_once dirname( __FILE__ ).'/wp-js-editor/wp-js-editor.php';

/**
 * Enqueue js
 *
 * Please make sure define WP_JS_EDITOR_URL is defined before call this
 *
 */
wp_js_editor_frontend_scripts();
wp_js_editor_admin_scripts();


/**
 * Enqueue custom your scripts
 *
 */
function example_enqueue_my_custom_js(){
    wp_enqueue_script( 'example-wp-js-editor-call', WP_JS_EDITOR_URL . 'example.js', array( 'jquery', 'wp_js_editor' ), '1.0.0', true );
}
add_action( 'admin_footer', 'example_enqueue_my_custom_js', 99 );
add_action( 'wp_footer', 'example_enqueue_my_custom_js', 99 );



function example_customize_register( $wp_customize ) {

    require_once dirname( __FILE__ ).'/wp-js-editor/customizer-editor-control.php';

    $wp_customize->add_section( 'example_wp_js_editor' ,
        array(
            'priority'    => 6,
            'title'       => esc_html__( 'Example WP Js Editor', 'onepress' ),
            'description' => '',
            'panel'       => '',
        )
    );

    // Contact Text
    $wp_customize->add_setting( 'example_wp_js_editor',
        array(
            'sanitize_callback' => 'wp_kses_post',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new WP_Editor_Custom_Control(
        $wp_customize,
        'example_wp_js_editor',
        array(
            'label'     	=> esc_html__('Editor', 'onepress'),
            'section' 		=> 'example_wp_js_editor',
            'description'   => '',
        )
    ));


    // Contact Text
    $wp_customize->add_setting( 'example_wp_js_editor_2',
        array(
            'sanitize_callback' => 'wp_kses_post',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new WP_Editor_Custom_Control(
        $wp_customize,
        'example_wp_js_editor_2',
        array(
            'label'     	=> esc_html__('Editor 2', 'onepress'),
            'section' 		=> 'example_wp_js_editor',
            'description'   => '',
        )
    ));


    // Contact Text
    $wp_customize->add_setting( 'example_wp_js_editor_3',
        array(
            'sanitize_callback' => 'wp_kses_post',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new WP_Editor_Custom_Control(
        $wp_customize,
        'example_wp_js_editor_3',
        array(
            'label'     	=> esc_html__('Editor 3', 'onepress'),
            'section' 		=> 'example_wp_js_editor',
            'description'   => '',
        )
    ));



}
add_action( 'customize_register', 'example_customize_register', 55 );




// ----------------------------------------------------------------------------
add_action('admin_menu', 'example_wp_js_editor_register_submenu_page');
function example_wp_js_editor_register_submenu_page() {
    add_menu_page(
        'Example JS Editor',
        'Example JS Editor',
        'manage_options',
        'example-editor',
        'example_wp_js_editor_page'
    );
}


function example_wp_js_editor_page(){
    ?>
    <div class="wrap">
        <h1>Example JS Editor</h1>
        <a class="test_btn" href="#">test_btn</a>
        <hr>
        <div class="test_js_area">
            <h3>test_js_area</h3>
            <textarea id="test_js_area"><?php echo esc_textarea( '<h2>This is HTML content</h2>' ); ?></textarea>
        </div>
        <hr>
        <div class="test_move_area">
            <h3>test_move_area</h3>
            <textarea></textarea>
        </div>
    </div>
<?php
}