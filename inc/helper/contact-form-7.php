<?php 

add_action( 'wpcf7_init', 'custom_add_form_tag_datalist' );
  
function custom_add_form_tag_datalist() {
  wpcf7_add_form_tag(
    'datalist',
    'custom_datalist_form_tag_handler',
    array( 'name-attr' => true )
  );
}
function custom_datalist_form_tag_handler( $tag ) {
    $atts = array(
      'type' => 'text',
      'name' => $tag->name,
      'list' => $tag->name . '-options',
    );
    
    $input = sprintf(
      '<input %s />',
      wpcf7_format_atts( $atts )
    );
    
    $datalist = '';
    
    foreach ( $tag->values as $val ) {
      $datalist .= sprintf( '<option>%s</option>', esc_html( $val ) );
    }
    
    $datalist = sprintf(
      '<datalist id="%1$s">%2$s</datalist>',
      $tag->name . '-options',
      $datalist
    );
    
    return $input . $datalist;
  }


?>