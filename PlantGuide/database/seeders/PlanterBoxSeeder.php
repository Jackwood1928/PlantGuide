<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlanterBox;
use App\Models\Plant;

class PlanterBoxSeeder extends Seeder
{
    public function run(): void
    {
        // Create some plants
        $spinach = Plant::findOrFail(11);
        $onion = Plant::findOrFail(5);
        $garlic = Plant::findOrFail(4);

        // Create 18 planter boxes (6x3 grid)
        for ($i = 0; $i < 18; $i++) {
            PlanterBox::create([
                'position' => $i,
                'plant_id' => ($i === 3 ? $spinach->id : ($i === 4 ? $onion->id : ($i === 5 ? $garlic->id : null))),
                'status' => ($i === 3 || $i === 4 || $i === 5 ? 'built' : 'unbuilt'),
            ]);
        }
    }
}
