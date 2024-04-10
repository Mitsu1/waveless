<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */
include('custom_shortcode.php');

add_filter( 'generate_copyright','my_custom_copyright' );
function my_custom_copyright() {
    ?>
	<div class = "copyright">	
		<div class = 'copyright-left-side'>Copyright <?php echo(date('Y'))?></div>
		<div class = 'copyright-right-side'>
			Powered by 
			<a href="https://generatepress.com/" target="_blank" class="footer-link underline">			GeneratePress</a> — Developed by 
			<a href="./" target="_blank" class="footer-link-copyright underline">MGovea</a>
		</div>
	</div> 
    <?php
}

/* Divide footer widget content size by 2*/
add_filter( 'generate_footer_widgets','custom_generate_footer_widgets' );
function custom_generate_footer_widgets( $widgets ) {
    return 2;
}

/* Add custom js/css into header */
$custom_props = array('shortcode'=> array ('.css' => '/'));
//use ayuda a importar variables dentro de mi funcion anonima (closure)
foreach ( $custom_props as $prop => $typePath ){
    foreach ( $typePath as $type => $path ){
        add_action( 'wp_enqueue_scripts', function() use ($prop, $path, $type){
            child_theme_styles(array("id" => $prop,"path" => $path . $prop . $type));
        } );
    }
}

function child_theme_styles($params) {
    wp_enqueue_style( $params['id'], get_stylesheet_directory_uri() . $params['path'], array('generate-style') );
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

