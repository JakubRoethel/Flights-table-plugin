<?php 
function flights_table_shortcode($atts) {
    $atts = shortcode_atts(array(
        'base_url' => get_option('base_url'),
        'departures_param' => get_option('departures_param'),
        'agent_id_param' => get_option('agent_id_param')
    ), $atts);

    // Use $atts['base_url'], $atts['departures_param'], $atts['agent_id_param'] here
    $output = '<div class="flights-table">';
    $output .= '<p>Base URL: ' . esc_html($atts['base_url']) . '</p>';
    $output .= '<p>Departures Parameter: ' . esc_html($atts['departures_param']) . '</p>';
    $output .= '<p>Agent ID Parameter: ' . esc_html($atts['agent_id_param']) . '</p>';
    $output .= '</div>';

    return $output;
}
add_shortcode('flights_table', 'flights_table_shortcode');
?>