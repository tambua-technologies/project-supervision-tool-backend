<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFocalPersonRequest;
use App\Http\Requests\UpdateFocalPersonRequest;
use App\Repositories\FocalPersonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FocalPersonController extends AppBaseController
{
    /** @var  FocalPersonRepository */
    private $focalPersonRepository;

    public function __construct(FocalPersonRepository $focalPersonRepo)
    {
        $this->focalPersonRepository = $focalPersonRepo;
    }

    /**
     * Display a listing of the FocalPerson.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $focalPeople = $this->focalPersonRepository->all();

        return view('focal_people.index')
            ->with('focalPeople', $focalPeople);
    }

    /**
     * Show the form for creating a new FocalPerson.
     *
     * @return Response
     */
    public function create()
    {
        return view('focal_people.create');
    }

    /**
     * Store a newly created FocalPerson in storage.
     *
     * @param CreateFocalPersonRequest $request
     *
     * @return Response
     */
    public function store(CreateFocalPersonRequest $request)
    {
        $input = $request->all();

        $focalPerson = $this->focalPersonRepository->create($input);

        Flash::success('Focal Person saved successfully.');

        return redirect(route('focalPeople.index'));
    }

    /**
     * Display the specified FocalPerson.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            Flash::error('Focal Person not found');

            return redirect(route('focalPeople.index'));
        }

        return view('focal_people.show')->with('focalPerson', $focalPerson);
    }

    /**
     * Show the form for editing the specified FocalPerson.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            Flash::error('Focal Person not found');

            return redirect(route('focalPeople.index'));
        }

        return view('focal_people.edit')->with('focalPerson', $focalPerson);
    }

    /**
     * Update the specified FocalPerson in storage.
     *
     * @param int $id
     * @param UpdateFocalPersonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFocalPersonRequest $request)
    {
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            Flash::error('Focal Person not found');

            return redirect(route('focalPeople.index'));
        }

        $focalPerson = $this->focalPersonRepository->update($request->all(), $id);

        Flash::success('Focal Person updated successfully.');

        return redirect(route('focalPeople.index'));
    }

    /**
     * Remove the specified FocalPerson from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $focalPerson = $this->focalPersonRepository->find($id);

        if (empty($focalPerson)) {
            Flash::error('Focal Person not found');

            return redirect(route('focalPeople.index'));
        }

        $this->focalPersonRepository->delete($id);

        Flash::success('Focal Person deleted successfully.');

        return redirect(route('focalPeople.index'));
    }
}
