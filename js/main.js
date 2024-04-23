window.addEventListener('DOMContentLoaded', function () {
    //hamburger menu
    try {
        let navMenuTrigger = document.querySelector('.hb-header__nav-trigger'),
            headerElement = document.querySelector('.hb-header'),
            navMenu = document.querySelector('.hb-header__nav'),
            activeCSSClass = 'nav-active';
        if (navMenuTrigger && headerElement && activeCSSClass && navMenu) {
            navMenuTrigger.addEventListener('click', function (e) {
                e.stopPropagation();
                headerElement.classList.toggle(activeCSSClass);
            })
            navMenu.addEventListener('click', function (e) {
                e.stopPropagation();
            })
            document.body.addEventListener('click', function (e) {
                let current = e.target;
                if (!current.closest('.hb-header')) {
                    headerElement.classList.remove(activeCSSClass);
                }
            })
        }
    } catch (e) {
        console.log(e);
    }

    //home swiper
    try {

        let homeSwiper = document.querySelector('.hb-testimonials-swiper');
        if (homeSwiper) {
            const swiper = new Swiper('.hb-testimonials-swiper', {
                // Optional parameters
                // direction: 'vertical',
                loop: true,
                clickable: true,
                // slidesPerView: 3,
                // spaceBetween: 30,

                breakpoints: {
                  320: {
                      slidesPerView: 1.2,
                      spaceBetween: 0,
                  },
                    768: {
                        slidesPerView: 2.2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 3.3,
                        spaceBetween: 30,
                    }
                },

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        }


    } catch (e) {
        console.log(e);
    }

    //footer expand
    try {
        let footerHeading = document.querySelectorAll('.hb-footer__item h3')
        if(footerHeading.length) {
            footerHeading.forEach(item=>{
                item.addEventListener('click', function (e){
                    let current = e.target;
                    if(current.closest('.hb-footer__item')) {
                        current.closest('.hb-footer__item').classList.toggle('active');
                    }
                })
            })
        }
    } catch (e) {
        console.log(e);
    }
})