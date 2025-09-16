<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContainerObject;
use App\Models\Plant;
use App\Models\ContainerObjectVariety;
use App\Models\Variety;

class PlanterBoxSeeder extends Seeder
{
    public function run(): void
    {
        // Get the plants that are created and i already know which box they are going in
        $spinach = Plant::findOrFail(11);
        $onion = Plant::findOrFail(5);
        $garlic = Plant::findOrFail(4);
        $strawberry = Plant::findOrFail(13);

        // Create the planter boxes using ContainerObject
        for ($i = 0; $i < 18; $i++) {
            if ($i == 3) {
                // Assign spinach to box 4
                ContainerObject::create([
                    'type' => 'planter_box',
                    'name' => 'Box ' . ($i + 1),
                    'location' => 'Vegetable Patch',
                    'status' => 'Built',
                    'plant_id' => $spinach->id,
                ]);
                continue;
            } elseif ($i == 4) {
                // Assign onion to box 6
                ContainerObject::create([
                    'type' => 'planter_box',
                    'name' => 'Box ' . ($i + 1),
                    'location' => 'Vegetable Patch',
                    'status' => 'Built',
                    'plant_id' => $onion->id,
                ]);
                continue;
            } elseif ($i == 5) {
                // Assign garlic to box 5
                ContainerObject::create([
                    'type' => 'planter_box',
                    'name' => 'Box ' . ($i + 1),
                    'location' => 'Vegetable Patch',
                    'status' => 'Built',
                    'plant_id' => $garlic->id,
                ]);
                continue;
            }
            ContainerObject::create([
                'type' => 'planter_box',
                'name' => 'Box ' . ($i + 1),
                'location' => 'Vegetable Patch',
            ]);
        }

        // Add 12 strawberry boxes, then assign varieties via pivot table
        $strawberryBoxIds = [];
        for ($i = 0; $i < 15; $i++) {
            $box = ContainerObject::create([
                'type' => 'strawberry_box',
                'name' => 'Strawberry Box ' . ($i + 1),
                'location' => 'Side of Greenhouse',
                'plant_id' => $strawberry->id,
                'status' => 'cardboard',
            ]);
            $strawberryBoxIds[] = $box->id;
        }

        // Assign varieties for strawberry boxes: 9 anablanca, 2 of each other variety
        $anablancaStrawberry = Variety::findOrFail(12);
        $vibrantStrawberry = Variety::findOrFail(13);
        $allegroStrawberry = Variety::findOrFail(14); 
        $flamencoStrawberry = Variety::findOrFail(15); 
       

        foreach ($strawberryBoxIds as $i => $boxId) {
            if ($i < 9) {
                $varietyId = $anablancaStrawberry->id;
            } else if ($i < 11) {
                $varietyId = $allegroStrawberry->id;
            } else if ($i < 13) {
                $varietyId = $flamencoStrawberry->id;
            } else {
                $varietyId = $vibrantStrawberry->id;
            }

            ContainerObjectVariety::create([
                'container_object_id' => $boxId,
                'variety_id' => $varietyId,
            ]);
        }

        ContainerObjectVariety::create([
                'container_object_id' => 4,
                'variety_id' => 13
        ]);

         ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  16,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  17,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  18,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  19,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  20,    
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  21,    
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  22,    
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 5,
                'variety_id' =>  1,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 5,
                'variety_id' =>  2,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 5,
                'variety_id' =>  3,
        ]);
        // Example: Assign varieties to container objects (update IDs as needed)
        // ContainerObject::find(4)->varieties()->attach(13);
        // ContainerObject::find(6)->varieties()->attach([16,17,18,19,20,21,22]);
        // ContainerObject::find(5)->varieties()->attach([1,2,3]);
    }
}
