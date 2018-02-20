<?php

namespace App\Console\Components\DailyInfo;

use App\Events\DailyInfo\StatsFetched;
use Illuminate\Console\Command;

class FetchStats extends Command
{
    protected $signature = 'dashboard:fetch-stats';

    protected $description = 'Fetch number of new ads, reviews etc. from DI endpoint';

    public function handle()
    {
        $secret = config('services.dailyinfo.secret');

        $statsJson = file_get_contents("https://staging.dailyinfo.co.uk/dashboard-api/stats?secret=" . $secret);

        $totals = json_decode($statsJson, true);

        event(new StatsFetched($totals));
    }
}
