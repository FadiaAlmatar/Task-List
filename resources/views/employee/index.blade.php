@extends('layouts.amz')
    @section('styles')
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
     @endsection
     @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Auth::User()->parentId == null) <a href="{{route('employees.create')}}"><button type="button" class="btn_add btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> </button></a>@endif
                    <table class="table table-bordered employeesTable" style="width:100%;text-align:center">
                        <thead>
                            <tr>
                              @if(Auth::User()->parentId == null)<th scope="col" style="width: 20%">{{__('Action')}}</th>@endif
                              <th scope="col" style="width: 15%">{{__('Name')}}</th>
                              <th scope="col" width="30%">{{__('Email')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($users as $user)
                              <tr>
                                @if(Auth::User()->parentId == null)
                                <td scope="row">
                                    <a href="{{route('employees.edit', $user->id)}}"><button class="btn btn-outline-primary"><i style="color:black"class="fa fa-edit" ></i></button></a>
                                    <form action="{{route('employees.destroy', $user->id)}}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-light chat-send-btn"><i style="color:red"class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>@endif
                                   <td>{{$user->name}}</td>
                                   <td>{{$user->email}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                    </table>
                    <a href="{{route('dashboard')}}"><button class="btn btn-danger" type="button">{{__('Back')}}</button></a><br>
                </div>
            </div>
        </div>
    </div>
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
      @endsection
