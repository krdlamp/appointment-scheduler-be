<!DOCTYPE html>
<html>
    <body>
      <!-- <p><b>Date:</b> {{ $appointment->set_date }}</p>
      <p><b>Time:</b> {{ $appointment->start_time }} - {{ $appointment->end_time }}</p>
      <p><b>Venue:</b> {{ $appointment->venue }}</p>
      <p><b>Set by:</b> {{ $appointment->employee->first_name }} {{ $appointment->employee->last_name }}</p>
      <p><b>Status:</b> {{ $appointment->status }}</p>

      <p>Click <a href="http://localhost:9000/#/scheduler/appointment/{{$appointment->id}}/details">here</a> to confirm attendance.</p>

      <p><b>Meeting Employees</b></p>
      <ul class="list-group">
        @foreach($appointment->employees as $emp)
          <li class="list-group-item">{{ $emp->first_name }} {{ $emp->last_name }}</li>
        @endforeach
      </ul> -->
      <p style="font-size:20px;text-transform:uppercase;"><b>APPOINTMENT SCHEDULER<b></p>
      <hr>
      <p>
        <span style="text-transform:uppercase;">{{$appointment->employee->first_name}} {{$appointment->employee->last_name}}</span>
        <span style="">scheduled an appointment on</span>
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
      <p>Click <a href="http://localhost:9000/#/scheduler/appointment/{{$appointment->id}}/details">here</a> to confirm attendance.</p>
    </body>
</html>
