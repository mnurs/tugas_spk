<?php

namespace App\Repositories;

use App\Models\HotelData;
use App\Repositories\BaseRepository;

class HotelDataRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id_hotel',
        'harga',
        'fasilitas',
        'kelas',
        'jarak'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return HotelData::class;
    }
}
