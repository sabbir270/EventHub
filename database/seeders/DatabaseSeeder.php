<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //\App\Models\Event::factory(10)->create();
        $user=User::factory()->create([
            'name'=>'johnwick',
             'email'=>'johnwick@gmail.com'
        ]);
        Event::factory(6)->create([
            'user_id'=>$user->id
         ]);
    }
}
