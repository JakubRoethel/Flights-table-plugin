<?php 
add_action('admin_menu', 'flights_table_menu');

function flights_table_menu() {
    add_menu_page(
        'Flights Table Settings',
        'Flights Table',
        'manage_options',
        'flights-table-settings',
        'flights_table_settings_page',
        'dashicons-airplane',
        20                   
    );
}
?>