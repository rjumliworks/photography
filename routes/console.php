<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('subscriptions:check')->dailyAt('08:00');