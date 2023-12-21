<x-layout>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{__('ui.pann')}}</h1>
            </div>
        </div>
        <div class="row">
                <div class="col-12">
                    <h3 class="text-center">{{__('ui.revann')}}</h3>
                </div>

                {{-- ANNUNCI DA REVISIONARE --}}
                <div class="col-12 mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th class="text-center col-1">{{__('ui.an')}}</th>
                                {{-- <th scope="col">Utente</th> --}}
                                <th class="text-center col-1">{{__('ui.dettaglio')}}</th>
                                <th class="text-center col-1">{{__('ui.act')}}</th>
                                <th class="text-center col-1">{{__('ui.rif')}}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($announcement_to_check as $announcement)
                            @if (Auth::user()->name != $announcement->user->name)
                                
                            
                            <tr>
                                
                                <td class="text-center col-1">{{$announcement->name}}</td>
                                {{-- <td>{{$announcement->user->name}}</td> --}}
                                <td class="text-center col-1">
                                    <a class="btn btn-info" href="{{route('announcement_show', compact('announcement'))}}"><i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                </td>
                                <td class="text-center col-1">
                                    <form method="POST" action="{{route('accept_announcement', ['announcement'=>$announcement])}}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                    </form>
                                </td>
                                <td class="text-center col-1">
                                    <form method="POST" action="{{route('reject_announcement', ['announcement'=>$announcement])}}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @empty
                            <h5 class="mb-5 text-center">{{__('ui.non3')}}</h5>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">{{__('ui.anacc')}}</h3>
                </div>
                {{-- ANNUNCI ACCETTATI --}}
                <div class="col-12 mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th class="text-center col-1">{{__('ui.an')}}</th>
                                {{-- <th scope="col">Utente</th> --}}
                                <th class="text-center col-1">{{__('ui.dettaglio')}}</th>
                                <th class="text-center col-1">{{__('ui.rvs')}}</th>
                                <th class="text-center col-1">{{__('ui.rif')}}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($announcement_accepted as $announcement)
                            @if (Auth::user()->name != $announcement->user->name)
                            <tr>
                                
                                <td class="text-center col-1">{{$announcement->name}}</td>
                                {{-- <td>{{$announcement->user->name}}</td> --}}
                                <td class="text-center col-1">
                                    <a class="btn btn-info" href="{{route('announcement_show', compact('announcement'))}}"><i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                </td>
                                <td class="text-center col-1">
                                    <form method="POST" action="{{route('review_announcement', ['announcement'=>$announcement])}}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-warning"><i class="fa-solid fa-triangle-exclamation"></i></button>
                                    </form>
                                </td>
                                <td class="text-center col-1">
                                    <form method="POST" action="{{route('reject_announcement', ['announcement'=>$announcement])}}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @empty
                            <h5 class="mb-5 text-center">{{__('ui.non4')}}</h5>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">{{__('ui.rif3')}}</h3>
                </div>
            {{-- ANNUNCI RIFIUTATI --}}
            <div class="col-12 mb-5">
                <table class="table">
                    <thead>
                        <tr>
                            
                            <th class="text-center col-1">{{__('ui.an')}}</th>
                            {{-- <th scope="col">Utente</th> --}}
                            <th class="text-center col-1">{{__('ui.dettaglio')}}</th>
                            <th class="text-center col-1">{{__('ui.act')}}</th>
                            <th class="text-center col-1">{{__('ui.rvs')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($announcement_rejected as $announcement)
                        @if (Auth::user()->name != $announcement->user->name)
                        <tr>
                            
                            <td class="text-center col-1">{{$announcement->name}}</td>
                            {{-- <td>{{$announcement->user->name}}</td> --}}
                            <td class="text-center col-1">
                                <a class="btn btn-info" href="{{route('announcement_show', compact('announcement'))}}"><i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </td>
                            <td class="text-center col-1">
                                <form method="POST" action="{{route('accept_announcement', ['announcement'=>$announcement])}}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                </form>
                            </td>
                            <td class="text-center col-1">
                                <form method="POST" action="{{route('review_announcement', ['announcement'=>$announcement])}}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-warning"><i class="fa-solid fa-triangle-exclamation"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @empty
                        <h5 class="mb-5 text-center">{{__('ui.rif4')}}</h5>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>    
    </x-layout>