<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5 mb-3">
            <h3>Title : {{$ticket->title}}</h3>
            <h3>Status : 
                @switch($ticket->status)
                    @case('CLOSED')
                        Closed
                        @break
                    @case('ANSWERED')
                        Answered
                        @break
                    @default
                        Waiting
                @endswitch
            </h3>
            <h3>Date : {{$ticket->created_at->format('Y-m-d H:i')}}</h3>
        </div>
        <div class="row">
           <div class="col-2"></div>
           <div class="col-8">
               <div style="width: 100%;display: flex;flex-direction: column;background-color: bisque;min-height: 200px">
                
                @foreach ($ticket->messages as $message)
                @if ($message->sender == 'USER')
                    <div style="width: 100%;margin: 5px 0px;display: flex;flex-direction: row;justify-content: flex-start">
                       <span style="background-color: #ddd;padding:3px 8px;border-top-right-radius: 10px;border-bottom-right-radius: 10px">{{$message->text}}<sub style="margin-left: 8px">{{$message->created_at->format('H:i')}}</sub></span>
                    </div>
                @else
                <div style="width: 100%;margin: 5px 0px;display: flex;flex-direction: row;justify-content: flex-end;">
                    <span style="background-color: #fff;padding:3px 8px;border-top-left-radius: 10px;border-bottom-left-radius: 10px"><sub style="margin-right: 8px">{{$message->created_at->format('H:i')}}</sub>{{$message->text}}</span>
                 </div>
                @endif
            @endforeach
               </div>
               <form action="{{url('user/tickets/'.$ticket->id."/messages")}}" method="POST">
                   @csrf
                   <div class="form-group m-3">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control" id="message" cols="20" rows="5"></textarea>
                   </div>
                   <div class="form-group m-3">
                       <button type="submit" class="btn btn-success">Send</button>
                   </div>
               </form>
           </div>
           <div class="col-2"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>