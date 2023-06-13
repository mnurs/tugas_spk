<?php

namespace App\Repositories;

use App\Models\WisataData;
use App\Repositories\BaseRepository;

class WisataDataRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id_wisata',
        'fasilitas',
        'aksesibilitas',
        'biaya',
        'aktifitas',
        'kunjungan'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return WisataData::class;
    }
}
