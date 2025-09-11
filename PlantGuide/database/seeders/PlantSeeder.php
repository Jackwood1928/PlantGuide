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

        $garlicVarieties = $garlic->varieties()->createMany([
            ['name' => 'Elephant Garlic', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Carcassonne Wight (Hardneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Caulk Wight (Hardneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Kingsland Wight (Hardneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Solent Wight (Softneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Mersley Wight (Softneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
            ['name' => 'Rhapsody Wight (Softneck)', 'url' => 'https://www.kingsseeds.com/231628-Garlic-Offer-Mixture-of-Garlic-varieties'],
        ]);

        // Create a note for Elephant Garlic variety
        $elephantGarlic = collect($garlicVarieties)->firstWhere('name', 'Elephant Garlic');
        if ($elephantGarlic) {
            $elephantGarlic->notes()->create([
                'note' => 'Not a true member of the garlic family but closer to a leek, these bulbs have a fresh, mild and sweet flavour. Each bulb is approximately 10-15cm across. Elephant garlic is best planted in the autumn for maximum size.',
                'plant_id' => $garlic->id,
                'variety_id' => $elephantGarlic->id,
            ]);
        }
        $carcassonneWight = collect($garlicVarieties)->firstWhere('name', 'Carcassonne Wight (Hardneck)');
        if ($carcassonneWight) {
            $carcassonneWight->notes()->create([
                'note' => 'Carcassonne Wight is an exceptional, pink cloved hardneck variety showing great vigour in the UK climate. Good skin cover, great strength and carry through coupled with superior (in our opinion!) bouquet and character.',
                'plant_id' => $garlic->id,
                'variety_id' => $carcassonneWight->id,
            ]);
        }
        $caulkWight = collect($garlicVarieties)->firstWhere('name', 'Caulk Wight (Hardneck)');
        if ($caulkWight) {
            $caulkWight->notes()->create([
                'note' => 'Purple striped garlic commonly found in Eastern Europe and Russia. Large, easy peeling and vigorous. Once dried out the outer leaves fall away to reveal the most beautiful purple striped bulb.',
                'plant_id' => $garlic->id,
                'variety_id' => $caulkWight->id,
            ]);
        }
        $kingslandWight = collect($garlicVarieties)->firstWhere('name', 'Kingsland Wight (Hardneck)');
        if ($kingslandWight) {
            $kingslandWight->notes()->create([
                'note' => 'White skinned, pink cloved, from near Toulouse, SW France. The most versatile of hardnecks, can be planted Autumn or early Spring but dislikes wet conditions. Better for south of England.',
                'plant_id' => $garlic->id,
                'variety_id' => $kingslandWight->id,
            ]);
        }
        $solentWight = collect($garlicVarieties)->firstWhere('name', 'Solent Wight (Softneck)');
        if ($solentWight) {
            $solentWight->notes()->create([
                'note' => 'Described as having an aroma and bouquet without compare, this garlic produces approximately 15 cloves per bulb. \'Solent Wight\' is the longest keeping garlic and if harvested in July or August and dried, it can keep until April the following year!',
                'plant_id' => $garlic->id,
                'variety_id' => $solentWight->id,
            ]);
        }
        $mersleyWight = collect($garlicVarieties)->firstWhere('name', 'Mersley Wight (Softneck)');
        if ($mersleyWight) {
            $mersleyWight->notes()->create([
                'note' => 'A classic "Silverskin" type, ideal for late winter or spring planting. One of the best for keeping qualities, it can be stored up to June the following year. Mersley Wight has outstanding vigour and is larger and bolder than similar types. Ideal garlic for the UK gardener.',
                'plant_id' => $garlic->id,
                'variety_id' => $mersleyWight->id,
            ]);
        }
        $rhapsodyWight = collect($garlicVarieties)->firstWhere('name', 'Rhapsody Wight (Softneck)');
        if ($rhapsodyWight) {
            $rhapsodyWight->notes()->create([
                'note' => 'A classic “Silverskin” type, ideal for late winter or spring planting. One of the best for keeping qualities, it can be stored up to June the following year.',
                'plant_id' => $garlic->id,
                'variety_id' => $rhapsodyWight->id,
            ]);
        }
        

        $monterySpinach = $spinach->varieties()->where('name', 'Spinach Monterey F1')->first();
        if ($monterySpinach) {  
            $monterySpinach->notes()->create([
                'note' => 'A versatile variety that’s quick growing and suitable for sowing virtually all year round, outside during warmer months and undercover during colder months. Monterey has dark green leaves and a good resistance to downy mildew. Delicious added to mixed salads. Ideal replacement for Spinach Trombone.',
                'plant_id' => $spinach->id,
                'variety_id' => $monterySpinach->id,
            ]);
            $monterySpinach->notes()->create([
                'note' => 'When to Sow Monterey F1 Spinach Seeds
                            March to May or July to October
                            Harvest 
                            May to June and August to December
                            Where to Sow 
                            Direct into growing site, sow thinly in shallow drills 2cm (3/4in) deep with 30cm (12in) between the rows. For later sowings, some cloche protection may be required.                                           
                            What to do next
                            As seedlings grow gradually thin out seedlings to 15cm (6in) apart. Water well during dry spells of weather to avoid premature bolting. Pick leaves as required.
                            Handy Tip
                            Pick when young and add raw baby leaves to salads. Pick leaves regularly whilst young and tender for a mild flavour',
                'plant_id' => $spinach->id,
                'variety_id' => $monterySpinach->id,
            ]);
        }

        $whiteLisbon = $spring_onion->varieties()->where('name', 'White Lisbon')->first();
        if ($whiteLisbon) { 
            $whiteLisbon->notes()->create([
                'note' => 'One of the most popular vegetables for the salad garden. These are white skinned with a delicous mild flavour which are quick growing. Sow from March to August for salad onions, or as a substitute for chives in cooking. Use as a companion plant with carrots to deter carrot fly.',
                'plant_id' => $spring_onion->id,
                'variety_id' => $whiteLisbon->id,
            ]);
            $whiteLisbon->notes()->create([
                'note' => 'Early sowings in a cold frame or under cloches 1cm (1/2") deep. Later sowings outside in rows 1cm (1/2") deep with 10cm (4") between rows. Salad or spring onions do not need transplanting or thinning. Remove cloches or frame covers by mid-April. Pull alternate onions to naturally thin the crop during the season. They are ideal for successional sowing and, as they are in the ground for such a short time, may be grown between slower growing vegetables.',
                'plant_id' => $spring_onion->id,
                'variety_id' => $whiteLisbon->id,
            ]);
        }

        $carrotNantes = $carrot->varieties()->where('name', 'Early Nantes (Daucus carota)')->first();
        if ($carrotNantes) {   
            $carrotNantes->notes()->create([
                'note' => 'Vigorous grower with 16cm long cylindrical blunt ended roots of deep red/orange for mid season use. 
                Carrots are often thought of as the ultimate health food. You were probably told to "eat your carrots" by your parents.
                It is believed that the carrot was first cultivated in the area now known as Afghanistan thousands of years ago as a small forked purple or yellow root with a woody and bitter flavour, resembling nothing of the carrot we know today.
                Purple, red, yellow and white carrots were cultivated long before the appearance of the now popular orange carrot, which was developed and stabilised by Dutch growers in the 16th and 17th centuries.',
                'plant_id' => $carrot->id,
                'variety_id' => $carrotNantes->id,
            ]);
            $carrotNantes->notes()->create([
                'note' => 'WHERE TO SOW
                Sow very thinly in drills 1.5cm (3/4") deep with 25cm (9") between rows.
                WHAT TO DO NEXT
                Carrot fly is attracted by thinning, so try to avoid thinning at all.   If plants are overcrowded, thin if necessary in the evening removing all debris from site. Pull alternate roots when small and use whole.
                HANDY TIP
                Early sowings can be made in a cold frame or under cloches. In mild areas, sow in October under cloches or frame for really early spring use.
                NUTRITIONAL VALUES
                High in antioxidant beta-carotene which coverts to vitamin A in the body.',
                'plant_id' => $carrot->id,
                'variety_id' => $carrotNantes->id,
            ]);
        }


        $onionRed = $onion->varieties()->where('name', 'Red Onion (Red Winter)')->first();
        if ($onionRed) {   
            $onionRed->notes()->create([
                'note' => 'Firm, flattish-round bulbs of a beautiful dark red colour with eye-catching red rimmed flesh.',
                'plant_id' => $onion->id,
                'variety_id' => $onionRed->id,
            ]);
        }
        $onionWhite = $onion->varieties()->where('name', 'White Onion (Snowball)')->first();
        if ($onionWhite) {   
            $onionWhite->notes()->create([
                'note' => 'Attractive white-skinned and fleshed variety. Maincrop maturity for harvesting in August and good storage potential',
                'plant_id' => $onion->id,
                'variety_id' => $onionWhite->id,
            ]);
        }
        $onionBrown = $onion->varieties()->where('name', 'Brown Onion (Golden Shakespeare)')->first();
        if ($onionBrown) {   
            $onionBrown->notes()->create([
                'note' => ' A very popular and reliable variety, giving heavy yields of golden-brown skinned, crisp, flavoursome bulbs.',
                'plant_id' => $onion->id,
                'variety_id' => $onionBrown->id,
            ]);
        }    
        
    }
}
