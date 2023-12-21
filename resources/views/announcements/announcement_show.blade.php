<x-layout>
    <div class="container min-vh-100">
        <div class="row mt-5">
            <div class="col-12 col-md-12 mt-3">
                <p class="display-5 text-center">Caricato da: <strong>{{$announcement->user->name}}</strong></p>
                <p class="fw-semibold display-3 text-center">{{$announcement->name}}</p>
                <p class="text-center">{{$announcement->description}}</p>
                <p class="text-center">{{$announcement->price}} €</p>
                
                @if (Auth::user() &&  Auth::user()->is_revisor == 1)
                <div class="container">
                    <div class="row">
                        @if ($announcement->user->email != Auth::user()->email)
                        
                        
                        @if(is_null($announcement->is_accepted))
                        <div class="col-6 d-flex justify-content-center">
                            <form method="POST" action="{{route('accept_announcement', ['announcement'=>$announcement])}}">
                                @csrf
                                @method('PATCH')
                                <span></span>
                                <button class="btn btn-success">Accetta <i class="fa-solid fa-check"></i></button>
                            </form>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <form method="POST" action="{{route('reject_announcement', ['announcement'=>$announcement])}}">
                                @csrf
                                @method('PATCH')
                                <span></span>
                                <button class="btn btn-danger">Rifiuta <i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </div>
                        
                        @elseif($announcement->is_accepted == 0)
                        <div class="col-6 d-flex justify-content-center">
                            <form method="POST" action="{{route('accept_announcement', ['announcement'=>$announcement])}}">
                                @csrf
                                @method('PATCH')
                                <span></span>
                                <button class="btn btn-success">Accetta <i class="fa-solid fa-check"></i></button>
                            </form>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <form method="POST" action="{{route('review_announcement', ['announcement'=>$announcement])}}">
                                @csrf
                                @method('PATCH')
                                <span></span>
                                <button class="btn btn-warning">Revisiona <i class="fa-solid fa-triangle-exclamation"></i></button>
                            </form>
                        </div>
                        
                        @elseif($announcement->is_accepted == 1)
                        <div class="col-6 col-md-6 d-flex justify-content-center">
                            <form method="POST" action="{{route('review_announcement', ['announcement'=>$announcement])}}">
                                @csrf
                                @method('PATCH')
                                <span></span>
                                <button class="btn btn-warning ">Revisiona <i class="fa-solid fa-triangle-exclamation"></i></button>
                            </form>
                        </div>
                        <div class="col-6 col-md-6 d-flex justify-content-center">
                            <form method="POST" action="{{route('reject_announcement', ['announcement'=>$announcement])}}">
                                @csrf
                                @method('PATCH')
                                <span></span>
                                <button class="btn btn-danger">Rifiuta  <i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
                
                @endif
                
                
            </div>

            <!-- Inizio Swiper -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                
                                @forelse ($announcement->images as $image)
                                <div class="swiper-slide active">
                                    <img class="img-fluid" src="{{$image->getUrl(500, 400)}}"/>
                                </div> 
                                @empty
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="/media/placeholder.png"/>
                                </div> 
                                @endforelse
                                
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        {{-- Fine Swiper --}}
                    </div>
                    @if (Auth::user() &&  Auth::user()->is_revisor == 1)
                    @if (isset($image) && isset($image->labels))
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-12 mb-3 d-flex flex-column align-items-center">
                                
                                    <p class="d-inline">
                                        @foreach ($image->labels as $label )
                                        {{$label}}
                                        @endforeach
                                    </p>
                                
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                            <div class="card-body">
                                <h5 class="tc-accent">
                                    Revisione immagini
                                </h5>
                                <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                <p>Contenuto esplicito: <span class="{{$image->racy}}"></span></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>


        </div>
    </div>
</x-layout>