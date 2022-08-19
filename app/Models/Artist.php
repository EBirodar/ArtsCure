<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name_uz',
        'last_name_uz',
        'speciality',
        'rate',
        'category_id',
        'description_uz',
        'muzey_uz',
        'medal_uz',
        'views',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function toolable()
    {
        return $this->morphMany(Toolable::class, 'transferable');
    }
    public function imageable()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
