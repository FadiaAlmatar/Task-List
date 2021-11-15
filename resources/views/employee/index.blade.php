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
               $('.employeesTable').DataTable();
           });
        </script>
      </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered employeesTable" style="width:100%;text-align:center">
                        <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">{{__('Employees')}} {{Auth::User()->company_name}}</caption>
                        <thead>
                            <tr>
                              <th scope="col" style="width: 20%">{{__('Action')}}</th>
                              <th scope="col" style="width: 15%">{{__('Name')}}</th>
                              <th scope="col" width="30%">{{__('Email')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($users as $user)
                              <tr>
                                <td scope="row">
                                    <a href="{{route('employees.edit', $user)}}"><button class="btn btn-outline-primary"><i style="color:black"class="fa fa-edit" ></i></button></a>
                                    <a><button type="button" class="btn btn-outline-primary"><i style="color:black"class="fa fa-trash" aria-hidden="true"></i></button></a>
                                </td>
                                   <td>{{$user->name}}</td>
                                   <td>{{$user->email}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                    </table>
                    <a href="{{route('dashboard')}}"><button class="btn btn-danger" type="submit">{{__('Back')}}</button></a><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
