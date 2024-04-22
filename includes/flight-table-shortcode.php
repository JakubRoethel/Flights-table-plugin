<?php

function flights_table_shortcode($atts)
{
    $base_url = get_option('base_url');
    $agent_id_param = get_option('agent_id_param');
    $departures_param = get_option('departures_param');
    $destinations_param = get_option('destinations_param');
    $period_from_date_param = get_option('period_from_date_param');
    $period_to_date_param = get_option('period_to_date_param');

    if (!empty($base_url)) {
        $api_url = $base_url . "/api/fares/";
        $api_url .= !empty($agent_id_param) ? $agent_id_param . "/" : "";
        $api_url .= !empty($departures_param) ? $departures_param . "/" : "";
        $api_url .= !empty($destinations_param) ? $destinations_param . "/" : "";
        $api_url .= !empty($period_from_date_param) ? $period_from_date_param . "/" : "";
        $api_url .= !empty($period_to_date_param) ? $period_to_date_param . "/" : "";
        $api_url = rtrim($api_url, '/');

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        if ($http_status_code === 200) {
            curl_close($ch);
            $data = json_decode($response, true);

            $output = generate_html_output($data);
            return $output;

        } elseif ($http_status_code === 404) {
            $output = '<p>Error: Failed to fetch data from the API.<br>' . 'API URL: '  . $api_url .  '</p>' ;
            
            curl_close($ch);
            
            return $output;
        } else {
            $output = '<p>Error: Failed to fetch data from the API.</p>';
            
            curl_close($ch);
            
            return $output;
        }
    } else {

        $data = get_data_from_json_file();

        $output = generate_html_output($data);

        return $output;
    }
}

function get_data_from_json_file()
{
    $plugin_dir_path = plugin_dir_path(__FILE__);
    $plugin_dir_path = dirname($plugin_dir_path);
    $flight_json_path = $plugin_dir_path . '/mock/flights.json';
    $flight_json_content = file_get_contents($flight_json_path);
    $data = json_decode($flight_json_content, true);
    return $data;
}

function generate_html_output($data)
{
    $output = '<div class="flight-data alignfull">';
    $output .= '<div class="container">';
    $output .= '<ul class="responsive-table">';

    $output .= '<li class="table-header">';
    $output .= '<div class="col col-1">Departure date</div>';
    $output .= '<div class="col col-2">Departure airport</div>';
    $output .= '<div class="col col-3">Destination airport</div>';
    $output .= '<div class="col col-4">Airline code</div>';
    $output .= '<div class="col col-5">Price</div>';
    $output .= '</li>';

    foreach ($data as $flight) {
        $output .= '<li class="table-row">';
        $output .= '<div class="col col-1" data-label="Departure date">' . esc_html($flight['flight']['departure']['date']) . '</div>';
        $output .= '<div class="col col-2" data-label="Departure airport">' . esc_html($flight['flight']['departure']['name']) . '</div>';
        $output .= '<div class="col col-3" data-label="Destination airport">' . esc_html($flight['flight']['destination']['name']) . '</div>';
        $output .= '<div class="col col-4" data-label="Airline code">' . esc_html($flight['flight']['airline']['code']) . '</div>';
        $output .= '<div class="col col-5" data-label="Price">' . esc_html($flight['price']) . '</div>';
        $output .= '</li>';
    }

    $output .= '</ul>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}

add_shortcode('flights_table', 'flights_table_shortcode');
