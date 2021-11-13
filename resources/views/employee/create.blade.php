<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     <form style="width:90%;margin:auto"action="{!! !empty($employee) ? route('employees.update', $employee) :  route('employees.store')  !!}" method="POST">
                        @csrf
                        @if (!empty($employee))
                            @method('PUT')
                        @endif
                        {{-- <div class="tab-pane fade" id="employees" role="tabpanel" aria-labelledby="employees-tab"> --}}
                            <div class="table-responsive">
                                <table class="table" id="employee">
                                    <caption style="caption-side: top;text-align:center;font-weight:bold;font-size:30px">New Employees</caption>

                                    <thead style="background: rgba(59, 130, 246, 0.5)">
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
                                            <input class="input"type="email" name="email[0]" value= "{{old('email')}}" class="form-control" id="email" placeholder="" required>
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
                        {{-- </div> --}}
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

