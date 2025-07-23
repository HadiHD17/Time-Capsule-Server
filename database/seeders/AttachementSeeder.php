<?php

namespace Database\Seeders;

use App\Models\Attachement;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attachement::factory(10)->create();
    }
}
