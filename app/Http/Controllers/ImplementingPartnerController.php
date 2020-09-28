<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateImplementingPartnerRequest;
use App\Http\Requests\UpdateImplementingPartnerRequest;
use App\Repositories\FocalPersonRepository;
use App\Repositories\ImplementingPartnerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Flash;
use Illuminate\View\View;
use Response;

class ImplementingPartnerController extends AppBaseController
{
    /** @var  ImplementingPartnerRepository */
    private $implementingPartnerRepository;
    private $focalPersonRepository;

    public function __construct(
        ImplementingPartnerRepository $implementingPartnerRepo,
        FocalPersonRepository $focalPersonRepo
    )
    {
        $this->implementingPartnerRepository = $implementingPartnerRepo;
        $this->focalPersonRepository = $focalPersonRepo;
    }

    /**
     * Display a listing of the ImplementingPartner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $implementingPartners = $this->implementingPartnerRepository->all();

        return view('implementing_partners.index')
            ->with('implementingPartners', $implementingPartners);
    }

    /**
     * Show the form for creating a new ImplementingPartner.
     *
     */
    public function create()
    {
        $focalPeople = $this->focalPersonRepository->model()::pluck('first_name', 'id');
        return view('implementing_partners.create')
            ->with('focalPeople', $focalPeople);
    }

    /**
     * Store a newly created ImplementingPartner in storage.
     *
     * @param CreateImplementingPartnerRequest $request
     *
     * @return Response
     */
    public function store(CreateImplementingPartnerRequest $request)
    {
        $input = $request->all();

        $implementingPartner = $this->implementingPartnerRepository->create($input);

        Flash::success('Implementing Partner saved successfully.');

        return redirect(route('implementingPartners.index'));
    }

    /**
     * Display the specified ImplementingPartner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            Flash::error('Implementing Partner not found');

            return redirect(route('implementingPartners.index'));
        }

        return view('implementing_partners.show')->with('implementingPartner', $implementingPartner);
    }

    /**
     * Show the form for editing the specified ImplementingPartner.
     *
     * @param int $id
     *
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $implementingPartner = $this->implementingPartnerRepository->find($id);
        $focalPeople = $this->focalPersonRepository->model()::pluck('first_name', 'id');

        if (empty($implementingPartner)) {
            Flash::error('Implementing Partner not found');

            return redirect(route('implementingPartners.index'));
        }

        return view('implementing_partners.edit')->with('implementingPartner', $implementingPartner)
            ->with('focalPeople', $focalPeople);
    }

    /**
     * Update the specified ImplementingPartner in storage.
     *
     * @param int $id
     * @param UpdateImplementingPartnerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImplementingPartnerRequest $request)
    {
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            Flash::error('Implementing Partner not found');

            return redirect(route('implementingPartners.index'));
        }

        $implementingPartner = $this->implementingPartnerRepository->update($request->all(), $id);

        Flash::success('Implementing Partner updated successfully.');

        return redirect(route('implementingPartners.index'));
    }

    /**
     * Remove the specified ImplementingPartner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $implementingPartner = $this->implementingPartnerRepository->find($id);

        if (empty($implementingPartner)) {
            Flash::error('Implementing Partner not found');

            return redirect(route('implementingPartners.index'));
        }

        $this->implementingPartnerRepository->delete($id);

        Flash::success('Implementing Partner deleted successfully.');

        return redirect(route('implementingPartners.index'));
    }
}
