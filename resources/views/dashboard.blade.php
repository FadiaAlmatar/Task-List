<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
              <a class="dropdown-item" href="{{route('tasks.printCreated')}}">{{__('PDF Created Tasks')}}</a>
              <a href="{{route('tasks.printAssign')}}" class="dropdown-item">{{__('PDF To Do List')}}</a>
            </div>
          </div><br><br>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-resposive table-bordered tasksTable" style="width:100%;text-align:center">
                        <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">{{__('Created Tasks')}}</caption>
                        <thead>
                          <tr class="bg-primary">
                            <th scope="col" style="width: 10%">{{__('Action')}}</th>
                            <th scope="col" style="width: 10%">{{__('Duration')}}</th>
                            <th scope="col" style="width: 8%">{{__('Status')}}</th>
                            <th scope="col" style="width: 25%">{{__('Task')}}</th>
                            <th scope="col" style="width: 5%">{{__('Assigned From')}}</th>
                            <th scope="col" style="width: 5%">{{__('Assigned To')}}</th>
                            <th scope="col" style="width: 15%">{{__('Due Date')}}</th>
                            <th scope="col" style="width: 12%">{{__('create Date')}}</th>
                            <th scope="col" style="width: 18%">{{__('update Date')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td scope="row">
                                    <a href="{{route('tasks.edit',$task->id)}}"><button type="button" class="btn btn-outline-primary"><i style="color:black"class="fa fa-edit" ></i></button></a>
                                    <form action="{{route('tasks.destroy', $task->id)}}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-light chat-send-btn"><i style="color:red"class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                                <td>
                                    @if(\Carbon\Carbon::now()->diffInDays($task->duedate) <= 0)
                                    <small style="background: #ff7676; padding:4px;"><i class="far fa-clock"></i> < 24 {{__('hours')}}</small>
                                @elseif(\Carbon\Carbon::now()->diffInDays($task->duedate) <= 3 and \Carbon\Carbon::now()->diffInDays($task->duedate) > 0)
                                <small style="background: #ffcf76;;padding:4px;"><i class="far fa-clock"></i> {{\Carbon\Carbon::now()->diffInDays($task->duedate)}} {{__('days')}}</small>
                                @else
                                <small style="background: #98FF98;padding:4px;"><i class="far fa-clock"></i> {{\Carbon\Carbon::now()->diffInDays($task->duedate)}} {{__('days')}}</small>
                                @endif

                                </td>
                                <td>{{__($task->status)}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{ App\Models\User::where(['id' => $task->user_id])->pluck('name')->first()}}</td>
                                <td>{{ App\Models\User::where(['id' => $task->assigned_to])->pluck('name')->first()}}</td>
                                <td>{{$task->duedate}}</td>
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
    <x-slot name="scripts">
        {{-- for datatable --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"  defer></script>
        {{-- for dropdown button --}}
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function() {
               $('.tasksTable').DataTable();
           });
        </script>
      </x-slot>
</x-app-layout>



