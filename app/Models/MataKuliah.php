<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    public $table = 'mata_kuliah';

    protected $primaryKey = 'kode';

    public $fillable = [
        'kode',
        'nama',
        'sks'
    ];

    protected $casts = [
        'kode' => 'string',
        'nama' => 'string'
    ];

    public static array $rules = [
        'nama' => 'required|string|max:255',
        'sks' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function khs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Kh::class, 'kode');
    }
}
