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
        $results = $analytics->data_realtime->get("ga:4391653", "rt:activeUsers");
        $data = [
            "activeUsers" => (int)$results["totalsForAllResults"]["rt:activeUsers"],
        ];
        event(new RealTimeAnalyticsFetched($data));
    }
}
