<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    public $table = 'wisata';

    public $fillable = [
        'nama'
    ];

    protected $casts = [
        'nama' => 'string'
    ];

    public static array $rules = [
        'nama' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function hotels(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Hotel::class, 'id_wisata');
    }

    public function wisataData(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\WisataDatum::class, 'id_wisata');
    }

    public function wisataKandidats(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\WisataKandidat::class, 'id_wisata');
    }
}
