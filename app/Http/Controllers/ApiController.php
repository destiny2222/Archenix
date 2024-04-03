<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Analytics;
use Google_Service_AnalyticsReporting;
use Google_Service_AnalyticsReporting_DateRange;
use Google_Service_AnalyticsReporting_Metric;
use Google_Service_AnalyticsReporting_ReportRequest;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        // Load the Google API PHP Client Library.
        require_once base_path('vendor/autoload.php');

        session_start();

        $client = new Google_Client();
        $client->setAuthConfig(base_path('client_secrets.json'));
        $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

        // If the user has already authorized this app then get an access token
        // else redirect to ask the user to authorize access to Google Analytics.
        if ($request->session()->has('access_token')) {
            // Set the access token on the client.
            $client->setAccessToken($request->session()->get('access_token'));

            // Create an authorized analytics service object.
            $analytics = new Google_Service_AnalyticsReporting($client);

            // Call the Analytics Reporting API V4.
            $response = $this->getReport($analytics);

            // Print the response.
            $this->printResults($response);
        } else {
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
            return redirect()->away(filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }


    private function getReport($analytics) {

        // Replace with your view ID, for example XXXX.
        $VIEW_ID = "<REPLACE_WITH_VIEW_ID>";

        // Create the DateRange object.
        $dateRange = new Google_Service_AnalyticsReporting_DateRange();
        $dateRange->setStartDate("7daysAgo");
        $dateRange->setEndDate("today");

        // Create the Metrics object.
        $sessions = new Google_Service_AnalyticsReporting_Metric();
        $sessions->setExpression("ga:sessions");
        $sessions->setAlias("sessions");

        // Create the ReportRequest object.
        $request = new Google_Service_AnalyticsReporting_ReportRequest();
        $request->setViewId($VIEW_ID);
        $request->setDateRanges($dateRange);
        $request->setMetrics(array($sessions));

        $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $body->setReportRequests(array($request));
        return $analytics->reports->batchGet($body);
    }

    /**
     * Parses and prints the Analytics Reporting API V4 response.
     *
     * @param An Analytics Reporting API V4 response.
     */
    private function printResults($reports) {
        foreach ($reports as $report) {
            $header = $report->getColumnHeader();
            $dimensionHeaders = $header->getDimensions();
            $metricHeaders = $header->getMetricHeader()->getMetricHeaderEntries();
            $rows = $report->getData()->getRows();

            foreach ($rows as $row) {
                $dimensions = $row->getDimensions();
                $metrics = $row->getMetrics();
                foreach ($dimensionHeaders as $i => $dimensionHeader) {
                    if (isset($dimensions[$i])) {
                        echo $dimensionHeader . ": " . $dimensions[$i] . "\n";
                    }
                }

                foreach ($metrics as $metric) {
                    $values = $metric->getValues();
                    foreach ($metricHeaders as $k => $entry) {
                        if (isset($values[$k])) {
                            echo $entry->getName() . ": " . $values[$k] . "\n";
                        }
                    }
                }
            }
        }
    }
}
