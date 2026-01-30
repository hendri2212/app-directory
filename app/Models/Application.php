<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'tech_stack' => 'array',
    ];

    public function features()
    {
        return $this->hasMany(AppFeature::class);
    }
}
