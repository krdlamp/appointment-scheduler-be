<!DOCTYPE html>
<html>
    <body>
      <p style="font-size:20px;text-transform:uppercase;"><b>APPOINTMENT SCHEDULER<b></p>
      <hr>
      <p>
        <span style="text-transform:uppercase;">{{$employee->first_name}} {{$employee->last_name}}</span>
        <span style="">confirmed his/her attendance to the appointment scheduled on</span>
        <span style="">{{$appointment->set_date}}</span> at
        <span style="">{{$appointment->start_time}} - {{$appointment->end_time}}</span>
      </p>
      <hr>
      <table cellspacing="10" align="center" style="width:70%">
        <tr><th colspan="2" style="text-transform:uppercase;font-size:18px;text-align:center;">Appointment Details</th></tr>
        <tr>
          <td style="width:40%;"><b>Subject:</b></td>
          <td style="width:60%;">{{ $appointment->subject }}
        </tr>
        <tr>
          <td style="width:40%;"><b>Purpose:</b></td>
          <td style="width:60%;">{{ $appointment->purpose }}</td>
        </tr>
        <tr>
          <td style="width:40%;"><b>Venue:</b></td>
          <td style="width:60%;">{{ $appointment->venue }}</td>
        </tr>
        <tr>
          <td style="width:40%;"><b>Status:</b></td>
          <td style="width:60%;">{{ $appointment->status }}</td>
        </tr>
        <tr>
          <td style="width:40%;"><b>Notes:</b></td>
          <td style="width:60%;">{{ $appointment->notes }}</td>
        </tr>
        <tr>
          <td style="width:40%;"><b>Agendas:</b></td>
          <td style="width:60%;">
            @foreach($appointment->agendas as $agenda)
              <p>{{ $agenda->description }}</p>
            @endforeach
          </td>
        </tr>
        <tr>
          <td style="width:40%;"><b>Meeting Employees:</b></td>
          <td style="width:60%;">
            @foreach($appointment->employees as $emp)
              <p>{{ $emp->first_name }} {{ $emp->last_name }}</p>
            @endforeach
          </td>
        </tr>
      </table>
      <p>Click <a href="http://appointment-scheduler.dev/#/scheduler/appointment/{{$appointment->id}}/details">here</a> for more details.</p>
    </body>
</html>
