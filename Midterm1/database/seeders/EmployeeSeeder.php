<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee')->insert([
            'name' => Str::random(5),
            'surname' => Str::random(5),
            'position' => Str::random(5),
            'phone' => Str::random(5),
            'is_hired' => rand(0,1)
        ]);
    }
}
