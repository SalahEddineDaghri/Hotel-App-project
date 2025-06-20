<?php

namespace Database\Seeders;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Salaheddine', 'address' => 'big', 'jk' => 'L',
            'job' => 'idle', 'birthdate' => Carbon::yesterday()->isoFormat('Y-M-D')
        ]);
        Customer::create([
            'name' => 'customer', 'address' => 'big', 'jk' => 'L',
            'job' => 'idle', 'birthdate' => Carbon::yesterday()->isoFormat('Y-M-D')
        ]);
    }
}
