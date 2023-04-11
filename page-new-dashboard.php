<?php get_header(); ?>

<div class="container my-3 my-lg-5">
    <div class="custom-givewp-dashboard">
        <div class="dashboard-box">

            <!-- Start Dashboard sidebar -->
            <div class="dashboard-sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-logo">
                        <!-- <?php the_custom_logo(); ?> -->
                    </div>
                    <div class="collapse-toggler">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM64 256c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                        </svg>
                    </div>
                </div>

                <div class="dashboard-sidebar-item active" data-target="donor-dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18.733" viewBox="0 0 18 18.733">
                        <path id="Path_10524" data-name="Path 10524" d="M21,20a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V9.49a1,1,0,0,1,.386-.79l8-6.222a1,1,0,0,1,1.228,0l8,6.222A1,1,0,0,1,21,9.49V20Z" transform="translate(-3 -2.267)" fill="#5b5b5b" />
                    </svg>

                    <span>Donor Dashboard</span>
                </div>

                <div class="dashboard-sidebar-item" data-target="donation-history">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path id="Path_10527" data-name="Path 10527" d="M12,2A10,10,0,1,1,2,12H4A8,8,0,1,0,5.385,7.5H8v2H2v-6H4V6A9.981,9.981,0,0,1,12,2Zm1,5v4.585l3.243,3.243-1.415,1.415L11,12.413V7Z" transform="translate(-2 -2)" fill="#5b5b5b" />
                    </svg>

                    <span>Donation History</span>
                </div>

                <div class="dashboard-sidebar-item" data-target="recurring-donations">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <path id="Path_10558" data-name="Path 10558" d="M18.537,19.567A9.982,9.982,0,1,1,20.19,17.74L17,12h3a8,8,0,1,0-2.46,5.772Z" transform="translate(-2 -2)" fill="#5b5b5b" />
                    </svg>

                    <span>Recurring Donations</span>
                </div>

                <div class="dashboard-sidebar-item" data-target="edit-profile">

                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="22" viewBox="0 0 19 22">
                        <path id="Path_10530" data-name="Path 10530" d="M12,1l9.5,5.5v11L12,23,2.5,17.5V6.5Zm0,14a3,3,0,1,0-3-3A3,3,0,0,0,12,15Z" transform="translate(-2.5 -1)" fill="#5b5b5b" />
                    </svg>

                    <span>Edit Profile</span>
                </div>

                <div class="dashboard-sidebar-item" data-target="wishlist">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.579" height="18.881" viewBox="0 0 21.579 18.881">
                        <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M19.483,3.539a5.763,5.763,0,0,0-7.864.573l-.83.856-.83-.856a5.763,5.763,0,0,0-7.864-.573A6.052,6.052,0,0,0,1.677,12.3l8.155,8.421a1.321,1.321,0,0,0,1.909,0L19.9,12.3a6.048,6.048,0,0,0-.413-8.762Z" transform="translate(0.001 -2.248)" fill="#5b5b5b" />
                    </svg>

                    <span>Wishlist</span>
                </div>

                <a href="<?php echo wp_logout_url() ?>" class="dashboard-sidebar-item logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20">
                        <path id="Path_10533" data-name="Path 10533" d="M4,18H6v2H18V4H6V6H4V3A1,1,0,0,1,5,2H19a1,1,0,0,1,1,1V21a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1Zm2-7h7v2H6v3L1,12,6,8Z" transform="translate(-1 -2)" fill="#5b5b5b" />
                    </svg>

                    <span><?php _e('Logout', 'bonyan'); ?></span>
                </a>
            </div>
            <!-- End Dashboard sidebar -->

            <!-- ===[Start Dashboard View]=== -->
            <div class="dashboard-view">

                <!-- Start Dashboard Tab Content -->
                <div class="dashboard-tab-content" id="donor-dashboard">
                    <div class="dashboard-donor-info-box with-padding pt-3">
                        <div class="donor-avatar">
                            <img src="<?php echo get_template_directory_uri() . '/dist/imgs/dashboard-donor-avatar.png' ?>" alt="Donor Avatar">
                        </div>

                        <div class="donor-info">
                            <div class="donor-info-item donor-info--name">
                                <span>Name Surname</span>
                            </div>

                            <div class="donor-info--others">
                                <div class="donor-info-item donor-info--company">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.948" height="16.154" viewBox="0 0 17.948 16.154">
                                        <path id="Path_10535" data-name="Path 10535" d="M8.282,17.359h2.692V11.922l-3.59-3.13-3.59,3.13v5.437H6.487v-3.59H8.282Zm10.769,1.795H2.9a.9.9,0,0,1-.9-.9V11.514a.9.9,0,0,1,.308-.677L5.59,7.975V3.9a.9.9,0,0,1,.9-.9H19.051a.9.9,0,0,1,.9.9V18.256A.9.9,0,0,1,19.051,19.154Zm-4.487-8.974v1.795h1.795V10.179Zm0,3.59v1.795h1.795V13.769Zm0-7.179V8.385h1.795V6.59Zm-3.59,0V8.385h1.795V6.59Z" transform="translate(-2 -3)" fill="#5b5b5b" />
                                    </svg>

                                    <span>2P Company</span>
                                </div>

                                <div class="donor-info-item donor-info--last-donation">
                                    <svg id="Group_3108" data-name="Group 3108" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10536" data-name="Path 10536" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10537" data-name="Path 10537" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22Zm1-10V7H11v7h6V12Z" fill="#5b5b5b" />
                                    </svg>

                                    <span>Last donated 1 day ago</span>
                                </div>

                                <div class="donor-info-item donor-info--first-donation-date">
                                    <svg id="Group_3109" data-name="Group 3109" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10538" data-name="Path 10538" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10539" data-name="Path 10539" d="M20,20a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H1L11.327,1.612a1,1,0,0,1,1.346,0L23,11H20Zm-8-3,3.359-3.359a2.25,2.25,0,0,0-3.182-3.182L12,10.636l-.177-.177a2.25,2.25,0,1,0-3.182,3.182Z" fill="#5b5b5b" />
                                    </svg>


                                    <span>Donor for 1 week</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-tab-contents-holder">
                        <div class="dashboard-tab-content-section donor-giving-stats">
                            <div class="dashboard-content-section-heading mt-3 py-3">
                                <div class="dashboard-content-section-heading-title with-padding">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-line" class="svg-inline--fa fa-chart-line fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM464 96H345.94c-21.38 0-32.09 25.85-16.97 40.97l32.4 32.4L288 242.75l-73.37-73.37c-12.5-12.5-32.76-12.5-45.25 0l-68.69 68.69c-6.25 6.25-6.25 16.38 0 22.63l22.62 22.62c6.25 6.25 16.38 6.25 22.63 0L192 237.25l73.37 73.37c12.5 12.5 32.76 12.5 45.25 0l96-96 32.4 32.4c15.12 15.12 40.97 4.41 40.97-16.97V112c.01-8.84-7.15-16-15.99-16z"></path>
                                    </svg>

                                    <span>Your Giving Stats</span>
                                </div>
                            </div>

                            <div class="dashboard-content-section-body">
                                <div class="donor-giving-stats-values with-padding">
                                    <div class="donor-stats-item">
                                        <span>7</span>
                                        <span>Number <br /> of donations</span>
                                    </div>

                                    <div class="donor-stats-item">
                                        <span>7</span>
                                        <span>LIFETIME<br /> DONATIONS</span>
                                    </div>

                                    <div class="donor-stats-item">
                                        <span>7</span>
                                        <span>AVERAGE<br /> DONATION</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-tab-content-section donations-history">
                            <div class="dashboard-content-section-heading py-3">
                                <div class="dashboard-content-section-heading-title with-padding">
                                    <svg id="Group_3116" data-name="Group 3116" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10546" class="no-fill" data-name="Path 10546" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10547" data-name="Path 10547" d="M2,11H22v9a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1ZM17,3h4a1,1,0,0,1,1,1V9H2V4A1,1,0,0,1,3,3H7V1H9V3h6V1h2Z" fill="#6d54a7" />
                                    </svg>

                                    <span>Recent Donations</span>
                                </div>
                            </div>

                            <div class="dashboard-content-section-body">
                                <div class="donations-history-values with-padding">
                                    <table id="donation-history-table" class="donation-history-table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Donations</th>
                                                <th>Campaign</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Receipt</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 13, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</></button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Pending</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Abandoned</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Dashboard Tab Content -->

                <!-- Start Donation History Tab Content -->
                <div class="d-none dashboard-tab-content" id="donation-history">
                    <div class="dashboard-donor-info-box with-padding pt-3">
                        <div class="donor-avatar">
                            <img src="<?php echo get_template_directory_uri() . '/dist/imgs/dashboard-donor-avatar.png' ?>" alt="Donor Avatar">
                        </div>

                        <div class="donor-info">
                            <div class="donor-info-item donor-info--name">
                                <span>Name Surname</span>
                            </div>

                            <div class="donor-info--others">
                                <div class="donor-info-item donor-info--company">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.948" height="16.154" viewBox="0 0 17.948 16.154">
                                        <path id="Path_10535" data-name="Path 10535" d="M8.282,17.359h2.692V11.922l-3.59-3.13-3.59,3.13v5.437H6.487v-3.59H8.282Zm10.769,1.795H2.9a.9.9,0,0,1-.9-.9V11.514a.9.9,0,0,1,.308-.677L5.59,7.975V3.9a.9.9,0,0,1,.9-.9H19.051a.9.9,0,0,1,.9.9V18.256A.9.9,0,0,1,19.051,19.154Zm-4.487-8.974v1.795h1.795V10.179Zm0,3.59v1.795h1.795V13.769Zm0-7.179V8.385h1.795V6.59Zm-3.59,0V8.385h1.795V6.59Z" transform="translate(-2 -3)" fill="#5b5b5b" />
                                    </svg>

                                    <span>2P Company</span>
                                </div>

                                <div class="donor-info-item donor-info--last-donation">
                                    <svg id="Group_3108" data-name="Group 3108" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10536" data-name="Path 10536" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10537" data-name="Path 10537" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22Zm1-10V7H11v7h6V12Z" fill="#5b5b5b" />
                                    </svg>

                                    <span>Last donated 1 day ago</span>
                                </div>

                                <div class="donor-info-item donor-info--first-donation-date">
                                    <svg id="Group_3109" data-name="Group 3109" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10538" data-name="Path 10538" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10539" data-name="Path 10539" d="M20,20a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H1L11.327,1.612a1,1,0,0,1,1.346,0L23,11H20Zm-8-3,3.359-3.359a2.25,2.25,0,0,0-3.182-3.182L12,10.636l-.177-.177a2.25,2.25,0,1,0-3.182,3.182Z" fill="#5b5b5b" />
                                    </svg>


                                    <span>Donor for 1 week</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-tab-contents-holder">
                        <div class="dashboard-tab-content-section donations-history">
                            <div class="dashboard-content-section-heading mt-3 py-3">
                                <div class="dashboard-content-section-heading-title with-padding">
                                    <span>6 Total Donations</span>
                                </div>
                            </div>

                            <div class="dashboard-content-section-body">
                                <div class="donations-history-values with-padding">
                                    <table id="donation-history-table-in-history-tab" class="donation-history-table-in-history-tab" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Donations</th>
                                                <th>Campaign</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Receipt</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 13, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Pending</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Abandoned</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>

                                            <tr>
                                                <td>ID:09181</td>
                                                <td>100$</td>
                                                <td>Donation Form</td>
                                                <td>October 12, 2022 11:28 am</td>
                                                <td>
                                                    <div class="status"></div><span>Complete</span>
                                                </td>
                                                <td><button>View Receipt</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Donation History Tab Content -->

                <!-- Start Recurring Donations Tab Content -->
                <div class="d-none dashboard-tab-content" id="recurring-donations">
                    <div class="dashboard-donor-info-box with-padding pt-3">
                        <div class="donor-avatar">
                            <img src="<?php echo get_template_directory_uri() . '/dist/imgs/dashboard-donor-avatar.png' ?>" alt="Donor Avatar">
                        </div>

                        <div class="donor-info">
                            <div class="donor-info-item donor-info--name">
                                <span>Name Surname</span>
                            </div>

                            <div class="donor-info--others">
                                <div class="donor-info-item donor-info--company">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.948" height="16.154" viewBox="0 0 17.948 16.154">
                                        <path id="Path_10535" data-name="Path 10535" d="M8.282,17.359h2.692V11.922l-3.59-3.13-3.59,3.13v5.437H6.487v-3.59H8.282Zm10.769,1.795H2.9a.9.9,0,0,1-.9-.9V11.514a.9.9,0,0,1,.308-.677L5.59,7.975V3.9a.9.9,0,0,1,.9-.9H19.051a.9.9,0,0,1,.9.9V18.256A.9.9,0,0,1,19.051,19.154Zm-4.487-8.974v1.795h1.795V10.179Zm0,3.59v1.795h1.795V13.769Zm0-7.179V8.385h1.795V6.59Zm-3.59,0V8.385h1.795V6.59Z" transform="translate(-2 -3)" fill="#5b5b5b" />
                                    </svg>

                                    <span>2P Company</span>
                                </div>

                                <div class="donor-info-item donor-info--last-donation">
                                    <svg id="Group_3108" data-name="Group 3108" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10536" data-name="Path 10536" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10537" data-name="Path 10537" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22Zm1-10V7H11v7h6V12Z" fill="#5b5b5b" />
                                    </svg>

                                    <span>Last donated 1 day ago</span>
                                </div>

                                <div class="donor-info-item donor-info--first-donation-date">
                                    <svg id="Group_3109" data-name="Group 3109" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10538" data-name="Path 10538" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10539" data-name="Path 10539" d="M20,20a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H1L11.327,1.612a1,1,0,0,1,1.346,0L23,11H20Zm-8-3,3.359-3.359a2.25,2.25,0,0,0-3.182-3.182L12,10.636l-.177-.177a2.25,2.25,0,1,0-3.182,3.182Z" fill="#5b5b5b" />
                                    </svg>


                                    <span>Donor for 1 week</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-tab-contents-holder">
                        <div class="dashboard-tab-content-section donations-history">
                            <div class="dashboard-content-section-heading mt-3 py-3">
                                <div class="dashboard-content-section-heading-title with-padding">
                                    <span>Recurring Donations</span>
                                </div>
                            </div>

                            <div class="dashboard-content-section-body">
                                <div class="donations-history-values with-padding">
                                    <table id="recurring-donations-table" class="recurring-donations-table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Campaign</th>
                                                <th>Recurring</th>
                                                <th>Date Started</th>
                                                <th>Next Payment</th>
                                                <th>Status</th>
                                                <th>Manage</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Provide Food for Syrian Refugees</td>
                                                <td>$50.00 / Monthly</td>
                                                <td>31 Mar 23</td>
                                                <td>01 May 23</td>
                                                <td>
                                                    <div class="status"></div><span>Active</span>
                                                </td>
                                                <td><button>Cancel</button></td>
                                            </tr>

                                            <tr>
                                                <td>Provide Food for Syrian Refugees</td>
                                                <td>$50.00 / Monthly</td>
                                                <td>31 Mar 23</td>
                                                <td>01 May 23</td>
                                                <td>
                                                    <div class="status"></div><span>Active</span>
                                                </td>
                                                <td><button>Cancel</button></td>
                                            </tr>

                                            <tr>
                                                <td>Provide Food for Syrian Refugees</td>
                                                <td>$50.00 / Monthly</td>
                                                <td>31 Mar 23</td>
                                                <td>01 May 23</td>
                                                <td>
                                                    <div class="status"></div><span>Active</span>
                                                </td>
                                                <td><button>Cancel</button></td>
                                            </tr>

                                            <tr>
                                                <td>Provide Food for Syrian Refugees</td>
                                                <td>$50.00 / Monthly</td>
                                                <td>31 Mar 23</td>
                                                <td>01 May 23</td>
                                                <td>
                                                    <div class="status"></div><span>Active</span>
                                                </td>
                                                <td><button>Cancel</button></td>
                                            </tr>

                                            <tr>
                                                <td>Provide Food for Syrian Refugees</td>
                                                <td>$50.00 / Monthly</td>
                                                <td>31 Mar 23</td>
                                                <td>01 May 23</td>
                                                <td>
                                                    <div class="status"></div><span>Active</span>
                                                </td>
                                                <td><button>Cancel</button></td>
                                            </tr>

                                            <tr>
                                                <td>Provide Food for Syrian Refugees</td>
                                                <td>$50.00 / Monthly</td>
                                                <td>31 Mar 23</td>
                                                <td>01 May 23</td>
                                                <td>
                                                    <div class="status"></div><span>Active</span>
                                                </td>
                                                <td><button>Cancel</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Recurring Donations Tab Content -->

                <!-- Start Edit Profile Tab Content -->
                <div class="d-none dashboard-tab-content" id="edit-profile">
                    <div class="dashboard-tab-content-section donations-history">
                        <div class="dashboard-content-section-heading py-3">
                            <div class="dashboard-content-section-heading-title with-padding">
                                <span>Edit Profile</span>
                            </div>
                        </div>

                        <div class="dashboard-content-section-body">
                            <div class="edit-avatar with-padding">
                                <label class="dashboard-custom-upload-file" for="dashboard-upload-avatar">
                                    <div class="donor-avatar">
                                        <img src="<?php echo get_template_directory_uri() . '/dist/imgs/dashboard-donor-avatar.png' ?>" alt="Donor Avatar">
                                    </div>

                                    <div class="dashboard-upload-information">
                                        <span>This image here to set avatar of <span>Find Image</span></span>
                                    </div>

                                    <input type="file" name="dashboard-upload-avatar" id="dashboard-upload-avatar" class="upload-file-input">
                                </label>
                            </div>

                            <div class="edit-donor-info-container with-padding">

                                <div class="select-holder">
                                    <label>Prefix</label>
                                    <select name="prefix" id="prefix">
                                        <option value="mr.">Mr.</option>
                                        <option value="mrs.">Mrs.</option>
                                    </select>
                                </div>

                                <div class="input-holder">
                                    <label for="edit_user_info_first_name">First Name</label>
                                    <input type="text" name="edit_user_info_first_name" id="edit_user_info_first_name">
                                </div>

                                <div class="input-holder">
                                    <label for="edit_user_info_last_name">Last Name</label>
                                    <input type="text" name="edit_user_info_last_name" id="edit_user_info_last_name">
                                </div>

                                <div class="input-holder full-width">
                                    <label for="company">Company</label>
                                    <input type="text" name="edit_user_info_company" id="edit_user_info_company">
                                </div>

                                <div class="input-holder full-width">
                                    <label for="edit_user_info_email">Email</label>
                                    <input type="email" name="edit_user_info_email" id="edit_user_info_email">
                                </div>

                                <button class="primary-btn">Save</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Edit Profile Tab Content -->

                <!-- Start Wishlist Tab Conent -->
                <div class="d-none dashboard-tab-content" id="wishlist">
                    <div class="dashboard-content-section-heading py-3">
                        <div class="dashboard-content-section-heading-title with-padding">
                            <span>Wishlist</span>
                        </div>
                    </div>

                    <div class="dashboard-content-section-body">
                        <div class="campaign">
                            <div class="cards-container with-padding">
                                <div class="campaign-card">
                                    <div class="add-to-fav " data-isdonordashboard="false" data-id="303">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.3134 6.37833C23.7175 5.78217 23.01 5.30925 22.2313 4.98659C21.4526 4.66394 20.618 4.49786 19.7751 4.49786C18.9322 4.49786 18.0975 4.66394 17.3188 4.98659C16.5401 5.30925 15.8326 5.78217 15.2367 6.37833L14.0001 7.61499L12.7634 6.37833C11.5598 5.17469 9.92726 4.49849 8.22506 4.49849C6.52285 4.49849 4.89037 5.17469 3.68672 6.37833C2.48308 7.58197 1.80688 9.21445 1.80688 10.9167C1.80688 12.6189 2.48308 14.2514 3.68672 15.455L4.92339 16.6917L14.0001 25.7683L23.0767 16.6917L24.3134 15.455C24.9096 14.8591 25.3825 14.1516 25.7051 13.3729C26.0278 12.5942 26.1939 11.7596 26.1939 10.9167C26.1939 10.0738 26.0278 9.23911 25.7051 8.46041C25.3825 7.68171 24.9096 6.97421 24.3134 6.37833V6.37833Z" stroke="#38C2CF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <a href="http://192.168.10.113/bonyan/campaigns/refugee-camps-in-jordan-3/" class="card-head campaign-card-head">
                                        <div class="card-img campaign-img">
                                            <img data-src="http://192.168.10.113/bonyan/wp-content/uploads/2023/03/login.png" alt="" class=" lazyloaded" src="http://192.168.10.113/bonyan/wp-content/uploads/2023/03/login.png">
                                        </div>

                                        <div class="card-title campaign-title">
                                            <h3>Refugee Camps In Jordan-3</h3>
                                        </div>

                                        <div class="campaign-info">
                                        </div>
                                    </a>

                                    <div class="card-footer campaign-card-cta">
                                        <button data-giveformid="603" class="donation-action user-action-btn primary-btn no-border" data-target="donation-modal">Donate</button>
                                        <a href="http://192.168.10.113/bonyan/campaigns/refugee-camps-in-jordan-3/">More</a>
                                    </div>
                                </div>

                                <div class="campaign-card">
                                    <div class="add-to-fav " data-isdonordashboard="false" data-id="301">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.3134 6.37833C23.7175 5.78217 23.01 5.30925 22.2313 4.98659C21.4526 4.66394 20.618 4.49786 19.7751 4.49786C18.9322 4.49786 18.0975 4.66394 17.3188 4.98659C16.5401 5.30925 15.8326 5.78217 15.2367 6.37833L14.0001 7.61499L12.7634 6.37833C11.5598 5.17469 9.92726 4.49849 8.22506 4.49849C6.52285 4.49849 4.89037 5.17469 3.68672 6.37833C2.48308 7.58197 1.80688 9.21445 1.80688 10.9167C1.80688 12.6189 2.48308 14.2514 3.68672 15.455L4.92339 16.6917L14.0001 25.7683L23.0767 16.6917L24.3134 15.455C24.9096 14.8591 25.3825 14.1516 25.7051 13.3729C26.0278 12.5942 26.1939 11.7596 26.1939 10.9167C26.1939 10.0738 26.0278 9.23911 25.7051 8.46041C25.3825 7.68171 24.9096 6.97421 24.3134 6.37833V6.37833Z" stroke="#38C2CF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <a href="http://192.168.10.113/bonyan/campaigns/refugee-camps-in-jordan-2/" class="card-head campaign-card-head">
                                        <div class="card-img campaign-img">
                                            <img data-src="http://192.168.10.113/bonyan/wp-content/uploads/2023/03/program-2.jpg" alt="" class=" lazyloaded" src="http://192.168.10.113/bonyan/wp-content/uploads/2023/03/program-2.jpg">
                                        </div>

                                        <div class="card-title campaign-title">
                                            <h3>Refugee Camps In Jordan-2</h3>
                                        </div>

                                        <div class="campaign-info">
                                            <div class="campaign-info--item campaign-donors">
                                                <svg id="Group_269" data-name="Group 269" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path id="Path_210" data-name="Path 210" d="M0,0H24V24H0Z" fill="none"></path>
                                                    <path id="Path_211" data-name="Path 211" d="M3.161,4.469A6.5,6.5,0,0,1,12,4.141,6.5,6.5,0,0,1,21.179,13.3l-7.765,7.79a2,2,0,0,1-2.719.1l-.11-.1L2.821,13.295a6.5,6.5,0,0,1,.34-8.826ZM4.575,5.883a4.5,4.5,0,0,0-.146,6.21l.146.154L12,19.672l5.3-5.3-3.535-3.535-1.06,1.06A3,3,0,1,1,8.464,7.651l2.1-2.1a4.5,4.5,0,0,0-5.837.189l-.154.146Zm8.486,2.828a1,1,0,0,1,1.414,0l4.242,4.242.708-.706a4.5,4.5,0,0,0-6.211-6.51l-.153.146L9.879,9.065A1,1,0,0,0,9.8,10.392l.078.087a1,1,0,0,0,1.327.078l.087-.078Z" fill="#38c2cf"></path>
                                                </svg>

                                                <span>5</span>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="card-body campaign-card-body">
                                        <div class="campaign-progress-bar-holder">
                                            <div class="campaign-values-details">
                                                <p>$7,996</p>
                                                <p>Funded of $2,000</p>
                                            </div>

                                            <div class="progress-bar">
                                                <div class="progress-bar-value" style="width: 399.8%;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer campaign-card-cta">
                                        <button data-giveformid="61" class="donation-action user-action-btn primary-btn no-border" data-target="donation-modal">Donate</button>
                                        <a href="http://192.168.10.113/bonyan/campaigns/refugee-camps-in-jordan-2/">More</a>
                                    </div>
                                </div>

                                <div class="campaign-card">
                                    <div class="add-to-fav " data-isdonordashboard="false" data-id="299">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.3134 6.37833C23.7175 5.78217 23.01 5.30925 22.2313 4.98659C21.4526 4.66394 20.618 4.49786 19.7751 4.49786C18.9322 4.49786 18.0975 4.66394 17.3188 4.98659C16.5401 5.30925 15.8326 5.78217 15.2367 6.37833L14.0001 7.61499L12.7634 6.37833C11.5598 5.17469 9.92726 4.49849 8.22506 4.49849C6.52285 4.49849 4.89037 5.17469 3.68672 6.37833C2.48308 7.58197 1.80688 9.21445 1.80688 10.9167C1.80688 12.6189 2.48308 14.2514 3.68672 15.455L4.92339 16.6917L14.0001 25.7683L23.0767 16.6917L24.3134 15.455C24.9096 14.8591 25.3825 14.1516 25.7051 13.3729C26.0278 12.5942 26.1939 11.7596 26.1939 10.9167C26.1939 10.0738 26.0278 9.23911 25.7051 8.46041C25.3825 7.68171 24.9096 6.97421 24.3134 6.37833V6.37833Z" stroke="#38C2CF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <a href="http://192.168.10.113/bonyan/campaigns/refugee-camps-in-jordan-1/" class="card-head campaign-card-head">
                                        <div class="card-img campaign-img">
                                            <img data-src="http://192.168.10.113/bonyan/wp-content/uploads/2023/03/statistics-img-1.jpg" alt="" class=" lazyloaded" src="http://192.168.10.113/bonyan/wp-content/uploads/2023/03/statistics-img-1.jpg">
                                        </div>

                                        <div class="card-title campaign-title">
                                            <h3>Refugee Camps In Jordan-1</h3>
                                        </div>

                                        <div class="campaign-info">
                                            <div class="campaign-info--item campaign-donors">
                                                <svg id="Group_269" data-name="Group 269" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path id="Path_210" data-name="Path 210" d="M0,0H24V24H0Z" fill="none"></path>
                                                    <path id="Path_211" data-name="Path 211" d="M3.161,4.469A6.5,6.5,0,0,1,12,4.141,6.5,6.5,0,0,1,21.179,13.3l-7.765,7.79a2,2,0,0,1-2.719.1l-.11-.1L2.821,13.295a6.5,6.5,0,0,1,.34-8.826ZM4.575,5.883a4.5,4.5,0,0,0-.146,6.21l.146.154L12,19.672l5.3-5.3-3.535-3.535-1.06,1.06A3,3,0,1,1,8.464,7.651l2.1-2.1a4.5,4.5,0,0,0-5.837.189l-.154.146Zm8.486,2.828a1,1,0,0,1,1.414,0l4.242,4.242.708-.706a4.5,4.5,0,0,0-6.211-6.51l-.153.146L9.879,9.065A1,1,0,0,0,9.8,10.392l.078.087a1,1,0,0,0,1.327.078l.087-.078Z" fill="#38c2cf"></path>
                                                </svg>

                                                <span>5</span>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="card-body campaign-card-body">
                                        <div class="campaign-progress-bar-holder">
                                            <div class="campaign-values-details">
                                                <p>$7,996</p>
                                                <p>Funded of $2,000</p>
                                            </div>

                                            <div class="progress-bar">
                                                <div class="progress-bar-value" style="width: 399.8%;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer campaign-card-cta">
                                        <button data-giveformid="61" class="donation-action user-action-btn primary-btn no-border" data-target="donation-modal">Donate</button>
                                        <a href="http://192.168.10.113/bonyan/campaigns/refugee-camps-in-jordan-1/">More</a>
                                    </div>
                                </div>

                                <div class="campaign-card">
                                    <div class="add-to-fav " data-isdonordashboard="false" data-id="157">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.3134 6.37833C23.7175 5.78217 23.01 5.30925 22.2313 4.98659C21.4526 4.66394 20.618 4.49786 19.7751 4.49786C18.9322 4.49786 18.0975 4.66394 17.3188 4.98659C16.5401 5.30925 15.8326 5.78217 15.2367 6.37833L14.0001 7.61499L12.7634 6.37833C11.5598 5.17469 9.92726 4.49849 8.22506 4.49849C6.52285 4.49849 4.89037 5.17469 3.68672 6.37833C2.48308 7.58197 1.80688 9.21445 1.80688 10.9167C1.80688 12.6189 2.48308 14.2514 3.68672 15.455L4.92339 16.6917L14.0001 25.7683L23.0767 16.6917L24.3134 15.455C24.9096 14.8591 25.3825 14.1516 25.7051 13.3729C26.0278 12.5942 26.1939 11.7596 26.1939 10.9167C26.1939 10.0738 26.0278 9.23911 25.7051 8.46041C25.3825 7.68171 24.9096 6.97421 24.3134 6.37833V6.37833Z" stroke="#38C2CF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <a href="http://192.168.10.113/bonyan/campaigns/education-for-syrian-%d8%a3%d8%ad%d8%b1%d9%81-%d8%b9%d8%b1%d8%a8%d9%8a%d8%a9/" class="card-head campaign-card-head">
                                        <div class="card-img campaign-img">
                                            <img data-src="http://192.168.10.113/bonyan/wp-content/uploads/2023/02/main-slider-1.jpg" alt="" class=" ls-is-cached lazyloaded" src="http://192.168.10.113/bonyan/wp-content/uploads/2023/02/main-slider-1.jpg">
                                        </div>

                                        <div class="card-title campaign-title">
                                            <h3>Education for Syrian أحرف عربية</h3>
                                        </div>

                                        <div class="campaign-info">
                                        </div>
                                    </a>

                                    <div class="card-footer campaign-card-cta">
                                        <button data-giveformid="61" class="donation-action user-action-btn primary-btn no-border" data-target="donation-modal">Donate</button>
                                        <a href="http://192.168.10.113/bonyan/campaigns/education-for-syrian-%d8%a3%d8%ad%d8%b1%d9%81-%d8%b9%d8%b1%d8%a8%d9%8a%d8%a9/">More</a>
                                    </div>
                                </div>

                                <div class="campaign-card">
                                    <div class="add-to-fav " data-isdonordashboard="false" data-id="121">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.3134 6.37833C23.7175 5.78217 23.01 5.30925 22.2313 4.98659C21.4526 4.66394 20.618 4.49786 19.7751 4.49786C18.9322 4.49786 18.0975 4.66394 17.3188 4.98659C16.5401 5.30925 15.8326 5.78217 15.2367 6.37833L14.0001 7.61499L12.7634 6.37833C11.5598 5.17469 9.92726 4.49849 8.22506 4.49849C6.52285 4.49849 4.89037 5.17469 3.68672 6.37833C2.48308 7.58197 1.80688 9.21445 1.80688 10.9167C1.80688 12.6189 2.48308 14.2514 3.68672 15.455L4.92339 16.6917L14.0001 25.7683L23.0767 16.6917L24.3134 15.455C24.9096 14.8591 25.3825 14.1516 25.7051 13.3729C26.0278 12.5942 26.1939 11.7596 26.1939 10.9167C26.1939 10.0738 26.0278 9.23911 25.7051 8.46041C25.3825 7.68171 24.9096 6.97421 24.3134 6.37833V6.37833Z" stroke="#38C2CF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <a href="http://192.168.10.113/bonyan/campaigns/education-for-syrian/" class="card-head campaign-card-head">
                                        <div class="card-img campaign-img">
                                            <img data-src="http://192.168.10.113/bonyan/wp-content/uploads/2023/02/main-slider-1.jpg" alt="" class=" ls-is-cached lazyloaded" src="http://192.168.10.113/bonyan/wp-content/uploads/2023/02/main-slider-1.jpg">
                                        </div>

                                        <div class="card-title campaign-title">
                                            <h3>Education for Syrian أحرف عربية</h3>
                                        </div>

                                        <div class="campaign-info">
                                        </div>
                                    </a>

                                    <div class="card-footer campaign-card-cta">
                                        <button data-giveformid="61" class="donation-action user-action-btn primary-btn no-border" data-target="donation-modal">Donate</button>
                                        <a href="http://192.168.10.113/bonyan/campaigns/education-for-syrian/">More</a>
                                    </div>
                                </div>

                                <div class="campaign-card">
                                    <div class="add-to-fav " data-isdonordashboard="false" data-id="114">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.3134 6.37833C23.7175 5.78217 23.01 5.30925 22.2313 4.98659C21.4526 4.66394 20.618 4.49786 19.7751 4.49786C18.9322 4.49786 18.0975 4.66394 17.3188 4.98659C16.5401 5.30925 15.8326 5.78217 15.2367 6.37833L14.0001 7.61499L12.7634 6.37833C11.5598 5.17469 9.92726 4.49849 8.22506 4.49849C6.52285 4.49849 4.89037 5.17469 3.68672 6.37833C2.48308 7.58197 1.80688 9.21445 1.80688 10.9167C1.80688 12.6189 2.48308 14.2514 3.68672 15.455L4.92339 16.6917L14.0001 25.7683L23.0767 16.6917L24.3134 15.455C24.9096 14.8591 25.3825 14.1516 25.7051 13.3729C26.0278 12.5942 26.1939 11.7596 26.1939 10.9167C26.1939 10.0738 26.0278 9.23911 25.7051 8.46041C25.3825 7.68171 24.9096 6.97421 24.3134 6.37833V6.37833Z" stroke="#38C2CF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <a href="http://192.168.10.113/bonyan/campaigns/refugee-camps-in-jordan/" class="card-head campaign-card-head">
                                        <div class="card-img campaign-img">
                                            <img data-src="https://media.istockphoto.com/id/1270939459/vector/fundraising-round-ribbon-isolated-label-fundraising-sign.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=uUGQb0L8AdaHHR7pjk_kYWd587mnGv3gXc5OLHTK3Gk=" alt="" class=" lazyloaded" src="https://media.istockphoto.com/id/1270939459/vector/fundraising-round-ribbon-isolated-label-fundraising-sign.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=uUGQb0L8AdaHHR7pjk_kYWd587mnGv3gXc5OLHTK3Gk=">
                                        </div>

                                        <div class="card-title campaign-title">
                                            <h3>Refugee Camps In Jordan</h3>
                                        </div>

                                        <div class="campaign-info">
                                        </div>
                                    </a>

                                    <div class="card-footer campaign-card-cta">
                                        <button data-giveformid="61" class="donation-action user-action-btn primary-btn no-border" data-target="donation-modal">Donate</button>
                                        <a href="http://192.168.10.113/bonyan/campaigns/refugee-camps-in-jordan/">More</a>
                                    </div>
                                </div>

                                <div class="campaign-card">
                                    <div class="add-to-fav " data-isdonordashboard="false" data-id="112">
                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24.3134 6.37833C23.7175 5.78217 23.01 5.30925 22.2313 4.98659C21.4526 4.66394 20.618 4.49786 19.7751 4.49786C18.9322 4.49786 18.0975 4.66394 17.3188 4.98659C16.5401 5.30925 15.8326 5.78217 15.2367 6.37833L14.0001 7.61499L12.7634 6.37833C11.5598 5.17469 9.92726 4.49849 8.22506 4.49849C6.52285 4.49849 4.89037 5.17469 3.68672 6.37833C2.48308 7.58197 1.80688 9.21445 1.80688 10.9167C1.80688 12.6189 2.48308 14.2514 3.68672 15.455L4.92339 16.6917L14.0001 25.7683L23.0767 16.6917L24.3134 15.455C24.9096 14.8591 25.3825 14.1516 25.7051 13.3729C26.0278 12.5942 26.1939 11.7596 26.1939 10.9167C26.1939 10.0738 26.0278 9.23911 25.7051 8.46041C25.3825 7.68171 24.9096 6.97421 24.3134 6.37833V6.37833Z" stroke="#38C2CF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <a href="http://192.168.10.113/bonyan/campaigns/provide-food-for-syrian-refugees/" class="card-head campaign-card-head">
                                        <div class="card-img campaign-img">
                                            <img data-src="https://media.istockphoto.com/id/1270939459/vector/fundraising-round-ribbon-isolated-label-fundraising-sign.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=uUGQb0L8AdaHHR7pjk_kYWd587mnGv3gXc5OLHTK3Gk=" alt="" class=" ls-is-cached lazyloaded" src="https://media.istockphoto.com/id/1270939459/vector/fundraising-round-ribbon-isolated-label-fundraising-sign.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=uUGQb0L8AdaHHR7pjk_kYWd587mnGv3gXc5OLHTK3Gk=">
                                        </div>

                                        <div class="card-title campaign-title">
                                            <h3>Provide Food For Syrian Refugees</h3>
                                        </div>

                                        <div class="campaign-info">
                                        </div>
                                    </a>
                                    <div class="card-footer campaign-card-cta">
                                        <button data-giveformid="61" class="donation-action user-action-btn primary-btn no-border" data-target="donation-modal">Donate</button>
                                        <a href="http://192.168.10.113/bonyan/campaigns/provide-food-for-syrian-refugees/">More</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Wishlist Tab Conent -->

            </div>
            <!-- ===[End Dashboard View]=== -->

        </div>
    </div>
</div>

<?php get_footer();
