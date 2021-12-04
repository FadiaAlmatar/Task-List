{{-- show all tasks finished --}}
@extends('layouts.amz')
    @section('styles')
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endsection
    @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function() {
               $('.tasksTable').DataTable();
           });
        </script>
    @endsection
    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('tasks.printArchive')}}" class="btn btn-danger btn-md active" role="button" aria-pressed="true">PDF</a><br><br>
                    <table class="table table-bordered tasksTable" style="width:100%;text-align:center">
                        <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">{{__('Archive')}}</caption>
                        <thead>
                            <tr>
                              <th scope="col" style="width: 15%">{{__('Title')}}</th>
                              <th scope="col" width="30%">{{__('Description')}}</th>
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
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
