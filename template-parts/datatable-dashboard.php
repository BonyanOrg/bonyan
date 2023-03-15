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

    <div class="donations-history">
        <table id="donations-table" class="display nowrap dashboard-datatable dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="donations table">
            <thead>
                <tr>
                    <th><?php _e('DONATIONS', 'bonyan'); ?></th>
                    <th><?php _e('CAMPAIGN', 'bonyan'); ?></th>
                    <th><?php _e('DATE', 'bonyan'); ?></th>
                    <th><?php _e('STATUS', 'bonyan'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($args['payments'] as $payment) : ?>
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

                            <?php //echo date_format(date_create($payment->post_date), "d M y"); 
                            ?>
                            <?php
                            $date = date_create($post->post_date);
                            $date = date_format($date, 'd M y');
                            echo is_wpml_rtl() ?
                                ArabicDate($date) :
                                $date;
                            ?>

                        </td>
                        <?php
                        switch (current_language()) {
                            case "ar": ?>
                                <td class="donation-status <?php echo $an_payment->status ?>"><span><?php echo $ar_status_array[$an_payment->status_nicename] ?></span></td>
                            <?php break;
                            case "tr": ?>
                                <td class="donation-status <?php echo $an_payment->status ?>"><span><?php echo $tr_status_array[$an_payment->status_nicename] ?></span></td>
                            <?php break;
                            default: ?>
                                <td class="donation-status <?php echo $an_payment->status ?>"><span><?php echo $an_payment->status_nicename ?></span></td>
                        <?php break;
                        } ?>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>