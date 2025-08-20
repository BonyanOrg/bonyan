    <?php
    $ar_status_array = [
        'Pending' => 'بالانتظار',
        'Abandoned' => 'غير مكتمل',
        'Complete' => 'مكتمل',
        'Failed' => 'فشل',
        'Renewal' => 'تجديد',
    ];
    $tr_status_array = [
        'Pending' => 'beklemekte',
        'Abandoned' => 'eksik',
        'Complete' => 'başarılı',
        'Failed' => 'başarısız',
        'Renewal' => 'yenileme',
    ]; ?>

    <table id="donation-history-table" class="donation-history-table display nowrap dashboard-datatable dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="donations table">
        <thead>
            <tr>
                <th><?php _e('DONATION', 'bonyan'); ?></th>
                <th><?php _e('CAMPAIGN', 'bonyan'); ?></th>
                <th><?php _e('DATE', 'bonyan'); ?></th>
                <th><?php _e('STATUS', 'bonyan'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 0;
            foreach ($args['payments'] as $payment) :
                if ($counter == 4) break;
            ?>
                <tr>
                    <td><?php
                        echo give_donation_amount(
                            $payment->ID,
                            array(
                                'currency' => true,
                                'amount'   => true,
                                'type'     => 'donor',
                            )
                        );
                        ?></td>
                    <td>
                        <p class="link-in-table">
                            <?php
                            $an_payment    = new Give_Payment($payment->ID);
                            echo $an_payment->form_title; ?></p>
                    </td>
                    <td>
                        <?php
                        $date = date_create($payment->post_date);
                        $date = date_format($date, 'd M y');
                        echo is_wpml_rtl() ?
                            ArabicDate($date) :
                            $date;
                        ?>
                    </td>
                    <?php
                    switch (current_language()) {
                        case "ar": ?>
                            <td>
                                <div class="status-dot status-<?php echo strtolower($an_payment->status_nicename); ?>"></div>
                                <span class="status-text status-<?php echo strtolower($an_payment->status_nicename); ?>"><?php echo $ar_status_array[$an_payment->status_nicename] ?></span>
                            </td>
                        <?php break;
                        case "tr": ?>
                            <td>
                                <div class="status-dot status-<?php echo strtolower($an_payment->status_nicename); ?>"></div>
                                <span class="status-text status-<?php echo strtolower($an_payment->status_nicename); ?>"><?php echo $tr_status_array[$an_payment->status_nicename] ?></span>
                            </td>
                        <?php break;
                        default: ?>
                            <td>
                                <div class="status-dot status-<?php echo strtolower($an_payment->status_nicename); ?>"></div>
                                <span class="status-text status-<?php echo strtolower($an_payment->status_nicename); ?>"><?php echo $an_payment->status_nicename ?></span>
                            </td>
                    <?php break;
                    } ?>
                </tr>
                <tr class="row-details">
                    <td colspan="4">
                        <div class="row-actions">
                            <span class="donation-id">ID: <?php echo $payment->ID; ?></span>
                            <a href="#" class="view-action">
                                <?php _e('View', 'bonyan'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                    <path d="M5 4.5L7 6.5L5 8.5" stroke="#4D97F5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php
                $counter++;
            endforeach; ?>
        </tbody>
    </table>