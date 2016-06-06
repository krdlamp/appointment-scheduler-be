<?php

namespace App\Http\Controllers\v1;

use App\Models\Appointment;
use App\Models\AppointmentEmployee;
use App\Models\Employee;
use Illuminate\Http\Request;

use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppointmentStatusController extends Controller
{

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
       $appointmentStats = AppointmentEmployee::all();

       return response()->json($appointmentStats);
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
    public function update(Request $request, $apptId)
    {
        $this->validate($request, [
            'appointment_id' => 'required',
            'employee_id'    => 'required',
            'status'         => 'required',
        ]);

        $appointmentEmp = AppointmentEmployee::where('appointment_id', $request->input('appointment_id'))
                                            ->where('employee_id', $request->input('employee_id'))->first();

        $appointment = Appointment::findOrFail($request->input('appointment_id'));
        $employee    = Employee::findOrFail($request->input('employee_id'));

        $appointmentEmp->status = $request->input('status');
        $appointmentEmp->notes  = $request->input('notes');
        $appointmentEmp->reason = $request->input('reason');
        $appointmentEmp->save();

        if($appointmentEmp->status === 'Attendance Confirmed') {
          Mail::send('emails.approvalNotif', ['appointment' => $appointment, 'appointmentEmp' => $appointmentEmp, 'employee' => $employee], function($m) use ($appointment) {
            $m->from('mmfi.scheduler@gmail.com', 'MMFI Scheduler');
            $m->subject($appointment->subject);
            $m->to($appointment->employee->email);
          });
        } else if($appointmentEmp->status === 'Attendance Cancelled') {
          Mail::send('emails.cancelApprovalNotif', ['appointment' => $appointment, 'appointmentEmp' => $appointmentEmp, 'employee' => $employee], function($m) use ($appointment) {
            $m->from('mmfi.scheduler@gmail.com', 'MMFI Scheduler');
            $m->subject($appointment->subject);
            $m->to($appointment->employee->email);
          });
        }

        return response()->json($appointmentEmp);
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
