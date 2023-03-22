let getDir = document.dir;

window.addEventListener('DOMContentLoaded', function () {
    /* ===[Start Global]=== */
    /* ___Start only number validation___ */
    let numReg = /[\d.\.\d]+/;
    let numInputs = document.querySelectorAll('.only-number');

    numInputs.forEach((theInput) => {
        theInput.addEventListener('keypress', function (e) {
            let currentValue = e.target.value + e.key;

            if (!numReg.test(e.key)) {
                if (typeof toastr !== 'undefined') {
                    getDir !== 'rtl' ? toastr.error("You can enter English numbers only") : toastr.error("يمكنك إدخال ارقام انجليزية فقط");
                }
                e.preventDefault();
            }

            if (currentValue.split(".").length > 2) {
                if (typeof toastr !== 'undefined') {
                    getDir !== 'rtl' ? toastr.error("Invalid number") : toastr.error("الرقم غير صالح");
                }

                e.preventDefault();
            }
        });
    });
    /* ___End only number validation___ */

    /* ___Start Toggle Show/Hide Password___ */
    // Show
    let showPasswords = document.querySelectorAll('.show-password');

    if (showPasswords !== null) {
        showPasswords.forEach((showPassword) => {
            showPassword.addEventListener('click', function () {
                this.style.display = 'none';
                this.parentElement.querySelector('.hide-password').style.display = 'block';
                this.parentElement.querySelector('input').setAttribute('type', 'text');
            });
        });
    }

    // Hide
    let hidePasswords = document.querySelectorAll('.hide-password');

    if (hidePasswords !== null) {
        hidePasswords.forEach((hidePassword) => {
            hidePassword.addEventListener('click', function () {
                this.style.display = 'none';
                this.parentElement.querySelector('.show-password').style.display = 'block';
                this.parentElement.querySelector('input').setAttribute('type', 'password');
            });
        })
    }
    /* ___End Toggle Show/Hide Password___ */

    /* ___Start Handle Modal___ */
    function handleModals() {
        let modalBtns = document.querySelectorAll('.user-action-btn');

        if (modalBtns !== null) {
            let targetedModalName;
            let targetedModal;
            let giveFormId;
            let amount;
            let charityTagName;
    
            modalBtns.forEach((modalBtn) => {
                modalBtn.addEventListener('click', function () {
                    // e.preventDefault();
                    targetedModalName = modalBtn.getAttribute('data-target');
                    targetedModal = document.getElementById(targetedModalName);
                    giveFormId = this.getAttribute('data-giveformid');
                    amount = this.getAttribute('data-amount');
                    charityTagName = this.getAttribute('data-tagName');
    
                    // Check if this is donation button then check if the giveFormId not exist so don't open modal
                    if (modalBtn.classList.contains('donation-action') || modalBtn.classList.contains('donation-btn')) {
                        if (!giveFormId) {
                            toastr.warning('No form ID was found');
                            return;
                        }
    
                        let continueAsGuest = document.querySelector('.continue-as-guest');
                        continueAsGuest.setAttribute('data-giveformid', giveFormId);
                        continueAsGuest.setAttribute('data-amount', amount === null ? 50 : amount);
                        continueAsGuest.setAttribute('data-tagName', charityTagName);
                    }
    
                    if (targetedModal !== null) {
                        // If already a modal opened
                        if (document.body.classList.contains('modal-active')) {
                            document.querySelectorAll('.user-action-modal').forEach((userActionModal) => {
                                userActionModal.classList.remove('opened');
                                userActionModal.closest('body').classList.remove('modal-active');
                                userActionModal.style.display = 'none';
                                userActionModal.style.opacity = '0';
                            });
                        }
    
                        // Open
                        targetedModal.classList.add('opened');
                        targetedModal.closest('body').classList.add('modal-active');
                        targetedModal.style.display = 'flex';
    
                        setTimeout(() => {
                            targetedModal.style.opacity = '1';
                        }, 100);
                    }
    
                    // Close
                    if (targetedModal !== null) {
                        targetedModal.addEventListener('click', function (e) {
                            if (e.target.classList.contains(targetedModalName) || e.target.classList.contains('back-btn')) {
                                targetedModal.classList.remove('opened');
                                targetedModal.closest('body').classList.remove('modal-active');
                                targetedModal.style.opacity = '0';
        
                                setTimeout(() => {
                                    targetedModal.style.display = 'none';
                                }, 300);
                            }
                        });
                    }
                });
            });
        }
    }

    handleModals();
    /* ___End Handle Modal___ */
    /* ===[End Global]=== */

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

    /* ===[Start Handle upload file]=== */
    let uploadInputs = document.querySelectorAll('.upload-file-input');
    let uploadedFileName;

    if (uploadInputs !== null) {
        uploadInputs.forEach((uploadInput) => {
            uploadInput.addEventListener('change', function () {
                uploadedFileName = this.files[0].name;
                this.parentElement.parentElement.querySelector('.uploaded-file-name').textContent = uploadedFileName;
            });
        })
    }
    /* ===[End Handle upload file]=== */
});