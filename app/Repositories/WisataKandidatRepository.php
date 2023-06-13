<?php

namespace App\Repositories;

use App\Models\WisataKandidat;
use App\Repositories\BaseRepository;

class WisataKandidatRepository extends BaseRepository
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
        return WisataKandidat::class;
    }
}
