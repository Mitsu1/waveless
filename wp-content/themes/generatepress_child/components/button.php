<?php 
    function set_button($all_params){

        $button_default = array(
            'icon' => '→',
            'btn_text' => 'Click me',
            'btn_icon' => 'arrow',
            'btn_color' => 'base-3' 
        );

        $atts_for_button = array_intersect_key($all_params, $button_default);
        $button_content = shortcode_atts($button_default, $atts_for_button);

        return $button_content;

    }
    function get_button($params){
        $html_button = "
            <div class = 'wp-block-button'>
                <a class='ch-bg-color wp-block-button__link has-contrast-color has-{$params['btn_color']}-background-color has-text-color has-background has-link-color wp-element-button'  onmouseover = 'move_right(this)' onmouseout = 'move_original(this)' original_position = ''>
                    <strong>
                        {$params['btn_text']}
                    </strong>
                    <span id = 'icon-{$params['btn_icon']}-{$params['btn_text']}' class='icon-{$params['btn_icon']}'>{$params['icon']}</span>
                </a>
            </div>
        ";

        return $html_button;
    }
?>
