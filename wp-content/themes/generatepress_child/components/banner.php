<?php 

include_once 'button.php';

function show_banner($params){

    $img_path = "/waveless/wp-content/uploads/2024/04";
    $default = array(
        'slides' => '', 
    );

    $atts_for_swipper = array_intersect_key($params, $default);        
    $swipper_content = shortcode_atts($default, $atts_for_swipper);
    $slides = json_decode($swipper_content['slides'],true);

    $html_out = "
            <div class='swiper swiper-hero'>
                <div class='swiper-wrapper'>";

    foreach($slides as $slide){
        $image = $slide['image'];
        $class = $slide['class'];
        $title = $slide['title'];
        $text = $slide['text'];

        $html_out .="
            <div id = '$class-$image' class='$class swiper-slide' img_path = '$img_path/$image.jpg' alt='placeholder'>
                <div class = '$class-content'>
                    <h3 class = '$class-title'>$title</h3>
                    <p class = 'content-$class-text'>$text</p>";
                    if ( $slide['buttons'] ){
                        $btns_center = count($slide['buttons']) > 1 ? 'buttons-center' : '';
                        $html_out .= "<div class = '$btns_center'>";
                            foreach($slide['buttons'] as $button){
                                $atts_for_button = set_button($button);
                                $button_content = get_button($atts_for_button);
                                $html_out .= $button_content;
                            }
                        }
                    $html_out .= "</div>";
        $html_out .=
                "</div>
            </div>";
    }
    $html_out .= "</div>
                <div class='swiper-pagination'></div>
            </div>";
    return $html_out;
        
}
add_shortcode('wp_banner','show_banner');
?>

