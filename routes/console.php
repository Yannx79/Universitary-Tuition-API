<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/*
Artisan::command('schedule:run', function () {
    $schedule = app(Schedule::class);

    // Schedule your commands here
    $schedule->command('your:command')->daily();
});

Artisan::command('your:command', function () {
    // Your command logic
})->purpose('Describe what your command does');
*/
