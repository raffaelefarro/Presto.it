<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <h1>Gentile admin un utente ha richiesto di diventare revisore</h1>
    <h3>I suoi dati:</h3>
    <p>nome:{{$nome}}</p>
    <p>cognome:{{$cognome}}</p>
    <p>la sua richiesta:{{$testo}}</p>
    <a href={{route('revisor_accept', ['email' => $email])}}>Approva la richiesta</a>
    
    </div>
</body>
</html>