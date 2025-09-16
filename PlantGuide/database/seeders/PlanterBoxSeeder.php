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
        $spinach = Plant::where('name', 'Spinach')->firstOrFail();
        $onion = Plant::where('name', 'Onion')->firstOrFail();
        $garlic = Plant::where('name', 'Garlic')->firstOrFail();
        $strawberry = Plant::where('name', 'Strawberry')->firstOrFail();

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

        $anablancaStrawberry = Variety::where('name', 'Anablanca')->firstOrFail()->id;
        $vibrantStrawberry = Variety::where('name', 'Vibrant')->firstOrFail()->id;
        $allegroStrawberry = Variety::where('name', 'Allegro')->firstOrFail()->id;
        $flamencoStrawberry = Variety::where('name', 'Flamenco')->firstOrFail()->id;

        foreach ($strawberryBoxIds as $i => $boxId) {
            if ($i < 9) {
                $varietyId = $anablancaStrawberry;
            } else if ($i < 11) {
                $varietyId = $allegroStrawberry;
            } else if ($i < 13) {
                $varietyId = $flamencoStrawberry;
            } else {
                $varietyId = $vibrantStrawberry;
            }

            ContainerObjectVariety::create([
                'container_object_id' => $boxId,
                'variety_id' => $varietyId,
            ]);
        }


        ContainerObjectVariety::create([
                'container_object_id' => 4,
                'variety_id' => Variety::where('name', 'Spinach Monterey F1')->firstOrFail()->id
        ]);

         ContainerObjectVariety::create([
                'container_object_id' => 5,
                'variety_id' => Variety::where('name', 'Red Onion (Red Winter)')->firstOrFail()->id
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 5,
                'variety_id' => Variety::where('name', 'White Onion (Snowball)')->firstOrFail()->id
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 5,
                'variety_id' => Variety::where('name', 'Brown Onion (Golden Shakespeare)')->firstOrFail()->id
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  Variety::where('name', 'Elephant Garlic')->firstOrFail()->id,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  Variety::where('name', 'Carcassonne Wight (Hardneck)')->firstOrFail()->id,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  Variety::where('name', 'Caulk Wight (Hardneck)')->firstOrFail()->id,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  Variety::where('name', 'Kingsland Wight (Hardneck)')->firstOrFail()->id,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  Variety::where('name', 'Solent Wight (Softneck)')->firstOrFail()->id,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  Variety::where('name', 'Mersley Wight (Softneck)')->firstOrFail()->id,
        ]);

        ContainerObjectVariety::create([
                'container_object_id' => 6,
                'variety_id' =>  Variety::where('name', 'Rhapsody Wight (Softneck)')->firstOrFail()->id,
        ]);

        // Example: Assign varieties to container objects (update IDs as needed)
        // ContainerObject::find(4)->varieties()->attach(13);
        // ContainerObject::find(6)->varieties()->attach([16,17,18,19,20,21,22]);
        // ContainerObject::find(5)->varieties()->attach([1,2,3]);
    }
}
