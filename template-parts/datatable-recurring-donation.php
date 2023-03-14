<?php $ar_status_array = [
    'Pending' => 'بالانتظار',
    'Abandoned' => 'غير مكتمل',
    'Complete' => 'مكتمل',
    'Failed' => 'فشل',
    'Cancelled' => 'ملغي',
    'Active' => 'مفعل',
]; ?>
<?php $ar_recurring_time = [
    'Weekly' => 'أسبوعي',
    'Daily' => 'يوميًا',
    'Monthly' => 'شهريا',
    'Quarterly' => 'ربعي',
    'Yearly' => 'سنوي',
]; ?>
<?php $tr_status_array = [
    'Pending' => 'beklemekte',
    'Abandoned' => 'eksik',
    'Complete' => 'başarılı',
    'Failed' => 'başarısız',
    'Cancelled' => 'pasif',
    'Active' => 'aktif',
]; ?>
<?php $tr_recurring_time = [
    'Weekly' => 'Haftalık',
    'Daily' => 'Günlük',
    'Monthly' => 'Aylık',
    'Quarterly' => 'Çeyrek',
    'Yearly' => 'Yıllık',
]; ?>
<div class="donations-history">
    <table id="recurring-donation-table" class="display nowrap dashboard-datatable dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="donations table">
        <thead>
            <tr>
                <th><?php _e('DONATIONS', 'bonyan'); ?></th>
                <th><?php _e('RECURRING', 'bonyan'); ?></th>
                <th><?php _e('DATE STARTED', 'bonyan'); ?></th>
                <th><?php _e('NEXT PAYMENT', 'bonyan'); ?></th>
                <th><?php _e('STATUS', 'bonyan'); ?></th>
                <th><?php _e('MANAGE', 'bonyan'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($args['payments'] as $payment) :
                $is_sub      = give_get_payment_meta($payment->ID, '_give_subscription_payment');

                if ($is_sub) :

                    $subscription = give_recurring_get_subscription_by('payment', $payment->ID);
                    $interval = !empty($subscription->frequency) ? $subscription->frequency : 1;
                    $progress = $subscription->get_subscription_progress();
                    $times = (int)$subscription->bill_times;
                    $frequency = give_recurring_pretty_subscription_frequency(
                        $subscription->period,
                        $times,
                        false,
                        $interval
                    );
            ?>
                    <tr>
                        <td>
                            <p class="link-in-table">
                                <?php
                                $an_payment    = new Give_Payment($payment->ID);
                                echo $an_payment->form_title; ?></p>
                        </td>

                        <td>
                            <?php
                            switch (current_language()) {
                                case 'ar':
                                    $frequency = $ar_recurring_time[$frequency];
                                    break;
                                case 'tr':
                                    $frequency =  $tr_recurring_time[$frequency];
                                    break;
                                default:
                                    break;
                            }
                            ?>
                            <?php echo give_donation_amount($payment->ID, ['currency' => true, 'amount'   => true, 'type'     => 'donor',])  . " / " . $frequency ?>
                        </td>
                        <td><?php echo date_format(date_create($payment->post_date), "d M y"); ?></td>
                        <td><?php echo date_format(date_create($subscription->expiration), "d M y"); ?></td>

                        <td class="donation-status <?php echo $subscription->status ?>">
                            <span><?php

                                    switch (current_language()) {
                                        case 'ar':
                                            echo $ar_status_array[ucfirst($subscription->status)];
                                            break;
                                        case 'tr':
                                            echo  $tr_status_array[ucfirst($subscription->status)];
                                            break;
                                        default:
                                            echo ucfirst($subscription->status);
                                            break;
                                    }
                                    ?>
                            </span>

                        </td>
                        <td><?php if ($subscription->can_cancel()) : ?>
                                <a href="<?php echo $subscription->get_cancel_url(); ?>" class="button button-small give-subscription-admin-cancel"><?php _e('Cancel Subscription', 'bonyan'); ?></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>