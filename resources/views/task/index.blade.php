{{-- show all tasks assigned to me --}}
<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      </x-slot>
      <x-slot name="scripts">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function() {
               $('.tasksTable').DataTable();
           });
        </script>
      </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form style="width:100%;margin:auto"action="{{route('tasks.store_status')}}" method="POST">
                        @csrf
                    <table class="table table-bordered tasksTable" style="width:100%;text-align:center">
                        <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">{{__('Assignment Tasks')}}</caption>
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
                                @if(\Carbon\Carbon::now() > $task->duedate)
                                <tr style="background: #ff7676">
                                @elseif(\Carbon\Carbon::now()->diffInDays($task->duedate) <= 3 and \Carbon\Carbon::now()->diffInDays($task->duedate) >= 1)
                                <tr style="background:#ffcf76;">
                                @else
                                <tr style="background:#98FF98;">
                                @endif
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{ App\Models\User::where(['id' => $task->user_id])->pluck('name')->first()}}</td>
                                <td>
                                    <div class="form-check">
                                        <select name="status[]"class="form-select form-select-sm" aria-label=".form-select-sm example">
                                          @if($task->status <> "not started")
                                          <option>{{$task->status}}</option>
                                          @else
                                          <option value="not started" selected>{{__('not started')}}</option>
                                           @endif
                                          {{-- <option value="not started">{{__('not started')}}</option> --}}
                                          <option value="in progress">{{__('in progress')}}</option>
                                          <option value="waiting">{{__('waiting')}}</option>
                                          <option value="finished">{{__('finished')}}</option>
                                          <option value="denied">{{__('denied')}}</option>
                                          {{-- @endif --}}
                                        </select>
                                        <input type="hidden" name="taskId[]" value="{{$task->id}}">
                                    </div>
                                </td>
                                <td>{{$task->duedate}}</td>
                              </tr>

                              @endforeach
                          </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                    </form>
                    <br>
                    <a href="{{route('dashboard')}}"><button class="btn btn-danger" type="submit">{{__('Cancel')}}</button></a>
                    <br>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
