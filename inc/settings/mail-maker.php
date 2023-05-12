<?php

function mail_maker_page_callback()
{
    if (!class_exists('Give_Payments_Query')) {
        return;
    }

    // Define a class for your custom list table
    if (!class_exists('WP_List_Table')) {
        require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
    }


    // Define the class for the list table
    class My_List_Table extends WP_List_Table
    {
        public $data_array = array();
        public $statuses_array = array();

        // Define the constructor
        function __construct()
        {
            parent::__construct(array(
                'singular' => 'payment', // singular name of the item
                'plural'   => 'payments', // plural name of the item
                'ajax'     => false // enable/disable AJAX for this table
            ));
        }

        // Define the columns to display in the table
        function get_columns()
        {
            $columns = array(
                'donation_id'   => 'Donation ID',
                'donation_form' => 'Donation Form',
                'date' => 'Donation Date',
                'amount' => 'Donation Amount',
                'donor_email' => 'Donor Email Address',
                'donor_full_name' => 'Full Name',
                'status' => 'Status',
                'send_mail_btn' => 'Prepare Mail Button',
            );
            return $columns;
        }

        // Define filter dropdowns
        function extra_tablenav($which)
        {
            $statuses_array = $this->statuses_array;
            $statuses = array(
                'all' => 'All Statuses',
            );
            foreach ($statuses_array as $status) {
                $statuses[$status] = $status;
            }
            if ($which == 'top') {
                // Add filter dropdown for the "status" column
                echo '<div class="alignleft actions">';
                echo '<form method="get">';
                echo '<input type="hidden" name="page" value="' . esc_attr($_REQUEST['page']) . '">';
                echo '<select name="status">';
                foreach ($statuses as $value => $label) {
                    echo '<option value="' . $value . '"';
                    if (isset($_REQUEST['status']) && $_REQUEST['status'] == $value) {
                        echo ' selected="selected"';
                    }
                    echo '>' . $label . '</option>';
                }
                echo '</select>';
                echo '<input type="submit" name="filter_action" class="button" value="' . __('Filter', 'bonyan') . '">';
                echo '</form>';
                echo '</div>';
            }
        }

        // Define the data to display in the table
        function prepare_items()
        {
            $data = $this->data_array;



            // Handle search
            $search_term = isset($_REQUEST['s']) ? sanitize_text_field($_REQUEST['s']) : '';
            if (!empty($search_term)) {
                $data = array_filter($data, function ($item) use ($search_term) {
                    $match_found = false;
                    if (strpos(strtolower($item['donation_id']), strtolower($search_term)) !== false) {
                        $match_found = true;
                    }
                    if (strpos(strtolower($item['donor_email']), strtolower($search_term)) !== false) {
                        $match_found = true;
                    }
                    return $match_found;
                });
            }

            // Get column headers and their default sorting order
            $sortable_columns = $this->get_sortable_columns();
            // Handle sorting
            $orderby = isset($_REQUEST['orderby']) ? sanitize_text_field($_REQUEST['orderby']) : 'date';
            $order = isset($_REQUEST['order']) ? sanitize_text_field($_REQUEST['order']) : 'desc';
            usort($data, function ($a, $b) use ($orderby, $order) {
                $result = strcmp($a[$orderby], $b[$orderby]);
                if ($order === 'desc') {
                    $result = -1 * $result;
                }
                return $result;
            });


            $per_page = 11;
            $current_page = $this->get_pagenum();
            $total_items = count($data);
            $data_slice = array_slice($data, (($current_page - 1) * $per_page), $per_page);

            $this->_column_headers = array($this->get_columns(), array(), $sortable_columns);
            $this->items = $data_slice;

            $this->set_pagination_args(array(
                'total_items' => $total_items,
                'per_page'    => $per_page,
                'total_pages' => ceil($total_items / $per_page)
            ));
        }
        // Define the sortable columns
        function get_sortable_columns()
        {
            $sortable_columns = array(
                'donation_id'   => array('donation_id', true),
                'date' => array('date', true),
                'amount' => array('amount', true),
            );
            return $sortable_columns;
        }

        // Define the content for each column
        function column_default($item, $column_name)
        {
            switch ($column_name) {
                case 'donation_id':
                case 'donation_form':
                case 'date':
                case 'amount':
                case 'donor_email':
                case 'donor_full_name':
                case 'status':
                case 'send_mail_btn':
                    return $item[$column_name];
                default:
                    return print_r($item, true);
            }
        }
        // Define how to display the search box and the table
        function display()
        { ?>
            <form method="get">
                <input type="hidden" name="page" value="<?php echo esc_attr($_REQUEST['page']); ?>" />
                <?php $this->search_box('Search', 'my_search'); ?>
            </form>
    <?php
            parent::display();
        }
    }
    // Create an instance of the list table
    $my_list_table = new My_List_Table();


    $args = array(
        'output' => 'payments',
        //'status' => 'publish',
        'number' => -1,
    );
    $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 'all';
    if ($status != 'all') {
        $args['status'] = $status;
    }

    $payments = new Give_Payments_Query($args);
    $payments = $payments->get_payments();

    // Display the list table
    $data_array = array();
    $statuses_array = array();

    foreach ($payments as $payment) {
        if (!in_array($payment->status, $statuses_array)) {
            array_push($statuses_array, $payment->status);
        }
        $payment_total = give_currency_filter(give_format_amount($payment->total));
        $temp_array = [
            "donation_id" => $payment->ID,
            "donation_form" => $payment->form_title,
            "date" => $payment->date,
            "amount" => $payment_total,
            "donor_email" => $payment->email,
            "donor_full_name" => $payment->first_name . ' ' . $payment->last_name,
            "status" => $payment->status,
            "send_mail_btn" => '<button class="button prepare-email-btn" 
            data-email="' . $payment->email . '" 
            data-amount="' . $payment_total  . '" 
            data-donationFormTitle="' . $payment->form_title  . '" 
            data-donorFirstName="' . $payment->first_name  . '" 
            data-donorLastName="' . $payment->last_name  . '" 
            >Prepare Email </button>',
        ];
        array_push($data_array, $temp_array);
    }

    ?>
    <style>
        .email-maker-wrapper {
            position: relative;
        }

        .email-maker-wrapper .send-email-btn,
        .email-maker-wrapper .email-preview {
            text-align: right;
            margin: 5px;
        }

        .input-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .input-wrapper input {
            width: 300px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            opacity: 0;
            /* Full transparency */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100vh;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            transition-duration: 0.4s;
            z-index: 11;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #f5f5f5;
            width: 50%;
            border-radius: 10px;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            margin-right: 50px;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <div class="wrap">
        <div id="email-preview-modal" class="modal">
            <!-- Modal content -->
            <span class="close" id="close_span">&times;</span>
            <div class="modal-content">



            </div>
        </div>
        <h1>Mail Maker</h1>
        <div class="email-maker-wrapper">
            <div class="input-wrapper">
                <input id="email-holder" type="email" placeholder="Donor Email">
                <input id="email-subject" type="text" placeholder="Email Subject">
            </div>
            <?php
            wp_editor('', 'email_body', array(
                'wpautop'       => false,
                'media_buttons' => true,
                'textarea_name' => 'reports_archive_page_desc',
                'textarea_rows' => 10,
                'teeny'         => false,
            ));
            ?>
            <button id="send-email-btn" class="button button-primary button-large send-email-btn">Send Email</button>
            <button id="email-preview" class="button email-preview">Preview</button>
            <br>
        </div>
        <?php
        $my_list_table->data_array = $data_array;
        $my_list_table->statuses_array = $statuses_array;
        $my_list_table->prepare_items();
        $my_list_table->display();
        ?>
    </div>


    <script>
        jQuery(document).ready(function($) {

            let inputHolder = document.getElementById('email-holder');
            let emailSubject = document.getElementById('email-subject');
            $('.prepare-email-btn').on('click', function() {
                let donorEmail = $(this).data('email');
                let donationAmount = $(this).data('amount');
                let donationFormTitle = $(this).data('donationformtitle');
                let donorFirstName = $(this).data('donorfirstname');
                let donorLastName = $(this).data('donorlastname');


                let editor_content = 'Thank you ' + donorFirstName + ' ' + donorLastName + ' for a donation of ' + donationAmount + ' to ' + donationFormTitle + ' Campaign';
                tinyMCE.get('email_body').setContent(editor_content);
                inputHolder.value = donorEmail;
                document.documentElement.scrollTop = 0;
            });
            $('#send-email-btn').on('click', function() {
                let mailMassageBody = tinyMCE.get('email_body').getContent();
                if (inputHolder.value == null || inputHolder.value == '') {
                    alert('Please Set Donor Email');
                    return;
                }
                $('#send-email-btn').css('opacity', '0.3');
                $.ajax({
                    dataType: "json",
                    method: "POST",
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: {
                        action: 'send_Email',
                        nonce: '<?php echo wp_create_nonce('ajax-nonce'); ?>',
                        donor_email: inputHolder.value,
                        emailSubject: emailSubject.value,
                        mailMassageBody: mailMassageBody,
                    },
                    statusCode: {
                        400: function(data) {
                            alert(data.responseJSON.data);
                            $('#send-email-btn').css('opacity', '1');

                        },
                        200: function(data) {
                            $('#send-email-btn').css('opacity', '1');

                            alert('success');
                        },
                    },

                });
            });
            //=====================
            //   For Modal Show
            //=====================
            var modal = document.getElementById("email-preview-modal");
            var btn = document.getElementById("email-preview");
            var span = document.getElementById("close_span");

            btn.onclick = function() {
                let mailMassageBody = tinyMCE.get('email_body').getContent();
                $.ajax({
                    dataType: "json",
                    method: "POST",
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: {
                        action: 'preview_email',
                        nonce: '<?php echo wp_create_nonce('ajax-nonce'); ?>',
                        donor_email: inputHolder.value,
                        emailSubject: emailSubject.value,
                        mailMassageBody: mailMassageBody,
                    },
                    statusCode: {
                        400: function(data) {
                            alert(data.responseJSON.data);
                        },
                        200: function(data) {
                            modal.innerHTML = "";
                            modal.innerHTML = data.Result;
                            console.log(data.Result);

                            modal.style.display = "block";
                            setTimeout(function() {
                                modal.style.opacity = 1;
                            }, 100);

                        },
                    },

                });

            };

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.opacity = 0;
                setTimeout(function() {
                    modal.style.display = "none";
                }, 400);
            };

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.opacity = 0;
                    setTimeout(function() {
                        modal.style.display = "none";
                    }, 400);
                }
            };
            //=========|||||========

        });
    </script>
<?php
}
