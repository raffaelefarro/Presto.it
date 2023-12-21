<x-layout>
    <section class="container min-vh-100">
        <div class="row">
            <div class="col-12">
                <h2 class="h1 text-center display-1">{{__('ui.anncat')}} {{__($category->name)}}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            
            @forelse ($announcements as $announcement)
            <div class="col-12 col-lg-4 my-4">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg bg-card-welcome"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.297), rgba(0, 0, 0, 0.675)), url('{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(500, 400) : '/media/placeholder.png'}}');">
                <p class="text-center mt-3">{{$announcement->user->name}}</p>
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold text-white">{{$announcement->name}}
                    </h3>
                    <ul
                    class="d-flex flex-column list-unstyled mt-auto align-items-end justify-content-center">
                    <li class="d-flex align-items-center fw-bold">
                        
                        
                        <a class="text-white text-decoration-none"
                        href="{{route('category_show', ['category' => $announcement->category])}}"><small>{{__($announcement->category->name)}}</small></a>
                    </li>
                    <li class="me-auto">
                        <a class="btn btn-success"
                        href="{{route('announcement_show', compact('announcement'))}}">{{__('ui.dettaglio')}}</a>
                    </li>
                    <li class="d-flex align-items-center">
                        <svg class="bi me-2" width="1em" height="1em">
                            <use xlink:href="#calendar3"></use>
                        </svg>
                        <small>{{$announcement->created_at->diffForHumans()}}</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 d-flex flex-column w-50 align-items-center">
        <h3 class="text-center">{{__('ui.non2')}}</h3>
        @if(Auth::user())
        <a class="btn btn-success" href="{{route('announcement_create')}}">{{__('ui.pub')}}</a>
        @else
        <a class="btn btn-success" href="{{route('login')}}">{{__('ui.acc')}}</a>
        @endif
    </div>
    @endforelse
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                {{$announcements->links()}}
            </div>
        </div>
    </div>
</div>
</section>
</x-layout>