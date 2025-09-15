<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContainerObject;
use App\Models\Plant;
use App\Models\ContainerObjectVariety;

class PlanterBoxSeeder extends Seeder
{
    public function run(): void
    {
        // Get the plants that are created and i already know which box they are going in
        $spinach = Plant::findOrFail(11);
        $onion = Plant::findOrFail(5);
        $garlic = Plant::findOrFail(4);

        // Create the planter boxes using ContainerObject
        for ($i = 0; $i < 18; $i++) {
            if ($i == 3) {
                // Assign spinach to box 4
                ContainerObject::create([
                    'type' => 'planter_box',
                    'name' => 'Box ' . ($i + 1),
                    'location' => 'garden',
                    'status' => 'Built',
                    'plant_id' => $spinach->id,
                ]);
                continue;
            } elseif ($i == 4) {
                // Assign onion to box 6
                ContainerObject::create([
                    'type' => 'planter_box',
                    'name' => 'Box ' . ($i + 1),
                    'location' => 'garden',
                    'status' => 'Built',
                    'plant_id' => $onion->id,
                ]);
                continue;
            } elseif ($i == 5) {
                // Assign garlic to box 5
                ContainerObject::create([
                    'type' => 'planter_box',
                    'name' => 'Box ' . ($i + 1),
                    'location' => 'garden',
                    'status' => 'Built',
                    'plant_id' => $garlic->id,
                ]);
                continue;
            }
            ContainerObject::create([
                'type' => 'planter_box',
                'name' => 'Box ' . ($i + 1),
                'location' => 'garden',
            ]);
        }

        // Example: Add strawberry boxes
        for ($i = 0; $i < 12; $i++) {
            ContainerObject::create([
                'type' => 'strawberry_box',
                'name' => 'Strawberry Box ' . ($i + 1),
                'location' => 'patch',
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
