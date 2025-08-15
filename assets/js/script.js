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
                    if (targetedModalName == 'givewp-modal') {
                        giveFormId = this.getAttribute('data-giveformid');
                        amount = this.getAttribute('data-amount');
                        charityTagName = this.getAttribute('data-tagName');

                        // Check if this is donation button then check if the giveFormId not exist so don't open modal
                        if ((modalBtn.classList.contains("donation-action") ||
                            modalBtn.classList.contains("donation-btn"))
                        ) {
                            if (!giveFormId) {
                                toastr.warning('No form ID was found');
                                return;
                            }

                            let continueAsGuest = document.querySelector('.continue-as-guest');
                            continueAsGuest.setAttribute('data-giveformid', giveFormId);
                            continueAsGuest.setAttribute('data-amount', amount === null ? 50 : amount);
                            continueAsGuest.setAttribute('data-tagName', charityTagName);
                        }

                    } else if (targetedModalName == 'donation-modal') {
                        // Handle donation modal - set form ID on continue-as-guest button
                        giveFormId = this.getAttribute('data-giveformid');
                        amount = this.getAttribute('data-amount');
                        charityTagName = this.getAttribute('data-tagName');

                        // Check if this is donation button then check if the giveFormId not exist so don't open modal
                        if ((modalBtn.classList.contains("donation-action") ||
                            modalBtn.classList.contains("donation-btn") ||
                            modalBtn.classList.contains("donate-now-btn"))
                        ) {
                            if (!giveFormId) {
                                toastr.warning('No form ID was found');
                                return;
                            }

                            let continueAsGuest = document.querySelector('.continue-as-guest');
                            if (continueAsGuest) {
                                continueAsGuest.setAttribute('data-giveformid', giveFormId);
                                continueAsGuest.setAttribute('data-amount', amount === null ? 50 : amount);
                                continueAsGuest.setAttribute('data-tagName', charityTagName);
                            }
                        }
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
                                document.querySelector('.continue-as-guest').setAttribute('data-qurbandetails', ""); // Reset Qurban Details (for normal donations on guest Mod)

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
            if (!e.target.parentElement?.classList.contains('lang-switcher')) {
                let switcherDropdowns = document.querySelectorAll('.lang-switcher--dropdown');

                switcherDropdowns.forEach((switcherDropdown) => {
                    switcherDropdown.parentElement.classList.remove('active');
                });
            }
        }
    });
    /* ===[End Language Swicher]=== */

    /* ===[Start Mobile Header]=== */
    function initMobileHeader() {
        if (window.innerWidth <= 1024) {
            let mainHeaderTag = document.querySelector('header');
            let toggleMobileMenuBtn = document.querySelector('.burger-btn');
            let mobileMenuNav = document.querySelector('.bottom-header');

            // Debug logging
            console.log('Mobile header init - Elements found:', {
                header: !!mainHeaderTag,
                burgerBtn: !!toggleMobileMenuBtn,
                mobileNav: !!mobileMenuNav,
                windowWidth: window.innerWidth
            });

            // Only add event listeners if they haven't been added already
            if (toggleMobileMenuBtn && !toggleMobileMenuBtn.hasAttribute('data-mobile-initialized')) {
                toggleMobileMenuBtn.setAttribute('data-mobile-initialized', 'true');
                
                // Toggle Button Handler
                toggleMobileMenuBtn.addEventListener('click', function () {
                    console.log('Burger button clicked!');
                    this.classList.toggle('active');
                    mobileMenuNav.classList.toggle('active-nav');
                    mainHeaderTag.classList.toggle('expanded-nav');
                    
                    console.log('Mobile menu state:', {
                        burgerActive: this.classList.contains('active'),
                        navActive: mobileMenuNav.classList.contains('active-nav'),
                        headerExpanded: mainHeaderTag.classList.contains('expanded-nav')
                    });
                });

                // Add sub-menu classes
                document.querySelectorAll('.sub-menu .sub-menu').forEach((subMenu) => {
                    subMenu.classList.add('next-level');
                });

                // Mobile menu click handler
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
        } else {
            // Reset mobile menu state when switching to desktop
            let toggleMobileMenuBtn = document.querySelector('.burger-btn');
            let mobileMenuNav = document.querySelector('.bottom-header');
            let mainHeaderTag = document.querySelector('header');
            
            if (toggleMobileMenuBtn) {
                toggleMobileMenuBtn.classList.remove('active');
                toggleMobileMenuBtn.removeAttribute('data-mobile-initialized');
            }
            if (mobileMenuNav) {
                mobileMenuNav.classList.remove('active-nav');
            }
            if (mainHeaderTag) {
                mainHeaderTag.classList.remove('expanded-nav');
            }
        }
    }

    // Initialize mobile header on page load
    initMobileHeader();

    // Initialize mobile header on window resize
    window.addEventListener('resize', initMobileHeader);
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

    /* ===[Start Count the header for scroll to anchor]=== */
    function correctScrollToAnchor() {
        let links = document.querySelectorAll('a[href^="#"]');
        let headerHeight = document.querySelector('header').clientHeight;

        links?.forEach((link) => {
            link.addEventListener('click', function (e) {
                let anchorTarget = e.target.getAttribute('href');

                if (anchorTarget && anchorTarget.length <= 1) {
                    return;
                }

                if (anchorTarget && anchorTarget.length > 1) {
                    e.preventDefault();
                    let anchorTargetPosition = document.querySelector(anchorTarget);
                    let scrollToCalc = anchorTargetPosition.getBoundingClientRect().top + window.scrollY - headerHeight - 20;

                    window.location.hash = anchorTarget;
                    window.scrollTo(0, scrollToCalc);
                }

            });
        })
    };

    correctScrollToAnchor();

    window.addEventListener('resize', correctScrollToAnchor);
    /* ===[End Count the header for scroll to anchor]=== */
});

/* ===[Start Toggle Zoho Desk]=== */
let zohoDeskBtn = document.querySelector('.zoho-desk-support-btn');

if (zohoDeskBtn !== null) {
    zohoDeskBtn.addEventListener('click', function () {
        zohoDeskParentContainer = this.parentElement;
        zohoForm = this.nextElementSibling;

        if (zohoForm.classList.contains('zds-expanded')) {

            setTimeout(() => {
                zohoForm.classList.add('d-none');
                zohoDeskParentContainer.classList.remove('active');
            }, 300);

            zohoForm.classList.remove('zds-expanded');
            zohoDeskParentContainer.querySelector('svg:first-of-type').classList.remove('d-none');
            zohoDeskParentContainer.querySelector('svg:last-of-type').classList.add('d-none');
        }

        else {
            setTimeout(() => {
                zohoForm.classList.add('zds-expanded');
            }, 100);

            zohoDeskParentContainer.querySelector('svg:first-of-type').classList.add('d-none');
            zohoDeskParentContainer.querySelector('svg:last-of-type').classList.remove('d-none');
            zohoDeskParentContainer.classList.add('active');
            zohoForm.classList.remove('d-none');
        }
    });
}
/* ===[End Toggle Zoho Desk]=== */

/* ===[Start New Dashboard]=== */
window.addEventListener('DOMContentLoaded', function () {
    // Sidebar Toggler Handler
    let dashboardSidebarToggler = document.querySelector('.sidebar-header .collapse-toggler');

    if (dashboardSidebarToggler !== null && window.innerWidth > 992) {
        dashboardSidebarToggler.addEventListener('click', function () {
            let dashboardBox = this.closest('.dashboard-box');
            dashboardBox.classList.toggle('dashboard-sidebar-collapsed');
        });
    }

    if (window.innerWidth <= 992) {
        dashboardSidebarToggler.addEventListener('click', function () {
            let sidebarItems = document.querySelectorAll('.dashboard-sidebar-item');

            sidebarItems.forEach((sidebarItem) => {
                sidebarItem.classList.toggle('d-none');
            })
        });
    }

    /* Start Dashboard Remove Active Class Handler & Remove all tab contents */
    let dashboardTabs = document.querySelectorAll('.dashboard-sidebar-item:not(a)');
    let dashboardTabsContents = document.querySelectorAll('.dashboard-tab-content');

    function clearActiveClass() {
        dashboardTabs.forEach((dashboardTab) => {
            dashboardTab.classList.remove('active');
        });

        dashboardTabsContents.forEach((dashboardTabContent) => {
            dashboardTabContent.classList.add('d-none');
            dashboardTabContent.style.opacity = 0;
        });
    }
    /* End Dashboard Remove Active Class Handler & Remove all tab contents */

    /* Start Dashboard Add Active Class Handler & show related content */
    for (let dashboardTab of dashboardTabs) {
        dashboardTab.addEventListener('click', function () {
            let _this = this;

            if (_this.classList.contains('active')) {
                return;
            }

            clearActiveClass();

            _this.classList.add('active');

            let relatedContent = _this.getAttribute('data-target');

            document.getElementById(relatedContent).classList.remove('d-none');

            setTimeout(() => {
                document.getElementById(relatedContent).style.opacity = 1;
            }, 300)
        });
    }
    /* End Dashboard Add Active Class Handler & show related content */
});

jQuery(document).ready(function ($) {
    // Donation History DataTable
    // Global Variables
    let getDir = document.dir;
    let windowWidth = $(window).innerWidth();
    let isResponsive = false;

    if (windowWidth <= 768) {
        isResponsive = true;
    }

    // For Arabic Datatable
    let arLang;

    if (getDir) {
        arLang = {
            lengthMenu: "عرض _MENU_ مدخلات في كل صفحة",
            zeroRecords: "لايوجد شيء - عذراً",
            info: "اظهار صفحة _PAGE_ من _PAGES_",
            infoEmpty: "لايوجد شيء",
            infoFiltered: "(تمت تصفيته من _MAX_ إجمالي السجلات)",
            search: "بحث عن: ",
            zeroRecords: "لم يتم العثور على سجلات مطابقة",
        };
    }

    /* Start Dashboard & Donation History Datatables */
    let donationHistory = $('#donation-history-table, #donation-history-table-in-history-tab');
    let getPageDir = document.documentElement.dir;

    let statusPosition = {
        left: 0
    }

    if (getPageDir === 'rtl') {
        statusPosition = {
            left: "unset",
            right: 0
        }
    }

    if (donationHistory.length > 0) {
        let pageLength = 4;

        if ($('.dashboard-sidebar-item[data-target=donation-history]').hasClass('active')) {
            pageLength = 10;
        }

        let donationHistoryTable = donationHistory.DataTable({
            "dom": 'rtip',
            "paging": true,
            "pageLength": pageLength,
            "searching": true,
            "scrollX": true,
            "pagingType": "simple",
            "order": [[3, 'desc']],

            responsive: isResponsive,

            columnDefs: [
                { responsivePriority: 1, targets: 2 },
                // { responsivePriority: 2, targets: -2 }
            ],

            "language": {
                ...arLang,
                paginate: {
                    "next": "<div><i class='fa-solid fa-arrow-right'></i></div>",
                    "previous": "<div><i class='fa-solid fa-arrow-left'></i></div>"
                }
            },

            "rowCallback": function (row, data) {
                if (!isResponsive) {
                    $('td:eq(4)', row).css({
                        position: "relative",
                        padding: "0 1rem",
                    });

                    $('td:eq(4) .status', row).css({
                        width: "10px",
                        height: "10px",
                        borderRadius: "50%",
                        position: "absolute",
                        top: "50%",
                        transform: "translateY(-50%)",
                        ...statusPosition
                    });

                    switch ($('td:eq(4) span', row).text()) {
                        case "Complete":
                            $('td:eq(4) .status', row).css({
                                background: "#38C2CF"
                            });

                            break;

                        case "Pending":
                            $('td:eq(4) .status', row).css({
                                background: "#E8B21F"
                            });

                            break;

                        case "Abandoned":
                            $('td:eq(4) .status', row).css({
                                background: "#f42020"
                            });

                            break;

                        default:
                            $('td:eq(4) .status', row).css({
                                background: "transparent"
                            });
                            break;
                    }
                }
            }
        });

        $('.sidebar-header').on('click', function () {
            setTimeout(() => {
                donationHistoryTable.draw();
            }, 300)
        });

        $('.dashboard-sidebar-item').on('click', function () {
            setTimeout(() => {
                donationHistoryTable.columns.adjust();
                donationHistoryTable.draw();
            }, 300);
        });
    }
    /* End Dashboard & Donation History Datatables */

    /* Start Recurring Datatable */
    let recurring = $('#recurring-donations-table');

    if (recurring.length > 0) {

        let recurringTable = recurring.DataTable({
            "dom": 'rtip',
            "paging": true,
            "pageLength": 10,
            "searching": true,
            "scrollX": true,
            "pagingType": "simple",
            "order": [[2, 'desc']],

            responsive: isResponsive,

            "language": {
                ...arLang,
                paginate: {
                    "next": "<div><i class='fa-solid fa-arrow-right'></i></div>",
                    "previous": "<div><i class='fa-solid fa-arrow-left'></i></div>"
                }
            },

            columnDefs: [
                { responsivePriority: 1, targets: 2 },
                // { responsivePriority: 2, targets: -2 }
            ],

            "rowCallback": function (row, data) {
                if (!isResponsive) {
                    $('td:eq(4)', row).css({
                        position: "relative",
                        padding: "0 1rem",
                    });

                    $('td:eq(4) .status', row).css({
                        width: "10px",
                        height: "10px",
                        borderRadius: "50%",
                        position: "absolute",
                        top: "50%",
                        transform: "translateY(-50%)",
                        ...statusPosition
                    });

                    switch ($('td:eq(4) span', row).text()) {
                        case "Active":
                            $('td:eq(4) .status', row).css({
                                background: "#38C2CF"
                            });

                            break;

                        case "Pending":
                            $('td:eq(4) .status', row).css({
                                background: "#E8B21F"
                            });

                            break;

                        case "Abandoned":
                            $('td:eq(4) .status', row).css({
                                background: "#f42020"
                            });

                            break;

                        case "Failed":
                            $('td:eq(4) .status', row).css({
                                background: "#f42020"
                            });

                            break;

                        case "Cancelled":
                            $('td:eq(4) .status', row).css({
                                background: "#b9b9b9"
                            });

                            break;

                        default:
                            $('td:eq(4) .status', row).css({
                                background: "transparent"
                            });
                            break;
                    }
                }
            }
        });

        $('.sidebar-header').on('click', function () {
            setTimeout(() => {
                recurringTable.draw();
            }, 300)
        });

        $('.dashboard-sidebar-item').on('click', function () {
            setTimeout(() => {
                recurringTable.columns.adjust();
                recurringTable.draw();
            }, 300);
        });
    }
    /* End Recurring Datatable */

    /* Start Handle Avatar Image Upload */
    let uploadAvatarInput = document.querySelector('.dashboard-upload-file-input');
    let previewAvatar = document.querySelector('.edit-avatar .donor-avatar img');
    let previewAvatarName = document.querySelector('.dashboard-upload-information span > span');

    if (uploadAvatarInput !== null) {
        uploadAvatarInput.addEventListener('change', function () {
            previewAvatar.src = URL.createObjectURL(this.files[0]);
            previewAvatarName.textContent = this.files[0].name;
        });
    }
    /* End Handle Avatar Image Upload */
});
/* ===[End New Dashboard]=== */