<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */
include('routes.php');
include('components/card.php');
include('components/banner.php');
include('components/copyright.php');

add_filter( 'generate_copyright','my_custom_copyright' );
function my_custom_copyright() {
    echo get_copyright();
}

/* Divide footer widget content size by 2*/
add_filter( 'generate_footer_widgets','custom_generate_footer_widgets' );
function custom_generate_footer_widgets( $widgets ) {
    return 2;
}

/* Add custom js/css into header */
get_routes($custom_props, $extensions);
//use ayuda a importar variables dentro de mi funcion anonima (closure)

function remote_routes(){
    $path = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min';
    
    wp_enqueue_style( 'swipper-css', "$path.css" . '', array(), null, false);
    wp_enqueue_script('swipper-js', "$path.js". '', array(), null, false);
}

add_action('wp_enqueue_scripts', 'remote_routes');

foreach ( $custom_props as $file => $path ){
        add_action( 'wp_enqueue_scripts', function() use ($file, $path, $extensions){
            foreach($path as $folder){
                child_theme_assets(array("id" => $file,"path" => "./$folder/$file.{$extensions[$folder]}","asset"=> $folder));
            }
        } );
}

function child_theme_assets($params) {
    wp_enqueue_style( $params['id'], get_stylesheet_directory_uri() . $params['path'], array('generate-style'));
    
    if ( $params['asset'] == 'scripts'){
        wp_enqueue_script($params['id'], get_stylesheet_directory_uri() . $params['path'], array(), null, true);
    }
}

/* Accept svg images */
function enable_SVG( $mimes ) {
    if ( current_user_can( 'manage_options' ) ) {
        $mimes['svg']  = 'image/svg+xml';
    }

    return $mimes;
}
add_filter( 'upload_mimes', 'enable_SVG' );

function enable_SVG_upload( $types, $file, $filename, $mimes ){
    if( substr( $filename, -4 ) == '.svg' ){
        $types['ext'] = 'svg';
        $types['type'] = 'image/svg+xml';
    }

    return $types;
}

add_filter( 'wp_check_filetype_and_ext', 'enable_SVG_upload', 10, 4 );


function enable_SVG_upload_idc( $response ) {

    if ( $response['mime'] === 'image/svg+xml' ) {
        $response['image'] = [
            'src' => $response['url'],
        ];
    }
    return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'enable_SVG_upload_idc' );

