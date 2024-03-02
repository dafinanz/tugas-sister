<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMahasiswaAPIRequest;
use App\Http\Requests\API\UpdateMahasiswaAPIRequest;
use App\Models\Mahasiswa;
use App\Repositories\MahasiswaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class MahasiswaAPIController
 */
class MahasiswaAPIController extends AppBaseController
{
    private MahasiswaRepository $mahasiswaRepository;

    public function __construct(MahasiswaRepository $mahasiswaRepo)
    {
        $this->mahasiswaRepository = $mahasiswaRepo;
    }

    /**
     * Display a listing of the Mahasiswas.
     * GET|HEAD /mahasiswas
     */
    public function index(Request $request): JsonResponse
    {
        $mahasiswas = $this->mahasiswaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mahasiswas->toArray(), 'Mahasiswas retrieved successfully');
    }

    /**
     * Store a newly created Mahasiswa in storage.
     * POST /mahasiswas
     */
    public function store(CreateMahasiswaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $mahasiswa = $this->mahasiswaRepository->create($input);

        return $this->sendResponse($mahasiswa->toArray(), 'Mahasiswa saved successfully');
    }

    /**
     * Display the specified Mahasiswa.
     * GET|HEAD /mahasiswas/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            return $this->sendError('Mahasiswa not found');
        }

        return $this->sendResponse($mahasiswa->toArray(), 'Mahasiswa retrieved successfully');
    }

    /**
     * Update the specified Mahasiswa in storage.
     * PUT/PATCH /mahasiswas/{id}
     */
    public function update($id, UpdateMahasiswaAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            return $this->sendError('Mahasiswa not found');
        }

        $mahasiswa = $this->mahasiswaRepository->update($input, $id);

        return $this->sendResponse($mahasiswa->toArray(), 'Mahasiswa updated successfully');
    }

    /**
     * Remove the specified Mahasiswa from storage.
     * DELETE /mahasiswas/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            return $this->sendError('Mahasiswa not found');
        }

        $mahasiswa->delete();

        return $this->sendSuccess('Mahasiswa deleted successfully');
    }
}
