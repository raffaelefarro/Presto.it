<x-layout>
    
    {{-- <h2> ACCEDI </h2>
        
        <div class="container-fluid vh-100">
            <div class="row justify-content-center">
                <div class="col-5">
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form method="POST" action="/login" >
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Accedi</button>
                        <a class="btn text-primary" href="{{route('register')}}">Non sei ancora registrato? Clicca qui</a>
                    </form>
                    
                </div>
            </div>
        </div> --}}
        
        <div class="container-fluid main-login">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="wrapper ">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="/login">
                            @csrf
                            <h1>Accedi</h1>
                            <div class="input-box">
                                <input name="email" type="email" placeholder="Email" class="form-control" id="email" aria-describedby="emailHelp" required>
                                <i class='bx bxs-user'></i>
                            </div>
                            <div class="input-box">
                                <input name="password" type="password" placeholder="Password" class="form-control" id="password" required>
                                <i class='bx bxs-lock-alt' ></i>
                            </div>
                            <div class="remember-forgot">
                                <label><input type="checkbox">Ricordami</label>
                            </div>
                            <button type="submit" class="btn-custom btn-form " >Accedi</button>
                            <div class="register-link">
                                <a class="a-login" href="{{route('register')}}">Non sei ancora registrato? Iscriviti</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
    </x-layout>