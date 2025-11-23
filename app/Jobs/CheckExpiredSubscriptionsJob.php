<?php

namespace App\Jobs;

use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class CheckExpiredSubscriptionsJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $today = Carbon::now();

        Subscription::whereDate('end', '<', $today)
            ->where('status_id', '!=', 4)
            ->update(['status_id' => 4]);
    }
}
