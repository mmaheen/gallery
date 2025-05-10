<?php

namespace Database\Seeders;

use File;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '1',
            'role' => 'admin',
            'photo' => 'people-4.jpg'
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => '1',
            'role' => 'guest',
            'photo' => 'people-4.jpg'
        ]);

        $faker = Factory::create();
        
        $source_path = public_path('assets/frontend/img');
        $destination_path = public_path('uploads/users');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path,$destination_path);

        $role = ["admin","guest"];

        foreach(range(1,20) as $index){
            $photos = File::files($destination_path);
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFilename();

            $random_role = $role[array_rand($role)];

            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'role' => $random_role,
                'photo'=>$photo_name,
                'created_at'=> $faker->dateTime(),
                'updated_at'=> $faker->dateTime()
            ]);
        }
    }
}
