<?php

function flights_table_shortcode($atts)
{
    $base_url = get_option('base_url');

    if (!empty($base_url)) {
        // Pobieranie danych z rzeczywistego API
        $ch = curl_init($base_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if ($response === false) {
            return '<p>Error fetching data from the API: ' . curl_error($ch) . '</p>';
        }

        $data = json_decode($response, true);

        if ($data === null) {
            return '<p>Error: Unable to decode JSON data from API response.</p>';
        }

        curl_close($ch);
    } else {

        $flight_json_path = WP_PLUGIN_DIR . '/flight-table/mock/flights.json';
        $flight_json_content = file_get_contents($flight_json_path);
        $data = json_decode($flight_json_content, true);

        if ($data === null) {
            return '<p>Error: Unable to read JSON file or JSON format is invalid.</p>';
        }
    }


    $output = '<div class="flight-data alignfull">';
    $output .= '<div class="container">';
    $output .= '<ul class="responsive-table">';
    
    // Nagłówki tabeli
    $output .= '<li class="table-header">';
    $output .= '<div class="col col-1">Departure date</div>';
    $output .= '<div class="col col-2">Departure airport</div>';
    $output .= '<div class="col col-3">Destination airport</div>';
    $output .= '<div class="col col-4">Airline code</div>';
    $output .= '<div class="col col-5">Price</div>';
    $output .= '</li>';
    
    // Dane lotów
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
    $output .= '</div>'; // Zamknięcie kontenera
    $output .= '</div>'; // Zamknięcie flight-data
    
    return $output;
}

add_shortcode('flights_table', 'flights_table_shortcode');
