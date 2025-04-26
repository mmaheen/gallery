<?php

namespace Database\Seeders;

use File;
use Faker\Factory;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();

        $sourece_path = public_path('assets/frontend/video');
        $destination_path = public_path('uploads/videos');
       
        File::cleanDirectory($destination_path);
        File::copyDirectory($sourece_path,$destination_path);

        $file_count=count(File::files($destination_path));

        foreach(range(1,$file_count*10) as $index){
            $videos=File::files($destination_path);
            $random_videos=$videos[array_rand($videos)];
            $video_name= $random_videos->getFileName();

            $random_category_id = Category::inRandomOrder()->first()->id;

            Video::create([
                'title'=> $faker->sentence(4),
                'category_id' => $random_category_id,
                'video'=>$video_name,
                'views' =>rand(1,300000),
                'created_at'=>$faker->dateTime()
            ]);
        }
    }
}
