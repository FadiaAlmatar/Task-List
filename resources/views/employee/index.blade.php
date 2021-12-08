@extends('layouts.amz')
    @section('styles')
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
     @endsection
     @section('content')
    <div class="py-12">
        <div style="padding: 10px">
            <a href="{{route('employees.create')}}"><button type="button" class="btn_add btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> </button></a>

        <table class="table table-bordered table-responsive employeesTable" >
            <thead>
                <tr>
                    @if(Auth::User()->parentId == null)
                    <th scope="col" style="width: 50%">{{__('Action')}}</th>@endif
                    <th scope="col" style="width: 50%">{{__('Email')}}</th>
                    <th scope="col" style="width: 50%">{{__('Name')}}</th>
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
                        <td>{{$user->email}}</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        <a href="{{route('dashboard')}}"><button class="btn btn-danger" type="button" style="margin:15px">{{__('Back')}}</button></a>

        </div>
    </div><br>
    @section('scripts')
        {{-- for datatable --}}
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"  defer></script>
        <script>
        $(document).ready(function() {
               $('.employeesTable').DataTable();
           });
        </script>
      @endsection
      @endsection
