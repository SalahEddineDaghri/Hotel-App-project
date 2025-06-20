<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' =>  'admin',
            // 'name' => 'admin',
            'c_id' => 1,
            'telp' => 851312512,
            // 'birthdate' => Carbon::yesterday(),
            // 'jk' => '?',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('admin'),
            'is_admin' => 1
        ]);
        User::create([
            'username' =>  'Customer',
            // 'name' => 'admin',
            'c_id' => 2,
            'telp' => 851312512,
            // 'birthdate' => Carbon::yesterday(),
            // 'jk' => '?',
            'email' => 'Customer@gmail.com',
            'password'=> bcrypt('admin'),
            'is_admin' => 0
        ]);

        // User::create([
        //     'username' =>  'bukanadmin',
        //     'name' => 'bukanadmin',
        //     'address' => 'helloooo worlddddddddd',
        //     'telp' => 851312512,
        //     'birthdate' => Carbon::now(),
        //     'jk' => '?',
        //     'email' => 'bukanadmin@gmail.com',
        //     'password'=> bcrypt('bukanadmin')
        // ]);
        // User::create([
        //     'username' =>  'admin2',
        //     'name' => 'admin2',
        //     'address' => 'helloooo worlddddddddd',
        //     'telp' => 8513125212,
        //     'birthdate' => 'asdasda',
        //     'jk' => '?',
        //     'email' => 'admin2@gmail.com',
        //     'password' => bcrypt('admin2')
        // ]);
    }
}
