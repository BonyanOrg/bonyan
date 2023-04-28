<?php

$campaign_end_date = get_post_meta(get_the_ID(), 'co_campaign_end_date', true);
$to_time = strtotime($campaign_end_date . " 23:59:59");
$from_time = strtotime(date('y-m-d H:i:s'));

if ($from_time < $to_time) :
    $time_in_minute = round(abs($to_time - $from_time) / 60, 2);
?>
    <div class="campaign-timer custom-widget timer-visible">
        <div class="toggle-campaign-timer">
            <i class="fa-solid fa-clock-rotate-left"></i>
        </div>

        <div class="counter-container">
            <ul class="counter-container-helper" id="counter-ul" data-timeInMin="<?php echo $time_in_minute; ?>">
                <div class="hide-campaign-timer">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
                <li class="counter-item timer-icon mx-2">
                    <i class="fa-regular fa-clock"></i>
                </li>
                <li class="counter-item"><span class="counter-item--text days"></span>:</li>
                <li class="counter-item"><span class="counter-item--text hours"></span>:</li>
                <li class="counter-item"><span class="counter-item--text minutes"></span>:</li>
                <li class="counter-item"><span class="counter-item--text seconds"></span></li>
            </ul>
        </div>
    </div>
<?php endif; ?>