<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockStatusesRequest;
use App\Http\Requests\UpdateStockStatusesRequest;
use App\Repositories\StockStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StockStatusesController extends AppBaseController
{
    /** @var  StockStatusesRepository */
    private $stockStatusesRepository;

    public function __construct(StockStatusesRepository $stockStatusesRepo)
    {
        $this->stockStatusesRepository = $stockStatusesRepo;
    }

    /**
     * Display a listing of the StockStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stockStatuses = $this->stockStatusesRepository->all();

        return view('stock_statuses.index')
            ->with('stockStatuses', $stockStatuses);
    }

    /**
     * Show the form for creating a new StockStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_statuses.create');
    }

    /**
     * Store a newly created StockStatuses in storage.
     *
     * @param CreateStockStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateStockStatusesRequest $request)
    {
        $input = $request->all();

        $stockStatuses = $this->stockStatusesRepository->create($input);

        Flash::success('Stock Statuses saved successfully.');

        return redirect(route('stockStatuses.index'));
    }

    /**
     * Display the specified StockStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockStatuses = $this->stockStatusesRepository->find($id);

        if (empty($stockStatuses)) {
            Flash::error('Stock Statuses not found');

            return redirect(route('stockStatuses.index'));
        }

        return view('stock_statuses.show')->with('stockStatuses', $stockStatuses);
    }

    /**
     * Show the form for editing the specified StockStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockStatuses = $this->stockStatusesRepository->find($id);

        if (empty($stockStatuses)) {
            Flash::error('Stock Statuses not found');

            return redirect(route('stockStatuses.index'));
        }

        return view('stock_statuses.edit')->with('stockStatuses', $stockStatuses);
    }

    /**
     * Update the specified StockStatuses in storage.
     *
     * @param int $id
     * @param UpdateStockStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockStatusesRequest $request)
    {
        $stockStatuses = $this->stockStatusesRepository->find($id);

        if (empty($stockStatuses)) {
            Flash::error('Stock Statuses not found');

            return redirect(route('stockStatuses.index'));
        }

        $stockStatuses = $this->stockStatusesRepository->update($request->all(), $id);

        Flash::success('Stock Statuses updated successfully.');

        return redirect(route('stockStatuses.index'));
    }

    /**
     * Remove the specified StockStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockStatuses = $this->stockStatusesRepository->find($id);

        if (empty($stockStatuses)) {
            Flash::error('Stock Statuses not found');

            return redirect(route('stockStatuses.index'));
        }

        $this->stockStatusesRepository->delete($id);

        Flash::success('Stock Statuses deleted successfully.');

        return redirect(route('stockStatuses.index'));
    }
}
