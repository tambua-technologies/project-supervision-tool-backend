<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgencyTypeRequest;
use App\Http\Requests\UpdateAgencyTypeRequest;
use App\Repositories\AgencyTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AgencyTypeController extends AppBaseController
{
    /** @var  AgencyTypeRepository */
    private $agencyTypeRepository;

    public function __construct(AgencyTypeRepository $agencyTypeRepo)
    {
        $this->agencyTypeRepository = $agencyTypeRepo;
    }

    /**
     * Display a listing of the AgencyType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $agencyTypes = $this->agencyTypeRepository->all();

        return view('agency_types.index')
            ->with('agencyTypes', $agencyTypes);
    }

    /**
     * Show the form for creating a new AgencyType.
     *
     * @return Response
     */
    public function create()
    {
        return view('agency_types.create');
    }

    /**
     * Store a newly created AgencyType in storage.
     *
     * @param CreateAgencyTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateAgencyTypeRequest $request)
    {
        $input = $request->all();

        $agencyType = $this->agencyTypeRepository->create($input);

        Flash::success('Agency Type saved successfully.');

        return redirect(route('agencyTypes.index'));
    }

    /**
     * Display the specified AgencyType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agencyType = $this->agencyTypeRepository->find($id);

        if (empty($agencyType)) {
            Flash::error('Agency Type not found');

            return redirect(route('agencyTypes.index'));
        }

        return view('agency_types.show')->with('agencyType', $agencyType);
    }

    /**
     * Show the form for editing the specified AgencyType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agencyType = $this->agencyTypeRepository->find($id);

        if (empty($agencyType)) {
            Flash::error('Agency Type not found');

            return redirect(route('agencyTypes.index'));
        }

        return view('agency_types.edit')->with('agencyType', $agencyType);
    }

    /**
     * Update the specified AgencyType in storage.
     *
     * @param int $id
     * @param UpdateAgencyTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgencyTypeRequest $request)
    {
        $agencyType = $this->agencyTypeRepository->find($id);

        if (empty($agencyType)) {
            Flash::error('Agency Type not found');

            return redirect(route('agencyTypes.index'));
        }

        $agencyType = $this->agencyTypeRepository->update($request->all(), $id);

        Flash::success('Agency Type updated successfully.');

        return redirect(route('agencyTypes.index'));
    }

    /**
     * Remove the specified AgencyType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agencyType = $this->agencyTypeRepository->find($id);

        if (empty($agencyType)) {
            Flash::error('Agency Type not found');

            return redirect(route('agencyTypes.index'));
        }

        $this->agencyTypeRepository->delete($id);

        Flash::success('Agency Type deleted successfully.');

        return redirect(route('agencyTypes.index'));
    }
}
