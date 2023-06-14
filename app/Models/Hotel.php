<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $table = 'hotel';

    public $fillable = [
        'id_wisata',
        'nama'
    ];

    protected $casts = [
        'nama' => 'string'
    ];

    public static array $rules = [
        'id_wisata' => 'required',
        'nama' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function idWisata(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Wisata::class, 'id_wisata');
    }

    public function hotelData(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\HotelDatum::class, 'id_hotel');
    }

    public function hotelKandidats(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\HotelKandidat::class, 'id_hotel');
    }
}
