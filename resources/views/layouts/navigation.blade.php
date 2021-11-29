<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('dashboard')}}">
      <h3 style="color:white;">{{ Auth::User()->company_name }}</h3></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}"  style="color: white">{{__('Home')}}</a>
          </li>
          <li class="nav-item">
          <a  style="color: white"class="nav-link" href="{{route('tasks.index')}}">{{__('My Tasks')}}</a>
          </li>

          <li class="nav-item dropdown">
            <a  style="color: white"class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('lang')}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{asset('/locale/ar')}}">{{ __('Ar') }}</a></li>
              <li><a class="dropdown-item" href="{{asset('/locale/en')}}">{{ __('En') }}</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
             {{ __('account') }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             @auth
             <li><a class="nav-link">
            <form action="{{ route('logout') }}" method="post">
               @csrf
               <input type="submit" style="background-color: white;" value="{{ __('Log Out') }}">
             </form>
            </a></li>@endauth
           </ul>
         </li>
        </ul>
      </div>
      <div style="float: right;">
        <div style="color: white">{{ Auth::user()->name }}</div>
      </div>

    </div>
  </nav>
