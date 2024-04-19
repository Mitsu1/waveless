let banners = document.querySelectorAll('[id^="banner"]');

banners.forEach(function(banner) {
    let img_path = banner.getAttribute('img_path');
    banner.style.backgroundImage = `url('${img_path}')`;
});

const swiper = new Swiper(".swiper-hero", {
  // Optional parameters
    direction: "horizontal",
    /*loop: true,
    effect: "fade",
    autoplay: {
        delay: 4000,
    },*/

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    scrollbar: {
        el: ".swiper-scrollbar",
    },
});

