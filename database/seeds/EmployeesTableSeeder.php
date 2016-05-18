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
            ['emp_num' => '254-09-01', 'first_name' => 'Emmanuel', 'last_name' => 'Navarro', 'middle_name' => 'Carlos', 'department_id' => 1, 'level_id' => 2,'position_id' => 17],
            ['emp_num' => '442-07-13', 'first_name' => 'Michelle Joy', 'last_name' => 'Ferrer', 'middle_name' => 'Gatchola', 'department_id' => 12, 'level_id' => 2,'position_id' => 5, 'password' => Hash::make('secret')],
            ['emp_num' => '102-06-93', 'first_name' => 'Sabino Czar', 'last_name' => 'Manglicmot', 'middle_name' => 'Cloma', 'suffix' => 'II', 'department_id' => 2, 'level_id' => 1,'position_id' => 2, 'password' => Hash::make('secret')],
        );

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
