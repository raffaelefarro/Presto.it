{{-- <div class="col-6 mt-3">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data" class="mb-3">
        <div class="mb-3">
            <select wire:model.defer="category" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option>Seleziona una categoria</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{__($category->name)}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nome Prodotto</label>
            <input wire:model.live="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo Prodotto</label>
            <input wire:model.live="price" type="text" class="form-control" id="price">
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Inserisci immagini</label>
            <input wire:model.live="images" multiple type="file" class="form-control @error("temporary_images.*") is-invalid @enderror" id="images" aria-describedby="emailHelp">
        </div>
        @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>Anteprima dell'immagine</p>
                <div class="row border border-4 border-info rounded shadow py-4">
                    @foreach ($images as $key => $image)
                    <div class="col my-3">
                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});">
                            <button type="button" wire:click="removeImage({{$key}})" class="btn btn-danger shadow d-block text-center mt-2 mx-auto">
                                Cancella
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        @endif
        <div class="mb-3">
            <label for="description"></label>
            <textarea wire:model.live="description" type="text" class="form-control" placeholder="Descrizione Prodotto" id="description" style="height: 200px"></textarea> 
        </div>
        <button type="submit" class="btn btn-success">Carica Annuncio</button>
    </form> --}}
    
    {{-- START BANNER - INSERISCI ANNUNCIO --}}
    {{-- <div class="container banner-custom mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                
                <img src="" alt="">
                <div>
                    <h3>1. Inserisci un annuncio</h3>
                    <p>Fotografa l'oggetto, aggiungi la descrizione, decidi il prezzo e pubblica l'annuncio.</p>
                </div>
                
                <img src="" alt="">
                <div>
                    <h3>2. Gestire i tuoi annunci è semplice </h3>
                    <p>Quando il tuo annuncio sarà approvato e pubblicato, il tuo articolo sarà sotto l'occhio di tutti.</p>
                </div>
                
                <img src="" alt="">
                <div>
                    <h3>3. Vendi ovunque con Presto.it</h3>
                    <p>Dai valore ai tuoi prodotti e inizia a guadagnare. </p>
                </div>
            </div>
            <div class="col-12 col-md-6 ">
                <h3>Inizia a vendere con Presto.it</h3>
                <p>Vendere non è mai stato cosi semplice ed intuitivo, dillo a tutti!</p>
                <div class="text-center">
                    <button type="button" class="btn btn-outline-dark">Vendi subito</button>
                </div>
                
            </div>
        </div>
    </div>
    
</div> --}}
    {{-- END BANNER - INSERISCI ANNUNCIO --}}
    
    <div class="container-fluid main-login">
        <div class="row">
            <div class="col-12 col-md-12">
                <h2 class="text-center h1 display-1">{{__('ui.createann')}}</h2>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="wrapper-create-announcement my-5 create-announcement-custom">
                    <form wire:submit.prevent="store">
                        
                        <div class="input-box category-shadow">
                            <select wire:model.defer="category" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option>{{__('ui.seleziona')}}</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{__($category->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="input-box">
                            <label for="name" class="form-label"></label>
                            <input wire:model.live="name" type="text" placeholder="{{__('ui.prodotto-n')}}" class="form-control" id="name" aria-describedby="emailHelp">
                        </div>
                        
                        <div class="input-box">
                            <label for="price" class="form-label"></label>
                            <input wire:model.live="price" type="text" placeholder="{{__('ui.prodotto-p')}}" class="form-control" id="price">
                        </div>
                        <div class="input-box">
                            <label for="description"></label>
                            <textarea wire:model.live="description" type="text" placeholder="{{__('ui.prodotto-d')}}" class="form-control" placeholder="{{__('ui.prodotto-d')}}" id="description" style="height: 200px"></textarea> 
                        </div>
                        <div class="input-box">
                            <label for="images" class="form-label"></label>
                            <input wire:model.live="images" multiple type="file" class="form-control @error("temporary_images.*") is-invalid @enderror" id="images" aria-describedby="emailHelp">
                        </div>
                        @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>Anteprima dell'immagine</p>
                                <div class="row border border-4 border-info rounded shadow py-4">
                                    @foreach ($images as $key => $image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});">
                                            <button type="button" wire:click="removeImage({{$key}})" class="btn btn-danger shadow d-block text-center mt-2 mx-auto">
                                                Cancella
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        @endif
                        <button type="submit" class="btn-custom  btn-form mt-3 ">{{__('ui.carica')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>