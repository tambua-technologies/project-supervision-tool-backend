<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgencyRequest;
use App\Http\Requests\UpdateAgencyRequest;
use App\Models\AgencyType;
use App\Repositories\AgencyRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AgencyTypeRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class AgencyController extends AppBaseController
{
    /** @var  AgencyRepository */
    private $agencyRepository;
    private $agencyTypesRepository;

    public function __construct(AgencyRepository $agencyRepo, AgencyTypeRepository $agencyTypeRepo)
    {
        $this->agencyRepository = $agencyRepo;
        $this->agencyTypesRepository = $agencyTypeRepo;
    }

    /**
     * Display a listing of the Agency.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $agencies = $this->agencyRepository->all();

        return view('agencies.index')
            ->with('agencies', $agencies);
    }

    /**
     * Show the form for creating a new Agency.
     *
     * @return Response
     */
    public function create()
    {
        return view('agencies.create')
            ->with('agencyTypes', $this->agencyTypesRepository->model()::pluck('name', 'id'));
    }

    /**
     * Store a newly created Agency in storage.
     *
     * @param CreateAgencyRequest $request
     *
     * @return Response
     */
    public function store(CreateAgencyRequest $request)
    {
        $input = $request->all();

        $agency = $this->agencyRepository->create($input);

        Flash::success('Agency saved successfully.');

        return redirect(route('agencies.index'));
    }

    /**
     * Display the specified Agency.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        return view('agencies.show')->with('agency', $agency);
    }

    /**
     * Show the form for editing the specified Agency.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        return view('agencies.edit')->with('agency', $agency)
            ->with('agencyTypes', $this->agencyTypesRepository->model()::pluck('name', 'id'));
    }

    /**
     * Update the specified Agency in storage.
     *
     * @param int $id
     * @param UpdateAgencyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgencyRequest $request)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        $agency = $this->agencyRepository->update($request->all(), $id);

        Flash::success('Agency updated successfully.');

        return redirect(route('agencies.index'));
    }

    /**
     * Remove the specified Agency from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        $this->agencyRepository->delete($id);

        Flash::success('Agency deleted successfully.');

        return redirect(route('agencies.index'));
    }
}
