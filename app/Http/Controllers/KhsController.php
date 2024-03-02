<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKhsRequest;
use App\Http\Requests\UpdateKhsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\KhsRepository;
use Illuminate\Http\Request;
use Flash;

class KhsController extends AppBaseController
{
    /** @var KhsRepository $khsRepository*/
    private $khsRepository;

    public function __construct(KhsRepository $khsRepo)
    {
        $this->khsRepository = $khsRepo;
    }

    /**
     * Display a listing of the Khs.
     */
    public function index(Request $request)
    {
        $khs = $this->khsRepository->paginate(10);

        return view('khs.index')
            ->with('khs', $khs);
    }

    /**
     * Show the form for creating a new Khs.
     */
    public function create()
    {
        return view('khs.create');
    }

    /**
     * Store a newly created Khs in storage.
     */
    public function store(CreateKhsRequest $request)
    {
        $input = $request->all();

        $khs = $this->khsRepository->create($input);

        Flash::success('Khs saved successfully.');

        return redirect(route('khs.index'));
    }

    /**
     * Display the specified Khs.
     */
    public function show($id)
    {
        $khs = $this->khsRepository->find($id);

        if (empty($khs)) {
            Flash::error('Khs not found');

            return redirect(route('khs.index'));
        }

        return view('khs.show')->with('khs', $khs);
    }

    /**
     * Show the form for editing the specified Khs.
     */
    public function edit($id)
    {
        $khs = $this->khsRepository->find($id);

        if (empty($khs)) {
            Flash::error('Khs not found');

            return redirect(route('khs.index'));
        }

        return view('khs.edit')->with('khs', $khs);
    }

    /**
     * Update the specified Khs in storage.
     */
    public function update($id, UpdateKhsRequest $request)
    {
        $khs = $this->khsRepository->find($id);

        if (empty($khs)) {
            Flash::error('Khs not found');

            return redirect(route('khs.index'));
        }

        $khs = $this->khsRepository->update($request->all(), $id);

        Flash::success('Khs updated successfully.');

        return redirect(route('khs.index'));
    }

    /**
     * Remove the specified Khs from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $khs = $this->khsRepository->find($id);

        if (empty($khs)) {
            Flash::error('Khs not found');

            return redirect(route('khs.index'));
        }

        $this->khsRepository->delete($id);

        Flash::success('Khs deleted successfully.');

        return redirect(route('khs.index'));
    }
}
