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
