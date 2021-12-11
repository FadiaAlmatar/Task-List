{{-- show all tasks finished --}}
@extends('layouts.amz')
    @section('styles')
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endsection
    @section('content')
    <div class="py-12">
        <div style="padding: 10px">
            @if(count($tasks) <> 0)<a href="{{route('tasks.printArchive')}}" class="btn btn-danger btn-md active"class="pdf" role="button" aria-pressed="true">{{__('Download')}} PDF</a>@endif<br><br>

        <table class="table table-bordered table-responsive tasksTable">
            <thead>
                <tr>
                    <th scope="col" style="width: 20%">{{__('Title')}}</th>
                    <th scope="col" style="width: 35%">{{__('Description')}}</th>
                    <th scope="col" style="width: 13%">{{__('Assigned From')}}</th>
                    @if(Auth::User()->parentId == null)
                    <th scope="col" style="width: 13%">{{__('Assigned To')}}</th>
                    @endif
                    <th scope="col" style="width: 15%">{{__('Status')}}</th>
                    <th scope="col" style="width: 20%">{{__('Due Date')}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{ App\Models\User::where(['id' => $task->user_id])->pluck('name')->first()}}</td>
                    @if(Auth::User()->parentId == null)
                    <td>{{ App\Models\User::where(['id' => $task->assigned_to])->pluck('name')->first()}}</td>
                    @endif
                    <td>{{$task->status}} </td>
                    <td>{{$task->duedate}}
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
        <br>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
       $('.tasksTable').DataTable();
   });
</script>
@endsection
