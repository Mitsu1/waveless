<?php 

    function get_routes(&$custom_props, &$extensions){
        $custom_props = array(
            'card'=> array('styles','scripts'),
            'button'=> array('styles','scripts'),
            'banner'=> array('styles','scripts'),
        );
        $extensions = array(
            'styles' => 'css',
            'scripts' => 'js',
        );
    }
    
?>