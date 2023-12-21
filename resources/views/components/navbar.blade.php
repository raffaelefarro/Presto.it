<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand text-white " href="{{route('welcomepage')}}"><img class="logo-custom"  src="/media/logo.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="{{route('welcomepage')}}">Home</a>
        </li>
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.ann')}}
          </a>
          <ul class="dropdown-menu dropdown-category ">
            @auth
            <a class="dropdown-item dropdown-item-category btn btn-primary" href="{{route('announcement_create')}}">{{__('ui.createann')}}</a>
            @endauth
            <a class="dropdown-item dropdown-item-category btn btn-primary" href="{{route('announcement_index')}}">{{__('ui.showann')}}</a>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.categorie')}}
          </a>
          <ul class="dropdown-menu dropdown-category dropdown-custom">
            @foreach ($categories as $category)
            <a class="dropdown-item dropdown-item-category btn btn-primary" href="{{route('category_show', compact('category'))}}">{{__($category->name)}}</a>
            @endforeach
          </ul>
        </li>
        
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> --}}
        
        {{-- <form action="{{route('announcement_search')}}" method="GET" class="d-flex" role="search">
          <input name="searched" class="form-control me-2 search-custom" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success search-custom" type="submit">Search</button>
        </form> --}}
        
        
        {{-- START SEARCH-BAR --}}
        {{-- <li class="ms-lg-3 ms-0">
          
          <form action="{{route('announcement_search')}}" method="GET" class="d-flex" role="search">
            <div class="search">
              <div class="icon"></div>
              <div class="input">
                <input class="p-2" name="searched" type="search" placeholder="Cerca annunci" id="mysearch">
              </div>
              <span id="search-delete" class="clear"></span>
            </div>
          </form>
        </li> --}}
        {{-- END SERACH-BAR --}}
        
        <form action="{{route('announcement_search')}}" method="GET" class="d-flex mt-2" role="search">
          <li class="nav-item d-flex align-items-center">
            <div class="search ms-1">
              <div class="icon"><i class="fa-solid fa-magnifying-glass custom"></i></div>
              <div class="input">
                <input name="searched" type="search" placeholder="{{__('ui.searchann')}}" id="mysearch">
              </div>
              {{-- <span class="clear" onclick="document.getElementById('mysearch').value = ''"></span> --}}
            </div>
          </form>
        </li>
      </ul>
      
      @guest
      <ul class="ms-auto navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link active text-white" href="{{route('register')}}">{{__('ui.registrati-2')}}</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active text-white" href="{{route('login')}}">{{__('ui.accedi')}}</a>
        </li>           
      </ul>            
      @endguest
      
      @auth
      <ul class="ms-auto navbar-nav">
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('ui.saluto-user')}} {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu dropdown-category">
            <li class="nav-item">
              <a class=" dropdown-item dropdown-item-category btn btn-success" href="{{route('user_profile', ['user' => Auth::user()])}}">{{__('ui.personal')}}</a>
            </li>
            @if (Auth::user()->is_revisor)
            <li class="nav-item">
              <a class="dropdown-item dropdown-item-category btn btn-success btn-sm position-relative text-custom" href="{{route('index_show')}}">{{__('ui.revisor')}}
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Announcement::toBeRevisionedCount()}} 
                  <span class="visually-hidden">{{__('ui.mess-non-letti')}}</span>
                </span>
              </a>
            </li>
            
            @endif
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item dropdown-item-category">{{__('ui.logout')}}</button>
            </form>  
          </ul>
        </li>
        @endauth
      </ul>
      
      {{-- LINGUE --}}
      
      <ul class="navbar-nav nav-bar-bandiere ms-5">
        <li class="nav-item">
          <x-_locale lang="it"/>
        </li>
        <li class="nav-item">
          <x-_locale lang="en"/>
        </li>
        <li class="nav-item">
          <x-_locale lang="fr"/>
        </li>
      </ul>
      
    </div>
  </div>
</nav>