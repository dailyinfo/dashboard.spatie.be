<?php

namespace App\Events\Trello;

use App\Events\DashboardEvent;

class TodosFetched extends DashboardEvent
{
    /** @var array */
    public $todos;

    public function __construct(array $todos)
    {
        $this->todos = $todos;
    }
}
