<?php

namespace App\Events\DailyInfo;

use App\Events\DashboardEvent;

class StatsFetched extends DashboardEvent
{
    /** @var int */
    public $newAds;

    /** @var int */
    public $newHeldAds;

    /** @var int */
    public $filteredAds;

    /** @var int */
    public $newReviews;

    /** @var int */
    public $reviewsPastWeekCount;

    /** @var int */
    public $reviewsPast30DaysCount;

    public function __construct(array $totals)
    {
        foreach ($totals as $sumName => $total) {
            $this->$sumName = $total;
        }
    }
}
