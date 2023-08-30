<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run( Faker $faker): void
    {
        $types = [
            'Project scope', 'Timeframe', 'Organisation', 'Cost', 'Communication', 'Task assignation', 'Quality of results'
        ];

        foreach ($types as $type) {
            $newTypes = new Type();
            $newTypes->name = $type;
            $newTypes->slug = Str::of($type)->slug('-');
            $newTypes->color = $faker->hexColor();
            $newTypes->save();
        }


    }
}
