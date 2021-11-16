<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @if (app()->getLocale() == 'ar')
        <style>
           body {
            font-family: 'XBRiyaz', sans-serif;
            direction: rtl;
            font-size: 15px;
            height: 100%;
           }
           table{
                width:100%;
                min-height: 75%;
                border: 1px solid black;
                border-collapse: collapse;
                direction: rtl;
           }
            td,th{
                border: 1px solid black;
                height:45px;
                padding-right: 5px;
            }
            th{
                text-align: right;
                width:30%;
                font-size: 17px;
            }
            td{
                width:15%;
            }
        </style>
           @else
        <style>
            body {
            font-family: 'XBRiyaz', sans-serif;
            font-size: 12px;
           }
           h5 {
            text-align: center;
            text-decoration: underline;
            font-size: 20px;
            }
            table{
                width:100%;
                height:100%;
                border: 1px solid black;
                border-collapse: collapse;
            }
            td,th{
                border: 1px solid black;
                height:25px;
            }
            td{
                text-align: center;
            }
            th{
                text-align: left;
                font-size: 13px;
                padding-left: 5px;
            }
        </style>
        @endif
    </head>
    <body>
        <table class="table table-bordered">
            <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">{{__('Created Tasks')}}</caption>
            <thead>
                <tr>
                    <th scope="col" width="10%">{{__('Status')}}</th>
                    <th scope="col" style="width: 25%">{{__('Task')}}</th>
                    <th scope="col" style="width: 10%">{{__('Assigned From')}}</th>
                    <th scope="col" style="width: 10%">{{__('Assigned To')}}</th>
                    <th scope="col" style="width: 15%">{{__('Due Date')}}</th>
                    <th scope="col" style="width: 15%">{{__('create Date')}}</th>
                    <th scope="col" style="width: 15%">{{__('update Date')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                @if(\Carbon\Carbon::now() > $task->duedate)
                <tr style="background:#ff7676">
            @elseif((\Carbon\Carbon::now()->diffInDays($task->duedate) <= 3) && (\Carbon\Carbon::now()->diffInDays($task->duedate) >= 0))
                <tr style="background:#ffcf76;">
            @else
                <tr style="background:#98FF98;">
             @endif

                    <td>{{$task->status}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{ App\Models\User::where(['id' => $task->user_id])->pluck('name')->first()}}</td>
                    <td>{{ App\Models\User::where(['id' => $task->assigned_to])->pluck('name')->first()}}</td>
                    <td>{{$task->duedate}}{{\Carbon\Carbon::now()->diffInDays($task->duedate)}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>{{$task->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </body>

</html>

















