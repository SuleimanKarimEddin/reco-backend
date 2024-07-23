<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AppInformation;
use App\Models\AppInformationTranslation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthSeed::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        AppInformation::updateOrCreate([
            'id'=>1
        ] , []);
        AppInformation::updateOrCreate([
            'id'=>2
        ] , []);
        AppInformationTranslation::updateOrCreate([
            'app_information_id'=>1,
            "locale"=>1
        ] , [
            'title'=>'about_us',
            'content'=>'content',
        ]);
        AppInformationTranslation::updateOrCreate([
            'app_information_id'=>1,
            "locale"=>2
        ] , [
            'title'=>'about_us',
            'content'=>'content'
        ]);
        AppInformationTranslation::updateOrCreate([
            'app_information_id'=>2,
            "locale"=>1
        ] , [
            'title'=>'privacy',
            'content'=>'content'
        ]);
        AppInformationTranslation::updateOrCreate([
            'app_information_id'=>2,
            "locale"=>2
        ] , [
            'title'=>'privacy',
            'content'=>'content'
        ]);
    }
}
