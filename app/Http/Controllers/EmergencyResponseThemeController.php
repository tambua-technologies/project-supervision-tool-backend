<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmergencyResponseThemeRequest;
use App\Http\Requests\UpdateEmergencyResponseThemeRequest;
use App\Repositories\EmergencyResponseThemeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EmergencyResponseThemeController extends AppBaseController
{
    /** @var  EmergencyResponseThemeRepository */
    private $emergencyResponseThemeRepository;

    public function __construct(EmergencyResponseThemeRepository $emergencyResponseThemeRepo)
    {
        $this->emergencyResponseThemeRepository = $emergencyResponseThemeRepo;
    }

    /**
     * Display a listing of the EmergencyResponseTheme.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $emergencyResponseThemes = $this->emergencyResponseThemeRepository->all();

        return view('emergency_response_themes.index')
            ->with('emergencyResponseThemes', $emergencyResponseThemes);
    }

    /**
     * Show the form for creating a new EmergencyResponseTheme.
     *
     * @return Response
     */
    public function create()
    {
        return view('emergency_response_themes.create');
    }

    /**
     * Store a newly created EmergencyResponseTheme in storage.
     *
     * @param CreateEmergencyResponseThemeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmergencyResponseThemeRequest $request)
    {
        $input = $request->all();

        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->create($input);

        Flash::success('Emergency Response Theme saved successfully.');

        return redirect(route('emergencyResponseThemes.index'));
    }

    /**
     * Display the specified EmergencyResponseTheme.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->find($id);

        if (empty($emergencyResponseTheme)) {
            Flash::error('Emergency Response Theme not found');

            return redirect(route('emergencyResponseThemes.index'));
        }

        return view('emergency_response_themes.show')->with('emergencyResponseTheme', $emergencyResponseTheme);
    }

    /**
     * Show the form for editing the specified EmergencyResponseTheme.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->find($id);

        if (empty($emergencyResponseTheme)) {
            Flash::error('Emergency Response Theme not found');

            return redirect(route('emergencyResponseThemes.index'));
        }

        return view('emergency_response_themes.edit')->with('emergencyResponseTheme', $emergencyResponseTheme);
    }

    /**
     * Update the specified EmergencyResponseTheme in storage.
     *
     * @param int $id
     * @param UpdateEmergencyResponseThemeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmergencyResponseThemeRequest $request)
    {
        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->find($id);

        if (empty($emergencyResponseTheme)) {
            Flash::error('Emergency Response Theme not found');

            return redirect(route('emergencyResponseThemes.index'));
        }

        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->update($request->all(), $id);

        Flash::success('Emergency Response Theme updated successfully.');

        return redirect(route('emergencyResponseThemes.index'));
    }

    /**
     * Remove the specified EmergencyResponseTheme from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $emergencyResponseTheme = $this->emergencyResponseThemeRepository->find($id);

        if (empty($emergencyResponseTheme)) {
            Flash::error('Emergency Response Theme not found');

            return redirect(route('emergencyResponseThemes.index'));
        }

        $this->emergencyResponseThemeRepository->delete($id);

        Flash::success('Emergency Response Theme deleted successfully.');

        return redirect(route('emergencyResponseThemes.index'));
    }
}
