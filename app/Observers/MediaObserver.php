<?php

namespace App\Observers;

use App\Models\Media;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MediaObserver
{

    public function creating(Media $media)
    {
        Log::info('inside creating observer');
        if (auth()->user() instanceof User) {
            /** @var User $loggedInUser */
            $loggedInUser = auth()->user();
            $media->owners()->attach($loggedInUser->id);
        }
    }
}
