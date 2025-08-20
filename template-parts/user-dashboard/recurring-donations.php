    <!-- Start Recurring Donations Tab Content -->
    <div class="d-none dashboard-tab-content" id="recurring-donations">
        <div class="dashboard-donor-info-box with-padding pt-3">
            <div class="donor-avatar">
                <img src="<?php echo $user_profile_photo; ?>" alt="Donor Avatar">
            </div>

            <div class="donor-info">
                <div class="donor-info-item donor-info--name">
                    <span><?php echo $user_FirstName . " " . $user_LastName; ?></span>
                </div>

                <div class="donor-info--others">
                    <div class="donor-info-item donor-info--company">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path d="M9.58301 2.375C10.9035 2.375 11.5645 2.37465 12.083 2.59668C12.7324 2.87486 13.2501 3.39257 13.5283 4.04199C13.7504 4.56049 13.75 5.22152 13.75 6.54199C14.6801 6.54199 15.1451 6.542 15.5244 6.65332C16.4223 6.91696 17.125 7.61877 17.3887 8.5166C17.5001 8.89598 17.5 9.36173 17.5 10.292V14.6143C17.5 15.788 17.5004 16.3755 17.3242 16.8438C17.0453 17.5849 16.4599 18.1703 15.7188 18.4492C15.2505 18.6254 14.663 18.625 13.4893 18.625C12.9561 18.625 12.6894 18.625 12.4766 18.5449C12.1397 18.4181 11.8739 18.1522 11.7471 17.8154C11.667 17.6026 11.667 17.3353 11.667 16.8018V16.125C11.667 15.7375 11.6666 15.5437 11.624 15.3848C11.5084 14.9534 11.1716 14.6166 10.7402 14.501C10.5813 14.4584 10.3875 14.458 10 14.458C9.61251 14.458 9.41872 14.4584 9.25977 14.501C8.82844 14.6166 8.49157 14.9534 8.37598 15.3848C8.33338 15.5437 8.33301 15.7375 8.33301 16.125V16.8018C8.33301 17.3353 8.33305 17.6026 8.25293 17.8154C8.1261 18.1522 7.86027 18.4181 7.52344 18.5449C7.31065 18.625 7.04394 18.625 6.51074 18.625C5.33696 18.625 4.74954 18.6254 4.28125 18.4492C3.54008 18.1703 2.95474 17.5849 2.67578 16.8438C2.49956 16.3755 2.5 15.788 2.5 14.6143V7.3252C2.5 5.26288 2.50022 4.23167 3.02539 3.50879C3.19501 3.27533 3.40033 3.07001 3.63379 2.90039C4.35667 2.37522 5.38788 2.375 7.4502 2.375H9.58301ZM6.25 9.45801C5.9786 9.45801 5.84252 9.45845 5.73242 9.49316C5.49936 9.56678 5.31678 9.74936 5.24316 9.98242C5.20845 10.0925 5.20801 10.2286 5.20801 10.5C5.20801 10.7714 5.20845 10.9075 5.24316 11.0176C5.31679 11.2506 5.49936 11.4332 5.73242 11.5068C5.84252 11.5415 5.9786 11.542 6.25 11.542C6.5214 11.542 6.65749 11.5415 6.76758 11.5068C7.00064 11.4332 7.18321 11.2506 7.25684 11.0176C7.29155 10.9075 7.29199 10.7714 7.29199 10.5C7.29199 10.2286 7.29155 10.0925 7.25684 9.98242C7.18322 9.74936 7.00064 9.56678 6.76758 9.49316C6.65749 9.45845 6.5214 9.45801 6.25 9.45801ZM10 9.45801C9.7286 9.45801 9.59251 9.45845 9.48242 9.49316C9.24936 9.56678 9.06679 9.74936 8.99316 9.98242C8.95845 10.0925 8.95801 10.2286 8.95801 10.5C8.95801 10.7714 8.95845 10.9075 8.99316 11.0176C9.06679 11.2506 9.24936 11.4332 9.48242 11.5068C9.59251 11.5415 9.7286 11.542 10 11.542C10.2714 11.542 10.4075 11.5415 10.5176 11.5068C10.7506 11.4332 10.9332 11.2506 11.0068 11.0176C11.0415 10.9075 11.042 10.7714 11.042 10.5C11.042 10.2286 11.0415 10.0925 11.0068 9.98242C10.9332 9.74936 10.7506 9.56678 10.5176 9.49316C10.4075 9.45845 10.2714 9.45801 10 9.45801ZM13.75 9.45801C13.4786 9.45801 13.3425 9.45845 13.2324 9.49316C12.9994 9.56678 12.8168 9.74936 12.7432 9.98242C12.7085 10.0925 12.708 10.2286 12.708 10.5C12.708 10.7714 12.7085 10.9075 12.7432 11.0176C12.8168 11.2506 12.9994 11.4332 13.2324 11.5068C13.3425 11.5415 13.4786 11.542 13.75 11.542C14.0214 11.542 14.1575 11.5415 14.2676 11.5068C14.5006 11.4332 14.6832 11.2506 14.7568 11.0176C14.7915 10.9075 14.792 10.7714 14.792 10.5C14.792 10.2286 14.7915 10.0925 14.7568 9.98242C14.6832 9.74936 14.5006 9.56678 14.2676 9.49316C14.1575 9.45845 14.0214 9.45801 13.75 9.45801ZM6.25 5.5C5.9786 5.5 5.84251 5.50044 5.73242 5.53516C5.4993 5.60883 5.31671 5.79124 5.24316 6.02441C5.20845 6.13451 5.20801 6.27059 5.20801 6.54199C5.20801 6.813 5.20853 6.94858 5.24316 7.05859C5.31672 7.29187 5.49919 7.47519 5.73242 7.54883C5.84252 7.58354 5.9786 7.58301 6.25 7.58301C6.5214 7.58301 6.65749 7.58354 6.76758 7.54883C7.00081 7.47519 7.18328 7.29187 7.25684 7.05859C7.29147 6.94858 7.29199 6.813 7.29199 6.54199C7.29199 6.27059 7.29155 6.13451 7.25684 6.02441C7.18329 5.79124 7.0007 5.60883 6.76758 5.53516C6.65749 5.50044 6.5214 5.5 6.25 5.5ZM10 5.5C9.7286 5.5 9.59251 5.50044 9.48242 5.53516C9.2493 5.60883 9.06671 5.79124 8.99316 6.02441C8.95845 6.13451 8.95801 6.27059 8.95801 6.54199C8.95801 6.813 8.95853 6.94858 8.99316 7.05859C9.06672 7.29187 9.24919 7.47519 9.48242 7.54883C9.59251 7.58354 9.7286 7.58301 10 7.58301C10.2714 7.58301 10.4075 7.58354 10.5176 7.54883C10.7508 7.47519 10.9333 7.29187 11.0068 7.05859C11.0415 6.94858 11.042 6.813 11.042 6.54199C11.042 6.27059 11.0415 6.13451 11.0068 6.02441C10.9333 5.79124 10.7507 5.60883 10.5176 5.53516C10.4075 5.50044 10.2714 5.5 10 5.5Z" fill="#455973"/>
                        </svg>

                        <span><?php echo $user_company; ?></span>
                    </div>

                    <div class="donor-info-item donor-info--last-donation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path d="M10 2.375C14.4873 2.375 18.125 6.01269 18.125 10.5C18.125 14.9873 14.4873 18.625 10 18.625C5.51269 18.625 1.875 14.9873 1.875 10.5C1.875 6.01269 5.51269 2.375 10 2.375ZM10 5.20801C9.58579 5.20801 9.25 5.54379 9.25 5.95801V9.50195C8.94695 9.73005 8.75 10.0915 8.75 10.5C8.75 11.1904 9.30964 11.75 10 11.75C10.3902 11.75 10.7385 11.5711 10.9678 11.291H13.75L13.8271 11.2871C14.205 11.2485 14.4999 10.9291 14.5 10.541C14.4998 10.153 14.205 9.83353 13.8271 9.79492L13.75 9.79102L11.0293 9.79102C10.9526 9.67993 10.8577 9.58302 10.75 9.50195V5.95801C10.75 5.54379 10.4142 5.20801 10 5.20801Z" fill="#455973"/>
                        </svg>

                        <span><?php
                                echo sprintf(
                                    __('Last donated %s day ago', 'bonyan'),
                                    $last_donate_days
                                );
                                ?></span>
                    </div>

                    <div class="donor-info-item donor-info--first-donation-date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path d="M18.0748 8.17921C17.5543 12.5945 12.5674 16.5246 10.7025 17.8514C10.4215 18.0513 10.2811 18.1512 10.0945 18.175C10.0389 18.1821 9.96642 18.1824 9.91072 18.1758C9.72397 18.1535 9.58257 18.0547 9.29977 17.857C7.40953 16.5356 2.33574 12.6007 1.9244 8.1795C1.3412 2.83048 7.09151 1.18035 10.008 4.51451C12.9246 1.17867 18.674 2.82867 18.0748 8.17921Z" fill="#455973"/>
                        </svg>

                        <span><?php
                                echo sprintf(
                                    __('Donor For %s days', 'bonyan'),
                                    $donor_registered_by_days
                                );
                                ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-tab-contents-holder">
            <div class="dashboard-tab-content-section donations-history">
                <div class="dashboard-content-section-heading mt-3 py-3">
                    <div class="dashboard-content-section-heading-title with-padding">
                        <span><?php _e('Recurring Donations', 'bonyan'); ?></span>
                    </div>
                </div>

                <div class="dashboard-content-section-body">
                    <div class="donations-history-values recurring-donations-datatable with-padding">
                        <?php
                        // ========================================
                        // BACKEND DEVELOPER: EASY SWITCH TO REAL DATA
                        // ========================================
                        // To enable real recurring donations, simply change this to: $use_real_recurring = true;
                        $use_real_recurring = false;
                        
                        if ($use_real_recurring && !empty($donor->payment_ids)) {
                            // REAL RECURRING DONATIONS CODE - Uncomment when ready
                            /*
                            // Query for recurring donations
                            $recurring_args = array(
                                'post_type' => 'give_payment',
                                'post_status' => 'publish',
                                'meta_query' => array(
                                    array(
                                        'key' => '_give_payment_mode',
                                        'value' => 'recurring',
                                        'compare' => '='
                                    )
                                ),
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                            
                            $recurring_query = new WP_Query($recurring_args);
                            
                            if ($recurring_query->have_posts()) {
                                // Load recurring donations table
                                require_once(get_template_directory() . '/template-parts/datatable-modern-recurring-dashboard.php');
                            }
                            wp_reset_postdata();
                            */
                        } else {
                            // PLACEHOLDER CONTENT - Shows by default (sample recurring donations for styling)
                            $sample_recurring = array(
                                array(
                                    'id' => 'REC-001',
                                    'amount' => '$50.00',
                                    'campaign' => 'Monthly Food Aid',
                                    'frequency' => 'Monthly',
                                    'date_started' => '01 Jan 2024',
                                    'next_payment' => '15 Jan 2025',
                                    'status' => 'Active'
                                ),
                                array(
                                    'id' => 'REC-002',
                                    'amount' => '$100.00',
                                    'campaign' => 'Education Sponsorship',
                                    'frequency' => 'Quarterly',
                                    'date_started' => '01 Mar 2024',
                                    'next_payment' => '01 Apr 2025',
                                    'status' => 'Cancel'
                                ),
                                array(
                                    'id' => 'REC-003',
                                    'amount' => '$25.00',
                                    'campaign' => 'Clean Water Fund',
                                    'frequency' => 'Monthly',
                                    'date_started' => '10 Jan 2024',
                                    'next_payment' => '20 Jan 2025',
                                    'status' => 'Active'
                                ),
                                array(
                                    'id' => 'REC-004',
                                    'amount' => '$75.00',
                                    'campaign' => 'Medical Support',
                                    'frequency' => 'Bi-monthly',
                                    'date_started' => '15 Jan 2024',
                                    'next_payment' => '15 Feb 2025',
                                    'status' => 'Cancel'
                                )
                            );
                        ?>
                            
                            <!-- Sample Recurring Donations Table for Styling -->
                            <table id="recurring-donations-table" class="recurring-donations-table display nowrap dashboard-datatable dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="recurring donations table">
                                <thead>
                                    <tr>
                                        <th><?php _e('DONATIONS', 'bonyan'); ?></th>
                                        <th><?php _e('RECURRING', 'bonyan'); ?></th>
                                        <th><?php _e('DATE STARTED', 'bonyan'); ?></th>
                                        <th><?php _e('NEXT PAYMENT', 'bonyan'); ?></th>
                                        <th><?php _e('STATUS', 'bonyan'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sample_recurring as $recurring): ?>
                                        <tr>
                                            <td>
                                                <p class="link-in-table">
                                                    <?php echo esc_html($recurring['campaign']); ?>
                                                </p>
                                            </td>
                                            <td><?php echo esc_html($recurring['amount'] . ' / ' . $recurring['frequency']); ?></td>
                                            <td><?php echo esc_html($recurring['date_started']); ?></td>
                                            <td><?php echo esc_html($recurring['next_payment']); ?></td>
                                            <td>
                                                <div class="status-dot status-<?php echo strtolower($recurring['status']); ?>"></div>
                                                <span class="status-text status-<?php echo strtolower($recurring['status']); ?>"><?php echo esc_html($recurring['status']); ?></span>
                                            </td>
                                        </tr>
                                        <tr class="row-details">
                                            <td colspan="5">
                                                <div class="row-actions">
                                                    <span class="donation-id">ID: <?php echo esc_html($recurring['id']); ?></span>
                                                    <a href="#" class="view-action">
                                                        <?php _e('Cancel Subscription', 'bonyan'); ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                                            <path d="M5 4.5L7 6.5L5 8.5" stroke="#4D97F5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Recurring Donations Tab Content -->