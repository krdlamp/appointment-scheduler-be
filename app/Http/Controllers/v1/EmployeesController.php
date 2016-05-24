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
    /**
     * AppointmentsController constructor.
     */
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the index and show methods.
//        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
        $this->middleware('jwt.auth', ['except' => ['external']]);
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
