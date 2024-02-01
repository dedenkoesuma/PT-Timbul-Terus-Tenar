<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $title = $this->faker->sentence;
        $category = $this->faker->word;
        $brand = $this->faker->word;
        $type = $this->faker->word;
        $series = $this->faker->word;
        $body = $this->faker->paragraph;

        // Simpan gambar sementara
        $imagePath = 'public/post-media/' . uniqid() . '.jpg';
        $tempImage = Image::make($this->faker->imageUrl(270, 352));
        $tempImage->save(storage_path('app/' . $imagePath));

        return [
            'image' => $imagePath,
            'title' => $title,
            'category' => $category,
            'body' => $body,
            'brand' => $brand,
            'type' => $type,
            'series' => $series,
        ];
    }
}
