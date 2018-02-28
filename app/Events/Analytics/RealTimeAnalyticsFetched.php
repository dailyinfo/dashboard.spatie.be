<?php

namespace App\Events\Analytics;

use App\Events\DashboardEvent;

class RealTimeAnalyticsFetched extends DashboardEvent
{
    /** @var array */
    public $activeUsers;

    public function __construct(array $data)
    {
        $this->activeUsers = $data["activeUsers"];
    }
}
