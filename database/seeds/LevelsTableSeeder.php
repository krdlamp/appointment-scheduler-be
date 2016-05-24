<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = array(
            ['description' => 'Executive Level'],
            ['description' => 'Managerial Level'],
            ['description' => 'Operational Level'],
        );

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
