window.addEventListener('DOMContentLoaded', function () {
    /* ===[Start Language Swicher]=== */
    let langSwichBtns = document.querySelectorAll('.lang-switcher button');

    langSwichBtns.forEach((langSwichBtn) => {
        langSwichBtn.addEventListener('click', function () {
            this.parentElement.classList.toggle('active');
        });
    });

    window.addEventListener('click', function (e) {
        // Close Language Swicher
        if (e.target.tagName !== 'HTML') {
            if (!e.target.parentElement.classList.contains('lang-switcher')) {
                let switcherDropdowns = document.querySelectorAll('.lang-switcher--dropdown');

                switcherDropdowns.forEach((switcherDropdown) => {
                    switcherDropdown.parentElement.classList.remove('active');
                });
            }
        }
    });
    /* ===[End Language Swicher]=== */

    /* ===[Start Mobile Header]=== */
    if (window.innerWidth <= 1024) {
        /* ===[Start Mobile Header]=== */
        let mainHeaderTag = document.querySelector('header');
        let toggleMobileMenuBtn = document.querySelector('.burger-btn');
        let mobileMenuNav = document.querySelector('.bottom-header');

        // Toggle Button Handler
        toggleMobileMenuBtn.addEventListener('click', function () {
            this.classList.toggle('active');
            mobileMenuNav.classList.toggle('active-nav');
            mainHeaderTag.classList.toggle('expanded-nav');
        });

        document.querySelectorAll('.sub-menu .sub-menu').forEach((subMenu) => {
            subMenu.classList.add('next-level');
        });

        mobileMenuNav.addEventListener('click', function (e) {
            e.stopPropagation();

            if (e.target.classList.contains('menu-arrow')) {

                // In case of clicking outside but not the nested level of sub menu
                if (!e.target.nextElementSibling.classList.contains('next-level')) {
                    document.querySelectorAll('.sub-menu').forEach((subMenu) => {
                        subMenu.style.display = 'none';
                    });

                    document.querySelectorAll('.next-level').forEach((nextLevel) => {
                        nextLevel.classList.remove('opened');
                        e.target.style.transform = 'rotateX(0deg)';
                    })
                }

                // In case of opening already opened sub menu (It will close)
                if (e.target.nextElementSibling.classList.contains('opened')) {
                    e.target.nextElementSibling.style.display = 'none';
                    e.target.nextElementSibling.classList.remove('opened');
                    e.target.style.transform = 'rotateX(0deg)';
                }

                // In case of click the arrow to open a closed sub menu (It will open)
                else {
                    if (document.querySelectorAll('.sub-menu.opened').length > 0 && !e.target.nextElementSibling.classList.contains('next-level')) {
                        document.querySelectorAll('.sub-menu.opened').forEach((subMenuOpened) => {
                            subMenuOpened.classList.remove('opened');
                        })
                    }

                    if (!e.target.nextElementSibling.classList.contains('next-level')) {
                        document.querySelectorAll('.menu-arrow').forEach((menuArrow) => menuArrow.style.transform = 'rotateY(0deg)');
                    }

                    e.target.nextElementSibling.style.display = 'block';
                    e.target.nextElementSibling.classList.add('opened');
                    e.target.style.transform = 'rotate(180deg)';
                }
            }

            // In case if the click isn't on the arrow
            else {
                // if the clicked element isn't containing menu-item class which is the <li> then close any opened sub menus
                if (!e.target.parentElement.classList.contains('sub-menu')) {
                    document.querySelectorAll('.menu-arrow').forEach((menuArrow) => menuArrow.style.transform = 'rotateY(0deg)');

                    document.querySelectorAll('.sub-menu').forEach((subMenu) => {
                        subMenu.style.display = 'none';
                        subMenu.classList.remove('opened');
                    });
                }
            }
        });
    }
    /* ===[End Mobile Header]=== */
});