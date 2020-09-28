<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFundingOrganisationRequest;
use App\Http\Requests\UpdateFundingOrganisationRequest;
use App\Repositories\FocalPersonRepository;
use App\Repositories\FundingOrganisationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class FundingOrganisationController extends AppBaseController
{
    /** @var  FundingOrganisationRepository */
    private $fundingOrganisationRepository;
    private $focalPersonRepository;

    public function __construct(
        FundingOrganisationRepository $fundingOrganisationRepo,
        FocalPersonRepository $focalPersonRepo
    )
    {
        $this->fundingOrganisationRepository = $fundingOrganisationRepo;
        $this->focalPersonRepository = $focalPersonRepo;
    }

    /**
     * Display a listing of the FundingOrganisation.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fundingOrganisations = $this->fundingOrganisationRepository->all();

        return view('funding_organisations.index')
            ->with('fundingOrganisations', $fundingOrganisations);
    }

    /**
     * Show the form for creating a new FundingOrganisation.
     *
     */
    public function create()
    {
        $focalPeople = $this->focalPersonRepository->model()::pluck('first_name', 'id');
        return view('funding_organisations.create')
            ->with('focalPeople', $focalPeople);
    }

    /**
     * Store a newly created FundingOrganisation in storage.
     *
     * @param CreateFundingOrganisationRequest $request
     *
     * @return Response
     */
    public function store(CreateFundingOrganisationRequest $request)
    {
        $input = $request->all();

        $fundingOrganisation = $this->fundingOrganisationRepository->create($input);

        Flash::success('Funding Organisation saved successfully.');

        return redirect(route('fundingOrganisations.index'));
    }

    /**
     * Display the specified FundingOrganisation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fundingOrganisation = $this->fundingOrganisationRepository->find($id);

        if (empty($fundingOrganisation)) {
            Flash::error('Funding Organisation not found');

            return redirect(route('fundingOrganisations.index'));
        }

        return view('funding_organisations.show')->with('fundingOrganisation', $fundingOrganisation);
    }

    /**
     * Show the form for editing the specified FundingOrganisation.
     *
     * @param int $id
     *
     * @return Application|Factory|RedirectResponse|Redirector|View
     */
    public function edit($id)
    {
        $fundingOrganisation = $this->fundingOrganisationRepository->find($id);
        $focalPeople = $this->focalPersonRepository->model()::pluck('first_name', 'id');

        if (empty($fundingOrganisation)) {
            Flash::error('Funding Organisation not found');

            return redirect(route('fundingOrganisations.index'));
        }

        return view('funding_organisations.edit')->with('fundingOrganisation', $fundingOrganisation)
            ->with('focalPeople', $focalPeople);
    }

    /**
     * Update the specified FundingOrganisation in storage.
     *
     * @param int $id
     * @param UpdateFundingOrganisationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFundingOrganisationRequest $request)
    {
        $fundingOrganisation = $this->fundingOrganisationRepository->find($id);

        if (empty($fundingOrganisation)) {
            Flash::error('Funding Organisation not found');

            return redirect(route('fundingOrganisations.index'));
        }

        $fundingOrganisation = $this->fundingOrganisationRepository->update($request->all(), $id);

        Flash::success('Funding Organisation updated successfully.');

        return redirect(route('fundingOrganisations.index'));
    }

    /**
     * Remove the specified FundingOrganisation from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fundingOrganisation = $this->fundingOrganisationRepository->find($id);

        if (empty($fundingOrganisation)) {
            Flash::error('Funding Organisation not found');

            return redirect(route('fundingOrganisations.index'));
        }

        $this->fundingOrganisationRepository->delete($id);

        Flash::success('Funding Organisation deleted successfully.');

        return redirect(route('fundingOrganisations.index'));
    }
}
