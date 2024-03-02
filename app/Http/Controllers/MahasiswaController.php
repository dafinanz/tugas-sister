<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MahasiswaRepository;
use Illuminate\Http\Request;
use Flash;

class MahasiswaController extends AppBaseController
{
    /** @var MahasiswaRepository $mahasiswaRepository*/
    private $mahasiswaRepository;

    public function __construct(MahasiswaRepository $mahasiswaRepo)
    {
        $this->mahasiswaRepository = $mahasiswaRepo;
    }

    /**
     * Display a listing of the Mahasiswa.
     */
    public function index(Request $request)
    {
        $mahasiswas = $this->mahasiswaRepository->paginate(10);

        return view('mahasiswas.index')
            ->with('mahasiswas', $mahasiswas);
    }

    /**
     * Show the form for creating a new Mahasiswa.
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created Mahasiswa in storage.
     */
    public function store(CreateMahasiswaRequest $request)
    {
        $input = $request->all();

        $mahasiswa = $this->mahasiswaRepository->create($input);

        Flash::success('Mahasiswa saved successfully.');

        return redirect(route('mahasiswas.index'));
    }

    /**
     * Display the specified Mahasiswa.
     */
    public function show($id)
    {
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            Flash::error('Mahasiswa not found');

            return redirect(route('mahasiswas.index'));
        }

        return view('mahasiswas.show')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified Mahasiswa.
     */
    public function edit($id)
    {
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            Flash::error('Mahasiswa not found');

            return redirect(route('mahasiswas.index'));
        }

        return view('mahasiswas.edit')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified Mahasiswa in storage.
     */
    public function update($id, UpdateMahasiswaRequest $request)
    {
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            Flash::error('Mahasiswa not found');

            return redirect(route('mahasiswas.index'));
        }

        $mahasiswa = $this->mahasiswaRepository->update($request->all(), $id);

        Flash::success('Mahasiswa updated successfully.');

        return redirect(route('mahasiswas.index'));
    }

    /**
     * Remove the specified Mahasiswa from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            Flash::error('Mahasiswa not found');

            return redirect(route('mahasiswas.index'));
        }

        $this->mahasiswaRepository->delete($id);

        Flash::success('Mahasiswa deleted successfully.');

        return redirect(route('mahasiswas.index'));
    }
}
