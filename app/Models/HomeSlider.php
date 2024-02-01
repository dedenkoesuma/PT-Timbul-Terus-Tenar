<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class HomeSlider extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $fillable = [
        'media',
        'name',
        'product_id',
        'category'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
