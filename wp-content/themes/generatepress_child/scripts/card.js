let widthScreen = window.innerWidth;
let images = document.querySelectorAll('[id^="rdc_"]');
let texts = document.querySelectorAll('[id^="card_text"]');

window.addEventListener('scroll', function() {
    let currentScroll = document.documentElement.scrollTop;
    
    for (let element = 0; element < images.length; element++) {
        
        let card_image = document.getElementById(images[element].id);
        let card_text = document.getElementById(texts[element].id);
        
        let img_start_list = JSON.parse(card_image.getAttribute('img_start').replace(/\/$/, ''));
        let img_end_list = JSON.parse(card_image.getAttribute('img_end').replace(/\/$/, ''));
        
        let text_start_list = JSON.parse(card_text.getAttribute('text_start').replace(/\/$/, ''));
        let text_end_list = JSON.parse(card_text.getAttribute('text_end').replace(/\/$/, ''));

        let size = 'big';
        let base_animation = 'pause_animation';
        let text_animation = 'move-up-transition';
        let img_animation = 'img-reduce-transition';

        if ( widthScreen <= 900 && widthScreen > 600)
            size = 'small';
        
        else if ( widthScreen <= 600 )
            size = 'tiny'; 
    
        let img_end = img_end_list[size];
        let text_end = text_end_list[size];
        
        let img_start = img_start_list[size];
        let text_start = text_start_list[size];
        
        card_image.classList.remove(img_animation)
        card_text.classList.remove(text_animation)
        
        card_image.classList.add(base_animation)
        card_text.classList.add(base_animation)

        if (currentScroll > text_start && currentScroll < text_end){
            card_text.classList.remove(base_animation)
            card_text.classList.add(text_animation)
        }
        if (currentScroll > img_start && currentScroll < img_end){
            card_image.classList.remove(base_animation)
            card_image.classList.add(img_animation)
        }
    }

}, false);


