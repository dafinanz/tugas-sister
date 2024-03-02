<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMataKuliahAPIRequest;
use App\Http\Requests\API\UpdateMataKuliahAPIRequest;
use App\Models\MataKuliah;
use App\Repositories\MataKuliahRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class MataKuliahAPIController
 */
class MataKuliahAPIController extends AppBaseController
{
    private MataKuliahRepository $mataKuliahRepository;

    public function __construct(MataKuliahRepository $mataKuliahRepo)
    {
        $this->mataKuliahRepository = $mataKuliahRepo;
    }

    /**
     * Display a listing of the MataKuliahs.
     * GET|HEAD /mata-kuliahs
     */
    public function index(Request $request): JsonResponse
    {
        $mataKuliahs = $this->mataKuliahRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mataKuliahs->toArray(), 'Mata Kuliahs retrieved successfully');
    }

    /**
     * Store a newly created MataKuliah in storage.
     * POST /mata-kuliahs
     */
    public function store(CreateMataKuliahAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $mataKuliah = $this->mataKuliahRepository->create($input);

        return $this->sendResponse($mataKuliah->toArray(), 'Mata Kuliah saved successfully');
    }

    /**
     * Display the specified MataKuliah.
     * GET|HEAD /mata-kuliahs/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var MataKuliah $mataKuliah */
        $mataKuliah = $this->mataKuliahRepository->find($id);

        if (empty($mataKuliah)) {
            return $this->sendError('Mata Kuliah not found');
        }

        return $this->sendResponse($mataKuliah->toArray(), 'Mata Kuliah retrieved successfully');
    }

    /**
     * Update the specified MataKuliah in storage.
     * PUT/PATCH /mata-kuliahs/{id}
     */
    public function update($id, UpdateMataKuliahAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var MataKuliah $mataKuliah */
        $mataKuliah = $this->mataKuliahRepository->find($id);

        if (empty($mataKuliah)) {
            return $this->sendError('Mata Kuliah not found');
        }

        $mataKuliah = $this->mataKuliahRepository->update($input, $id);

        return $this->sendResponse($mataKuliah->toArray(), 'MataKuliah updated successfully');
    }

    /**
     * Remove the specified MataKuliah from storage.
     * DELETE /mata-kuliahs/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var MataKuliah $mataKuliah */
        $mataKuliah = $this->mataKuliahRepository->find($id);

        if (empty($mataKuliah)) {
            return $this->sendError('Mata Kuliah not found');
        }

        $mataKuliah->delete();

        return $this->sendSuccess('Mata Kuliah deleted successfully');
    }
}
