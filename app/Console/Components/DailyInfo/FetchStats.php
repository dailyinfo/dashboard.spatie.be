<?php

namespace App\Console\Components\DailyInfo;

use App\Events\DailyInfo\StatsFetched;
use Illuminate\Console\Command;

class FetchStats extends Command
{
    protected $signature = 'dashboard:fetch-ad-stats';

    protected $description = 'Fetch advert stats';

    public function handle()
    {
        $secret = config('services.dailyinfo.secret');

        $adStatsJson = file_get_contents("https://staging.dailyinfo.co.uk/dashboard-api/ad-stats?secret=" . $secret);

        $totals = json_decode($adStatsJson, true);

        event(new StatsFetched($totals));
    }
}
