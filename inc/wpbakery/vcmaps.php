<?php
/* This is for showing the element in the Dashboard */
/* ================================================ */

// Create multi dropdown param type
vc_add_shortcode_param('dropdown_multi', 'dropdown_multi_settings_field');
function dropdown_multi_settings_field($param, $value)
{
    $param_line = '';
    $param_line .= '<style> .select2-container {z-index:99999;} </style>';
    $param_line .= '<div  style="position:relative;">';
    $param_line .= '<select multiple style="height: 200px;" name="' . esc_attr($param['param_name']) . '" class="select2-' . esc_attr($param['param_name']) . ' wpb_vc_param_value wpb-input wpb-select ' . esc_attr($param['param_name']) . ' ' . esc_attr($param['type']) . '">';
    foreach ($param['value'] as $text_val => $val) {
        if (is_numeric($text_val) && (is_string($val) || is_numeric($val))) {
            $text_val = $val;
        }
        $text_val = __($text_val, "js_composer");
        $selected = '';

        if (!is_array($value)) {
            $param_value_arr = explode(',', $value);
        } else {
            $param_value_arr = $value;
        }

        if ($value !== '' && in_array($val, $param_value_arr)) {
            $selected = ' selected="selected"';
        }
        $param_line .= '<option class="' . $val . '" value="' . $val . '"' . $selected . '>' . $text_val . '</option>';
    }
    $param_line .= '</select>';
    $param_line .= '</div>';
    $param_name = esc_attr($param['param_name']);
    $param_line .= '
        <script>
            (function ($) {
                // init select2
                $(document).ready(function () {
                    $(".select2-' . esc_attr($param['param_name']) . '").select2();
                });
            }(jQuery));
        </script>
        ';

    return $param_line;
}

/* Tenders Data Table  */
require_once "vcmaps/tenders_datatable_map.php";

/* Vacancies Data Table  */
require_once "vcmaps/vacancies_datatable_map.php";

/* Zakat Calculator  */
require_once "vcmaps/zakat_calculator_map.php";

/* Quick Donation  */
require_once "vcmaps/quick_donation_map.php";

/* Campaigns Slider  */
require_once "vcmaps/campaigns_slider_map.php";

/* News Slider  */
require_once "vcmaps/news_slider_map.php";

/* Archive Programs Cards  */
require_once "vcmaps/archive_programs_cards_map.php";

/*  Programs Cards  */
require_once "vcmaps/programs_cards_map.php";

/*  Partners  */
require_once "vcmaps/partners_map.php";

/*  Statistics  */
require_once "vcmaps/statistics_map.php";

/*  Achievement  */
require_once "vcmaps/achievements_map.php";

/*  Projects Section  */
require_once "vcmaps/projects_section_map.php";

/*  Campaign Banner  */
require_once "vcmaps/campaign_banner_map.php";

/*  PDF Download Card  */
require_once "vcmaps/PDF_download_card_map.php";

/*  Job Details Card  */
require_once "vcmaps/job_details_card_map.php";

/*  Contact Info  */
require_once "vcmaps/contact_info_map.php";

/* Posts Slider  */
require_once "vcmaps/posts_slider_map.php";

/* About Bonyan Card   */
require_once "vcmaps/about_bonyan_card_map.php";

/* Locations Bar   */
require_once "vcmaps/locations_map.php";

/* Values Section  */
require_once "vcmaps/bonyan_values_card_map.php";

/* Report Card  */
require_once "vcmaps/report_cards_map.php";

/* Boarder Of Trustees  */
require_once "vcmaps/board_of_trustees_map.php";

/* Disable Table Of Content  */
require_once "vcmaps/disable_table_of_content_map.php";

/* Hierarchy Board  */
require_once "vcmaps/hierarchy_board_map.php";

/* Advanced Search  */
require_once "vcmaps/advanced_search_map.php";

/* Events Calendar  */
require_once "vcmaps/events_calendar_map.php";

/* Recommended Content  */
require_once "vcmaps/recommended-content_map.php";

/* Qurbani Calculator  */
require_once "vcmaps/qurbani_calculator_map.php";

/*  CTA Button  */
require_once "vcmaps/cta_btn_map.php";

/*  Campaign Top Donor Section  */
require_once "vcmaps/campaign_top_donor_map.php";

/*  Classy Form  */
require_once "vcmaps/classy_form_map.php";

/*  Impact Statistics  */
require_once "vcmaps/impact_statistics_map.php";

/*  News Carousel  */
require_once "vcmaps/news_carousel_map.php";

/*  Testimonials  */
require_once "vcmaps/testimonials_map.php";

/*  FAQs  */
require_once "vcmaps/faqs_map.php";

/*  News Card  */
require_once "vcmaps/news_card_map.php";
