<?php

namespace App\Repositories;

use App\Models\HotelKandidat;
use App\Repositories\BaseRepository;

class HotelKandidatRepository extends BaseRepository
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
        return HotelKandidat::class;
    }
}
