<?php

namespace App\Http\Controllers\v1;

use App\Models\Employee;
use App\Models\Account;
use Illuminate\Http\Request;

use App\Http\Controllers\v1\GuzzleHttp\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{

    public function external()
    {
      $client = new GuzzleHttp\Client();
      $res = $client->request('GET', 'http://api.inventory.dev/api/employees');
      echo $res->getStatusCode();
      echo $res->getHeaderLine('content-type');
      echo $res->getBody();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with(
          'department',
          'position',
          'level'
        )->get();

        return response()->json($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'emp_num'       => 'required',
          'first_name'    => 'required',
          'last_name'     => 'required',
          'department_id' => 'required',
          'position_id'   => 'required',
          'level_id'       => 'required',
        ]);

        $input = $request->all();
        $employee = new Employee();
        $employee->fill($input)->save();
        $employee = Employee::with(
          'department',
          'level',
          'position'
        )->findOrFail($employee->id);

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with(
          'department',
          'level',
          'position'
        )->findOrFail($id);

        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $employee = Employee::findOrFail($id);

      $this->validate($request, [
        'emp_num'       => 'required',
        'first_name'    => 'required',
        'last_name'     => 'required',
        'department_id' => 'required',
        'position_id'   => 'required',
        'level_id'       => 'required',
      ]);

      $input = $request->all();
      $employee->fill($input)->save();
      $employee = Employee::with(
        'department',
        'level',
        'position'
      )->findOrFail($id);

      return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Employee::destroy($id);

      return response()->json([], 204);
    }
}
