window.addEventListener('scroll', function() {
    let images = document.querySelectorAll('[id^="rdc_"]');
    let texts = document.querySelectorAll('[id^="card_text"]');
    let currentScroll = document.documentElement.scrollTop;

    for (let e = 0; e < images.length; e++) {
        
        let card_image = document.getElementById(images[e].id);
        let card_text = document.getElementById(texts[e].id);
        let start = parseInt(card_image.getAttribute('start'));
        let end = parseInt(card_image.getAttribute('end'));
        
        card_image.style.display = 'none';
        card_text.style.display = 'none';
        if (currentScroll > start && currentScroll < end && currentScroll){
            card_image.style.display = 'block';
            card_text.style.display = 'block';
        }
        
    }
    
}, false);