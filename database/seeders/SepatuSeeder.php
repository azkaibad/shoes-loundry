<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sepatu;

class SepatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sepatu::create([
            'sepatu_name' => 'Canvas',
        ],
        [
            'sepatu_name' => 'Kulit',
        ]
    );
        
    }
}
