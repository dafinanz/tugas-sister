<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    public $table = 'khs';

    protected $primaryKey = 'nim,kode';

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
        'created_at' => 'required',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function nim(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Mahasiswa::class, 'nim');
    }

    public function kode(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\MataKuliah::class, 'kode');
    }
}
