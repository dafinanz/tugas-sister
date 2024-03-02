<?php

namespace App\Repositories;

use App\Models\Khs;
use App\Repositories\BaseRepository;

class KhsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'kode',
        'nilai'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Khs::class;
    }
}
