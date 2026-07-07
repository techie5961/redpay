<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
        DB::table('admins')->updateOrInsert([
            'tag' => 'master'
        ],[
            'tag' => 'master',
            'password' => Hash::make('Blaady05'),
            'updated' => carbon::now(),
            'date' => Carbon::now()
        ]);
    }
}
