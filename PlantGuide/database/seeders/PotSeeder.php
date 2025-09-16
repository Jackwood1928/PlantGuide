<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContainerObject;

class PotSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            ContainerObject::create([
                'type' => 'pot',
                'name' => 'Pot ' . $i,
                'location' => 'Unknown',
                'status' => 'Unfilled',
            ]);
        }
    }
}
