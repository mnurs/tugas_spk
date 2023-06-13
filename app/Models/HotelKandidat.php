<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelKandidat extends Model
{
    public $table = 'hotel_kandidat';

    public $fillable = [
        'id_hotel',
        'harga',
        'fasilitas',
        'kelas',
        'jarak'
    ];

    protected $casts = [
        'harga' => 'float',
        'fasilitas' => 'float',
        'kelas' => 'float',
        'jarak' => 'float'
    ];

    public static array $rules = [
        'id_hotel' => 'required',
        'harga' => 'required|numeric',
        'fasilitas' => 'required|numeric',
        'kelas' => 'required|numeric',
        'jarak' => 'required|numeric',
        'created_at' => 'required',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function idHotel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Hotel::class, 'id_hotel');
    }
}
