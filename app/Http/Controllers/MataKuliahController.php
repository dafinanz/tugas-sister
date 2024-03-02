<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MataKuliahRepository;
use Illuminate\Http\Request;
use Flash;

class MataKuliahController extends AppBaseController
{
    /** @var MataKuliahRepository $mataKuliahRepository*/
    private $mataKuliahRepository;

    public function __construct(MataKuliahRepository $mataKuliahRepo)
    {
        $this->mataKuliahRepository = $mataKuliahRepo;
    }

    /**
     * Display a listing of the MataKuliah.
     */
    public function index(Request $request)
    {
        $mataKuliahs = $this->mataKuliahRepository->paginate(10);

        return view('mata_kuliahs.index')
            ->with('mataKuliahs', $mataKuliahs);
    }

    /**
     * Show the form for creating a new MataKuliah.
     */
    public function create()
    {
        return view('mata_kuliahs.create');
    }

    /**
     * Store a newly created MataKuliah in storage.
     */
    public function store(CreateMataKuliahRequest $request)
    {
        $input = $request->all();

        $mataKuliah = $this->mataKuliahRepository->create($input);

        Flash::success('Mata Kuliah saved successfully.');

        return redirect(route('mataKuliahs.index'));
    }

    /**
     * Display the specified MataKuliah.
     */
    public function show($id)
    {
        $mataKuliah = $this->mataKuliahRepository->find($id);

        if (empty($mataKuliah)) {
            Flash::error('Mata Kuliah not found');

            return redirect(route('mataKuliahs.index'));
        }

        return view('mata_kuliahs.show')->with('mataKuliah', $mataKuliah);
    }

    /**
     * Show the form for editing the specified MataKuliah.
     */
    public function edit($id)
    {
        $mataKuliah = $this->mataKuliahRepository->find($id);

        if (empty($mataKuliah)) {
            Flash::error('Mata Kuliah not found');

            return redirect(route('mataKuliahs.index'));
        }

        return view('mata_kuliahs.edit')->with('mataKuliah', $mataKuliah);
    }

    /**
     * Update the specified MataKuliah in storage.
     */
    public function update($id, UpdateMataKuliahRequest $request)
    {
        $mataKuliah = $this->mataKuliahRepository->find($id);

        if (empty($mataKuliah)) {
            Flash::error('Mata Kuliah not found');

            return redirect(route('mataKuliahs.index'));
        }

        $mataKuliah = $this->mataKuliahRepository->update($request->all(), $id);

        Flash::success('Mata Kuliah updated successfully.');

        return redirect(route('mataKuliahs.index'));
    }

    /**
     * Remove the specified MataKuliah from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mataKuliah = $this->mataKuliahRepository->find($id);

        if (empty($mataKuliah)) {
            Flash::error('Mata Kuliah not found');

            return redirect(route('mataKuliahs.index'));
        }

        $this->mataKuliahRepository->delete($id);

        Flash::success('Mata Kuliah deleted successfully.');

        return redirect(route('mataKuliahs.index'));
    }
}
