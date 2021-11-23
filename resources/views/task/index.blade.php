{{-- show all tasks assigned to me --}}
<x-app-layout>
    <x-slot name="styles">
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      </x-slot>
      <x-slot name="scripts">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
                                <th scope="col" style="width: 13%">{{__('Assigned From')}}</th>
                                <th scope="col" style="width: 15%">{{__('Status')}}</th>
                                <th scope="col" style="width: 13%">{{__('Forward to')}}</th>
                                <th scope="col" style="width: 24%">{{__('Due Date')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    @if(\Carbon\Carbon::now() > $task->duedate)
                                      <tr style="background: #ff7676">
                                    @elseif(\Carbon\Carbon::now()->diffInDays($task->duedate) <= 3 and \Carbon\Carbon::now()->diffInDays($task->duedate) >= 0)
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
                                                <option>{{__($task->status)}}</option>
                                                <option value="not started">{{__('not started')}}</option>
                                            @else
                                                <option value="not started" selected>{{__('not started')}}</option>
                                            @endif
                                            <option value="in progress">{{__('in progress')}}</option>
                                            <option value="waiting">{{__('waiting')}}</option>
                                            <option value="finished">{{__('finished')}}</option>
                                            <option value="denied">{{__('denied')}}</option>
                                            <option value="forward">{{__('forward')}}</option>
                                            </select>
                                            <input type="hidden" name="taskId[]" value="{{$task->id}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <select name="forwardto[]"class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <option></option>
                                                @foreach ($users as $user)
                                                 <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                           </select>
                                           @error('forwardto[]')
                                           <p class="help is-danger" style="color: black">{{ $message }}</p>
                                           @enderror
                                        </div>
                                    </td>
                                    <td>{{$task->duedate->format('Y-m-d')}}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    <button class="btn btn-primary" type="submit">{{__('Save')}}</button><br>
                    </form>
                    <br>
                    <a href="{{route('dashboard')}}"><button class="btn btn-danger" type="submit">{{__('Cancel')}}</button></a>
                    <a href="{{route('tasks.printAssign')}}" class="btn btn-danger btn-md active" role="button" aria-pressed="true">PDF</a><br><br>

                    <br>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
