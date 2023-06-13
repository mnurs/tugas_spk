<?php

namespace App\Repositories;

use App\Models\Hotel;
use App\Repositories\BaseRepository;

class HotelRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id_wisata',
        'nama'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Hotel::class;
    }
}
