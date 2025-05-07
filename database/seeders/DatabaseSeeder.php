<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'news@admin.com',
            'password'=>'password'
        ]);
        DB::table('news_categories')->insert([
            [
                'name' => 'Business',
                'status' => 'Active',
                'url'=>'business'
            ],
            [
                'name'=> 'Sports',
                'status'=>'Active',
                'url'=>'sports'
            ]
        ]);
        DB::table('types')->insert([
            [
                'id' => 1,
                'name' => 'Breaking',
                'allow_delete' => false
            ],
            [
                'id' => 2,
                'name' => 'Trending',
                'allow_delete' => false
            ],
            [
                'id' => 3,
                'name' => 'Featured',
                'allow_delete' => false
            ],
            [
                'id' => 4,
                'name' => 'Hot',
                'allow_delete' => false
            ],
        ]);

        DB::table('advertisement_types')->insert([
            ['type' => ' banner ads'],
            ['type' => 'native ads'],
        ]);
        Setting::create([
            'website_name' => 'Saccos News Portal',
        ]);
    }
}
