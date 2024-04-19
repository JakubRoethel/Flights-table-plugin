<?php 
function flights_table_settings_page() {
    if (isset($_POST['submit'])) {
        update_option('base_url', sanitize_text_field($_POST['base_url']));
        update_option('departures_param', sanitize_text_field($_POST['departures_param']));
        update_option('agent_id_param', sanitize_text_field($_POST['agent_id_param']));
        echo '<div class="updated"><p>Settings saved</p></div>';
    }
    ?>
    <div class="flights-table-wrap">
        <h2>Flights Table Settings</h2>
        <p>This plugin allows you to display flight tables on your website.</p>
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Base URL</th>
                    <td><input type="text" name="base_url" value="<?php echo esc_attr(get_option('base_url')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Departures Parameter</th>
                    <td><input type="text" name="departures_param" value="<?php echo esc_attr(get_option('departures_param')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Agent ID Parameter</th>
                    <td><input type="text" name="agent_id_param" value="<?php echo esc_attr(get_option('agent_id_param')); ?>" /></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Save" class="submit-button" />
        </form>
    </div>
    <?php
}
?>