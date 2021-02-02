<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentsTableSeeder extends Seeder
{
    public function run()
    {
        Content::factory()->count(10)->create();
    }
}

