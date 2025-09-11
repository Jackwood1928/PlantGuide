<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pot;

class PotSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Pot::create([
                'name' => 'Pot ' . $i,
                'status' => 'empty',
            ]);
        }
    }
}
