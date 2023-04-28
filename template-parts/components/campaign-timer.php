<style>
    <?php
    require_once(get_template_directory() . '/dist/css/timer.min.css');
    ?>
</style>

<div class="campaign-timer custom-widget timer-visible">
    <div class="toggle-campaign-timer">
        <i class="fa-solid fa-clock-rotate-left"></i>
    </div>

    <div class="counter-container">
        <ul class="counter-container-helper">
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

<script>
    <?php
    require_once(get_template_directory() . '/dist/js/timer.min.js');
    ?>
</script>