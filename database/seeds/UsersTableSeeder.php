<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::firstOrCreate([
           'email' => 'kguardado@cfa.harvard.edu',
           'name' => 'TestUser1',
           'password' => \Hash::make('helloworld'),
       ]);

       $user = \App\User::firstOrCreate([
           'email' => 'kmg023@g.harvard.edu',
           'name' => 'TestUser2',
           'password' => \Hash::make('helloworld'),
       ]);
    }
}
