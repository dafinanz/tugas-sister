<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKhsAPIRequest;
use App\Http\Requests\API\UpdateKhsAPIRequest;
use App\Models\Khs;
use App\Repositories\KhsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class KhsAPIController
 */
class KhsAPIController extends AppBaseController
{
    private KhsRepository $khsRepository;

    public function __construct(KhsRepository $khsRepo)
    {
        $this->khsRepository = $khsRepo;
    }

    /**
     * Display a listing of the Khs.
     * GET|HEAD /khs
     */
    public function index(Request $request): JsonResponse
    {
        $khs = $this->khsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($khs->toArray(), 'Khs retrieved successfully');
    }

    /**
     * Store a newly created Khs in storage.
     * POST /khs
     */
    public function store(CreateKhsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $khs = $this->khsRepository->create($input);

        return $this->sendResponse($khs->toArray(), 'Khs saved successfully');
    }

    /**
     * Display the specified Khs.
     * GET|HEAD /khs/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Khs $khs */
        $khs = $this->khsRepository->find($id);

        if (empty($khs)) {
            return $this->sendError('Khs not found');
        }

        return $this->sendResponse($khs->toArray(), 'Khs retrieved successfully');
    }

    /**
     * Update the specified Khs in storage.
     * PUT/PATCH /khs/{id}
     */
    public function update($id, UpdateKhsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Khs $khs */
        $khs = $this->khsRepository->find($id);

        if (empty($khs)) {
            return $this->sendError('Khs not found');
        }

        $khs = $this->khsRepository->update($input, $id);

        return $this->sendResponse($khs->toArray(), 'Khs updated successfully');
    }

    /**
     * Remove the specified Khs from storage.
     * DELETE /khs/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Khs $khs */
        $khs = $this->khsRepository->find($id);

        if (empty($khs)) {
            return $this->sendError('Khs not found');
        }

        $khs->delete();

        return $this->sendSuccess('Khs deleted successfully');
    }
}
