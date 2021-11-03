<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $u1 = new User;
        $u1->name = "Alex";
        $u1->email = "abcd@gmail.com";
        $u1->password = "smfhwskmald";
        $u1->save();

        $users = User::factory()->count(10)->create();
    }
}
