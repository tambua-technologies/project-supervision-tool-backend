<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHumanResourceRequest;
use App\Http\Requests\UpdateHumanResourceRequest;
use App\Repositories\ImplementingPartnerRepository;
use App\Repositories\HumanResourceRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\HrTypeRepository;
use App\Repositories\LocationRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class HumanResourceController extends AppBaseController
{
    /** @var  HumanResourceRepository */
    private $humanResourceRepository;
    private $locationRepository;
    private $itemRepository;
    private $agencyRepository;

    public function __construct(HumanResourceRepository $humanResourceRepo, LocationRepository $locationRepo, HrTypeRepository $itemRepo, ImplementingPartnerRepository $agencyRepo)
    {
        $this->humanResourceRepository = $humanResourceRepo;
        $this->agencyRepository = $agencyRepo;
        $this->locationRepository = $locationRepo;
        $this->itemRepository = $itemRepo;
    }

    /**
     * Display a listing of the HumanResource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $humanResources = $this->humanResourceRepository->all();

        return view('human_resources.index')
            ->with('humanResources', $humanResources);
    }

    /**
     * Show the form for creating a new HumanResource.
     *
     * @return Response
     */
    public function create()
    {
        $locations = $this->locationRepository->model()::pluck('name', 'id');
        $items = $this->itemRepository->model()::pluck('name', 'id');
        $agencies = $this->agencyRepository->model()::pluck('name', 'id');
        return view('human_resources.create')
            ->with('locations', $locations)
            ->with('agencies', $agencies)
            ->with('items', $items);
    }

    /**
     * Store a newly created HumanResource in storage.
     *
     * @param CreateHumanResourceRequest $request
     *
     * @return Response
     */
    public function store(CreateHumanResourceRequest $request)
    {
        $input = $request->all();

        $humanResource = $this->humanResourceRepository->create($input);

        Flash::success('Human Resource saved successfully.');

        return redirect(route('humanResources.index'));
    }

    /**
     * Display the specified HumanResource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $humanResource = $this->humanResourceRepository->find($id);

        if (empty($humanResource)) {
            Flash::error('Human Resource not found');

            return redirect(route('humanResources.index'));
        }

        return view('human_resources.show')->with('humanResource', $humanResource);
    }

    /**
     * Show the form for editing the specified HumanResource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $humanResource = $this->humanResourceRepository->find($id);
        $locations = $this->locationRepository->model()::pluck('name', 'id');
        $agencies = $this->agencyRepository->model()::pluck('name', 'id');
        $items = $this->itemRepository->model()::pluck('name', 'id');


        if (empty($humanResource)) {
            Flash::error('Human Resource not found');

            return redirect(route('humanResources.index'));
        }

        return view('human_resources.edit')->with('humanResource', $humanResource)
            ->with('locations', $locations)
            ->with('agencies', $agencies)
            ->with('items', $items);
    }

    /**
     * Update the specified HumanResource in storage.
     *
     * @param int $id
     * @param UpdateHumanResourceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHumanResourceRequest $request)
    {
        $humanResource = $this->humanResourceRepository->find($id);

        if (empty($humanResource)) {
            Flash::error('Human Resource not found');

            return redirect(route('humanResources.index'));
        }

        $humanResource = $this->humanResourceRepository->update($request->all(), $id);

        Flash::success('Human Resource updated successfully.');

        return redirect(route('humanResources.index'));
    }

    /**
     * Remove the specified HumanResource from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $humanResource = $this->humanResourceRepository->find($id);

        if (empty($humanResource)) {
            Flash::error('Human Resource not found');

            return redirect(route('humanResources.index'));
        }

        $this->humanResourceRepository->delete($id);

        Flash::success('Human Resource deleted successfully.');

        return redirect(route('humanResources.index'));
    }
}