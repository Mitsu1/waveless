window.addEventListener('scroll', function() {
    let images = document.querySelectorAll('[id^="rdc_"]');
    let texts = document.querySelectorAll('[id^="card_text"]');
    let currentScroll = document.documentElement.scrollTop;

    for (let element = 0; element < images.length; element++) {
        
        let card_image = document.getElementById(images[element].id);
        let card_text = document.getElementById(texts[element].id);
        let start = parseInt(card_image.getAttribute('start'));
        let end = parseInt(card_image.getAttribute('end'));
        let classname = document.querySelector(images[element].className);
        /*card_image.style.display = 'none';
        card_text.style.display = 'none';*/
        
        if (currentScroll > start && currentScroll < end){
            
            classname.style.transform = 'translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)';
            classname.style.animation = 'reduce-size .7s alternate';
            /*card_image.style.display = 'block';
            card_text.style.display = 'block';*/
        }
        
    }
    
}, false);
