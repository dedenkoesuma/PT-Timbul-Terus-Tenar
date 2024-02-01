<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, Sluggable, Filterable;

    protected $guarded = ['id'];

    protected $fillable = [
        'image',
        'title',
        'category',
        'body',
        'brand',
        'type',
        'series',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' 
            ]
        ];
    }
}
