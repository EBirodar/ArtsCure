<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_uz'
    ];

    public function artists()
    {
        return $this->morphedByMany(Artist::class, 'toolable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'toolable');
    }
}
