<html dir="ltr" lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/TaskList/public/assets/images/favicon.png">
    <title>AdminBite admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="http://localhost/TaskList/public/assets/extra-libs/taskboard/css/lobilist.css">
    <link rel="stylesheet" href="http://localhost/TaskList/public/assets/extra-libs/taskboard/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/TaskList/public/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Custom CSS -->
    <link href="http://localhost/TaskList/public/dist/css/style.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/TaskList/public/dist/css/style.min.css&quot; rel=&quot;stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" style="display: none;">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin1" data-sidebartype="mini-sidebar" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="boxed">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin1">
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="width: 100%; margin: 0px; display: block;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            {{-- <div class="container-fluid" style="width: 100%;margin:auto;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Taskboard</h4>
                                <div id="todo-lists-basic-demo" class="lobilists single-line ui-sortable"><div class="lobilist-wrapper"><div id="doing" class="lobilist lobilist-primary ps-container ps-theme-default" data-ps-id="1c116962-edd9-6387-f228-216cfc24c6d6"><div class="lobilist-header ui-sortable-handle"><div class="lobilist-actions"><div class="dropdown"><button type="button" data-toggle="dropdown" class="btn btn-xs"><i class="ti-view-grid"></i></button><div class="dropdown-menu dropdown-menu-right"><div class="lobilist-default"></div><div class="lobilist-danger"></div><div class="lobilist-success"></div><div class="lobilist-warning"></div><div class="lobilist-info"></div><div class="lobilist-primary"></div></div></div><button class="btn btn-xs"><i class="ti-pencil"></i></button><button class="btn btn-xs btn-finish-title-editing"><i class="ti-check-box"></i></button><button class="btn btn-xs btn-cancel-title-editing"><i class="ti-close"></i></button><button class="btn btn-xs"><i class="ti-plus"></i></button><button class="btn btn-xs"><i class="ti-trash"></i></button></div><div class="lobilist-title">Delegated</div></div><div class="lobilist-body"><ul class="lobilist-items ui-sortable"></ul><form class="lobilist-add-todo-form hide"><input type="hidden" name="id"><div class="form-group"><input type="text" name="title" class="form-control" placeholder="TODO title"></div><div class="form-group"><textarea rows="2" name="description" class="form-control" placeholder="TODO description"></textarea></div><div class="form-group"><input type="text" name="duedate" class="datepicker form-control hasDatepicker" placeholder="Due Date" id="dp1639475788502"></div><div class="lobilist-form-footer"><button class="btn btn-primary btn-sm btn-add-todo">Add/Update</button><button type="button" class="btn btn-danger btn-sm btn-discard-todo">Cancel</button></div></form></div><div class="lobilist-footer"><button type="button" class="btn-link btn-show-form">Add new</button></div><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div></div><div class="lobilist-wrapper"><div id="todo" class="lobilist lobilist-danger ps-container ps-theme-default" data-ps-id="d20776ef-bc82-4abb-8f47-3ee033fe81a0"><div class="lobilist-header ui-sortable-handle"><div class="lobilist-actions"><div class="dropdown"><button type="button" data-toggle="dropdown" class="btn btn-xs"><i class="ti-view-grid"></i></button><div class="dropdown-menu dropdown-menu-right"><div class="lobilist-default"></div><div class="lobilist-danger"></div><div class="lobilist-success"></div><div class="lobilist-warning"></div><div class="lobilist-info"></div><div class="lobilist-primary"></div></div></div><button class="btn btn-xs"><i class="ti-pencil"></i></button><button class="btn btn-xs btn-finish-title-editing"><i class="ti-check-box"></i></button><button class="btn btn-xs btn-cancel-title-editing"><i class="ti-close"></i></button><button class="btn btn-xs"><i class="ti-plus"></i></button><button class="btn btn-xs"><i class="ti-trash"></i></button></div><div class="lobilist-title">Todo</div></div><div class="lobilist-body"><ul class="lobilist-items ui-sortable"><li data-id="18" class="lobilist-item"><div class="lobilist-item-title">eeeeee</div><div class="lobilist-item-description">eeeeeeeeee</div><div class="lobilist-item-duedate">2022-01-06T22:00:00.000000Z</div><div class="lobilist-item-status">not started</div><div class="lobilist-item-created_at">2021-12-14T08:41:42.000000Z</div><label class="checkbox-inline lobilist-check"><input type="checkbox"></label><div class="todo-actions"><div class="edit-todo todo-action"><i class="ti-pencil"></i></div><div class="delete-todo todo-action"><i class="ti-close"></i></div></div><div class="drag-handler"></div></li></ul><form class="lobilist-add-todo-form hide"><input type="hidden" name="id"><div class="form-group"><input type="text" name="title" class="form-control" placeholder="TODO title"></div><div class="form-group"><textarea rows="2" name="description" class="form-control" placeholder="TODO description"></textarea></div><div class="form-group"><input type="text" name="duedate" class="datepicker form-control hasDatepicker" placeholder="Due Date" id="dp1639475788503"></div><div class="lobilist-form-footer"><button class="btn btn-primary btn-sm btn-add-todo">Add/Update</button><button type="button" class="btn btn-danger btn-sm btn-discard-todo">Cancel</button></div></form></div><div class="lobilist-footer"><button type="button" class="btn-link btn-show-form">Add new</button></div><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div></div><div class="lobilist-wrapper"><div id="Done" class="lobilist lobilist-success ps-container ps-theme-default" data-ps-id="0bd9f531-4e29-f392-3c68-5f451b832cbd"><div class="lobilist-header ui-sortable-handle"><div class="lobilist-actions"><div class="dropdown"><button type="button" data-toggle="dropdown" class="btn btn-xs"><i class="ti-view-grid"></i></button><div class="dropdown-menu dropdown-menu-right"><div class="lobilist-default"></div><div class="lobilist-danger"></div><div class="lobilist-success"></div><div class="lobilist-warning"></div><div class="lobilist-info"></div><div class="lobilist-primary"></div></div></div><button class="btn btn-xs"><i class="ti-pencil"></i></button><button class="btn btn-xs btn-finish-title-editing"><i class="ti-check-box"></i></button><button class="btn btn-xs btn-cancel-title-editing"><i class="ti-close"></i></button><button class="btn btn-xs"><i class="ti-plus"></i></button><button class="btn btn-xs"><i class="ti-trash"></i></button></div><div class="lobilist-title">Archive</div></div><div class="lobilist-body"><ul class="lobilist-items ui-sortable"><li data-id="15" class="lobilist-item"><div class="lobilist-item-title">rrrrrr</div><div class="lobilist-item-description">rrrrrrrrr</div><div class="lobilist-item-duedate">2021-12-14</div><div class="lobilist-item-status">finished</div><div class="lobilist-item-created_at">2021-12-14 10:32:20</div><label class="checkbox-inline lobilist-check"><input type="checkbox"></label><div class="todo-actions"><div class="edit-todo todo-action"><i class="ti-pencil"></i></div><div class="delete-todo todo-action"><i class="ti-close"></i></div></div><div class="drag-handler"></div></li></ul><form class="lobilist-add-todo-form hide"><input type="hidden" name="id"><div class="form-group"><input type="text" name="title" class="form-control" placeholder="TODO title"></div><div class="form-group"><textarea rows="2" name="description" class="form-control" placeholder="TODO description"></textarea></div><div class="form-group"><input type="text" name="duedate" class="datepicker form-control hasDatepicker" placeholder="Due Date" id="dp1639475788504"></div><div class="lobilist-form-footer"><button class="btn btn-primary btn-sm btn-add-todo">Add/Update</button><button type="button" class="btn btn-danger btn-sm btn-discard-todo">Cancel</button></div></form></div><div class="lobilist-footer"><button type="button" class="btn-link btn-show-form">Add new</button></div><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}
               {{-- here --}}
               <div class="container-fluid" style="width: 100%;margin:auto;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Taskboard</h4>
                                <div id="todo-lists-basic-demo" class="lobilists single-line ui-sortable">
                                    <div class="lobilist-wrapper">
                                        <div id="doing" class="lobilist lobilist-primary ps-container ps-theme-default" data-ps-id="1c116962-edd9-6387-f228-216cfc24c6d6">
                                            <div class="lobilist-header ui-sortable-handle">
                                                <div class="lobilist-actions">
                                                    <div class="dropdown">
                                                        <button type="button" data-toggle="dropdown" class="btn btn-xs">
                                                            <i class="ti-view-grid"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <div class="lobilist-default"></div>
                                                                <div class="lobilist-danger"></div>
                                                                <div class="lobilist-success"></div>
                                                                <div class="lobilist-warning"></div>
                                                                <div class="lobilist-info"></div>
                                                                <div class="lobilist-primary"></div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-xs"><i class="ti-pencil"></i></button>
                                                        <button class="btn btn-xs btn-finish-title-editing"><i class="ti-check-box"></i></button>
                                                        <button class="btn btn-xs btn-cancel-title-editing"><i class="ti-close"></i></button>
                                                        <button class="btn btn-xs"><i class="ti-plus"></i></button>
                                                        <button class="btn btn-xs"><i class="ti-trash"></i></button>
                                                    </div>
                                                    <div class="lobilist-title">Delegated</div>
                                                </div>
                                                <div class="lobilist-body"><ul class="lobilist-items ui-sortable"></ul>
                                    <form action="{!!  route('tasks.store')  !!}" method="POST"class="lobilist-add-todo-form hide">
                                        @csrf
                                        <input type="hidden" name="id">
                                        <div class="form-group">
                                        <input type="text" name="title" class="form-control" placeholder="TODO title"></div><div class="form-group">
                                        <textarea rows="2" name="description" class="form-control" placeholder="TODO description"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <input type="text" name="duedate" class="datepicker form-control hasDatepicker" placeholder="Due Date" id="dp1639475788502"></div><div class="lobilist-form-footer">
                                        <button class="btn btn-primary btn-sm btn-add-todo" type="submit">Add/Update</button>
                                        <button type="button" class="btn btn-danger btn-sm btn-discard-todo">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="lobilist-footer">
                                    <button type="button" class="btn-link btn-show-form">Add new</button>
                                </div>
                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                    <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                                    <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="lobilist-wrapper">
                            <div id="todo" class="lobilist lobilist-danger ps-container ps-theme-default" data-ps-id="d20776ef-bc82-4abb-8f47-3ee033fe81a0">
                                <div class="lobilist-header ui-sortable-handle">
                                    <div class="lobilist-actions">
                                        <div class="dropdown">
                                            <button type="button" data-toggle="dropdown" class="btn btn-xs">
                                                <i class="ti-view-grid"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <div class="lobilist-default"></div>
                                                    <div class="lobilist-danger"></div>
                                                    <div class="lobilist-success"></div>
                                                    <div class="lobilist-warning"></div>
                                                    <div class="lobilist-info"></div>
                                                    <div class="lobilist-primary"></div>
                                                </div></div>
                                                <button class="btn btn-xs"><i class="ti-pencil"></i></button>
                                                <button class="btn btn-xs btn-finish-title-editing"><i class="ti-check-box"></i>
                                                </button><button class="btn btn-xs btn-cancel-title-editing"><i class="ti-close"></i></button>
                                                <button class="btn btn-xs"><i class="ti-plus"></i></button>
                                                <button class="btn btn-xs"><i class="ti-trash"></i></button>
                                            </div>
                                            <div class="lobilist-title">Todo</div>
                                        </div><div class="lobilist-body">
                                            <ul class="lobilist-items ui-sortable">
                                                <li data-id="18" class="lobilist-item">
                                                    <div class="lobilist-item-title">eeeeee</div>
                                                    <div class="lobilist-item-description">eeeeeeeeee</div>
                                                    <div class="lobilist-item-duedate">2022-01-06T22:00:00.000000Z</div>
                                                    <div class="lobilist-item-status">not started</div><div class="lobilist-item-created_at">2021-12-14T08:41:42.000000Z</div><label class="checkbox-inline lobilist-check"><input type="checkbox"></label><div class="todo-actions"><div class="edit-todo todo-action"><i class="ti-pencil"></i></div><div class="delete-todo todo-action"><i class="ti-close"></i></div></div><div class="drag-handler"></div></li></ul><form class="lobilist-add-todo-form hide"><input type="hidden" name="id"><div class="form-group"><input type="text" name="title" class="form-control" placeholder="TODO title"></div><div class="form-group"><textarea rows="2" name="description" class="form-control" placeholder="TODO description"></textarea></div><div class="form-group"><input type="text" name="duedate" class="datepicker form-control hasDatepicker" placeholder="Due Date" id="dp1639475788503"></div><div class="lobilist-form-footer"><button class="btn btn-primary btn-sm btn-add-todo">Add/Update</button><button type="button" class="btn btn-danger btn-sm btn-discard-todo">Cancel</button></div></form></div><div class="lobilist-footer"><button type="button" class="btn-link btn-show-form">Add new</button></div><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div></div><div class="lobilist-wrapper"><div id="Done" class="lobilist lobilist-success ps-container ps-theme-default" data-ps-id="0bd9f531-4e29-f392-3c68-5f451b832cbd"><div class="lobilist-header ui-sortable-handle"><div class="lobilist-actions"><div class="dropdown"><button type="button" data-toggle="dropdown" class="btn btn-xs"><i class="ti-view-grid"></i></button><div class="dropdown-menu dropdown-menu-right"><div class="lobilist-default"></div><div class="lobilist-danger"></div><div class="lobilist-success"></div><div class="lobilist-warning"></div><div class="lobilist-info"></div><div class="lobilist-primary"></div></div></div><button class="btn btn-xs"><i class="ti-pencil"></i></button><button class="btn btn-xs btn-finish-title-editing"><i class="ti-check-box"></i></button><button class="btn btn-xs btn-cancel-title-editing"><i class="ti-close"></i></button><button class="btn btn-xs"><i class="ti-plus"></i></button><button class="btn btn-xs"><i class="ti-trash"></i></button></div><div class="lobilist-title">Archive</div></div><div class="lobilist-body"><ul class="lobilist-items ui-sortable"><li data-id="15" class="lobilist-item"><div class="lobilist-item-title">rrrrrr</div><div class="lobilist-item-description">rrrrrrrrr</div><div class="lobilist-item-duedate">2021-12-14</div><div class="lobilist-item-status">finished</div><div class="lobilist-item-created_at">2021-12-14 10:32:20</div><label class="checkbox-inline lobilist-check"><input type="checkbox"></label><div class="todo-actions"><div class="edit-todo todo-action"><i class="ti-pencil"></i></div><div class="delete-todo todo-action"><i class="ti-close"></i></div></div><div class="drag-handler"></div></li></ul><form class="lobilist-add-todo-form hide"><input type="hidden" name="id"><div class="form-group"><input type="text" name="title" class="form-control" placeholder="TODO title"></div><div class="form-group"><textarea rows="2" name="description" class="form-control" placeholder="TODO description"></textarea></div><div class="form-group"><input type="text" name="duedate" class="datepicker form-control hasDatepicker" placeholder="Due Date" id="dp1639475788504"></div><div class="lobilist-form-footer"><button class="btn btn-primary btn-sm btn-add-todo">Add/Update</button><button type="button" class="btn btn-danger btn-sm btn-discard-todo">Cancel</button></div></form></div><div class="lobilist-footer"><button type="button" class="btn-link btn-show-form">Add new</button></div><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div></div>
                                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Innovative Systems. Designed and Developed
                <a href="https://almounkez.com">almounkez</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body ps-container ps-theme-default" data-ps-id="357f5616-7b8f-8929-1d70-05693de8b4b2">
            <ul class="nav customizer-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="mdi mdi-wrench font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="chat" aria-selected="false"><i class="mdi mdi-message-reply font-20"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="mdi mdi-star-circle font-20"></i></a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Dark Theme</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input sidebartoggler" name="collapssidebar" id="collapssidebar">
                            <label class="custom-control-label" for="collapssidebar">Collapse Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="sidebar-position" id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" class="custom-control-input" name="header-position" id="header-position">
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
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a></li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <ul class="mailbox list-style-none m-t-20">
                        <li>
                            <div class="message-center chat-scroll ps-container ps-theme-default" data-ps-id="67c5ceb0-a179-0f03-157f-a260c03983c5">
                                <a href="javascript:void(0)" class="message-item" id="chat_user_1" data-user-id="1">
                                    <span class="user-img"> <img src="http://localhost/TaskList/public/assets/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_2" data-user-id="2">
                                    <span class="user-img"> <img src="http://localhost/TaskList/public/assets/images/users/2.jpg" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_3" data-user-id="3">
                                    <span class="user-img"> <img src="http://localhost/TaskList/public/assets/images/users/3.jpg" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_4" data-user-id="4">
                                    <span class="user-img"> <img src="http://localhost/TaskList/public/assets/images/users/4.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Nirav Joshi</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_5" data-user-id="5">
                                    <span class="user-img"> <img src="http://localhost/TaskList/public/assets/images/users/5.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Sunil Joshi</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_6" data-user-id="6">
                                    <span class="user-img"> <img src="http://localhost/TaskList/public/assets/images/users/6.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Akshay Kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_7" data-user-id="7">
                                    <span class="user-img"> <img src="http://localhost/TaskList/public/assets/images/users/7.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                                <!-- Message -->
                                <a href="javascript:void(0)" class="message-item" id="chat_user_8" data-user-id="8">
                                    <span class="user-img"> <img src="http://localhost/TaskList/public/assets/images/users/8.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Varun Dhavan</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                                <!-- Message -->
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
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
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
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
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src="http://localhost/TaskList/public/assets/images/users/2.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src="http://localhost/TaskList/public/assets/images/users/1.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left bg-primary"> <i class="ti-user"></i></div>
                            <div class="sl-right">
                                <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
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
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src="http://localhost/TaskList/public/assets/images/users/4.jpg"> </div>
                            <div class="sl-right">
                                <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Contrary to popular belief</div>
                            </div>
                        </div>
                        <div class="sl-item">
                            <div class="sl-left"> <img class="rounded-circle" alt="user" src="http://localhost/TaskList/public/assets/images/users/6.jpg"> </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">Stephen</a> <span class="sl-date">5 minutes ago</span></div>
                                <div class="desc">Approve meeting with tiger</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab 3 -->
            </div>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="http://localhost/TaskList/public/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/TaskList/public/assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="http://localhost/TaskList/public/assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="http://localhost/TaskList/public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="http://localhost/TaskList/public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="http://localhost/TaskList/public/dist/js/app.min.js"></script>
    <script src="http://localhost/TaskList/public/dist/js/app.init.boxed.js"></script>
    <script src="http://localhost/TaskList/public/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="http://localhost/TaskList/public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
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
    <script> window.tasks = '[]'; </script>
    <script> window.archive = '[{"id":15,"title":"rrrrrr","description":"rrrrrrrrr","status":"finished","assigned_to":17,"user_id":13,"created_at":"2021-12-14 10:32:20","updated_at":"2021-12-14 10:43:11","duedate":"2021-12-14","name":"tara","email":"tara@gmail.com","password":"$2y$10$jhmV.dlTgGHxzIoHcesbRe9zDmaPx5IFV3I3evsTsdWZrukBPR2Ui","parentId":13,"company_name":"rami"}]'; </script>
    <script> window.assign = '[{"id":18,"title":"eeeeee","description":"eeeeeeeeee","duedate":"2022-01-06T22:00:00.000000Z","status":"not started","assigned_to":17,"user_id":13,"created_at":"2021-12-14T08:41:42.000000Z","updated_at":"2021-12-14T08:50:40.000000Z"}]'; </script>
    <script src="http://localhost/TaskList/public/assets/extra-libs/taskboard/js/task-init.js"></script>



<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>
