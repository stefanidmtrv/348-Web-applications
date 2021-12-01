<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;


class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p1 = new Profile;
        $p1->name = "skdsd";
        $p1->save();

        $users = Profile::factory()->count(10)->create();

    }
}
