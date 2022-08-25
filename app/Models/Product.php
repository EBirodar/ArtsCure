<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_uz',
        'certificate',
        'frame',
        'size',
        'description_uz',
        'year',
        'city',
        'unique',
        'signature',
        'price',
        'status',
        'views'
    ];


    public function types()
    {
        return $this->belongsTo(Type::class);
    }

    public function artists()
    {
        return $this->belongsTo(Artist::class);
    }

    public function tools()
    {
        return $this->morphToMany(Tool::class, 'toolable');
    }
    public function imageable()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
}
