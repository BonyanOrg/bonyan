<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('events_calendar_shortcode')) {
    function events_calendar_shortcode($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'events_categories' => '',
                ),
                $atts
            )
        );
        $events_categories = explode(',', $events_categories);
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('events_calendar_register_style')) {
            function events_calendar_register_style()
            {
                ?>
                <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />

                <style>
                    <?php
                    require_once(get_template_directory() . '/dist/css/components/wpb/events.min.css');
                    ?>
                </style>
                <?php
            }
            events_calendar_register_style();
        } ?>
        <div class="container">
            <div class="events-calendar-navs my-3">
                <span class="current-calendar-date"></span>

                <div class="nav-items ms-auto">
                    <button class="current-month">
                        <?php _e('Today', 'bonyan') ?>
                    </button>

                    <div class="nav-btns">
                        <button class="prev-month" title="<?php _e('Navigate to previous month', 'bonyan') ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                            </svg>
                        </button>

                        <button class="next-month" title="<?php _e('Navigate to next month', 'bonyan') ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="events-calendar-holder">
                <div id="events-calendar" style="height: 600px;"></div>
            </div>
        </div>




        <?php $calendarID = generateRandomString(); ?>
        <?php

        $terms_array = [];
        foreach ($events_categories as $event_category_id) {
            $term = get_term_by('id', $event_category_id, 'events-categories');
            array_push($terms_array, $term);
        }
        if (!empty($terms_array)):
            $calendars_array = [];
            $data_array = [];
            foreach ($terms_array as $term) {

                $term_bgcolor = get_term_meta($term->term_id, 'events-categories_bgcolor', true);
                $term_text_color = get_term_meta($term->term_id, 'events-categories_text_color', true);
                $term_border_color = get_term_meta($term->term_id, 'events-categories_border_color', true);

                $temp_calendar = new \stdClass;
                $temp_calendar->id = $term->term_id;
                $temp_calendar->name = $term->name;
                $temp_calendar->backgroundColor = !empty($term_bgcolor) ? $term_bgcolor : '#6D54A7';
                $temp_calendar->color = !empty($term_text_color) ? $term_text_color : '#fff';
                $temp_calendar->borderColor = !empty($term_border_color) ? $term_border_color : '#9d85d5';
                array_push($calendars_array, $temp_calendar);
                $args = array(
                    'post_type' => "events",
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    "tax_query" => array(
                        array(
                            "taxonomy" => "events-categories",
                            'field' => 'term_id',
                            'terms' => $term->term_id,
                        ),
                    ),
                );
                $events = new WP_Query($args);
                if ($events->have_posts()) {
                    while ($events->have_posts()) {
                        $events->the_post();
                        $temp_event = new \stdClass;
                        $temp_event->id = get_the_ID();
                        $temp_event->calendarId = $term->term_id;
                        $temp_event->title = '<a href="' . get_permalink(get_the_ID()) . '">' . get_the_title() . '</a>';

                        $evento_bgcolor = get_post_meta(get_the_ID(), "evento_bgcolor", true);
                        $temp_event->start = get_post_meta(get_the_ID(), "evento_startDate", true);
                        $temp_event->end = get_post_meta(get_the_ID(), "evento_endDate", true);
                        $temp_event->location = get_post_meta(get_the_ID(), "evento_location", true);
                        $temp_event->body = get_the_excerpt();
                        $temp_event->backgroundColor = !empty($evento_bgcolor) ? $evento_bgcolor : "#6D54A7";
                        array_push($data_array, $temp_event);
                    }
                }
                wp_reset_postdata();

            }
        endif;

        $calendars_array = json_encode($calendars_array);
        $data_array = json_encode($data_array);
        ?>

        <?php
        //========[{ Enqueue Widget script }]========//
        if (!function_exists('events_calendar_register_script')) {
            function events_calendar_register_script()
            {

                ?>
                <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>


                <?php
            }
            events_calendar_register_script();
        } ?>
        <script>
            const calendar = new tui.Calendar('#events-calendar', {
                defaultView: 'month',
                useFormPopup: true,
                useDetailPopup: true,
                isReadOnly: true,

                calendars: <?php echo $calendars_array ?>,
            });

            calendar.createEvents(<?php echo $data_array ?>);

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
        </script>

        <?php
    }
}

add_shortcode('events_calendar', 'events_calendar_shortcode');