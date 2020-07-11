<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Repositories\HrTypeRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UnitRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class ItemController extends AppBaseController
{
    /** @var  HrTypeRepository */
    private $itemRepository;
    private $unitRepository;

    public function __construct(HrTypeRepository $itemRepo, UnitRepository $unitRepo)
    {
        $this->itemRepository = $itemRepo;
        $this->unitRepository = $unitRepo;
    }

    /**
     * Display a listing of the Item.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $items = $this->itemRepository->all();

        return view('items.index')
            ->with('items', $items);
    }

    /**
     * Show the form for creating a new Item.
     *
     * @return Response
     */
    public function create()
    {
        $units = $this->unitRepository->model()::pluck('name', 'id');
        return view('items.create')
            ->with('units', $units);
    }

    /**
     * Store a newly created Item in storage.
     *
     * @param CreateItemRequest $request
     *
     * @return Response
     */
    public function store(CreateItemRequest $request)
    {
        $input = $request->all();

        $item = $this->itemRepository->create($input);

        Flash::success('Item saved successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Display the specified Item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified Item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $item = $this->itemRepository->find($id);
        $units = $this->unitRepository->model()::pluck('name', 'id');

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.edit')
            ->with('item', $item)
            ->with('units', $units);
    }

    /**
     * Update the specified Item in storage.
     *
     * @param int $id
     * @param UpdateItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemRequest $request)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $item = $this->itemRepository->update($request->all(), $id);

        Flash::success('Item updated successfully.');

        return redirect(route('items.index'));
    }

    /**
     * Remove the specified Item from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        $this->itemRepository->delete($id);

        Flash::success('Item deleted successfully.');

        return redirect(route('items.index'));
    }
}
