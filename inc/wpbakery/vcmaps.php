<?php
/* This is for showing the element in the Dashboard */
/* ================================================ */

// Create multi dropdown param type
vc_add_shortcode_param('dropdown_multi', 'dropdown_multi_settings_field');
function dropdown_multi_settings_field($param, $value)
{
    $param_line = '';
    $param_line .= '<select multiple style="height: 200px;" name="' . esc_attr($param['param_name']) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr($param['param_name']) . ' ' . esc_attr($param['type']) . '">';
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

    return  $param_line;
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
