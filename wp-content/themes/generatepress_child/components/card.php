<?php
    include_once 'button.php';
    function show_card($params){
        
        $img_path = "/waveless/wp-content/uploads/2024/04";

        $default = array(
            'tag' => '', 
            'title' => '', 
            'ext' => 'jpg', 
            'content' => '', 
            'card_class' => '',
            'card_image' => '',
            'img_start' => '',
            'img_end' => '',
            'text_start' => '',
            'text_end' => '',
            'img_side'=> 'left',
            'child_class' => '',
        );

        $atts_for_cards = array_intersect_key($params, $default);        
        $card_content = shortcode_atts($default, $atts_for_cards);
        
        $atts_for_button = set_button($params);
        $button_content = get_button($atts_for_button);
        $align = $card_content['img_side'];
        $margin_top = $card_content['child_class'] ? 'no_margin_top' : 'add_margin_top';
        $img_side = "
            <div class='column-wrap container-reduce-transition $margin_top'>
                <img id='rdc_{$card_content['card_image']}' 
                    class= 'pause-animation' 
                    src='$img_path/{$card_content['card_image']}.{$card_content['ext']}' 
                    loading='lazy' 
                    alt='' 
                    img_start = {$card_content['img_start']} 
                    img_end = {$card_content['img_end']}/>
            </div>
        ";

        $info_side = "
            <div class='column-wrap align-$align'>";
            if ( $card_content['tag'] ){
                $info_side .= "<div class='tag'>". strtoupper($card_content['tag']) ."</div>";

            }
        $info_side .="
                <h3 class='card-title max-width-20ch'>{$card_content['title']}</h3>
                <p id = 'card_text_{$card_content['title']}' class='max-width-40ch card-text-content pause-animation' text_start = {$card_content['text_start']}  text_end = {$card_content['text_end']}>
                    {$card_content['content']}
                </p>
                <div class = 'card-button-content'>
                    $button_content
                </div>
            </div>
        ";
        $global = "<div class = 'self_card_content {$card_content['card_class']}'>
                    <div class='_2-column-wrap {$card_content['child_class']}'>";
        $html_out = $global . $img_side . $info_side;

        if ($card_content['img_side'] == 'right'){
            $html_out = $global . $info_side . $img_side;
        }
        return $html_out . "</div></div>";
    }
    add_shortcode('wp_card','show_card');
?>