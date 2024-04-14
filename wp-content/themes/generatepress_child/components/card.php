<?php
    include_once 'button.php';
    function show_card($params){
        
        $img_path = "/waveless/wp-content/uploads/2024/04";

        $default = array(
            'tag' => '', 
            'title' => '', 
            'ext' => 'jpg', 
            'content' => '', 
            'img_side'=> 'left'
        );

        $atts_for_cards = array_intersect_key($params, $default);        
        $card_content = shortcode_atts($default, $atts_for_cards);
        
        $atts_for_button = set_button($params);
        $button_content = get_button($atts_for_button);

        $card_content['image'] = preg_replace("/ /","_",$card_content['tag']);

        $img_side = "
            <div class='column-wrap container-reduce-transition'>
                <img class= 'img-reduce-transition' src='$img_path/{$card_content['image']}.{$card_content['ext']}' loading='lazy' alt='' />
            </div>
        ";
        $info_side = "
            <div class='column-wrap align-left'>
                <div class='tag'>". strtoupper($card_content['tag']) ."</div>
                <h3 class='card-title max-width-20ch'>{$card_content['title']}</h3>
                <p class='max-width-40ch'>{$card_content['content']}</p>
                $button_content
            </div>
        ";
        $global = "<div class = 'self_card_content'><div class='_2-column-wrap top-margin-40'>";
        $html_out = $global . $img_side . $info_side;

        if ($card_content['img_side'] == 'right'){
            $html_out = $global . $info_side . $img_side;
        }

        return $html_out . "</div></div>";
    }
    add_shortcode('wp_card','show_card');
?>