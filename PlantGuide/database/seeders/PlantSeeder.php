<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlanterBox;
use App\Models\Plant;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        // Create some plants
        $tomato = Plant::create(['name' => 'Tomato']);
        $carrot = Plant::create(['name' => 'Carrot']);
        $lettuce = Plant::create(['name' => 'Lettuce']);
        $garlic = Plant::create(['name' => 'Garlic']);
        $onion = Plant::create(['name' => 'Onion']);
        $spring_onion = Plant::create(['name' => 'Spring Onion']);
        $blueberry = Plant::create(['name' => 'Blueberry']);
        $raspberry = Plant::create(['name' => 'Raspberry']);
        $tayberry = Plant::create(['name' => 'Tayberry']);
        $pepper = Plant::create(['name' => 'Pepper']);
        $spinach = Plant::create(['name' => 'Spinach']);
        $potato = Plant::create(['name' => 'Potato']);
        $strawberry = Plant::create(['name' => 'Strawberry']);
        $rubarb = Plant::create(['name' => 'Rhubarb']);
        $leek = Plant::create(['name' => 'Leek']);


        // Add varieties 

        $onion->varieties()->createMany([
            ['name' => 'Red Onion (Red Winter)', 'url' => 'https://www.thompson-morgan.com/p/onion-mixed-red-white-brown-autumn-planting/aww4059TM'],
            ['name' => 'White Onion (Snowball)', 'url' => 'https://www.thompson-morgan.com/p/onion-mixed-red-white-brown-autumn-planting/aww4059TM'],
            ['name' => 'Brown Onion (Golden Shakespeare)', 'url' => 'https://www.thompson-morgan.com/p/onion-mixed-red-white-brown-autumn-planting/aww4059TM'],
        ]);

        $blueberry->varieties()->createMany([
            ['name' => 'Duke (Vaccinium corymbosum)', 'url' => 'https://www.thompson-morgan.com/p/blueberry-duke/T71122TM'],
            ['name' => 'Pink Lemonade', 'url' => 'https://www.thompson-morgan.com/p/blueberry-pink-lemonade/KB2267TM'],

            ['name' => 'Bluecrop (Vaccinium corymbosum)', 'url' => 'https://www.thompson-morgan.com/p/blueberry-bluecrop/t57997TM'],

        ]);

        $rubarb->varieties()->createMany([
            ['name' => 'Rheum x hybridum', 'url' => 'https://www.thompson-morgan.com/p/rhubarb-glaskins-perpetual-seeds/831TM'],
        ]);

        $raspberry->varieties()->createMany([
            ['name' => 'Little Sweet Sister (Rubus idaeus)', 'url' => 'https://www.thompson-morgan.com/p/raspberry-little-sweet-sister/wkb7551'],
            ['name' => 'Heritage', 'url' => 'https://www.thompson-morgan.com/p/raspberry-autumn-duo-autumn-fruiting/wkh1090TM'],
            ['name' => 'Golden Bliss', 'url' => 'https://www.thompson-morgan.com/p/raspberry-autumn-duo-autumn-fruiting/wkh1090TM'],
        ]);

        $tayberry->varieties()->createMany([
            ['name' => 'Rubus (Tayberry Group)', 'url' => 'https://www.thompson-morgan.com/p/tayberry-growers-choice/wkh7404TM'],
        ]);

        $strawberry->varieties()->createMany([
            ['name' => 'Anablanca (Snow White)(Fragaria x ananassa)', 'url' => 'https://www.thompson-morgan.com/p/strawberry-anablanca-snow-white/KB2112TM'],
        ]);

        $spinach->varieties()->createMany([
            ['name' => 'Spinach Monterey F1', 'url' => 'https://www.kingsseeds.com/14417-Spinach-Monterey-F1'],
        ]);

        $spring_onion->varieties()->createMany([
            ['name' => 'White Lisbon', 'url' => 'https://www.kingsseeds.com/OV00278-Onion-White-Lisbon-ORGANIC-SEED-PPP-A-Allium-BGB40557-C-lot-see-pkt-DGB'],
        ]);

        $carrot->varieties()->createMany([
            ['name' => 'Early Nantes (Daucus carota)', 'url' => 'https://www.kingsseeds.com/OV107-CARROT-Daucus-carota-Early-Nantes-ORGANIC-SEED'],
        ]);

        $garlic->varieties()->createMany([
            ['name' => 'Elephant Garlic', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Carcassonne Wight (Hardneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Caulk Wight (Hardneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Kingsland Wight (Hardneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Solent Wight (Softneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Mersley Wight (Softneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Rhapsody Wight (Softneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
        ]);

    }
}
