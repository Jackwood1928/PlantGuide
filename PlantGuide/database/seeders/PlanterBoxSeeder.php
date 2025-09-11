<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlanterBox;
use App\Models\Plant;
use App\Models\PlanterBoxVariety;

class PlanterBoxSeeder extends Seeder
{
    public function run(): void
    {
        // Get the plants that are created and i already know which box they are going in
        $spinach = Plant::findOrFail(11);
        $onion = Plant::findOrFail(5);
        $garlic = Plant::findOrFail(4);

        // Create the planter boxes 6 by 3, so 18 boxes in total
        for ($i = 0; $i < 18; $i++) {
            PlanterBox::create([
                'position' => $i,
                'plant_id' => ($i === 3 ? $spinach->id : ($i === 4 ? $onion->id : ($i === 5 ? $garlic->id : null))), //hard coding the boxes that are done
                'status' => ($i === 3 || $i === 4 || $i === 5 ? 'built' : 'unbuilt'),
            ]);
        }

        PlanterBoxVariety::create([
                'planter_box_id' => 4,
                'variety_id' => 13
        ]);

         PlanterBoxVariety::create([
                'planter_box_id' => 6,
                'variety_id' =>  16,
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 6,
                'variety_id' =>  17,
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 6,
                'variety_id' =>  18,
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 6,
                'variety_id' =>  19,
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 6,
                'variety_id' =>  20,    
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 6,
                'variety_id' =>  21,    
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 6,
                'variety_id' =>  22,    
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 5,
                'variety_id' =>  1,
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 5,
                'variety_id' =>  2,
        ]);

        PlanterBoxVariety::create([
                'planter_box_id' => 5,
                'variety_id' =>  3,
        ]);
    }
}
