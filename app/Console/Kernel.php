<?php

namespace App\Console;

use App\Console\Components\Analytics\FetchRealTimeAnalytics;
use App\Console\Components\Trello\FetchTodo;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        FetchRealTimeAnalytics::class,
        \App\Console\Components\Calendar\FetchCalendarEvents::class,
        \App\Console\Components\GitHub\FetchTotals::class,
        \App\Console\Components\InternetConnection\SendHeartbeat::class,
        \App\Console\Components\Npm\FetchTotals::class,
        \App\Console\Components\Music\FetchCurrentTrack::class,
        \App\Console\Components\Packagist\FetchTotals::class,
        \App\Console\Components\DailyInfo\FetchStats::class,
        \App\Console\Components\Tasks\FetchTasks::class,
        \App\Console\Components\Twitter\ListenForMentions::class,
        \App\Console\Components\Twitter\ListenForQuotes::class,
        \App\Console\Components\Twitter\SendFakeTweet::class,
        UpdateDashboard::class,
        FetchTodo::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('dashboard:fetch-calendar-events')->everyMinute();
        $schedule->command('dashboard:fetch-real-time-analytics')->everyMinute();
        $schedule->command('dashboard:fetch-current-track')->everyMinute();
        $schedule->command('dashboard:send-heartbeat')->everyMinute();
        $schedule->command('dashboard:fetch-ad-stats')->everyFiveMinutes();
    }
}
