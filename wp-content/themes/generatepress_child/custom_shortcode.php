<?php
    function subscribe_link($params){
        
        $img_path = "/waveless/wp-content/uploads/2024/04";

        $default = array(
            'icon' =>'→',
            'tag' => '',
            'title' => '',
            'ext' => 'jpg',
            'content' => '',
            'btn_text' => '',
            'img_side'=> 'left',
            'btn_icon' => 'arrow',
        );

        $param_content = shortcode_atts($default, $params);
        $param_content['image'] = preg_replace("/ /","_",$param_content['tag']);

        $img_side = "
            <div class='column-wrap container-reduce-transition'>
                <img class= 'img-reduce-transition' src='$img_path/{$param_content['image']}.{$param_content['ext']}' loading='lazy' alt='' />
            </div>
        ";
        $info_side = "
            <div class='column-wrap align-left'>
                <div class='tag'>". strtoupper($param_content['tag']) ."</div>
                <h3 class='card-title max-width-20ch'>{$param_content['title']}</h3>
                <p class='max-width-40ch'>{$param_content['content']}</p>
                <div class = 'wp-block-button'>
                    <a class='ch-bg-color wp-block-button__link has-contrast-color has-base-3-background-color has-text-color has-background has-link-color wp-element-button'>
                        <strong>
                            {$param_content['btn_text']}
                            <span class='icon-{$param_content['btn_icon']}'>{$param_content['icon']}</span>
                        </strong>
                    </a>
                </div>
            </div>
        ";
        $global = "<div class = 'self_card_content'><div class='_2-column-wrap top-margin-40'>";
        $html_out = $global . $img_side . $info_side;

        if ($param_content['img_side'] == 'right'){
            $html_out = $global . $info_side . $img_side;
        }

        return $html_out . "</div></div>";
    }
    add_shortcode('wp_caption_text','subscribe_link');
?>