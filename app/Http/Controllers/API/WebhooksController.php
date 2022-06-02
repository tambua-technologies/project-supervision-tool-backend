<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhooksController extends AppBaseController
{
//    protected $webhooksRepository;
//    public function __construct(WebhooksRepository $webhooksRepo)
//    {
//        $this->$webhooksRepository = $webhooksRepo;
//    }
//

    public function consume(Request $request) {
//        $this->webhooksRepository->consumeReport($request):
        Log::info('data from kobotoolbox', [$request]);

        return $request->report;
    }
}
