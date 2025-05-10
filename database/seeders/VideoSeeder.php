<?php

namespace Database\Seeders;

use File;
use Faker\Factory;
use App\Models\User;
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

        $video_sourece_path = public_path('assets/frontend/video');
        $video_destination_path = public_path('uploads/videos');
       
        File::cleanDirectory($video_destination_path);
        File::copyDirectory($video_sourece_path,$video_destination_path);

        // $file_count=count(File::files($video_destination_path));

        $thumbnail_source_path = public_path('assets/frontend/img');
        $thumbnail_destination_path = public_path('uploads/videos/thumbnails');

        File::cleanDirectory($thumbnail_destination_path);
        File::copyDirectory($thumbnail_source_path,$thumbnail_destination_path);

        foreach(range(1,300) as $index){
            $videos=File::files($video_destination_path);
            $random_videos=$videos[array_rand($videos)];
            $video_name= $random_videos->getFileName();

            $thumbnails=File::files($thumbnail_destination_path);
            $random_thumbnails=$thumbnails[array_rand($thumbnails)];
            $thumbnail_name = $random_thumbnails->getFileName();

            $random_category_id = Category::inRandomOrder()->first()->id;
            $random_user_id = User::inRandomOrder()->first()->id;

            Video::create([
                'title'=> $faker->sentence(4),
                'category_id' => $random_category_id,
                'user_id'=>$random_user_id,
                'video'=>$video_name,
                'thumbnail' => $thumbnail_name,
                'views' =>rand(1,300000),
                'created_at'=>$faker->dateTime()
            ]);
        }
    }
}
