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
            ['title' => 'Executive Secretary'],
            ['title' => 'Executive Staff'],
            ['title' => 'Assistant Academic Director'],
            ['title' => 'Assistant Finance Director'],
            ['title' => 'Payroll Officer'],
            ['title' => 'Cashier'],
            ['title' => 'Purchaser'],
            ['title' => 'Student Affairs Director'],
            ['title' => 'Guidance Coordinator'],
            ['title' => 'Dean'],
            ['title' => 'Program Chair'],
            ['title' => 'Assistant Program Chair'],
            ['title' => 'Academic Coordinator'],
            ['title' => 'Course Coordinator'],
            ['title' => 'Faculty'],
            ['title' => 'Registrar'],
            ['title' => 'Assistant Registrar'],
            ['title' => 'Registrar Evaluator'],
            ['title' => 'Staff'],
            ['title' => 'Campus Management Head'],
            ['title' => 'Assistant Campus Management Head'],
            ['title' => 'Student Discipline Head'],
            ['title' => 'EX-O'],
            ['title' => 'School Nurse'],
            ['title' => 'Research Head'],
            ['title' => 'Curriculum Instructions and Supervisor'],
            ['title' => 'Information Technology Head'],
            ['title' => 'Property Custodian'],
            ['title' => 'School Driver'],
            ['title' => 'Maintenance'],
            ['title' => 'Information Officer'],
            ['title' => 'Facilitator'],
            ['title' => 'Shipboard Training Officer'],
            ['title' => 'Librarian'],
            ['title' => 'Assistant Librarian'],
            ['title' => 'Library Aide'],
            ['title' => 'School Physician'],
            ['title' => 'School Dentist'],
            ['title' => 'Guidance Facilitator'],
            ['title' => 'Sports Coordinator'],
            ['title' => 'Coach'],
            ['title' => 'Assistant Coach'],
            ['title' => 'Trainers'],
            ['title' => 'Internal Auditor'],
        );

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
