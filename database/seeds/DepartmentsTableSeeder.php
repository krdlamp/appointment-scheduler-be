<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = array(
            ['name' => 'Information Technology'],
            ['name' => 'Executive Office'],
            ['name' => 'Quality Management Representative'],
            ['name' => 'Office of the Student Affairs'],
            ['name' => 'Registrar'],
            ['name' => 'Sickbay'],
            ['name' => 'Guidance'],
            ['name' => 'Library'],
            ['name' => 'Finance'],
            ['name' => 'Campus Management Office'],
            ['name' => 'Corporate Relations'],
            ['name' => 'Human Resource'],
            ['name' => 'Maritime Affairs'],
            ['name' => 'Center of Competency and Assessment'],
            ['name' => 'Research'],
            ['name' => 'TESDA Program'],
            ['name' => 'Alumni Office'],
            ['name' => 'NROTC'],
            ['name' => 'Academic'],
            ['name' => 'Shipboard Training Office'],
            ['name' => 'Marine Engineering'],
            ['name' => 'Marine Transportation'],
            ['name' => 'Customs Administration'],
            ['name' => 'Senior High School'],
        );

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
