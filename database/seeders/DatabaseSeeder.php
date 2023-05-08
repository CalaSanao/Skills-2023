<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Architect;
use App\Models\City;
use App\Models\Comments;
use App\Models\Image;
use App\Models\InterestPoint;
use App\Models\Island;
use App\Models\Keyword;
use App\Models\Modalities;
use App\Models\Services;
use App\Models\Space;
use App\Models\SpaceModality;
use App\Models\SpaceService;
use App\Models\Types;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Keyword::factory(10)->create();

        Types::factory(10)->create();
        Island::factory(3)->create();
        City::factory(10)->create();
        Modalities::factory(10)->create();
        Services::factory(10)->create();
        Space::factory(10)->create();
        Architect::factory(10)->create();
        User::factory(10)->create();
        Image::factory(10)->create();
        Comments::factory(10)->create();
        InterestPoint::factory(10)->create();
        Visit::factory(10)->create();
        SpaceService::factory(10)->create();
        SpaceModality::factory(10)->create();

    }
}
