<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @if (app()->getLocale() == 'ar')
        <style>
           body {
            font-family: 'XBRiyaz', sans-serif;
            direction: rtl;
            font-size: 20px;
            height: 100%;
           }
           table{
                width:100%;
                border: 1px solid black;
                border-collapse: collapse;
                margin:auto;
                direction: rtl;
            }
            td,th{
                border: 1px solid black;
                padding-right: 5px;
                width:24%;
                text-align: right;
                font-size: 16px;
            }
            th{
                font-size: 19px;
            }
            caption{
                font-size: 20px;
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
            <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">{{__('Archive')}}</caption>
            <thead>
                <tr>
                    <th scope="col" style="width: 15%">{{__('Title')}}</th>
                    <th scope="col" width="30%">{{__('Description')}}</th>
                    <th scope="col" style="width: 15%">{{__('Assigned From')}}</th>
                    <th scope="col" style="width: 20%">{{__('Status')}}</th>
                    <th scope="col" style="width: 20%">{{__('Due Date')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{ App\Models\User::where(['id' => $task->user_id])->pluck('name')->first()}}</td>
                            <td>{{$task->status}} </td>
                            <td>{{$task->duedate}}
                        </tr>
                @endforeach
            </tbody>
        </table>


    </body>

</html>

















