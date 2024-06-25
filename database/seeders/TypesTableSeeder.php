<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Front-end', 'Back-end', 'Markup'];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->technology = $type;
            $newType->save();
        }
    }
}
