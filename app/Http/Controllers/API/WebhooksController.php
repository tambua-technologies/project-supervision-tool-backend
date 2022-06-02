<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Repositories\WebhooksRepository;
use Illuminate\Http\Request;

class WebhooksController extends AppBaseController
{
     private $webhooksRepository;

    public function __construct(WebhooksRepository $webhooksRepo)
    {
       $this->webhooksRepository = $webhooksRepo;
    }


    public function consume(Request $request) {
        if ($request->report) {

            $this->webhooksRepository->create(['payload' => $request->report ]);
            return $this->sendSuccess('Report saved successfully');
        }

        return $this->sendError('unknown payload');
    }
}
