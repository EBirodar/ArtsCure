<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function types()
    {
        return $this->hasMany(Type::class);
    }
    public function artist()
    {
        return $this->hasMany(Artist::class);
    }

    public function imageable()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
