<?php

namespace App\Repositories;

use App\Models\MataKuliah;
use App\Repositories\BaseRepository;

class MataKuliahRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'kode',
        'nama',
        'sks'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return MataKuliah::class;
    }
}
