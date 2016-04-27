<?php

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = array(
            ['title' => 'President'],
            ['title' => 'Chief Executive Officer'],
            ['title' => 'Quality Management Representative Head'],
            ['title' => 'Academics Director'],
            ['title' => 'Human Resource Director'],
            ['title' => 'Finance Director'],
            ['title' => 'Corporate Relations Director'],
            ['title' => 'Student Affairs Director'],
            ['title' => 'Dean'],
            ['title' => 'Program Chair'],
            ['title' => 'Registrar'],
            ['title' => 'Campus Management Head'],
            ['title' => 'Student Discipline Head'],
            ['title' => 'EX-O'],
            ['title' => 'Research Head'],
            ['title' => 'Curriculum Instructions and Supervisor'],
            ['title' => 'Information Technology Head'],
        );
        
        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
