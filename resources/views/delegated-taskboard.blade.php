<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png')}}">
    <title>AdminBite admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/taskboard/css/lobilist.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/extra-libs/taskboard/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css" rel="stylesheet')}}">
</head>

<body>
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Sample Taskboard</h4>
                                <div id="todo-lists-basic-demo"></div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Custom Control Taskboard</h4>
                                <div id="todo-lists-demo-controls"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/taskboard/js/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <script src="{{ asset('dist/js/app.min.js')}}"></script>
    <script src="{{ asset('dist/js/app.init.boxed.js')}}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/extra-libs/taskboard/js/lobilist.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/taskboard/js/lobibox.min.js')}}"></script>
    <script> window.tasks = '<?php echo $tasks ?>'; </script>
    <script> window.from = '<?php echo $fromusers ?>'; </script>
    <script> window.to = '<?php echo $tousers ?>'; </script>
    <script src="{{ asset('assets/extra-libs/taskboard/js/task-init.js')}}"></script>
</body>

</html>
