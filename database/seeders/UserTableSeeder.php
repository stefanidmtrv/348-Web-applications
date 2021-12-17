<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $u1->name = "Stefani";
        $u1->email = "dimitrovastefani00@gmail.com";
        $u1->password = "fdsgsdsg";
        $u1->save();

    
        $users = User::factory()->count(15)->create();
        
    }
}
