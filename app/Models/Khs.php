<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Khs extends Model
{
    public $table = 'khs';

    protected $primaryKey = ['nim','kode'];
    public $incrementing = false;

    public $fillable = [
        'nim',
        'kode',
        'nilai'
    ];

    protected $casts = [
        'nim' => 'string',
        'kode' => 'string'
    ];

    public static array $rules = [
        'kode' => 'required|string|max:20',
        'nilai' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


    public function nimMHS(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Mahasiswa::class, 'nim');
    }

    public function kodeMHS(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\MataKuliah::class, 'kode');
    }
}
