<?php

namespace App\Observers;

use App\Models\Progress;
use App\Models\SubProjectProgressHistory;
use Illuminate\Support\Facades\Log;

class ProgressObserver
{

    public function created(Progress $progress)
    {

        SubProjectProgressHistory::create(
            [
                'sub_project_id' => $progress->sub_project_id,
                'progress_id' => $progress->id
            ]
        );
    }

    public function updated(Progress $progress)
    {

        SubProjectProgressHistory::create(
            [
                'sub_project_id' => $progress->sub_project_id,
                'progress_id' => $progress->id
            ]
        );
    }
}
