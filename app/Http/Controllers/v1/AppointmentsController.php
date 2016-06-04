<?php

namespace App\Http\Controllers\v1;

use App\Models\Agenda;
use App\Models\Appointment;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Mail;

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
//        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
        $this->middleware('jwt.auth');
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
            'agendas',
            'employee'
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
            'set_by'     => 'required',
            'venue'      => 'required',

            'employees'  => 'required',
            'agendas'    => 'required',
        ]);

        $appointment = new Appointment([
            'subject'     => $request->input('subject'),
            'set_date'    => $request->input('set_date'),
            'start_time'  => Carbon::createFromFormat('h:m a', $request->input('start_time'), 'UTC'),
            'end_time'    => Carbon::createFromFormat('h:m a', $request->input('end_time'), 'UTC'),
            'purpose'     => $request->input('purpose'),
            'status'      => $request->input('status'),
            'employee_id' => $request->input('set_by'),
            'venue'       => $request->input('venue'),
            'notes'       => $request->input('notes'),
        ]);

        $appointment->save();

        $emps = $request->input('employees');
        foreach ($emps as $emp) {
            $appointment->employees()->attach(['id' => $emp['id']]);
            $appointment->departments()->attach(['id' => $emp['department_id']]);
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
            'agendas',
            'employee'
        )->get();

        foreach ($appointment->employees as $emp) {
          if ($emp->id !== $appointment->employee_id) {
            Mail::send('emails.requestNotif', ['appointment' => $appointment], function($m) use ($appointment, $emp) {
              $m->from('mmfi.scheduler@gmail.com', 'MMFI Scheduler');
              $m->subject($appointment->subject);
              $m->to($emp->email);
            });
          }
        }

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
        $appointment = Appointment::with(
            'employees',
            'departments',
            'agendas',
            'employee'
        )->findOrFail($id);

        return response()->json($appointment);
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
        $appointment = Appointment::findOrFail($id);

        $this->validate($request, [
            'subject'    => 'required',
            'set_date'   => 'required',
            'start_time' => 'required',
            'end_time'   => 'required',
            'purpose'    => 'required',
            'set_by'     => 'required',
            'venue'      => 'required',

            'employees'  => 'required',
            'agendas'    => 'required',
        ]);

        $appointment->subject     = $request->input('subject');
        $appointment->set_date    = $request->input('set_date');
        $appointment->start_time  = $request->input('start_time');
        $appointment->end_time    = $request->input('end_time');
        $appointment->purpose     = $request->input('purpose');
        $appointment->status      = $request->input('status');
        $appointment->employee_id = $request->input('set_by');
        $appointment->venue       = $request->input('venue');
        $appointment->notes       = $request->input('notes');

        $appointment->save();

        $employees = [];
        $departments = [];

        $emps = $request->input('employees');
        if ($emps) {
          // foreach ($emps as $emp) {
              $employees = array_pluck($emps, 'id');
              $departments = array_pluck($emps, 'department_id');
          // }
        }

        $appointment->employees()->sync($employees);
        $appointment->departments()->sync($departments);

        $agendas = $appointment->agendas;
        foreach ($agendas as $agenda) {
            $agenda = Agenda::findOrFail($agenda->id);
            $agenda->delete();
        }

        $agds = $request->input('agendas');
        foreach ($agds as $agd) {
            $appointment->agendas()->create([
                'description' => $agd['description']
            ]);
        }

        if($appointment->status === 'Cancelled') {
          foreach ($appointment->employees as $emp) {
            if ($emp->id !== $appointment->employee_id) {
              Mail::send('emails.cancelNotif', ['appointment' => $appointment], function($m) use ($appointment, $emp) {
                $m->from('mmfi.scheduler@gmail.com', 'MMFI Scheduler');
                $m->subject($appointment->subject);
                $m->to($emp->email);
              });
            }
          }
        }

        if($appointment->status === 'Re-scheduled') {
          foreach ($appointment->employees as $emp) {
            if ($emp->id !== $appointment->employee_id) {
              Mail::send('emails.rescheduleNotif', ['appointment' => $appointment], function($m) use ($appointment, $emp) {
                $m->from('mmfi.scheduler@gmail.com', 'MMFI Scheduler');
                $m->subject($appointment->subject);
                $m->to($emp->email);
              });
            }
          }
        }

        $appointment->with(
            'employees',
            'departments',
            'agendas',
            'employee'
        )->get();

        return response()->json($appointment);
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
