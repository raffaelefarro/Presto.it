{{-- <x-layout>
    <div class="container vh-100">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center display-1">Lavora con noi</h1>

            </div>
            <div class="col-6">
                <form method="POST" action="{{route('revisor_request')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Inserisci il tuo nome</label>
                        <input name="nome" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="nomecompleto" class="form-label">Inserisci il tuo cognome</label>
                        <input name="cognome" type="text" class="form-control" id="nomecompleto"
                            aria-describedby="emailHelp">
                    </div>


                    <div class=" mb-3 form-floating">
                        <textarea name="testo" class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea2" style="height: 300px"></textarea>
                        <label for="floatingTextarea2">Compila la tua richiesta </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Invia La Candidatura</button>
                </form>
            </div>
        </div>
    </div>
</x-layout> --}}

<x-layout>
<div class="container-fluid main-login">
    <div class="row">
        <div class="col-12 col-md-12">
            <h2 class="text-center h1 display-1">Lavora con noi</h2>
            <div class="wrapper-create-announcement my-5 create-announcement-custom">
                <form method="POST" action="{{route('revisor_request')}}">
                    @csrf
                    <div class="input-box">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input name="nome" type="text" placeholder="Inserisci il tuo nome" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="input-box">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input name="cognome" type="text" placeholder="Inserisci il tuo cognome" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-floating input-box mt-3">
                        <textarea name="testo" class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea2" style="height: 300px"></textarea>
                        <label for="floatingTextarea2">Compila la tua richiesta </label>
                    </div>
                    <button type="submit" class="btn-custom  btn-form mt-3 ">Invia candidatura</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>