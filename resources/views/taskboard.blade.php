<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/taskboard/css/lobilist.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/taskboard/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        @media (max-width: 600px) {

            #doing,
            #todo,
            #Done {
                height: 70%;
                margin-top: 100px;
            }

            #form {
                overflow: auto;
                height: 300px;
            }

            .body-card {
                padding-bottom: 0;
                height: 300px;
                overflow: auto;
            }

            .lobilist-wrapper {
                margin-bottom: 0;
                margin-top: 0;
            }
        }

    </style>
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin1" data-sidebartype="mini-sidebar"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="boxed">
        <header class="topbar" data-navbarbg="skin1"></header>
        <div class="page-wrapper" style="width: 100%; margin: 0px; display: block;">
            {{-- here --}}
            <div class="container-fluid" style="width: 100%;margin:auto;">
                <div class="row">
                    <div class="lobilist-wrapper col-lg-4 col-sm-12 lobilists single-line ui-sortable">
                        <div id="doing" class="lobilist lobilist-primary ps-container ps-theme-default"
                            data-ps-id="1c116962-edd9-6387-f228-216cfc24c6d6">
                            <div class="lobilist-header ui-sortable-handle">
                                <div class="lobilist-actions">
                                    <button type="button" class="btn-link btn-show-form" onclick="addfooter()"><i
                                            class="fas fa-plus fa-2x" aria-hidden="true"
                                            style="margin-top:5px;margin-right:10px;color:white"></i></button>
                                </div>
                                <a href="{{ route('delegatedTasks') }}">
                                    <div class="lobilist-title">{{ __('Delegated Tasks') }}</div>
                                </a>
                            </div>
                            <div class="lobilist-body body-card">
                                <ul class="lobilist-items ui-sortable" id="delegated-items">
                                    @foreach ($tasks as $task)
                                        <li data-id="18" class="lobilist-item">
                                            <div class="lobilist-item-title">
                                                {{ $task->title }}
                                            </div>
                                            <div class="lobilist-item-description">
                                                {{ $task->description }}</div>
                                            <button class="btn btn-link"
                                                onclick="showdetails({{ $task->id }})"><small>details</small></button>
                                            <div id="details-{{ $task->id }}" class="hide">
                                                <div class="lobilist-item-duedate">due date:
                                                    {{ $task->duedate }}</div>
                                                <div class="lobilist-item-status">status:
                                                    {{ $task->status }}</div>
                                                @foreach ($users as $user)
                                                    @if ($user->id == $task->user_id)
                                                        <div class="lobilist-item-status">from: {{ $user->name }}
                                                        </div>
                                                    @break
                                                @endif
                                    @endforeach
                                    @foreach ($users as $user)
                                        @if ($user->id == $task->assigned_to)
                                            <div class="lobilist-item-status">to: {{ $user->name }}</div>
                                        @break
                                    @endif
                                    @endforeach
                                    <?php $date = \Carbon\Carbon::parse($task->created_at); ?>
                                    <div class="lobilist-item-created_at">created at:
                                        {{ $date->format('m-d-Y H:i') }}</div>
                                    <?php $date = \Carbon\Carbon::parse($task->updated_at); ?>
                                    <div class="lobilist-item-created_at">updated at:
                                        {{ $date->format('m-d-Y H:i') }}</div>
                            </div>
                            <form action="{!! route('tasks.update', $task->id) !!}}" method="POST" class="lobilist-add-todo-form hide"
                                id="editform-{{ $task->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <input type="text" name="title" value="{{ $task->title }}" class="form-control"
                                        placeholder="TODO title">
                                </div>
                                <div class="form-group">
                                    @error('title')
                                        <p class="help is-danger" style="color: red">
                                            {{ $message }}</p>
                                    @enderror
                                    <textarea rows="2" name="description" class="form-control"
                                        placeholder="TODO description">{{ $task->description }}</textarea>
                                    @error('description')
                                        <p class="help is-danger" style="color: red">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">{{ __('Assigned To') }}</label>
                                    <select name="assigned_to" class="form-control" id="exampleFormControlSelect1"
                                        style="appearance: none;background-image: url('<custom_arrow_image_url_here>');">
                                        @if (!empty($task) && old('assigned_to', $task->assigned_to))
                                            <option value="{{ $task->assigned_to }}" selected>
                                                {{ App\Models\User::where(['id' => $task->assigned_to])->pluck('name')->first() }}
                                            </option>
                                            @foreach ($users as $user)
                                                @if ($task->assigned_to != $user->id)
                                                    <option value="{{ $user->id }}" @if (old('assigned_to') == $user->id) {{ 'selected' }} @endif>
                                                        {{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($users as $user)
                                                @if (Auth::User()->id == $user->id)
                                                    <option value="{{ $user->id }}" @if (old('assigned_to') == $user->id) {{ 'selected' }} @endif
                                                        selected>{{ Auth::User()->name }}</option>
                                                @else
                                                    <option value="{{ $user->id }}" @if (old('assigned_to') == $user->id) {{ 'selected' }} @endif>
                                                        {{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('assigned_to')
                                        <p class="help is-danger" style="color: red">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <input name="duedate" type="date" class="datepicker form-control hasDatepicker"
                                        value=@if (!empty($task)) "{{ $task->duedate }}" @else "{{ \Carbon\Carbon::now()->format('Y-m-d') }}" @endif />
                                    @error('duedate')
                                        <p class="help is-danger" style="color: red">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="lobilist-form-footer">
                                    <button class="btn btn-primary btn-sm btn-add-todo"
                                        type="submit">{{ __('Save') }}</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-discard-todo"
                                        onclick="addfooter()">{{ __('Cancel') }}</button>
                                </div>
                            </form>
                            <div class="todo-actions">
                                <button onclick="editform({{ $task->id }})" type="button"
                                    class="btn btn-link edit-todo todo-action" style="padding-top:0">
                                    <i class="ti-pencil fa-xs"></i>
                                </button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link delete-todo todo-action"
                                        style="padding-top:0"><i class="ti-close fa-xs"></i></button>
                                </form>
                            </div>
                            <div class="drag-handler"></div>
                            </li>
                            @endforeach
                            </ul>
                            <form action="{!! route('tasks.store') !!}" method="POST" class="lobilist-add-todo-form hide"
                                id="form">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                        placeholder="TODO title">
                                </div>
                                <div class="form-group">
                                    @error('title')
                                        <p class="help is-danger" style="color: red">
                                            {{ $message }}</p>
                                    @enderror
                                    <textarea rows="2" name="description" class="form-control"
                                        placeholder="TODO description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="help is-danger" style="color: red">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">{{ __('Assigned To') }}</label>
                                    <select name="assigned_to" class="form-control" id="exampleFormControlSelect1"
                                        style="appearance: none;background-image: url('<custom_arrow_image_url_here>');">
                                        @foreach ($users as $user)
                                            @if (Auth::User()->id == $user->id)
                                                <option value="{{ $user->id }}" @if (old('assigned_to') == $user->id) {{ 'selected' }} @endif selected>
                                                    {{ Auth::User()->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}" @if (old('assigned_to') == $user->id) {{ 'selected' }} @endif>
                                                    {{ $user->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('assigned_to')
                                        <p class="help is-danger" style="color: red">
                                            {{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <input type="date" name="duedate"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                        class="datepicker form-control hasDatepicker" placeholder="Due Date"
                                        id="dp1639475788502">
                                </div>
                                <div class="lobilist-form-footer">
                                    @error('duedate')
                                        <p class="help is-danger" style="color: red">
                                            {{ $message }}</p>
                                    @enderror
                                    <button class="btn btn-primary btn-sm btn-add-todo"
                                        type="submit">{{ __('Add') }}</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-discard-todo"
                                        onclick="addfooter()">{{ __('Cancel') }}</button>
                                </div>
                            </form>
                            <div id="pagination-delegated" class="d-flex justify-content-center"
                                style="margin-bottom:8px;">
                                {!! $tasks->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom:0;margin-top:0;"
                    class="lobilist-wrapper col-lg-4 col-sm-12 lobilists single-line ui-sortable">
                    <div id="todo" class="lobilist lobilist-danger ps-container ps-theme-default"
                        data-ps-id="d20776ef-bc82-4abb-8f47-3ee033fe81a0">
                        <div class="lobilist-header ui-sortable-handle">
                            <div class="lobilist-actions">
                            </div>
                            <a href="{{ route('dashboard') }}">
                                <div class="lobilist-title">{{ __('Todo') }}</div>
                            </a>
                        </div>
                        <div class="lobilist-body body-card">
                            <ul class="lobilist-items ui-sortable">
                                @foreach ($assign as $myassign)
                                    <li data-id="18" class="lobilist-item">
                                        <div class="lobilist-item-title">{{ $myassign->title }}
                                            <div class="dropdown">
                                            </div>
                                            <div class="lobilist-item-description">
                                                {{ $myassign->description }}</div>
                                            <button class="btn btn-link"
                                                onclick="assigndetails({{ $myassign->id }})"><small>details</small></button>
                                            <div id="assign-{{ $myassign->id }}" class="hide">
                                                <div class="lobilist-item-duedate">
                                                    {{ $myassign->duedate }}</div>
                                                <div class="lobilist-item-status">
                                                    {{ $myassign->status }}</div>
                                                <div class="lobilist-item-status">from:
                                                    {{ App\Models\User::where(['id' => $task->user_id])->pluck('name')->first() }}
                                                </div>
                                                <?php $date = \Carbon\Carbon::parse($myassign->created_at); ?>
                                                <div class="lobilist-item-created_at">created at:
                                                    {{ $date->format('m-d-Y H:i') }}</div>
                                                <?php $date = \Carbon\Carbon::parse($myassign->updated_at); ?>
                                                <div class="lobilist-item-created_at">updated at:
                                                    {{ $date->format('m-d-Y H:i') }}</div>
                                            </div>
                                            <form action="{{ route('tasks.status',$myassign->id) }}" method="POST"
                                                class="lobilist-add-todo-form hide"
                                                id="editstatus-{{ $myassign->id }}">
                                                @csrf

                                                <input type="hidden" name="id">
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlSelect1">{{ __('Assigned To') }}</label>
                                                    <select name="status"
                                                        class="form-select form-select-sm"
                                                        aria-label=".form-select-sm example">
                                                        @if ($myassign->status != 'not started')
                                                            <option>{{ __($myassign->status) }}</option>
                                                            <option value="not started">{{ __('not started') }}
                                                            </option>
                                                        @else
                                                            <option value="not started" selected>
                                                                {{ __('not started') }}</option>
                                                        @endif
                                                        <option value="in progress">{{ __('in progress') }}</option>
                                                        <option value="waiting">{{ __('waiting') }}</option>
                                                        <option value="finished">{{ __('finished') }}</option>
                                                        <option value="denied">{{ __('denied') }}</option>
                                                        <option value="forward">{{ __('forward') }}</option>
                                                    </select>
                                                    <input type="hidden" name="taskId" value="{{ $myassign->id }}">
                                                    @error('assigned_to')
                                                        <p class="help is-danger" style="color: red">
                                                            {{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlSelect1">{{ __('Forward To') }}</label>
                                                    <select  name="forwardto"
                                                        class="form-select form-select-sm"
                                                        aria-label=".form-select-sm example">
                                                        <option></option>
                                                        @foreach ($users as $user)
                                                            @unless($user->id == Auth::User()->id)
                                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                                </option>
                                                            @endunless

                                                        @endforeach
                                                    </select>
                                                    @error('forwardto')
                                                        <p class="help is-danger" style="color: black">{{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                                <div class="lobilist-form-footer">
                                                    <button class="btn btn-primary btn-sm btn-add-todo"
                                                        type="submit">{{ __('Save') }}</button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-discard-todo"
                                                        onclick="addfooter()">{{ __('Cancel') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="todo-actions">
                                            <button onclick="editstatus({{ $myassign->id }})" type="button"
                                                class="btn btn-link edit-todo todo-action" style="padding-top:0">
                                                <i class="ti-pencil fa-xs"></i>
                                            </button>
                                            <div class="delete-todo todo-action">
                                                <form action="{{ route('tasks.destroy', $myassign->id) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link delete-todo todo-action"
                                                        style="padding-top:0"><i class="ti-close fa-xs"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="drag-handler"></div>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- pagination --}}
                            <div class="d-flex justify-content-center" style="margin-bottom:8;">
                                {!! $assign->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lobilist-wrapper col-lg-4 col-sm-12 lobilists single-line ui-sortable">
                    <div id="Done" class="lobilist lobilist-success ps-container ps-theme-default"
                        data-ps-id="0bd9f531-4e29-f392-3c68-5f451b832cbd">
                        <div class="lobilist-header ui-sortable-handle">
                            <div class="lobilist-actions">
                            </div>
                            <a href="{{ route('archive') }}">
                                <div class="lobilist-title">{{ __('Archive') }}</div>
                            </a>
                        </div>
                        <div class="lobilist-body body-card">
                            <ul class="lobilist-items ui-sortable">
                                @foreach ($archive as $myarchive)
                                    <li data-id="15" class="lobilist-item">
                                        <div class="lobilist-item-title">
                                            {{ $myarchive->title }}
                                        </div>
                                        <div class="lobilist-item-description">
                                            {{ $myarchive->description }}</div>
                                        <button class="btn btn-link"
                                            onclick="archivedetails({{ $myarchive->id }})"><small>details</small></button>
                                        <div id="archive-{{ $myarchive->id }}" class="hide">
                                            <div class="lobilist-item-created_at">from:
                                                {{ App\Models\User::where(['id' => $task->user_id])->pluck('name')->first() }}
                                            </div>
                                            <div class="lobilist-item-created_at">to:
                                                {{ App\Models\User::where(['id' => $task->assigned_to])->pluck('name')->first() }}
                                            </div>

                                            <div class="lobilist-item-duedate">duedate:
                                                {{ $myarchive->duedate }}</div>
                                            <?php $date = \Carbon\Carbon::parse($myarchive->created_at); ?>
                                            <div class="lobilist-item-created_at">created at:
                                                {{ $date->format('m-d-Y H:i') }}</div>
                                            <?php $date = \Carbon\Carbon::parse($myarchive->updated_at); ?>
                                            <div class="lobilist-item-created_at">updated at:
                                                {{ $date->format('m-d-Y H:i') }}</div>
                                        </div>
                                        <div class="drag-handler">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="d-flex justify-content-center" style="margin-bottom:8;">
                                {!! $archive->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="footer text-center">All Rights Reserved by Innovative Systems. Designed and Developed<a
            href="https://almounkez.com">almounkez</a>.</footer>
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body ps-container ps-theme-default" data-ps-id="357f5616-7b8f-8929-1d70-05693de8b4b2">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab"
                        aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                        role="tab" aria-controls="pills-contact" aria-selected="false"><i
                            class="mdi mdi-star-circle font-20"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Dark Theme</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input sidebartoggler" name="collapssidebar"
                                id="collapssidebar">
                            <label class="custom-control-label" for="collapssidebar">Collapse Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="sidebar-position"
                                id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="header-position"
                                id="header-position">
                            <label class="custom-control-label" for="header-position">Fixed Header</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-logobg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-logobg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-logobg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-logobg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-logobg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-logobg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-navbarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-navbarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-navbarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-navbarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-navbarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-navbarbg="skin6"></a></li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-sidebarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-sidebarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-sidebarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-sidebarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-sidebarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                    data-sidebarbg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="mailbox list-style-none m-t-20">
                        <li>
                            <div class="message-center chat-scroll ps-container ps-theme-default"
                                data-ps-id="67c5ceb0-a179-0f03-157f-a260c03983c5">
                                <a href="javascript:void(0)" class="message-item" id="chat_user_1" data-user-id="1">
                                    <span class="user-img"> <img
                                            src="http://localhost/TaskList/public/assets/images/users/1.jpg" alt="user"
                                            class="rounded-circle"> <span
                                            class="profile-status online pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just
                                            see the my admin!</span> <span class="time">9:30 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_2" data-user-id="2">
                                    <span class="user-img"> <img
                                            src="http://localhost/TaskList/public/assets/images/users/2.jpg" alt="user"
                                            class="rounded-circle"> <span
                                            class="profile-status busy pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've
                                            sung a song! See you at</span> <span class="time">9:10 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_3" data-user-id="3">
                                    <span class="user-img"> <img
                                            src="http://localhost/TaskList/public/assets/images/users/3.jpg" alt="user"
                                            class="rounded-circle"> <span
                                            class="profile-status away pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">I am
                                            a singer!</span> <span class="time">9:08 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_4" data-user-id="4">
                                    <span class="user-img"> <img
                                            src="http://localhost/TaskList/public/assets/images/users/4.jpg" alt="user"
                                            class="rounded-circle"> <span
                                            class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Nirav Joshi</h5> <span class="mail-desc">Just
                                            see the my admin!</span> <span class="time">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_5" data-user-id="5">
                                    <span class="user-img"> <img
                                            src="http://localhost/TaskList/public/assets/images/users/5.jpg" alt="user"
                                            class="rounded-circle"> <span
                                            class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sunil Joshi</h5> <span class="mail-desc">Just
                                            see the my admin!</span> <span class="time">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_6" data-user-id="6">
                                    <span class="user-img"> <img
                                            src="http://localhost/TaskList/public/assets/images/users/6.jpg" alt="user"
                                            class="rounded-circle"> <span
                                            class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Akshay Kumar</h5> <span class="mail-desc">Just
                                            see the my admin!</span> <span class="time">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_7" data-user-id="7">
                                    <span class="user-img"> <img
                                            src="http://localhost/TaskList/public/assets/images/users/7.jpg" alt="user"
                                            class="rounded-circle"> <span
                                            class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just
                                            see the my admin!</span> <span class="time">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_8" data-user-id="8">
                                    <span class="user-img"> <img
                                            src="http://localhost/TaskList/public/assets/images/users/8.jpg" alt="user"
                                            class="rounded-circle"> <span
                                            class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Varun Dhavan</h5> <span class="mail-desc">Just
                                            see the my admin!</span> <span class="time">9:02 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                        </li>
                    </ul>
                </div>
                <!-- End Tab 2 -->
                <!-- Tab 3 -->
                <div class="tab-pane fade p-15" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h6 class="m-t-20 m-b-20">Activity Timeline</h6>
                    <div class="steamline">
                        <div class="sl-item">
                            <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span>
                                </div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="http://localhost/TaskList/public/assets/images/users/2.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes
                                        ago</span></div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="http://localhost/TaskList/public/assets/images/users/1.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes
                                        ago</span></div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span>
                                </div>
                                <div class="desc">you can write anything </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-info"><i class="fas fa-image"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Send documents to Clark</div>
                                <div class="desc">Lorem Ipsum is simply </div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="http://localhost/TaskList/public/assets/images/users/4.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes
                                        ago</span></div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user"
                                    src="http://localhost/TaskList/public/assets/images/users/6.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes
                                        ago</span></div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
    </aside>
    {{-- <div class="chat-windows"></div> --}}
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="http://localhost/TaskList/public/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/TaskList/public/assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js">
    </script>
    <script src="http://localhost/TaskList/public/assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="http://localhost/TaskList/public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="http://localhost/TaskList/public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="http://localhost/TaskList/public/dist/js/app.min.js"></script>
    <script src="http://localhost/TaskList/public/dist/js/app.init.boxed.js"></script>
    <script src="http://localhost/TaskList/public/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    {{-- <script src="http://localhost/TaskList/public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script> --}}
    <script src="http://localhost/TaskList/public/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="http://localhost/TaskList/public/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="http://localhost/TaskList/public/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="http://localhost/TaskList/public/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="http://localhost/TaskList/public/assets/extra-libs/taskboard/js/lobilist.js"></script>
    <script src="http://localhost/TaskList/public/assets/extra-libs/taskboard/js/lobibox.min.js"></script>
    <script src="http://localhost/TaskList/public/assets/extra-libs/taskboard/js/task-init.js"></script>
    <script>
        function addfooter() {
            $("#form").toggle();
            $("#delegated-items").toggle();
        }
    </script>
    <script>
        function showselect() {
            $("#sta").toggle();
        }
    </script>
    <script>
        function editform(id) {
            $("#editform-" + id).toggle();
        }
    </script>
    <script>
        function editstatus(id) {
            $("#editstatus-" + id).toggle();
        }
    </script>
    <script>
        function showdetails(id) {
            $("#details-" + id).toggle();
        }
    </script>
    <script>
        function assigndetails(id) {
            $("#assign-" + id).toggle();
        }
    </script>
    <script>
        function archivedetails(id) {
            $("#archive-" + id).toggle();
        }
    </script>
</body>

</html>
