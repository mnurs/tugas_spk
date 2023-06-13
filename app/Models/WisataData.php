<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WisataData extends Model
{
    public $table = 'wisata_data';

    public $fillable = [
        'id_wisata',
        'fasilitas',
        'aksesibilitas',
        'biaya',
        'aktifitas',
        'kunjungan'
    ];

    protected $casts = [
        'fasilitas' => 'string',
        'aksesibilitas' => 'string',
        'biaya' => 'float',
        'aktifitas' => 'string',
        'kunjungan' => 'string'
    ];

    public static array $rules = [
        'id_wisata' => 'required',
        'fasilitas' => 'nullable|string|max:65535',
        'aksesibilitas' => 'nullable|string|max:65535',
        'biaya' => 'nullable|numeric',
        'aktifitas' => 'nullable|string|max:65535',
        'kunjungan' => 'nullable|string|max:255',
        'created_at' => 'required',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function idWisata(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Wisatum::class, 'id_wisata');
    }
}
