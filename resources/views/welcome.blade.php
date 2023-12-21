<x-layout>
    @if (session('revisor_message'))
        <div class="alert alert-success">
            {{ session('revisor_message') }}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid myVideo">
        <div class="row">
            @if (Config::get('app.locale') == 'it')
                <video class="col-12 col-md-12 p-0 myVideo" autoplay muted loop id="myVideo">
                    <source src="/media/video/it.mp4" type="video/mp4">
                </video>
            @elseif(Config::get('app.locale') == 'fr')
                <video class="col-12 col-md-12 p-0 myVideo" autoplay muted loop id="myVideo">
                    <source src="/media/video/fr.mp4" type="video/mp4">
                </video>
            @else
                <video class="col-12 col-md-12 p-0 myVideo" autoplay muted loop id="myVideo">
                    <source src="/media/video/en.mp4" type="video/mp4">
                </video>
            @endif

        </div>
    </div>


    {{-- START SCRITTA DINAMICA --}}
    <div class="container-fluid bg-white-custom">
        <div class="row">
            <div class="col-md-12 text-container ">
                <div class="dynamic-text text-center">{{__('ui.motto')}}</div>
            </div>
        </div>
    </div>
    {{-- AND SCRITTA DINAMICA --}}

    {{-- START CALL TO ACTION --}}
    <div class="container-fluid bg-white-custom">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 mt-3">
                <div class="row g-4 py-5 ">
                    <div class="col-12 col-md-4 text-center mt-3">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center  fs-2 mb-3">
                            <i class="fa-solid fa-user fa-lg icon-custom"></i>
                        </div>
                        <h3 class="fs-2 text-body-emphasis ">{{__('ui.registrati')}}</h3>
                        <p class="">{{__('ui.sottotitolo-s')}}</p>

                    </div>
                    <div class="col-12 col-md-4 text-center margin-custom mt-3 ">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                            <i class="fa-solid fa-circle-plus fa-lg icon-custom"></i>
                        </div>
                        <h3 class="fs-2 text-body-emphasis">{{__('ui.creannuncio')}}</h3>
                        <p class="">{{__('ui.sottotitolo-c')}}</p>
                    </div>
                    <div class="col-12 col-md-4 text-center mt-4">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                            <i class="fa-solid fa-hand-holding-dollar fa-xl icon-custom"></i>
                        </div>
                        <h3 class="fs-2 text-body-emphasis">{{__('ui.vendi')}}</h3>
                        <p class="">{{__('ui.sottotitolo-p')}}</p>
                    </div>
                    <div class="col-12 col-md-12 d-flex justify-content-center">
                        <button class="button mt-5">
                            <a href="{{ route('announcement_create') }}" class="icon-link p-2 text-button-custom">{{__('ui.creannuncio')}}</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  START ICONE RANDOM --}}
    <div class="container-fluid bg-black-custom color-custom ">
        <div class="row justify-content-center py-5">
            <h4 class="text-center text-dark ">{{__('ui.cat')}}</h4>
            @foreach ($rand_categories as $category)
                <div
                    class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center text-center back-icona p-5">
                    <a class="text-decoration-none " href="{{ route('category_show', compact('category')) }}"">
                        <i class=" {{ $category->icon_class }} fa-2xl text-welcome-custom"></i>
                        <p class="text-center text-welcome-custom mt-2 m-0">{{ __($category->name) }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- END ICONE --}}

    {{-- START SWIPER --}}
    <div class="container-fluid bg-black-custom color-custom">
        <div class="row">
            <div class="col-12 col-md-12">
                <h3 class="text-center text-dark">{{__('ui.lastann')}}</h3>
                <p class="text-center text-dark">{{__('ui.explore')}}.</p>
            </div>
            <div class="col-12 ">
                <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($announcements as $announcement)
                                <div class="swiper-slide d-flex justify-content-center">
                                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 bg-card-welcome d-block d-md-flex"
                                        style="background-image: linear-gradient(rgba(0, 0, 0, 0.297), rgba(0, 0, 0, 0.675)), url('{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(500, 400): '/media/placeholder.png' }}');">
                                        <div class="d-flex justify-content-center">
                                            <a class="text-white text-center mt-3"
                                            href="{{ route('user_profile', ['user' => $announcement->user->id]) }}">{{ $announcement->user->name }}</a>
                                        </div>
                                        
                                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                            <h3 class="pt-5 mt-2 mt-md-5 mb-5 display-6 lh-1 fw-bold text-white custom-mobile">
                                                {{ $announcement->name }}
                                            </h3>
                                            <ul
                                                class="d-flex flex-column list-unstyled mt-2 mt-md-auto align-items-end justify-content-center">
                                                <li class="d-flex align-items-center fw-bold">
                                                    <a class="text-white text-decoration-none"
                                                        href="{{ route('category_show', ['category' => $announcement->category]) }}"><small>{{ __($announcement->category->name) }}</small></a>
                                                </li>
                                                <li class="me-auto">
                                                    <a class="btn btn-success"
                                                        href="{{ route('announcement_show', compact('announcement')) }}">{{__('ui.dettaglio')}}</a>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <svg class="bi me-2" width="1em" height="1em">
                                                        <use xlink:href="#calendar3"></use>
                                                    </svg>
                                                    <small>{{ $announcement->created_at->diffForHumans() }}</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
        {{-- END SWIPER --}}

        {{-- START NUMERI AZIENDALI --}}
        <section class="container-fluid bg-white-custom">
            <div class="row text-center">
                <div class="col-12 col-md-12">
                    <h3 class="section-title mt-5 icon-custom">{{__('ui.numeri-aziendali')}}</h3>
                </div>
                <div class="col-12 col-md-4">
                    {{-- <p class="lead section-info"><span id="firstNumber" class="number">0</span> Clienti Soddisfatti</p> --}}
                    <p class="section-info"><span id="firstNumber" class="number">0</span> {{__('ui.clienti')}}</p>
                </div>
                <div class="col-12 col-md-4">
                    {{-- <p clas section-info"><span id="secondNumber" class="number">0</span> Annunci creati</p> --}}
                    <p class="section-info"><span id="secondNumber" class="number">0</span> {{__('ui.prodotti-venduti')}}</p>
                </div>
                <div class="col-12 col-md-4">
                    {{-- <p class="lead section-info"><span id="thirdNumber" class="number">0</span> Aziende Partner</p> --}}
                    <p class="section-info"><span id="thirdNumber" class="number">0</span> {{__('ui.aziende')}}</p>
                </div>
            </div>
        </section>
        {{-- AND NUMERI AZIENDALI --}}

        {{-- START immagine e titolo --}}
        <div class="container bg-white-custom">
            <div class="row mt-5">
                <div class="col-12 col-md-6 my-3 aos-init aos-animate" data-aos="fade-right"
                    data-aos-duration="1500">
                    <img class="img-fluid mb-5 img-pc img-cellulare " src="/media/1.png" alt="">
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-center width-testo-pc aos-init aos-animate"
                    data-aos="fade-right" data-aos-duration="1500">
                    <h3 class="">Presto.it</h3>
                    <p class="">{{__('ui.vita')}}.</p>
                </div>
                <div class="col-12 col-md-12 d-flex justify-content-center">
                    <button class="button mt-3 mb-5 text-button-custom">
                        <a href="{{ route('announcement_create') }}" class="icon-link p-2 text-button1-custom">{{__('ui.creannuncio')}}</a>
                    </button>
                </div>
            </div>
        </div>

        @auth
            @if (Auth::user()->is_revisor == 0)
                <div class="container-fluid bg-white-custom d-flex justify-content-center py-2">
                    <div class="row justify-content-center text-center bg-azure-custom w-75 bottone-revisore">
                        <div class="col-12 col-md-12 d-flex align-items-center justify-content-center ">
                            <div class=" d-flex flex-column align-items-center justify-content-center p-3">
                                <h2 class="text-center display-4 section-title icon-custom  ">{{__('ui.work')}}</h2>
                                <p class="text-center text-black mb-0 display-6">{{__('ui.domanda')}}</p>
                                <button class="button mt-5">
                                    <a href="{{ route('revisor_create') }}"
                                        class="icon-link p-2 text-button-custom">{{__('ui.click')}}</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
</x-layout>
