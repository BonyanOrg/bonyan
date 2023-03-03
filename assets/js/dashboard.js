window.addEventListener('DOMContentLoaded', function () {

    /* ===[Start handling tabs behavior]=== */
    let dashboardTabs = document.querySelectorAll('.dashboard-tab-item');
    let dashboardTabsContents = document.querySelectorAll('.dashboard-tab-content');

    for (let dashboardTab of dashboardTabs) {

        dashboardTab.addEventListener('click', function () {

            // Remove the active class from all tabs
            dashboardTabs.forEach((dt) => {
                dt.classList.remove('active-tab');
            });

            // Add the active class to the clicked tab
            let activeTab = this.closest('.dashboard-tab-item');
            activeTab.classList.add('active-tab');

            // Store the value of the clicked tab to link it with the ID of the content
            let tabToBeActive = activeTab.getAttribute('data-target');

            // Remove The active-tab-content class from all contents and add it to the active one
            dashboardTabsContents.forEach(dtc => { dtc.classList.remove('active-tab-content') });
            document.getElementById(tabToBeActive).classList.add('active-tab-content');

        });

    }
    /* ===[End handling tabs behavior]=== */

    /* ===[Start Handling View / Edit Mode for user information]=== */
    let editBtn = document.querySelector('.edit-user-info-btn');
    let myAccount = document.getElementById('my-account');

    let cancelEditBtn = document.getElementById('cancel-user-information-edit');

    if (editBtn !== null) {
        editBtn.addEventListener('click', function () {

            myAccount.classList.add('edit-mode-active');

        });

        cancelEditBtn.addEventListener('click', function () {

            myAccount.classList.remove('edit-mode-active');

        });
    }
    /* ===[End Handling View / Edit Mode for user information]=== */
});