<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @if (app()->getLocale() == 'ar')
            <style>
            body{
                    direction: rtl;
                }
            li,label,th,td,form{
                text-align: right;
            }
            label,button{
                margin-left:5px;
            }
            label,input,button{
                float:right;
            }
            option{
                text-align: right;
                margin-right: 5px;
            }

        </style>
        @endif
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- {{ $styles ?? '' }} --}}
    @yield('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Content -->
            <main>
                {{-- {{ $slot }} --}}
                @yield('content')
            </main>
        </div>
        {{-- for add employees --}}
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>
    {{-- {{ $scripts ?? '' }} --}}
    @yield('scripts')
</html>
