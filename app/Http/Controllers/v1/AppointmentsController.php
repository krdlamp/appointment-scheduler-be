<?php

namespace App\Http\Controllers\v1;

use App\Models\Agenda;
use App\Models\Appointment;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppointmentsController extends Controller
{
    /**
     * AppointmentsController constructor.
     */
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the index and show methods.
        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with(
            'employees',
            'departments',
            'agendas'
        )->get();
        return response()->json($appointments);
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
            'subject'    => 'required',
            'set_date'   => 'required',
            'start_time' => 'required',
            'end_time'   => 'required',
            'purpose'    => 'required',
            'status'     => 'required',

            'employees'  => 'required',
            'agendas'    => 'required',
        ]);
        
        $appointment = new Appointment([
            'subject'    => $request->input('subject'),
            'set_date'   => $request->input('set_date'),
            'start_time' => Carbon::createFromFormat('H:m a', $request->input('start_time'), 'UTC'),
            'end_time'   => Carbon::createFromFormat('H:m a', $request->input('end_time'), 'UTC'),
            'purpose'    => $request->input('purpose'),
            'status'     => $request->input('status')
        ]);
        
        $appointment->save();

        $emps = $request->input('employees');
        foreach ($emps as $emp) {
            $appointment->employees()->attach(['id' => $emp['id']]);
            $appointment->departments()->attach(['id' => $emp['id']]);
        }


        $agds = $request->input('agendas');
        foreach ($agds as $agd) {
            $appointment->agendas()->create([
                'description' => $agd['description']
            ]);
        }

        $appointment->with(
            'employees',
            'departments',
            'agendas'
        )->get();

        return response()->json($appointment);

        
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
