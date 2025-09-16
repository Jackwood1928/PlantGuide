<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;
use App\Models\Plant;

class NoteSeeder extends Seeder
{
    public function run()
    {
        $garlic = Plant::where('name', 'Garlic')->first();
        $garlicId = $garlic ? $garlic->id : null;

        $onion = Plant::where('name', 'Onion')->first();
        $onionId = $onion ? $onion->id : null;

        $strawberry = Plant::where('name', 'Strawberry')->first();
        $strawberryId = $strawberry ? $strawberry->id : null;

        Note::create([
            'plant_id' => $garlicId,
            'note' => 'How to grow garlic',
            'url' => 'https://www.thegarlicfarm.co.uk/pages/how-to-grow-garlic',
        ]);

        Note::create([
            'plant_id' => $garlicId,
            'note' => '
            HARDNECK Harvest
            Ready to lift when the lower leaves start to change colour from green to yellow/ brown. End of May - end July depending on variety.
            SOFTNECK Harvest
            When the lower leaves start to yellow and fold and the garlic goes “weak at the knees” and begins to lie on the ground. Mid May - mid August depending on variety.',
        ]);

        Note::create([
            'plant_id' => $garlicId,
            'note' => 'Pests and Diseases
            Onion fly, leek moth, eelworm, rust, white rot, botrytis and downy mildew can all affect garlic. Crop rotation and good hygiene are the best ways to prevent problems. Remove and destroy any affected plants as soon as you spot them.',
        ]);

        Note::create([
            'plant_id' => $onionId,
            'note' => 'Height: 45cm (18”). Spread: 15cm (6”).',
        ]);

        Note::create([
            'plant_id' => $onionId,
            'note' => 'Plant onion sets in rows in any firm, well drained soil in full sun. Prepare the planting area several weeks in advance by incorporating some well rotted garden compost to improve drainage and soil fertility. Avoid planting onions on freshly manured soil. On particularly wet ground, try growing onion sets in raised beds. When growing onions from sets, plant the bulbs so that the tip of bulb is just protruding through the soil surface. Leave a space of 10cm (4") between each bulb, and 30cm (12") between each row.',
        ]);

        Note::create([
            'plant_id' => $onionId,
            'note' => 'Onion sets are undemanding and require only occasional watering during particularly dry periods. However, rows should be weeded regularly. Harvest onions in late June and July, a week or two after the leaves begin to turn yellow. Choose a dry day to loosen them from the ground with a fork. Leave them on the soil surface for a day or two until they have fully dried in the sun. Once dry, remove the top foliage and store them in a well ventilated, dry position. Bulbs can be stored for several months.',
        ]);

        Note::create([
            'plant_id' => $strawberryId,
            'note' => 'Plant strawberry plants in autumn or late spring in a sheltered, sunny position in well manured, free draining soil. Plant strawberry runners every 45cm (18") in rows spaced at 75cm (30") apart. Spread out their roots and place them in the soil at a level where the crown of the plant is just poking above the surface. Avoid planting them too deeply as this may cause them to rot. Alternatively try growing strawberry plants in hanging baskets or in specially designed strawberry planters for the patio.
These plants are lifted from the nursery field when dormant, and sent to you in late autumn or spring for planting. They often look dead on arrival, but they are just resting in the dormant period and will establish quickly for a strong start in the garden come spring. Set out in prepared soil in holes wide enough and deep enough to lay out the roots. Tread down the planting soil to knock out air pockets. Water well to settle. Apply a mulch to protect roots from cold temperatures. If conditions prevent immediate planting, set roughly into loose soil or a pot of compost (‘heeling in’) to protect the roots. The growth points of most bare root perennials should be set about an inch below the soil surface. New growth will appear in spring.',
        ]);


    }
}
