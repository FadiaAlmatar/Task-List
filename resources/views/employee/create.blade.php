@extends('layouts.amz')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     <form action="{!! !empty($employee) ? route('employees.update', $employee) :  route('employees.store')  !!}" method="POST">
                        @csrf
                        @if (!empty($employee))
                            @method('PUT')
                        @endif
                            <div class="table-responsive">
                                <table class="table" id="employee">
                                    {{-- <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">{{__('New Employees')}}</caption> --}}

                                    <thead">
                                    <tr>
                                        <th></th>
                                        <th style="width: 30%">{{__('Name')}}</th>
                                        <th style="width: 35%">{{__('Email')}}</th>
                                        <th style="width: 30%">{{__('Password')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="cloning_row" id="0">
                                        <td> </td>
                                        <td>
                                            <div class="form-group">
                                            <input class="input"type="text" name="name[0]" value= "{{old('name')}}" class="form-control" id="name" placeholder="" required>
                                            @if($errors->has('name.0'))
                                                @foreach($errors->get('name.0') as $error)
                                                <p class="help is-danger">{{ $error }}</p>
                                                @endforeach
                                            @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                            <input class="input"type="email" name="email[0]" value= "{{old('email')}}" class="form-control" id="email" placeholder="" unique required>
                                            @if($errors->has('email.0'))
                                                @foreach($errors->get('email.0') as $error)
                                                <p class="help is-danger">{{ $error }}</p>
                                                @endforeach
                                            @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                            <input class="input"type="password" name="password[0]" value= "{{old('password')}}" class="form-control" id="password" placeholder="" required>
                                            @if($errors->has('password.0'))
                                                @foreach($errors->get('password.0') as $error)
                                                <p class="help is-danger">{{ $error }}</p>
                                                @endforeach
                                            @endif
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <button type="button" class="btn_add btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> {{ __('Add employee') }}</button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button style="float: right;"class="btn btn-primary" type="submit">{{__('Save')}}</button><br>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>


  $(document).ready(function(){
            $(document).on('click', '.btn_add', function () {
            let trCount = $('#employee').find('tr.cloning_row:last').length;
            let numberIncr = trCount > 0 ? parseInt($('#employee').find('tr.cloning_row:last').attr('id')) + 1 : 0;
            $('#employee').find('tbody').append($('' +
                '<tr class="cloning_row" id="' + numberIncr + '">' +
                '<td><button type="button" class="btn btn-danger btn-sm delegated-btn"><i class="fa fa-minus"></i></button></td>' +
                '<td><input class="input"type="text" name="name['+ numberIncr + ']" class=" form-control"></td>' +
                '<td><input class="input"type="email" name="email['+ numberIncr + ']" class=" form-control"></td>' +
                '<td><input class="input"type="password" name="password[' + numberIncr + ']" class="form-control"></td>' +
                '</tr>'));
        });
        $(document).on('click', '.delegated-btn', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
    });
    </script>
@endsection
