<?php

namespace App\Events\DailyInfo;

use App\Events\DashboardEvent;

class AdStatsFetched extends DashboardEvent
{
    /** @var int */
    public $newAds;

    /** @var int */
    public $filteredAds;

    public function __construct(array $totals)
    {
        foreach ($totals as $sumName => $total) {
            $this->$sumName = $total;
        }
    }
}
