<?php
function select2_shortcode($param, $value)
{
    $param_line = '';
    $param_line .= '<style> .select2-container {z-index:99999;} </style>';
    $param_line .= '<div  style="position:relative;">';

    $param_line .= '<select multiple style="height: 200px;" name="' . esc_attr($param['param_name']) . '" class="select-categories wpb_vc_param_value wpb-input wpb-select ' . esc_attr($param['param_name']) . ' ' . esc_attr($param['type']) . '">';
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

    return $param_line;
}
vc_add_shortcode_param('select2', 'select2_shortcode', get_template_directory_uri() . '/assets/js/select2-init.js');