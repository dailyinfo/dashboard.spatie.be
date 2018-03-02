<?php

namespace App\Events\Analytics;

use App\Events\DashboardEvent;

class RealTimeAnalyticsFetched extends DashboardEvent
{
    /** @var integer */
    public $activeUsers;

    /** @var array */
    public $activeUsersByDevice;

    public function __construct(array $data)
    {
        $this->activeUsers = $data["activeUsers"];
        $this->activeUsersByDevice = $data["activeUsersByDevice"];
    }
}
