<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelData extends Model
{
    public $table = 'hotel_data';

    public $fillable = [
        'id_hotel',
        'harga',
        'fasilitas',
        'kelas',
        'jarak'
    ];

    protected $casts = [
        'harga' => 'float',
        'fasilitas' => 'string',
        'kelas' => 'float',
        'jarak' => 'float'
    ];

    public static array $rules = [
        'id_hotel' => 'required',
        'harga' => 'nullable|numeric',
        'fasilitas' => 'nullable|string|max:65535',
        'kelas' => 'nullable|numeric',
        'jarak' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function idHotel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Hotel::class, 'id_hotel');
    }
}
