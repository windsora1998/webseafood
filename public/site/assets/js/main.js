$('.owl-carousel').owlCarousel({
    loop:true,
    margin: 30,
    nav: true,
    autoplay: true,
    smartSpeed: 250,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        300:{
            items:1,
        },
        600:{
            items:3,
        }
    }
})

