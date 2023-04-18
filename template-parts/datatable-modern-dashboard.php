    <?php
    $ar_status_array = [
        'Pending' => 'بالانتظار',
        'Abandoned' => 'غير مكتمل',
        'Complete' => 'مكتمل',
        'Failed' => 'فشل',
    ];
    $tr_status_array = [
        'Pending' => 'beklemekte',
        'Abandoned' => 'eksik',
        'Complete' => 'başarılı',
        'Failed' => 'başarısız',
    ]; ?>

    <table id="donation-history-table-in-history-tab" class="donation-history-table-in-history-tab display nowrap dashboard-datatable dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="donations table">
        <thead>
            <tr>
                <th><?php _e('ID', 'bonyan'); ?></th>
                <th><?php _e('DONATIONS', 'bonyan'); ?></th>
                <th><?php _e('CAMPAIGN', 'bonyan'); ?></th>
                <th><?php _e('DATE', 'bonyan'); ?></th>
                <th><?php _e('STATUS', 'bonyan'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($args['payments'] as $payment) : ?>
                <tr>
                    <td>ID: <?php echo $payment->ID; ?> </td>
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

                        <?php //echo date_format(date_create($payment->post_date), "d M y"); 
                        ?>
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
                                <div class="status"></div><span><?php echo $ar_status_array[$an_payment->status_nicename] ?></span>
                            </td>
                        <?php break;
                        case "tr": ?>
                            <td>
                                <div class="status"></div><span><?php echo $tr_status_array[$an_payment->status_nicename] ?></span>
                            </td>
                        <?php break;
                        default: ?>
                            <td>
                                <div class="status"></div><span><?php echo $an_payment->status_nicename ?></span>
                            </td>
                    <?php break;
                    } ?>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>