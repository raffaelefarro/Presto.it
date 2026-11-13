# Presto.it

Un sito di annunci un po' alla Subito, ma piccolo. È il progetto finale del bootcamp Full Stack di Aulab (Hackademy): l'abbiamo costruito in gruppo, a dicembre 2023.

Ti registri, metti in vendita qualcosa con titolo, descrizione, prezzo, categoria e le foto che vuoi. L'annuncio però non va online subito: prima lo guarda un revisore, che lo approva o lo rifiuta.

## Cosa fa

- Registrazione e login con Laravel Fortify
- Creazione degli annunci con upload multiplo di foto. Il form è un componente Livewire e controlla i campi mentre scrivi
- Dieci categorie, ognuna con la sua pagina
- Ricerca testuale sugli annunci con Laravel Scout e TNTSearch
- Area revisore con tre elenchi (da controllare, approvati, rifiutati). Un annuncio rifiutato si può rimettere in revisione
- Chi vuole fare il revisore compila un modulo, all'admin arriva una mail e da lì abilita l'utente
- Sito in italiano, inglese e francese
- Pagina profilo di chi vende, pagine legali e "Chi siamo"

## Cosa succede alle foto

Dopo l'upload parte una catena di job:

1. Google Cloud Vision cerca i volti e, se ne trova, li copre con un'immagine
2. La foto viene ritagliata al centro a 500×400 e riceve un watermark
3. SafeSearch controlla contenuti per adulti, violenza e simili
4. Le etichette riconosciute nell'immagine (per esempio "scarpa" o "bicicletta") vengono salvate

Il risultato di SafeSearch e le etichette le vede solo il revisore, nella pagina dell'annuncio.

## Stack

PHP 8.1+, Laravel 10, Livewire 3, Bootstrap 5, Vite, MySQL, Laravel Scout con TNTSearch, Google Cloud Vision, Spatie Image.

## Come farlo partire

Servono PHP, Composer, Node e MySQL.

```bash
git clone https://github.com/raffaelefarro/Presto.it.git
cd Presto.it
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Crea un database MySQL che si chiami `progetto_finale` (utente e password sono nel `.env`, cambiali con i tuoi). Poi:

```bash
php artisan migrate
php artisan storage:link
npm run dev
php artisan serve
```

Le dieci categorie vengono create dalla migration, quindi dopo `migrate` ci sono già.

Per rendere revisore un utente già registrato:

```bash
php artisan presto:makeUserRevisor email@esempio.it
```

### Google Vision e mail

- Per l'analisi delle foto serve un file di credenziali di Google Cloud, da salvare come `google_credential.json` nella cartella principale. È nel `.gitignore`, quindi non finisce su GitHub. Senza quel file il caricamento di un annuncio con foto va in errore.
- Per le mail (richiesta di diventare revisore) compila le variabili `MAIL_*` nel `.env`. Le richieste vanno a `admin@presto.it`.

## Cose che sistemerei

- I test sono ancora quelli di esempio che Laravel crea da solo. Mancano quelli veri: validazione del form, accesso alla dashboard revisore, approvazione e rifiuto degli annunci.
- L'indirizzo dell'admin per le richieste revisore è scritto nel codice. Dovrebbe stare in configurazione.
- Non c'è una demo online, perché servono database e credenziali Google.
