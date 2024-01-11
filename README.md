# PHP DISCHI

#### CONSEGNA DELL'ESERCIZIO 

```
Dobbiamo creare una web-app che permetta di leggere una lista di dischi presente nel nostro server.

Stack
Html, CSS, VueJS (importato tramite CDN), axios, PHP

Consigli
Nello svolgere l’esercizio seguite un approccio graduale.

Prima assicuratevi che la vostra pagina index.php (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).

Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.

Bonus
Al click su un disco, recuperare e mostrare i dati del disco selezionato.
```

#### SVOLGIMENTO

Nella prima parte del nostro esercizio usare il PHP è abbastanza superfluo in quanto dobbiamo semplicemente leggere un file json e rappresentare dei dati a schermo. Quindi creiamo il nostro index.php con formattazione html5, includiamo tramite CDN Vue, axios, bootstrap, creiamo il file script.js in cui andremo ad inserire la logica del nostro front-end. Una volta creati i file, dichiariamo una funzione che tramite una chiamata AJAX va ad assegnare ad una variabile l'array di oggetti ricevuto dalla chiamata.Creiamo l'app nell'html, dove andiamo a stampare con un ciclo v-for tutti gli elementi necessari dal nostro array di oggetti.

Per quanto riguarda il bonus dobbiamo servirci di alcuni passaggi in PHP in quanto dobbiamo filtrare l'array in base al cd selezionato. Per fare questo dobbiamo passare al nostro server l'ID del CD appena cliccato, e lo facciamo tramite una funzione invocata al click sul CD, che con axios.post, manda al server l'ID del CD cliccato. In php lo potremmo salvare in una variabile nel seguente modo:

```PHP
$current_disc_id = file_get_contents('php://input');
```
La sintassi funzionerebbe in quanto siamo sicuri che per ora l'unico input inviato è quello dell'ID, ma per non avere difficoltà in implementazioni future, usiamo questa sintassi:

```PHP
$payload = json_decode(file_get_contents('php://input'), true);
$current_disc_id = $payload["currentDiscID"];
```

Per leggerlo in questo modo dovremmo mandare in axios.post un vero e proprio oggetto e non solo una stringa.

Grazie a questa informazione possiamo andare ora a dichiare una funzione PHP che filtra il nostro file json iniziale, decodificandolo ed inserendo una condizione affinchè trovi un riscontro con l'ID che gli abbiamo passato. Otterremo così un array associativo di un solo CD che andremo a ricodificare. Una volta ricodificato generiamo un file json che verrà sovrascritto ogni volta con il CD selezionato.

Dentro il then della funzione axios.post, andiamo a fare una chiamata al nostro serve che ci restituirà il file json che andremo a salvare in una variabile.

Non ci resta altro che leggere il nuovo file e stampare le informazioni a schermo.