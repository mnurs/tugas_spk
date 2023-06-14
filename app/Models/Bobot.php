<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    public $table = 'bobot';

    public $fillable = [
        'nilai',
        'attribut',
        'is_benefit',
        'kategori'
    ];

    protected $casts = [
        'nilai' => 'float',
        'attribut' => 'string',
        'kategori' => 'string'
    ];

    public static array $rules = [
        'nilai' => 'required|numeric',
        'attribut' => 'required|string|max:255',
        'is_benefit' => 'nullable',
        'kategori' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
