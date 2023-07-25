<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tickets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5 mb-3">
            <h1>Tickets</h1>
        </div>
        <div class="row mb-3">
            <a href="{{url('user/tickets/create')}}" class="btn btn-success">New ticket</a>
        </div>
        <div class="row">
           <table class="table table-bordered">
              <thead class="table-dark">
                  <tr>
                     <th style="text-align: center;vertical-align:middle">title</th>
                     <th style="text-align: center;vertical-align:middle">importance</th>
                     <th style="text-align: center;vertical-align:middle">status</th>
                     <th style="text-align: center;vertical-align:middle">date</th>
                     <th style="text-align: center;vertical-align:middle">operations</th>
                  </tr>
              </thead>
              <tbody>
                 @foreach($tickets as $ticket)
                   <tr>
                     <td style="text-align: center;vertical-align:middle">{{$ticket->title}}</td>
                     <td style="text-align: center;vertical-align:middle">
                        
                        @switch($ticket->importance)
                            @case('LOW')
                                 <span class="badge bg-secondary">Low</span>
                                @break
                            @case("MIDDLE")
                                 <span class="badge bg-success">Middle</span>
                                @break
                            @default
                                 <span class="badge bg-warning">High</span>
                        @endswitch
                     </td>
                     <td style="text-align: center;vertical-align:middle">
                        @switch($ticket->status)
                            @case('NEW')
                                 <span class="badge bg-warning">Waiting</span>
                                @break
                            @case("ANSWERED")
                                 <span class="badge bg-success">Answered</span>
                                @break
                            @case("NOT_ANSWERED")
                                 <span class="badge bg-warning">Waiting</span>
                                @break
                            @default
                                 <span class="badge bg-secondary">Closed</span>
                        @endswitch
                     </td>
                     <td style="text-align: center;vertical-align:middle">{{$ticket->updated_at->format('Y-m-d H:i')}}</td>
                     <td style="text-align: center;vertical-align:middle"><a href="{{url('user/tickets/show/'.$ticket->id)}}" class="btn btn-info">Show</a></td>
                   </tr>
                 @endforeach
              </tbody>
           </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>