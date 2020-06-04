<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockGroupRequest;
use App\Http\Requests\UpdateStockGroupRequest;
use App\Repositories\StockGroupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StockGroupController extends AppBaseController
{
    /** @var  StockGroupRepository */
    private $stockGroupRepository;

    public function __construct(StockGroupRepository $stockGroupRepo)
    {
        $this->stockGroupRepository = $stockGroupRepo;
    }

    /**
     * Display a listing of the StockGroup.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stockGroups = $this->stockGroupRepository->all();

        return view('stock_groups.index')
            ->with('stockGroups', $stockGroups);
    }

    /**
     * Show the form for creating a new StockGroup.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_groups.create');
    }

    /**
     * Store a newly created StockGroup in storage.
     *
     * @param CreateStockGroupRequest $request
     *
     * @return Response
     */
    public function store(CreateStockGroupRequest $request)
    {
        $input = $request->all();

        $stockGroup = $this->stockGroupRepository->create($input);

        Flash::success('Stock Group saved successfully.');

        return redirect(route('stockGroups.index'));
    }

    /**
     * Display the specified StockGroup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockGroup = $this->stockGroupRepository->find($id);

        if (empty($stockGroup)) {
            Flash::error('Stock Group not found');

            return redirect(route('stockGroups.index'));
        }

        return view('stock_groups.show')->with('stockGroup', $stockGroup);
    }

    /**
     * Show the form for editing the specified StockGroup.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockGroup = $this->stockGroupRepository->find($id);

        if (empty($stockGroup)) {
            Flash::error('Stock Group not found');

            return redirect(route('stockGroups.index'));
        }

        return view('stock_groups.edit')->with('stockGroup', $stockGroup);
    }

    /**
     * Update the specified StockGroup in storage.
     *
     * @param int $id
     * @param UpdateStockGroupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockGroupRequest $request)
    {
        $stockGroup = $this->stockGroupRepository->find($id);

        if (empty($stockGroup)) {
            Flash::error('Stock Group not found');

            return redirect(route('stockGroups.index'));
        }

        $stockGroup = $this->stockGroupRepository->update($request->all(), $id);

        Flash::success('Stock Group updated successfully.');

        return redirect(route('stockGroups.index'));
    }

    /**
     * Remove the specified StockGroup from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockGroup = $this->stockGroupRepository->find($id);

        if (empty($stockGroup)) {
            Flash::error('Stock Group not found');

            return redirect(route('stockGroups.index'));
        }

        $this->stockGroupRepository->delete($id);

        Flash::success('Stock Group deleted successfully.');

        return redirect(route('stockGroups.index'));
    }
}
