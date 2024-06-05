
// Gestione ricerca segnalazione

/* Gestisce l'invio del modulo di ricerca. 
Quando l'utente invia il modulo, l'evento predefinito viene impedito(event.preventDefault();) (prevenendo la ricarica della pagina). 
Successivamente, estrae il testo inserito nell'input di ricerca, 
lo aggiunge come parametro di query all'URL della pagina, 
facendo restituire i risultati appropriati.*/

document.getElementById('searchForm')?.addEventListener('submit', function(event) {
    event.preventDefault();
    const searchInput = document.querySelector('input[name="search"]').value;
    window.location.href = `?search=${encodeURIComponent(searchInput)}`;
});

// Gestione invio segnalazione
/*
Quando viene inviato il modulo, l'evento predefinito viene impedito (evitando la ricarica della pagina).
 Successivamente, viene creato un oggetto `FormData` che rappresenta i dati del modulo e viene aggiunto 
 un campo aggiuntivo `'action'` con valore `'create'`. Questi dati vengono inviati al server tramite una
  richiesta POST fetch a 'api.php'. Una volta ottenuta la risposta, il contenuto viene interpretato come JSON.
A seconda del risultato il server invierà una risposta
   */

document.getElementById('segnalazioneForm')?.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    formData.append('action', 'create');

    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const messageDiv = document.getElementById('message');
        if (data.message) {
            messageDiv.textContent = data.message;
        } else if (data.error) {
            messageDiv.textContent = data.error;
        }
    });
});

// Gestione aggiornamento stato segnalazione
/*
Quando viene cliccato uno di questi pulsanti, viene selezionato il modulo più vicino con classe "update-status-form".
 Viene creato un oggetto FormData con i dati del modulo, incluso il valore del pulsante cliccato. Questi dati vengono
  inviati al server tramite una richiesta POST fetch a 'api.php'. 
  A seconda della risposta si ha un allert con risposta positiva o negativa
*/

document.querySelectorAll('.status-buttons button').forEach(button => {
    button.addEventListener('click', function() {
        const form = this.closest('.update-status-form');
        const formData = new FormData(form);
        formData.append('action', 'update');
        formData.append('stato', this.getAttribute('data-stato'));

        fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
                location.reload();
            } else if (data.error) {
                alert(data.error);
            }
        });
    });
});

/*
Gestione recupero segnalazione
Viene impedito il comportamento predefinito (cioè la ricarica della pagina). 
Successivamente, viene creato un oggetto FormData che rappresenta i dati del modulo e viene aggiunto un campo aggiuntivo 
'action' con valore 'check'. 
Questi dati vengono inviati al server tramite una richiesta POST fetch a 'api.php'. 
Una volta ottenuta la risposta, il contenuto viene interpretato come JSON.
 Se è presente lo stato nella risposta, 
viene visualizzato all'interno di un elemento div con id 'status'. In caso contrario, viene mostrato un messaggio di errore. 
*/

document.getElementById('checkForm')?.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    formData.append('action', 'check');

    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const statusDiv = document.getElementById('status');
        if (data.stato) {
            statusDiv.textContent = 'Stato della segnalazione: ' + data.stato;
        } else {
            statusDiv.textContent = 'Errore nel recupero dello stato della segnalazione.';
        }
    });
});

// Gestione eliminazione segnalazione
/*
Quando viene cliccato il pulsante delete, viene ottenuto l'ID della segnalazione associato al pulsante. 
Viene visualizzato un messaggio di conferma per l'eliminazione della segnalazione. 
Se l'utente conferma, viene inviata una richiesta POST al server con l'azione "delete" e l'ID della segnalazione 
come parametri nel corpo della richiesta. Una volta ricevuta la risposta, se contiene un messaggio di conferma, 
viene mostrato un alert e la pagina viene ricaricata. In caso di errore, viene mostrato un alert con il messaggio di errore. */

document.querySelectorAll('.delete').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        if (confirm('Sei sicuro di voler eliminare questa segnalazione?')) {
            fetch('api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded' //Formati standard per inviare dati di form attraverso le richieste HTTP.
                },
                body: `action=delete&id=${id}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                    location.reload();
                } else if (data.error) {
                    alert(data.error);
                }
            });
        }
    });
});


/*Si attiva quando il documento HTML è completamente caricato (DOMContentLoaded). 
Una volta che il documento è pronto, cerca l'elemento del modulo di segnalazione (segnalazioneForm) e il pulsante di invio (submitButton). 
Quando il modulo viene inviato, il pulsante di invio viene disabilitato e il suo valore viene cambiato in "Inviata". 
*/

document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('segnalazioneForm');
    var submitButton = document.getElementById('submitButton');

    form.addEventListener('submit', function (e) {
        submitButton.disabled = true;
        submitButton.value = 'Inviata';
    });
});
