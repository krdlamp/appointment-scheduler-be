<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = array(
            ['emp_num' => '254-09-01', 'first_name' => 'Emmanuel', 'last_name' => 'Navarro', 'middle_name' => 'Carlos',
             'department_id' => 1, 'level_id' => 2,'position_id' => 17, 'email' => 'mmfi.mst@gmail.com'],
            ['emp_num' => '102-06-93', 'first_name' => 'Sabino Czar', 'last_name' => 'Manglicmot', 'middle_name' => 'Cloma', 'suffix' => 'II',
             'department_id' => 2, 'level_id' => 1,'position_id' => 2, 'email' => 'mmfi.mst@gmail.com'],
            ['emp_num' => '212-11-97', 'first_name' => 'Joey', 'last_name' => 'Dela Cruz', 'middle_name' => 'Aledo',
             'department_id' => 10, 'level_id' => 2,'position_id' => 12, 'email' => 'mmfi.mst@gmail.com'],
            ['emp_num' => '134-09-93', 'first_name' => 'Rosabella', 'last_name' => 'Manglicmot', 'middle_name' => 'Cuadra',
             'department_id' => 9, 'level_id' => 2,'position_id' => 6, 'email' => 'mmfi.mst@gmail.com'],
            ['emp_num' => '208-08-97', 'first_name' => 'Rachel', 'last_name' => 'Manglicmot', 'middle_name' => 'Luga',
             'department_id' => 3, 'level_id' => 1,'position_id' => 3, 'email' => 'mmfi.mst@gmail.com'],
            ['emp_num' => '375-07-11', 'first_name' => 'Nestor', 'last_name' => 'Sanglay', 'middle_name' => 'Reyes',
             'department_id' => 10, 'level_id' => 2,'position_id' => 12, 'email' => 'mmfi.mst@gmail.com'],
            ['emp_num' => '318-11-06', 'first_name' => 'Citadel', 'last_name' => 'Punzal', 'middle_name' => 'Barcelona',
             'department_id' => 9, 'level_id' => 2,'position_id' => 6, 'email' => 'mmfi.mst@gmail.com'],
            ['emp_num' => '313-07-06', 'first_name' => 'Jemmuel', 'last_name' => 'Roque', 'middle_name' => 'Caluya',
             'department_id' => 9, 'level_id' => 2,'position_id' => 6, 'email' => 'mmfi.mst@gmail.com'],
            ['emp_num' => '1', 'first_name' => 'Anita', 'last_name' => 'Cabalce', 'middle_name' => 'Rivera',
             'department_id' => 9, 'level_id' => 2,'position_id' => 6, 'email' => 'mmfi.mst@gmail.com']
        );

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
