<?php

namespace App\Repositories;

use App\Models\Bobot;
use App\Repositories\BaseRepository;

class BobotRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nilai',
        'attribut',
        'is_benefit',
        'kategori'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Bobot::class;
    }
}
