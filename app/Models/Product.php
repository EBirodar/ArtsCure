<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function types()
    {
        return $this->belongsTo(Type::class);
    }

    public function artists()
    {
        return $this->belongsTo(Artist::class);
    }

    public function toolable()
    {
        return $this->morphMany(Toolable::class, 'toolable');
    }
    public function imageable()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
