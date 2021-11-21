<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form style="width:50%;margin:auto"action="{!! !empty($task) ? route('tasks.update', $task) :  route('tasks.store')  !!}" method="POST">
                        @csrf
                        @if (!empty($task))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{__('Title Task')}}</label>
                            <input name="title"type="text" class="form-control" id="exampleFormControlInput1" value="@if(!empty($task)) {{$task->title}} @else {{ old('title') }} @endif"placeholder="{{__('Enter title for task')}}">
                            @error('title')
                            <p class="help is-danger" style="color: red">{{ $message }}</p>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{__('Description Task')}}</label>
                            <textarea name="description"class="form-control" id="exampleFormControlTextarea1" rows="3">@if(!empty($task)) {{$task->description}} @else {{old('description')}} @endif</textarea>
                            @error('description')
                            <p class="help is-danger"style="color: red">{{ $message }}</p>
                            @enderror
                        </div><br>
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">{{__('Assigned To')}}</label>
                        <select name="assigned_to"class="form-control" id="exampleFormControlSelect1">
                            @if (!empty($task) && old('assigned_to', $task->assigned_to))
                            <option value="{{ $task->assigned_to}}" selected>{{ App\Models\User::where(['id' => $task->assigned_to])->pluck('name')->first() }}</option>
                                @foreach ($users as $user)
                                    @if($task->assigned_to <> $user->id)
                                     <option value="{{$user->id}}" @if (old('assigned_to') == $user->id) {{ 'selected' }} @endif>{{$user->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($users as $user)
                                    @if(Auth::User()->id == $user->id)
                                     <option value="{{$user->id}}" @if (old('assigned_to') == $user->id) {{ 'selected' }} @endif selected>{{Auth::User()->name}}</option>
                                    @else
                                      <option value="{{$user->id}}" @if (old('assigned_to') == $user->id) {{ 'selected' }} @endif>{{$user->name}}</option> --}}
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        @error('assigned_to')
                        <p class="help is-danger" style="color: red">{{ $message }}</p>
                        @enderror
                        </div><br>
                        <div class="form-group">
                        <label for="exampleFormControlSelect2">{{__('Due Date')}}</label>
                        <input name="duedate"type="date" value=@if(!empty($task)) "{{$task->duedate->format('Y-m-d')}}" @else "{{\Carbon\Carbon::now()->format('Y-m-d')}}" @endif/>
                        @error('duedate')
                            <p class="help is-danger" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <br><br><br>
                        @if (empty($task))
                          <button class="btn btn-primary" type="submit">{{__('Submit task')}}</button>
                        @else
                          <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                        @endif

                    </form>
                    <a style="float:right"href="{{route('dashboard')}}"><button class="btn btn-danger" type="submit">{{__('Cancel')}}</button></a><br>
                    <br>
                    {{-- <a href="{{route('dashboard')}}"><button class="btn btn-danger" type="submit"><i class="fa fa-home" aria-hidden="true"></i></button></a> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


