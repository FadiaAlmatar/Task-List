{{-- show all tasks finished --}}
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
                    <table class="table table-bordered tasksTable" style="width:100%;text-align:center">
                        <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">Archive</caption>
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
                              @if($task->status == "finished")
                               <tr>
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{ App\Models\User::where(['id' => $task->user_id])->pluck('name')->first()}}</td>
                                <td>{{$task->status}} </td>
                                <td>{{$task->duedate}}
                              </tr>
                              @endif
                              @endforeach
                          </tbody>
                    </table>
                    <br>
                    {{-- <a href="{{route('dashboard')}}"><button class="btn btn-danger" type="submit"><i class="fa fa-home" aria-hidden="true"></i></button></a> --}}
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
