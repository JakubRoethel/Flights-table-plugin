<strong>Flights Table Plugin</strong>

<strong>Description</strong>

flights Table Plugin is a simple WordPress plugin designed to display flight fare search results in a table format on a WordPress page. The plugin consumes a mock flight fare search API response provided in the flights.json file. It allows users to view flight details such as departure date, departure airport, destination airport, airline code, and price conveniently in a tabular layout.


<strong>Installation</strong>

- Download the plugin zip file.

- Go to your WordPress admin panel.

- Navigate to Plugins -> Add New.

- Click on the "Upload Plugin" button.

- Select the downloaded zip file and click on "Install Now".

- Once installed, click on "Activate Plugin".


<strong>Usage</strong>

- After activating the plugin, create a new WordPress page where you want to display the flight fare search results.

- Add the shortcode [flights_table] to the page content.

- Save the page.

- Visit the page on the frontend to view the flight fare search results displayed in a table format.


<strong>Configuration</strong>

The flights Table Plugin provides the option to configure the API endpoint URL and its parameters via the WordPress admin panel. Follow the steps below to configure the plugin:

- In the WordPress admin panel, navigate to Settings -> flights Table Settings.

- Enter the API endpoint URL in the designated field. Example: /api/fares/{agentId}/{departures}/{destinations}/{periodFromDate}/{periodToDate}?airlineCodes={airlineCodes}

- Configure the API endpoint parameters as needed.

- Click on "Save Changes" to update the settings.


<strong>Future Evolution</strong>

In the future, the flights Table Plugin could evolve in several ways to enhance its functionality and usability:

- Dynamic API Integration: Instead of relying on a mock API response, integrate the plugin with a real flight fare search API to provide live and up-to-date flight information to users.

- Customizable Table Layout: Allow users to customize the columns displayed in the flight fare search results table according to their preferences.

- Advanced Filtering Options: Implement advanced filtering options such as sorting by price, filtering by airline, departure date, etc., to provide users with more control over the displayed results.

- Integration with Booking Systems: Enable users to directly book flights from the displayed search results by integrating the plugin with popular flight booking systems or APIs.

- Localization and Internationalization: Support localization and internationalization to make the plugin accessible to users from different regions and languages.


<strong>Repository</strong>

The code for the flights Table Plugin is available on GitHub. You can access the repository here.
For any issues, feature requests, or contributions, please feel free to open an issue or pull request on the repository.
Thank you for using flights Table Plugin! We hope it serves your flight fare search needs effectively.
