<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockTypeRequest;
use App\Http\Requests\UpdateStockTypeRequest;
use App\Repositories\StockTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StockTypeController extends AppBaseController
{
    /** @var  StockTypeRepository */
    private $stockTypeRepository;

    public function __construct(StockTypeRepository $stockTypeRepo)
    {
        $this->stockTypeRepository = $stockTypeRepo;
    }

    /**
     * Display a listing of the StockType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stockTypes = $this->stockTypeRepository->all();

        return view('stock_types.index')
            ->with('stockTypes', $stockTypes);
    }

    /**
     * Show the form for creating a new StockType.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_types.create');
    }

    /**
     * Store a newly created StockType in storage.
     *
     * @param CreateStockTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateStockTypeRequest $request)
    {
        $input = $request->all();

        $stockType = $this->stockTypeRepository->create($input);

        Flash::success('Stock Type saved successfully.');

        return redirect(route('stockTypes.index'));
    }

    /**
     * Display the specified StockType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockType = $this->stockTypeRepository->find($id);

        if (empty($stockType)) {
            Flash::error('Stock Type not found');

            return redirect(route('stockTypes.index'));
        }

        return view('stock_types.show')->with('stockType', $stockType);
    }

    /**
     * Show the form for editing the specified StockType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockType = $this->stockTypeRepository->find($id);

        if (empty($stockType)) {
            Flash::error('Stock Type not found');

            return redirect(route('stockTypes.index'));
        }

        return view('stock_types.edit')->with('stockType', $stockType);
    }

    /**
     * Update the specified StockType in storage.
     *
     * @param int $id
     * @param UpdateStockTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockTypeRequest $request)
    {
        $stockType = $this->stockTypeRepository->find($id);

        if (empty($stockType)) {
            Flash::error('Stock Type not found');

            return redirect(route('stockTypes.index'));
        }

        $stockType = $this->stockTypeRepository->update($request->all(), $id);

        Flash::success('Stock Type updated successfully.');

        return redirect(route('stockTypes.index'));
    }

    /**
     * Remove the specified StockType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockType = $this->stockTypeRepository->find($id);

        if (empty($stockType)) {
            Flash::error('Stock Type not found');

            return redirect(route('stockTypes.index'));
        }

        $this->stockTypeRepository->delete($id);

        Flash::success('Stock Type deleted successfully.');

        return redirect(route('stockTypes.index'));
    }
}
