<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $table = 'mahasiswa';

    protected $primaryKey = 'nim';

    public $fillable = [
        'nim',
        'nama',
        'alamat'
    ];

    protected $casts = [
        'nim' => 'string',
        'nama' => 'string',
        'alamat' => 'string'
    ];

    public static array $rules = [
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'created_at' => 'required',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function kh(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Kh::class);
    }
}
