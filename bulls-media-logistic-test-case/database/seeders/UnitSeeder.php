<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $measurementUnits = [
            ['name' => 'kg', 'type' => 'weight'],
            ['name' => 'g', 'type' => 'weight'],
            ['name' => 'lb', 'type' => 'weight'],
            ['name' => 'oz', 'type' => 'weight'],
            ['name' => 'ton', 'type' => 'weight'],
            ['name' => 'm', 'type' => 'length'],
            ['name' => 'cm', 'type' => 'length'],
            ['name' => 'mm', 'type' => 'length'],
            ['name' => 'in', 'type' => 'length'],
            ['name' => 'ft', 'type' => 'length'],
            ['name' => 'yd', 'type' => 'length']
        ];
        foreach ($measurementUnits as $unit) {
            Unit::create($unit);
        }
    }
}
