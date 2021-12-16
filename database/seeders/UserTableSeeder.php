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
        $u1 = new User;
        $u1->profile_id = 1;
        $u1->name = "Alex";
        $u1->email = "abcd@gmail.com";
        $u1->password = "smfhwskmald";
        $u1->assignRole('admin');
        $u1->save();

        $users = User::factory()->count(15)->create();
    }
}
