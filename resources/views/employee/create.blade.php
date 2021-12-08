@extends('layouts.amz')
@section('content')
    <div class="py-12">
        <form class="create-employee"action="{!! !empty($employee) ? route('employees.update', $employee) :  route('employees.store')  !!}" method="POST">
            @csrf
                @if (!empty($employee))
                    @method('PUT')
                @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">{{__('Employee Name')}}</label>
                <input name="name"type="text" class="form-control" id="exampleFormControlInput1" value="@if(!empty($employee)) {{$employee->name}} @else {{ old('name') }} @endif" placeholder="">
                @error('name')
                <p class="help is-danger" style="color: red">{{ $message }}</p>
                @enderror
            </div><br>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('Employee Email')}}</label>
                <input name="email"type="email" class="form-control" id="exampleFormControlInput1" value="@if(!empty($employee)){{$employee->email}}@else{{ old('email') }}@endif"placeholder="">
                @error('email')
                <p class="help is-danger"style="color: red">{{ $message }}</p>
                @enderror
            </div><br>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{__('Employee Password')}}</label>
                <input name="password"type="password" class="form-control" id="exampleFormControlInput1" value="{{ old('password') }}" placeholder="">
                @error('password')
                <p class="help is-danger"style="color: red">{{ $message }}</p>
                @enderror
            </div>
        <br><br><br>
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> {{__('Save')}}</button>
            <a href="{{route('dashboard')}}"><button type="button" class="btn btn-danger">{{__('Cancel')}}</button></a>
        </form>

    </div>
@endsection

