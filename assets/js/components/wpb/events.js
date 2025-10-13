// window.addEventListener('DOMContentLoaded', function(){
const calendar = new tui.Calendar('#events-calendar', {
    defaultView: 'month',
    useFormPopup: true,
    useDetailPopup: true,
    isReadOnly: true,

    calendars: [{
        id: 'cal1',
        name: 'Events',
        backgroundColor: '#1877F2',
        color: '#fff',
        borderColor: '#9d85d5'
    },],
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
    start: '2023-05-13T12:00:00',
    end: '2023-05-20T13:00:00',
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
    start: '2023-12-12T12:00:00',
    end: '2023-12-15T13:00:00',
    location: "Turkey, Istanbul",
    body: "Here you can mention the details",
},
]);

let currentCalendarDateSpan = document.querySelector('.current-calendar-date');
currentCalendarDateSpan.textContent = `${calendar.getDate().getFullYear()}-${calendar.getDate().getMonth() + 1}`;


// Prev Month Event
let prevMonthBtn = document.querySelector('.events-calendar-navs .prev-month');

prevMonthBtn.addEventListener('click', function () {
    calendar.move(-1);
    currentCalendarDateSpan.textContent = `${calendar.getDate().getFullYear()}-${calendar.getDate().getMonth() + 1}`;
});

// Next Month Event
let nextMonthBtn = document.querySelector('.events-calendar-navs .next-month');

nextMonthBtn.addEventListener('click', function () {
    calendar.move(1);
    currentCalendarDateSpan.textContent = `${calendar.getDate().getFullYear()}-${calendar.getDate().getMonth() + 1}`;
});

// Handle Today Button Click
let todayCalendarBtn = document.querySelector('.current-month');

todayCalendarBtn.addEventListener('click', function () {
    calendar.setDate(new Date());
    currentCalendarDateSpan.textContent = `${calendar.getDate().getFullYear()}-${calendar.getDate().getMonth() + 1}`;
});
// });