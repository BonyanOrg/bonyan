<?php


// Add custom column to user table
function custom_user_column_add_column($columns)
{
    $columns['user_tacker'] = 'Custom Column';
    return $columns;
}
add_filter('manage_users_columns', 'custom_user_column_add_column');

// Display data in the custom column
function custom_user_column_display_column($value, $column_name, $user_id)
{
    if ('user_tacker' === $column_name) {

        $value = '<a target="_blank" href="' . admin_url('admin.php?page=user_tracker&user_id=' . $user_id) . '">See Line Chart</a>';
    }
    return $value;
}
add_action('manage_users_custom_column', 'custom_user_column_display_column', 10, 3);

function user_tracker_function()
{
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
    $date_from = isset($_GET['date-from']) ? $_GET['date-from'] : '';
    $date_to = isset($_GET['date-to']) ? $_GET['date-to'] : '';
    if (empty($user_id)) {
        echo "<br><h1>Please Set User ID !!</h1>";
        return;
    }
    $user_info = get_user_by('id', $user_id);
    $user_name = $user_info->display_name;
    global $wpdb;
    $prefix = $wpdb->prefix;
    $table_name = $prefix . 'users_log';
    $current_time = !empty($date_to) ? $date_to : date("Y-m-d", strtotime(current_time('mysql')));
    $date_before_one_month = !empty($date_from) ? $date_from : date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
    ?>
    <div class="options">
        <form method="get">
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>">
            From: <input type="date" id="date-from" name="date-from" value="<?php echo $date_from; ?>">
            To: <input type="date" id="date-to" name="date-to" value="<?php echo $date_to; ?>">
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
            <input class="button" type="submit" value="Search">
        </form>
    </div>
    <div class="options">
        From: <input type="date" id="filter-date-from" name="date-from" value="<?php echo $date_before_one_month ?>">
        To: <input type="date" id="filter-date-to" name="date-to" value="<?php echo $current_time ?>">
        <button class="button" id="filter-chart">Filter</button>
    </div>
    <?php
    // Get Day's From Database ber Day
    $slq_query = $wpdb->prepare('select DISTINCT date from ' . $table_name . ' where user_id= %d and date BETWEEN %s AND %s ', [$user_id, $date_before_one_month, $current_time]);
    $dates = $wpdb->get_results($slq_query);
    // Get Events Types From Database ber Day
    $slq_query = $wpdb->prepare('select DISTINCT event_type from ' . $table_name . ' where user_id= %d and date BETWEEN %s AND %s ', [$user_id, $date_before_one_month, $current_time]);
    $event_types = $wpdb->get_results($slq_query);
    $dates_array = [];
    $event_types_array = [];
    $dataset_array = [];
    foreach ($dates as $date_object) {
        array_push($dates_array, $date_object->date);
    }
    foreach ($event_types as $event_type_object) {
        $temp_object = new \stdClass();
        $temp_data_array = [];
        $temp_object->label = $event_type_object->event_type;
        array_push($event_types_array, $event_type_object->event_type);
        foreach ($dates_array as $date_item) {
            // Get Events Types From Database ber Day
            $slq_query = $wpdb->prepare('select count(*) as visits_count from ' . $table_name . ' where user_id= %d and date = %s and event_type = %s ', [$user_id, $date_item, $event_type_object->event_type]);
            $count_of_visits = $wpdb->get_results($slq_query);
            array_push($temp_data_array, $count_of_visits[0]->visits_count);
        }
        $temp_object->data = $temp_data_array;
        $temp_object->borderWidth = 2;
        array_push($dataset_array, $temp_object);

    }

    $dates_array = json_encode($dates_array);
    $dataset_array = json_encode($dataset_array);



    ?>
    <div style="width:90%;">
        <canvas id="user_action_chart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var dates = <?php echo $dates_array ?>;
        let data = {
            labels: dates,
            datasets: <?php echo $dataset_array ?>
        };
        const ctx = document.getElementById('user_action_chart');

        const getOrCreateTooltip = (chart) => {
            let tooltipEl = chart.canvas.parentNode.querySelector('div');

            if (!tooltipEl) {
                tooltipEl = document.createElement('div');
                tooltipEl.style.background = 'rgba(0, 0, 0, 0.7)';
                tooltipEl.style.borderRadius = '3px';
                tooltipEl.style.color = 'white';
                tooltipEl.style.opacity = 1;
                tooltipEl.style.pointerEvents = 'none';
                tooltipEl.style.position = 'absolute';
                tooltipEl.style.transform = 'translate(-50%, 0)';
                tooltipEl.style.transition = 'all .1s ease';

                const table = document.createElement('table');
                table.style.margin = '0px';

                tooltipEl.appendChild(table);
                chart.canvas.parentNode.appendChild(tooltipEl);
            }

            return tooltipEl;
        };

        const externalTooltipHandler = (context) => {
            // Tooltip Element
            const { chart, tooltip } = context;
            const tooltipEl = getOrCreateTooltip(chart);

            // Hide if no tooltip
            if (tooltip.opacity === 0) {
                tooltipEl.style.opacity = 0;
                return;
            }

            // Set Text
            if (tooltip.body) {
                const titleLines = tooltip.title || [];
                const bodyLines = tooltip.body.map(b => b.lines);

                const tableHead = document.createElement('thead');

                titleLines.forEach(title => {
                    const tr = document.createElement('tr');
                    tr.style.borderWidth = 0;

                    const th = document.createElement('th');
                    th.style.borderWidth = 0;
                    const text = document.createTextNode(title);

                    th.appendChild(text);
                    tr.appendChild(th);
                    tableHead.appendChild(tr);
                });

                const tableBody = document.createElement('tbody');
                bodyLines.forEach((body, i) => {
                    const colors = tooltip.labelColors[i];

                    const span = document.createElement('span');
                    span.style.background = colors.backgroundColor;
                    span.style.borderColor = colors.borderColor;
                    span.style.borderWidth = '2px';
                    span.style.marginRight = '10px';
                    span.style.height = '10px';
                    span.style.width = '10px';
                    span.style.display = 'inline-block';

                    const tr = document.createElement('tr');
                    tr.style.backgroundColor = 'inherit';
                    tr.style.borderWidth = 0;

                    const td = document.createElement('td');
                    td.style.borderWidth = 0;

                    const text = document.createTextNode(body);

                    td.appendChild(span);
                    td.appendChild(text);
                    tr.appendChild(td);
                    tableBody.appendChild(tr);
                });

                const tableRoot = tooltipEl.querySelector('table');

                // Remove old children
                while (tableRoot.firstChild) {
                    tableRoot.firstChild.remove();
                }

                // Add new children
                tableRoot.appendChild(tableHead);
                tableRoot.appendChild(tableBody);
            }

            const { offsetLeft: positionX, offsetTop: positionY } = chart.canvas;

            // Display, position, and set styles for font
            tooltipEl.style.opacity = 1;
            tooltipEl.style.left = positionX + tooltip.caretX + 'px';
            tooltipEl.style.top = positionY + tooltip.caretY + 'px';
            tooltipEl.style.font = tooltip.options.bodyFont.string;
            tooltipEl.style.padding = tooltip.options.padding + 'px ' + tooltip.options.padding + 'px';
        };

        var TheChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    title: {
                        display: true,
                        text: '<?php echo $user_name; ?> Actions'
                    },
                    tooltip: {
                        enabled: false,
                        position: 'nearest',
                        external: externalTooltipHandler,
                        callbacks: {
                            afterTitle: function (context) {
                                console.log(context);
                            }
                        }
                    }
                }
            }
        });
        function findClosestDate(datesArray, targetDateString) {
            var targetDate = new Date(targetDateString);
            var closestDate = null;
            var minDifference = Infinity;

            for (var i = 0; i < datesArray.length; i++) {
                var currentDate = new Date(datesArray[i]);
                var difference = Math.abs(targetDate - currentDate);

                if (difference < minDifference) {
                    minDifference = difference;
                    closestDate = currentDate;
                }
            }
            // Return closest date in the format 'YYYY-MM-DD'
            var year = closestDate.getFullYear();
            var month = ('0' + (closestDate.getMonth() + 1)).slice(-2);
            var day = ('0' + closestDate.getDate()).slice(-2);
            //console.log(year + '-' + month + '-' + day);

            return year + '-' + month + '-' + day;
        }

        let filterBtn = document.getElementById('filter-chart');
        filterBtn.addEventListener('click', function (e) {
            // reset 
            TheChart.config.data.labels = dates;
            TheChart.update();
            let dateFrom = document.getElementById('filter-date-from');
            let dateTo = document.getElementById('filter-date-to');
            const dates2 = [...dates];
            let indexStartDate = dates2.indexOf(dateFrom.value);
            let indexEndDate = dates2.indexOf(dateTo.value);
            let filterDate = dates2.slice(indexStartDate, indexEndDate + 1);
            if (filterDate.length == 0) {
                indexStartDate = dates2.indexOf(findClosestDate(dates, dateFrom.value));
                indexEndDate = dates2.indexOf(findClosestDate(dates, dateTo.value));
                filterDate = dates2.slice(indexStartDate, indexEndDate + 1);

            }
            TheChart.config.data.labels = filterDate;
            TheChart.update();

        });
    </script>
    <?php
}