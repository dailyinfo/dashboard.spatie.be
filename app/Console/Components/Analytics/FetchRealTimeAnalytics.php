<?php

namespace App\Console\Components\Analytics;

use App\Events\Analytics\RealTimeAnalyticsFetched;
use Illuminate\Console\Command;

class FetchRealTimeAnalytics extends Command
{
    protected $signature = 'dashboard:fetch-real-time-analytics';

    protected $description = 'Fetch real-time analytics stats from Google Analytics';

    public function handle()
    {
        $analytics = \Google::make("analytics");
        $results = $analytics->data_realtime->get("ga:4391653", "rt:activeUsers", [
            "dimensions" => "rt:deviceCategory",
        ]);

        $byDevice = array_combine(
            array_map(function($el) { return strtolower($el[0]); }, $results["rows"]),
            array_map(function($el) { return (int)$el[1]; }, $results["rows"])
        );

        $data = [
            "activeUsers" => (int)$results["totalsForAllResults"]["rt:activeUsers"],
            "activeUsersByDevice" => $byDevice,
        ];

        event(new RealTimeAnalyticsFetched($data));
    }
}
