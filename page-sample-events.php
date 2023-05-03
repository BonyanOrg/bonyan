<?php get_header(); ?>
<link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />

<style>
    /* .toastui-calendar-popup-section.toastui-calendar-section-button,
    .toastui-calendar-detail-item.toastui-calendar-detail-item-indent,
    .toastui-calendar-detail-item:nth-child(3) {
        display: none;
    }

    .toastui-calendar-weekday-grid-date.toastui-calendar-weekday-grid-date-decorator.toastui-calendar-template-monthGridHeader {
        background-color: #38C2CF;
    }

    .events-calendar-holder {
        overflow-x: auto;
        margin: 2rem 0;
        direction: ltr;
    }

    .events-calendar-holder #events-calendar {
        min-width: 600px;
    }

    .events-calendar-navs {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        grid-gap: 0.75rem;
        gap: 0.75rem;
    }

    .events-calendar-navs button svg {
        width: 15px;
    }

    .events-calendar-navs button svg path {
        fill: #fff;
    }

    .events-calendar-navs .current-calendar-date {
        font-size: 24px;
        color: #6B8CC7;
    }

    .events-calendar-navs .nav-items {
        display: flex;
        align-items: center;
        grid-gap: 1.25rem;
        gap: 1.25rem;
    }

    .events-calendar-navs .nav-items button.current-month {
        background: #6d54a7;
        border: none;
        border-radius: 5px;
        color: #fff;
        padding: 0.5rem;
        font-size: 18px;
    }

    .events-calendar-navs .nav-items .nav-btns {
        display: flex;
        align-items: center;
        grid-gap: 0.5rem;
        gap: 0.5rem;
    }

    .events-calendar-navs .nav-items .nav-btns button {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: none;
        background: #6d54a7;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    } */

    <?php require_once(get_template_directory() . '/dist/css/components/wpb/events.min.css') ?>
</style>

<?php get_template_part('template-parts/page-header'); ?>

<div class="container">
    <div class="events-calendar-navs my-3">
        <span class="current-calendar-date"></span>

        <div class="nav-items ms-auto">
            <button class="current-month">Today</button>

            <div class="nav-btns">
                <button class="prev-month" title="Navigate to previous month">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                    </svg>
                </button>

                <button class="next-month" title="Navigate to next month">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="events-calendar-holder">
        <div id="events-calendar" style="height: 600px;"></div>
    </div>
</div>

<script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>

<script>
    

    <?php require_once(get_template_directory() . '/dist/js/components/wpb/events.min.js') ?>
</script>

<?php get_footer();