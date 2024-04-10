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
})