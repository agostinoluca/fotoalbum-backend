<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Portrait',
            'Panorama',
            'Close-Up',
            'Landscape',
            'Nature',
            'Architecture',
            'Night',
            'Macro',
            'Sports',
            'Candid',
            'Travel',
            'Urban',
            'Astrophotography',
            'Events',
            'Wedding',
            'Fashion',
            'Still Life',
            'Underwater',
            'Animals',
            'Street Photography',
            'Selfie'
        ];

        foreach ($categories as $cat) {
            $category = new Category();
            $category->name = $cat;
            $category->slug = Str::of($cat)->slug('-');
            $category->save();
        }
    }
}
