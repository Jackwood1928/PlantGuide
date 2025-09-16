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
            ['name' => 'Duke', 'url' => 'https://www.thompson-morgan.com/p/blueberry-duke/T71122TM'],
            ['name' => 'Pink Lemonade', 'url' => 'https://www.thompson-morgan.com/p/blueberry-pink-lemonade/KB2267TM'],
            ['name' => 'Bluecrop', 'url' => 'https://www.thompson-morgan.com/p/blueberry-bluecrop/t57997TM'],

        ]);

        $rubarb->varieties()->createMany([
            ['name' => 'Glaskin\'s Perpetual', 'url' => 'https://www.thompson-morgan.com/p/rhubarb-glaskins-perpetual-seeds/831TM'],
        ]);

        $raspberry->varieties()->createMany([
            ['name' => 'Little Sweet Sister', 'url' => 'https://www.thompson-morgan.com/p/raspberry-little-sweet-sister/wkb7551'],
            ['name' => 'Heritage', 'url' => 'https://www.thompson-morgan.com/p/raspberry-autumn-duo-autumn-fruiting/wkh1090TM'],
            ['name' => 'Golden Bliss', 'url' => 'https://www.thompson-morgan.com/p/raspberry-autumn-duo-autumn-fruiting/wkh1090TM'],
        ]);

        $tayberry->varieties()->createMany([
            ['name' => 'Rubus (Tayberry Group)', 'url' => 'https://www.thompson-morgan.com/p/tayberry-growers-choice/wkh7404TM'],
        ]);

        $strawberry->varieties()->createMany([
            ['name' => 'Anablanca', 'url' => 'https://www.thompson-morgan.com/p/strawberry-anablanca-snow-white/KB2112TM'],
            ['name' => 'Allegro', 'url' => 'https://www.thompson-morgan.com/p/strawberry-british-grown-wimbledon-collection/wkh4010TM'],
            ['name' => 'Flamenco', 'url' => 'https://www.thompson-morgan.com/p/strawberry-british-grown-wimbledon-collection/wkh4010TM'],
            ['name' => 'Vibrant', 'url' => 'https://www.thompson-morgan.com/p/strawberry-british-grown-wimbledon-collection/wkh4010TM'],
        ]);

        $spinach->varieties()->createMany([
            ['name' => 'Spinach Monterey F1', 'url' => 'https://www.kingsseeds.com/14417-Spinach-Monterey-F1'],
        ]);

        $spring_onion->varieties()->createMany([
            ['name' => 'White Lisbon', 'url' => 'https://www.kingsseeds.com/OV00278-Onion-White-Lisbon-ORGANIC-SEED-PPP-A-Allium-BGB40557-C-lot-see-pkt-DGB'],
        ]);

        $carrot->varieties()->createMany([
            ['name' => 'Early Nantes', 'url' => 'https://www.kingsseeds.com/OV107-CARROT-Daucus-carota-Early-Nantes-ORGANIC-SEED'],
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

        $strawberryAnablanca = $strawberry->varieties()->where('name', 'Anablanca (Snow White)(Fragaria x ananassa)')->first();
        if ($strawberryAnablanca) {  
            $strawberryAnablanca->notes()->create([
                'note' => 'Grow this unusual variety and you’re in for a real treat. Also known as Pineberry, Strawberry ‘Snow White’ provides high yields of fruit with an aromatic flavour which has distinct pineapple aftertaste! The fruit can make quite a talking point with their backwards appearance - the same appetising heart shaped soft fruit but with white flesh and red seeds. A lovely strawberry to enjoy freshly picked as a snack or to add to desserts and cakes. Its bushy habit and neatly spreading stems makes this a good choice for growing in containers where the fruit will cascade over the edges, as well as out on the allotment. A fully hardy perennial, you can enjoy a great summer crop year after year. Height: 40cm (16”). Spread: 50cm (20”).',
                'plant_id' => $strawberry->id,
                'variety_id' => $strawberryAnablanca->id,
            ]);
        }
        $strawberryAllegro = $strawberry->varieties()->where('name', 'Allegro')->first();
        if ($strawberryAllegro) {
            $strawberryAllegro->notes()->create([
                'note' => 'Looking for a super vigorous variety that can cope with poorer soils and small spaces where crop rotation is a challenge? This very early season variety exhibits exceptional resistance to endemic soil borne diseases as well as botrytis and mildew. The large, bright red fruits have an excellent flavour and high sugar content.',
                'plant_id' => $strawberry->id,
                'variety_id' => $strawberryAllegro->id,
            ]);
        }
        $strawberryFlamenco = $strawberry->varieties()->where('name', 'Flamenco')->first();
        if ($strawberryFlamenco) {
            $strawberryFlamenco->notes()->create([
                'note' => 'If space is limited, try growing this ever-bearing variety to maximise your crop of sweet and juicy fruits over a long picking period. So sweet it needs no sugar, the fruit is ready to harvest from mid-May until November with the peak of the fruit produced in early September.',
                'plant_id' => $strawberry->id,
                'variety_id' => $strawberryFlamenco->id,
            ]);
        }
        $strawberryVibrant = $strawberry->varieties()->where('name', 'Vibrant')->first();
        if ($strawberryVibrant) {   
            $strawberryVibrant->notes()->create([
                'note' => 'A super-charged, early season strawberry that fruits in as little as 60 days from planting. Large numbers of flowering trusses are produced in succession offering an extended cropping period plus each truss carries only 4 to 5 flowers thus maintaining a larger fruit. Plants crop from May through June, and from the second year will offer a subsequent crop in September. Top rated in the Horticultural Development Council trials.',
                'plant_id' => $strawberry->id,
                'variety_id' => $strawberryVibrant->id,
            ]);
        }
    }
}
