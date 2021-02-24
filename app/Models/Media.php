<?php

namespace App\Models;

use App\Observers\MediaObserver;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\Models\Media as Model;


class Media extends Model
{
    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'media_owner','media_id', 'user_id');
    }

}
