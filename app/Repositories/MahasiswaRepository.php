<?php

namespace App\Repositories;

use App\Models\Mahasiswa;
use App\Repositories\BaseRepository;

class MahasiswaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nim',
        'nama',
        'alamat'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Mahasiswa::class;
    } 
}
