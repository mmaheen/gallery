<?php

namespace Database\Seeders;

use File;
use Faker\Factory;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        $randomUserId = User::inRandomOrder()->first()->id;

        $sourcePath = public_path('assets/frontend/img');
        $destinationPath = public_path('uploads/photos');

        File::cleanDirectory($destinationPath); //delete all previous files
        File::copyDirectory($sourcePath, $destinationPath);

        $file_count = count(File::files($destinationPath));

        foreach(range(1,$file_count) as $index){
            $photos = File::files($destinationPath); //select all files
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFilename();

            Photo::create(
                [
                    'photo'=>$photo_name,
                    'user_id'=> $randomUserId,
                    'title'=>$faker->sentence(5),
                    'views'=>rand(1,100000),
                ]
            );
        }
    }
}
