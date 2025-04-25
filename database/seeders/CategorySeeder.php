<?php

namespace Database\Seeders;

use File;
use Faker\Factory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();

        $sourcePath=public_path('assets/frontend/img');
        $destinationPath=public_path('uploads/categories');

        File::cleanDirectory($destinationPath);
        File::copyDirectory($sourcePath,$destinationPath);

        foreach(range(1,30) as $index){
            $random_user_id = User::inRandomOrder()->first()->id;

            $photos = File::files($destinationPath);
            $random_photo = $photos[array_rand($photos)];
            $photo_name=$random_photo->getFilename();
            Category::create([
                'name'=>$faker->realText($maxNbChars=20,$indexSize=2),
                'image'=>$photo_name,
                'user_id' =>$random_user_id,
                'created_at' => $faker->dateTime()
            ]);
        }
    }
}
