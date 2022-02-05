<?php

namespace App\Listeners;

use App\Models\reservations;
use App\Models\User as ModelsUser;
use App\Notifications\NewReservationNotification;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
class SendNewUserNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
     
    }
}