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
      <p style="font-size:25px;text-transform:uppercase;"><b>APPOINTMENT SCHEDULER<b></p>
      <hr>
      <p>
        <span style="font-size:20px;text-transform:uppercase;">{{$appointment->employee->first_name}} {{$appointment->employee->last_name}}</span>
        <span style="font-size:15px;">scheduled an appointment on</span>
        <span style="font-size:18px;">{{$appointment->set_date}}</span> at
        <span style="font-size:18px;">{{$appointment->start_time}} - {{$appointment->end_time}}</span>
      </p>
      <hr>
      <table style="align:center;width:60%">
        <tr><th style="text-transform:uppercase;font-size:18px;">Appointment Details</th></tr>
        <tr>
          <td style="width:20%;"><b>Subject:</b></td>
          <td style="width:80%;">{{ $appointment->subject }}
        </tr>
        <tr>
          <td style="width:20%;"><b>Purpose:</b></td>
          <td style="width:80%;">{{ $appointment->purpose }}</td>
        </tr>
        <tr>
          <td style="width:20%;"><b>Venue:</b></td>
          <td style="width:80%;">{{ $appointment->venue }}</td>
        </tr>
        <tr>
          <td style="width:20%;"><b>Status:</b></td>
          <td style="width:80%;">{{ $appointment->status }}</td>
        </tr>
        <tr>
          <td style="width:20%;"><b>Notes:</b></td>
          <td style="width:80%;">{{ $appointment->notes }}</td>
        </tr>
        <tr>
          <td style="width:20%;"><b>Agendas:</b></td>
          <td style="width:80%;">
            @foreach($appointment->agendas as $agenda)
              <p>{{ $agenda->description }}</p>
            @endforeach
          </td>
        </tr>
        <tr>
          <td style="width:20%;"><b>Meeting Employees:</b></td>
          <td style="width:80%;">
            @foreach($appointment->employees as $emp)
              <p>{{ $emp->first_name }} {{ $emp->last_name }}</p>
            @endforeach
          </td>
        </tr>
      </table>
      <p>Click <a href="http://localhost:9000/#/scheduler/appointment/{{$appointment->id}}/details">here</a> to confirm attendance.</p>
    </body>
</html>
