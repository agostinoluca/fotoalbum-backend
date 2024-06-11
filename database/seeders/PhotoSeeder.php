<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Photo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $photo = new Photo();
            $photo->title = $faker->words(5, true);
            $photo->image = $faker->imageUrl(640, 480);
            $photo->description = $faker->text(500);
            $photo->evidence = $faker->boolean();
            $photo->published = $faker->boolean();
            $photo->slug = Str::of($photo->title)->slug('-');
            $photo->save();
        }
    }
}
