<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'love',
            'friendship',
            'adventure',
            'beauty',
            'food',
            'city',
            'breakfast',
            'fun',
            'summer',
            'sunset',
            'travel',
            'nature',
            'fitness',
            'family',
            'party',
            'weekend',
            'vacation',
            'photography',
            'fashion',
            'art',
            'music',
            'workout',
            'selfie',
            'beach',
            'holiday',
            'mountains',
            'roadtrip',
            'pets',
            'inspiration',
            'motivation',
            'happy',
            'cute',
            'nightlife',
            'weekendvibes',
            'explore',
            'outdoors',
            'sunshine',
            'landscape',
            'friends',
            'lifestyle',
            'relax',
            'adventuretime',
            'foodie',
            'wellness',
            'fitnessjourney',
            'healthy',
            'goodvibes',
            'happiness',
            'funny',
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::of($newTag->name)->slug('-');
            $newTag->save();
        }
    }
}
