<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WisataKandidat extends Model
{
    public $table = 'wisata_kandidat';

    public $fillable = [
        'id_wisata',
        'fasilitas',
        'aksesibilitas',
        'biaya',
        'aktifitas',
        'kunjungan'
    ];

    protected $casts = [
        'fasilitas' => 'float',
        'aksesibilitas' => 'float',
        'biaya' => 'float',
        'aktifitas' => 'float',
        'kunjungan' => 'float'
    ];

    public static array $rules = [
        'id_wisata' => 'required',
        'fasilitas' => 'required|numeric',
        'aksesibilitas' => 'required|numeric',
        'biaya' => 'required|numeric',
        'aktifitas' => 'required|numeric',
        'kunjungan' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function idWisata(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Wisata::class, 'id_wisata');
    }
}
