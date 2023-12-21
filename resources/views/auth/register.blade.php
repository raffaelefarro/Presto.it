<x-layout>
    
    {{-- <h2> REGISTRATI </h2>
        
        <div class="container-fluid vh-100">
            <div class="row justify-content-center">
                <div class="col-5">
                    
                    
                    
                    <form method="POST" action="/register" >
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome Utente</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="confirmpassword" class="form-label">Conferma Password</label>
                            <input name="password_confirmation" type="password" class="form-control" id="confirmpassword" aria-describedby="emailHelp">
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Registrati</button>
                    </form>
                    
                </div>
            </div>
        </div> --}}
        
        <div class="container-fluid main-login">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="wrapper ">
                        <form method="POST" action="/register">
                            @csrf
                            <h1>Registrati</h1>
                            <div class="input-box">
                                {{-- <label for="name" class="form-label"></label> --}}
                                <input name="name" type="text"  placeholder="Nome Utente" class="form-control" id="name" aria-describedby="emailHelp">
                                <i class='bx bxs-user'></i>
                                
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            
                            
                            <div class="input-box">
                                {{-- <label for="email" class="form-label"></label> --}}
                                <input name="email" type="email" placeholder="Email" class="form-control" id="email" aria-describedby="emailHelp">
                                <i class='bx bx-envelope' ></i>
                                
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            
                            
                            <div class="input-box">
                                {{-- <label for="password" class="form-label"></label> --}}
                                <input name="password" type="password" placeholder="Password" class="form-control" id="password">
                                <i class='bx bxs-lock-alt' ></i>
                                
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            
                            
                            
                            
                            <div class="input-box ">
                                {{-- <label for="confirmpassword" class="form-label"></label> --}}
                                
                                <input name="password_confirmation" type="password"  placeholder="Conferma Password" class="form-control" id="confirmpassword" aria-describedby="emailHelp">
                                <span class="eye" onclick="myFuction()">
                                    <i id="hide1" class="fa-solid fa-eye"></i>
                                    <i id="hide2" class="fa-solid fa-eye-slash"></i>
                                </span>
                                
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                            <script>
                                function myFuction(){
                                    let x = document.getElementById("confirmpassword");
                                    let y = document.getElementById("hide1");
                                    let z = document.getElementById("hide2");
                                    
                                    if(x.type === "password"){
                                        x.type = "text";
                                        y.style.display = "block";
                                        z.style.display = "none";
                                    }
                                    else{
                                        x.type = "password";
                                        y.style.display = "none";
                                        z.style.display = "block";
                                    }
                                }
                            </script>
                            
                            <button type="submit" class="btn-custom btn-form ">Registrati</button>
                            
                            
                            <div class="register-link ">
                                <p>Sei iscritto? <a class="a-login"  href="{{route('login')}}">Accedi </a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </x-layout>