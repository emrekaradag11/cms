$(document).ready(function (){
    new Swiper('.home-slider', {
        breakpoints: {
            576: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            992: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 1,
                spaceBetween: 40
            }
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    })
    new Swiper('.flash-sale', {
        breakpoints: {
            576: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            992: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 1,
                spaceBetween: 40
            }
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".next-button",
            prevEl: ".prev-button",
        },
    })
    new Swiper('.layout2', {
        breakpoints: {
            576: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            992: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".layout2-next-button",
            prevEl: ".layout2-prev-button",
        },
    })
    new Swiper('.shopByCategory', {
        slidesPerGroup : 1,
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            992: {
                slidesPerView: 6,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 8,
                spaceBetween: 30
            }
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".shopByCategory-next-button",
            prevEl: ".shopByCategory-prev-button",
        },
    })
    new Swiper('.brandSwiper', {
        slidesPerGroup : 1,
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            992: {
                slidesPerView: 6,
                spaceBetween: 30
            },
            1200: {
                slidesPerView: 8,
                spaceBetween: 30
            }
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        loop : true,
        navigation: {
            nextEl: ".brandSwiper-next-button",
            prevEl: ".brandSwiper-prev-button",
        },
    })
})
