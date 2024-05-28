<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\AbandonedCart;
use App\Console\Commands\RemoveInactiveSessionCart;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::command(AbandonedCart::class)->dailyAt('9:00');
Schedule::command(RemoveInactiveSessionCart::class)->weekly();
