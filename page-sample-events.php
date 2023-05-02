<?php get_header(); ?>
<link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />

<style>
    .toastui-calendar-popup-section.toastui-calendar-section-button,
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
    }

    .events-calendar-holder #events-calendar {
        min-width: 600px;
    }
</style>

<?php get_template_part('template-parts/page-header'); ?>

<div class="container">
<header class="header">
        <nav class="navbar">
          <button class="button is-rounded today">Today</button>
          <button class="button is-rounded prev">
            <img alt="prev" src="./images/ic-arrow-line-left.png" srcset="./images/ic-arrow-line-left@2x.png 2x, ./images/ic-arrow-line-left@3x.png 3x">
          </button>
          <button class="button is-rounded next">
            <img alt="prev" src="./images/ic-arrow-line-right.png" srcset="
                ./images/ic-arrow-line-right@2x.png 2x,
                ./images/ic-arrow-line-right@3x.png 3x
              ">
          </button>
          <span class="navbar--range"></span>
        </nav>
      </header>
    <div class="events-calendar-holder">
        <div id="events-calendar" style="height: 600px;"></div>
    </div>
</div>

<script src="https://nhn.github.io/tui.calendar/latest/examples/scripts/mock-data.js"></script>
<script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>

<script>
    const calendar = new tui.Calendar('#events-calendar', {
        defaultView: 'month',
        useFormPopup: true,
        useDetailPopup: true,
        isReadOnly: true,

        calendars: [{
                id: 'cal1',
                name: 'Events',
                backgroundColor: '#6D54A7',
                color: '#fff',
                borderColor: '#9d85d5'
            },
        ],
    });

    calendar.createEvents([{
            id: 'event1',
            calendarId: "cal1",
            title: 'Weekly meeting Weekly meeting',
            start: '2023-05-01T09:00:00',
            end: '2023-05-01T10:00:00',
            location: "Turkey, Istanbul",
            body: "Here you can mention the details",
            // Add this when the event is finished
            backgroundColor: "#f00",
        },
        {
            id: 'event2',
            calendarId: "cal1",
            title: 'Lunch appointment',
            start: '2023-05-08T12:00:00',
            end: '2023-05-09T13:00:00',
            location: "Turkey, Istanbul",
            body: "Here you can mention the details",
        },
        {
            id: 'event3',
            calendarId: "cal1",
            title: 'Vacation',
            start: '2023-05-09T12:50:00',
            end: '2023-05-11T13:00:00',
            location: "Turkey, Istanbul",
            body: "Here you can mention the details",
        },
        {
            id: 'event4',
            calendarId: "cal1",
            title: 'Lunch appointment',
            start: '2023-05-12T12:00:00',
            end: '2023-05-15T13:00:00',
            location: "Turkey, Istanbul",
            body: "Here you can mention the details",
        },
    ]);
</script>