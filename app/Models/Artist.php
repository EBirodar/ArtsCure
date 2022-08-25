<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    public $toolList;
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

    public function tools()
    {
        return $this->morphToMany(Tool::class, 'toolable');
    }
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
}
