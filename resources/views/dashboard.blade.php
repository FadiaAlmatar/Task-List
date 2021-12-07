    @extends('layouts.amz')
    @section('styles')
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

          @if (app()->getLocale() == 'ar')
        <style>
            /* form{margin:auto; */
            /* width:100%;} */
            table{
                width:100%;
                display: flex;
                justify-content: center;
          }
        </style>
        @endif
     @endsection
    @section('content')
    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                {{-- <div class="p-6 bg-white border-b border-gray-200"> --}}
                    @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{__('Good')}} </strong>{{__(Session::get('success')) }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <table class="table table-resposive table-bordered tasksTable" style="width:100%;text-align:center">
                        <thead>
                          <tr class="bg-primary">
                            <th scope="col" style="width: 10%">{{__('Action')}}</th>
                            <th scope="col" style="width: 10%">{{__('Duration')}}</th>
                            <th scope="col" style="width: 8%">{{__('Status')}}</th>
                            <th scope="col" style="width: 25%" >{{__('Task')}}</th>
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
                                        <button class="btn btn-light"data-toggle="modal" data-target="#centralModalSm{!! $task->id !!}"><i style="color:red"class="fa fa-trash" aria-hidden="true"></i></button>
  <!-- Central Modal Small -->
                                        <div class="modal fade" id="centralModalSm{!! $task->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                            <!--Content-->
                                            <div class="modal-content">
                                                <!--Header-->
                                                <div class="modal-header">
                                                <h4 class="modal-title w-100" id="myModalLabel">{{__('Are you sure?')}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <!--Footer-->
                                                <div class="modal-footer">
                                                    <form action="{{route('tasks.destroy', $task->id)}}" method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{__('Cancel')}}</button>
                                                        <button type="submit" class="btn btn-primary btn-sm">{{__('Save changes')}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
<!-- Central Modal Small -->
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
                                @foreach ($assignedfrom_users as $assignedfrom_user)
                                    @if($task->user_id == $assignedfrom_user->id)
                                    <td>{{$assignedfrom_user->name}}</td>
                                    @endif
                                @endforeach
                                @foreach ($assignedto_users as $assignedto_user)
                                    @if($task->assigned_to == $assignedto_user->id)
                                    <td>{{$assignedto_user->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$task->duedate}}</td>
                                <td>{{$task->created_at}}</td>
                                <td>{{$task->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                {{-- </div>
            </div>
        </div> --}}
    </div>
        @endsection
        @section('scripts')
        {{-- for datatable --}}
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"  defer></script>
        <script>
        $(document).ready(function() {
               $('.tasksTable').DataTable();
           });
        </script>
      @endsection




