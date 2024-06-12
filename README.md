<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<a href="https://it.textstudio.com/">Generatore di font utilizzato</a>

# Fotoalbum

### Consegna

Nome repo backend: fotoalbum-backend <br>
Nome repo frontend: fotoalbum-frontend

---

## Descrizione:

Il progetto prevede la realizzazione di una app per la gestione di foto e album, dotata di una dashboard di amministrazione e un sito pubblico per la pubblicazione e visualizzazione.

Saranno due progetti separati: uno per la parte backend e uno per la parte frontend.
L’area di amministrazione va realizzata sfruttando Blade + controller MVC. La web app pubblica deve essere gestita tramite javascript + web api.
Potete decidere se utilizzare plain JavaScript o VueJS.

Questa webapp offrirà una piattaforma completa per il fotografo, permettendogli di gestire facilmente le sue foto e di condividerle con il pubblico.

### Area di Amministrazione

L'area di amministrazione sarà riservata esclusivamente al fotografo e permetterà di gestire tutte le foto con le seguenti funzionalità:

-   visualizzazione elenco di tutte le foto caricate;
-   visualizzazione dei dettagli;
-   aggiunta di nuova foto;
-   modifica foto esistente;
-   eliminazione foto esistente.

Queste operazioni possono essere svolte solo dall’utente Admin che ha accesso alla dashboard.
Una foto contiene almeno le seguenti informazioni: titolo, descrizione, upload immagine, categoria, “in evidenza”.

### Web App

L'area pubblica sarà una web app permetterà agli utenti di visualizzare le lista di foto pubblicate dal fotografo assieme ad alcune funzionalità:

-   filtrare per almeno per categoria le immagini;
-   filtrare per le immagini “in evidenza”.

Definisci in autonomia l’interfaccia della web app. Scegli un approccio creativo o più essenziale.
In ogni caso cerca di presentare al meglio il contenuto e rendi fluido il layout sfruttando strategie di responsive web design.

### Bonus 1

Prevedi nell’entità fotografia il flag “pubblicato” utile per gestire lo stato di foto in “bozza”. Prevedi nel backend una vista per le foto in stato “bozza”.

### Bonus 2

La web app prevede la possibilità di filtrare anche per titolo.

### Bonus 3

Prevedere sempre nella pagina pubblica un semplice form di contatto avente i campi email e messaggio per poter contattare il fotografo.
Il click sul tasto invia farà partire una richiesta a una nuova api che salverà sul database il messaggio inviato.

## Note

### Validazione

Ricorda di utilizzare la validazione (soprattutto lato server) dei campi per garantire l’inserimento corretto dei dati; in particolare fa in modo che le immagini soddisfino i requisiti specifici (es. dimensione, estensione etc.).

### Dettagli

Cerca di curare qualche dettaglio di UX/UI. Ad es. prevedi un loader per i caricamenti in attesa di una risposta dall’API; includi un messaggio nel caso i filtri non restituiscano alcun risultato etc.
