window.addEventListener('scroll', function() {
    let currentScroll = document.documentElement.scrollTop;
    let elements = document.querySelectorAll('[id^="rdc_"]');
    console.log(currentScroll);

    for (let e = 0; e < elements.length; e++) {
        
        let img_card = document.getElementById(elements[e].id);
        let start = parseInt(img_card.getAttribute('start'));
        let end = parseInt(img_card.getAttribute('end'));
        
        img_card.style.display = 'none';
        //img_card.classList.add('hidden');
        if (currentScroll > start && currentScroll < end && currentScroll)
            img_card.style.display = 'block';
            //img_card.classList.remove('hidden');
        
    }
    
}, false);

// Obtener el elemento que tiene la animaciónlet elements = document.querySelectorAll('[id^="rdc_"]');
    let elements = document.querySelectorAll('[id^="rdc_"]');

    for (let e = 0; e < elements.length; e++) {
        let img_card = document.getElementById(elements[e].id);
        img_card.addEventListener('reduce-size', function() {
            // Agrega y luego elimina una clase para reiniciar la animación
            img_card.classList.add('reset-animation');
            setTimeout(function() {
                img_card.classList.remove('reset-animation');
                img_card.style.display = 'block';
                //img_card.classList.remove('hidden');
            }, 2000); // Ajusta este valor según la duración de tu animación
        });
    }


// Escuchar el evento 'animationend' para reiniciar la animación