<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Illuminate\Support\Facades\Bus;

class CheckSubscriptions extends Command
{
    protected $signature = 'subscriptions:check';
    protected $description = 'Check subscriptions and update status if expired';

    public function handle()
    {
        Bus::dispatch(new \App\Jobs\CheckExpiredSubscriptionsJob());
        $this->info('Subscription check dispatched to queue.');
    }
}
