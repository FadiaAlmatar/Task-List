<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
        {{-- <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
      </x-slot>
      <x-slot name="scripts">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        {<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>--}}
        <script>
        $(document).ready(function() {
               $('.tasksTable').DataTable();
           });
        </script>
      </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{__('Task Management')}}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{route('tasks.create')}}">{{__('New Task')}}</a>
              <a class="dropdown-item" href="{{route('tasks.index')}}">{{__('My Tasks')}}</a>
              @if(Auth::User()->parentId == null)<a class="dropdown-item" href="{{route('employees.create')}}">{{__('Add Employees')}}</a>@endif
              <a class="dropdown-item" href="{{route('employees.index')}}">{{__('Employees')}}</a>
              <a class="dropdown-item" href="{{route('archive')}}">{{__('Archive')}}</a>
              <a class="dropdown-item" href="{{route('tasks.printCreated')}}">PDF</a>
            </div>
          </div><br><br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-resposive table-bordered tasksTable" style="width:100%;text-align:center">
                        <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">{{__('Created Tasks')}}</caption>
                        <thead>
                          <tr class="bg-primary">
                            <th scope="col" style="width: 15%">{{__('Action')}}</th>
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
                        @foreach($tasks as $task)
                            @if(\Carbon\Carbon::now() > $task->duedate)
                                <tr style="background:#ff7676">
                            @elseif((\Carbon\Carbon::now()->diffInDays($task->duedate) <= 3) && (\Carbon\Carbon::now()->diffInDays($task->duedate) >= 0))
                                <tr style="background:#ffcf76;">
                            @else
                                <tr style="background:#98FF98;">
                             @endif
                                    <td scope="row">
                                        <a href="{{route('tasks.edit',$task->id)}}"><button type="button" class="btn btn-outline-primary"><i style="color:black"class="fa fa-edit" ></i></button></a>
                                        <form action="{{route('tasks.destroy', $task->id)}}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light chat-send-btn"><i style="color:red"class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


   {{-- <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="{{route('tasks.create')}}" class="btn btn-primary btn-md active" role="button" aria-pressed="true">
                <i class="fa fa-plus fa-sm" aria-hidden="true">  {{__(' New Task')}}</i></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="{{route('tasks.index')}}" class="btn btn-primary btn-md active" role="button" aria-pressed="true">
                {{__('My Tasks')}}</a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="{{route('employees.create')}}" class="btn btn-primary btn-md active" role="button" aria-pressed="true">
                <i class="fa fa-plus fa-sm" aria-hidden="true"> {{__('Add Employees')}}</i></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
            <a href="{{route('employees.index')}}" class="btn btn-primary btn-md active" role="button" aria-pressed="true">
                {{__('My Employees')}}</a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="" class="btn btn-primary btn-md active" role="button" aria-pressed="true">
                {{__('Archive')}}</a>
            </div>
            </div>
            </div><br> --}}
           <!-- Example single danger button -->
