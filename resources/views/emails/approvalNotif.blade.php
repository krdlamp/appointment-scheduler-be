<!DOCTYPE html>
<html>
    <body>
        <div class="container">
            <div class="content">
              <div class="panel-body">
                  <p><b>Date:</b> {{ $appointment->set_date }}</p>
                  <p><b>Time:</b> {{ $appointment->start_time }} - {{ $appointment->end_time }}</p>
                  <p><b>Venue:</b> {{ $appointment->venue }}</p>
                  <p><b>Set by:</b> {{ $appointment->employee->first_name }} {{ $appointment->employee->last_name }}</p>
                  <p><b>Status:</b> {{ $appointment->status }}</p>

                  <p><b>Attendance Status</b></p>
                  <p><b>{{ $employee->first_name }} {{ $employee->last_name }}: </b> {{ $appointmentEmp->status }}</p>
                  <p><b>Notes: </b> {{ $appointmentEmp->notes }}</p>

                  <p>Click <a href="http://localhost:9000/#/scheduler/appointment/{{$appointment->id}}/details">here</a> for more details.</p>
              </div>
            </div>
        </div>
    </body>
</html>
