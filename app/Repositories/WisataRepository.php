<?php

namespace App\Repositories;

use App\Models\Wisata;
use App\Repositories\BaseRepository;

class WisataRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Wisata::class;
    }
}
