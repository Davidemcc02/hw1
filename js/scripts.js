
/*Fa una richiesta asincrona a un endpoint PHP (booked.php) per ottenere i 
tempi già prenotati per una data specifica. Prende come argomento la data 
per cui si vogliono ottenere i tempi prenotati.*/

async function fetchBookedTimes(date) {
    const response = await fetch(`../php/booked.php?date=${date}`);
    const data = await response.json();
    return data.bookedTimes;
}

/*
 Prende i tempi prenotati ottenuti dalla funzione fetchBookedTimes e 
 disabilita le opzioni nel selettore del tempo che corrispondono a questi tempi prenotati.
 Dato che nel database ogni orario ha un Id per identificare i tempi esso li confronta con i
 tempi prenotati ottenuti dalla chiamata API con l'attributo option.dataset.id
*/
function disableBookedTimes(bookedTimes) {
    const timePicker = document.getElementById('timePicker');
    Array.from(timePicker.options).forEach(option => {
        option.disabled = bookedTimes.includes(parseInt(option.dataset.id));
    });
}

/*
Quando un utente cambia la data selezionata nel campo con id "date", viene eseguita una funzione. 
Questa funzione ottiene la nuova data selezionata, richiede i tempi prenotati per quella data tramite la funzione "fetchBookedTimes",
 e infine disabilita le opzioni nel selettore del tempo che corrispondono a questi tempi prenotati utilizzando la funzione 
 "disableBookedTimes".
*/

document.getElementById('date').addEventListener('change', async function () {
    const date = this.value;
    const bookedTimes = await fetchBookedTimes(date);
    disableBookedTimes(bookedTimes);
});

/*
Questa funzione genera le opzioni per il selettore dell'orario, popolandolo con gli orari disponibili dalle 08:00 alle 19:30 con
 intervalli di 30 minuti. Utilizza un array di orari predefiniti e assegna un ID univoco a ciascuna opzione basato sull'indice 
 nell'array. Le opzioni vengono create come elementi <option> HTML e aggiunte al selettore dell'orario.
*/
function generateTimeOptions() {
    const timePicker = document.getElementById('timePicker');
    const times = [
        '08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
        '11:00', '11:30', '12:00', '12:30', '13:00', '13:30',
        '14:00', '14:30', '15:00', '15:30', '16:00', '16:30',
        '17:00', '17:30', '18:00', '18:30', '19:00', '19:30'
    ];
    times.forEach((time, index) => {
        const option = document.createElement('option');
        option.value = time;
        option.text = time;
        option.dataset.id = index + 1;
        timePicker.appendChild(option);
    });
}

/*Quando l'intero documento HTML e tutti i suoi elementi
(come immagini, script e fogli di stile) sono stati caricati completamente, la funzione 
generateTimeOptions() sarà automaticamente eseguita. */

window.onload = generateTimeOptions;

/* Il codice recepisce l'invio del modulo, disabilita il pulsante di invio, invia i dati del modulo 
al server tramite una richiesta POST, e poi gestisce la risposta mostrando un messaggio di conferma 
in caso di successo, altrimenti un messaggio di errore. */
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('eventForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.disabled = true;

        const title = document.getElementById('title').value;
        const date = document.getElementById('date').value;
        const time = document.getElementById('timePicker').value;

        const event = {
            title: title,
            date: date,
            time: time
        };

        fetch('calendar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(event) //viene utilizzata per trasformare l'oggetto JavaScript event in una stringa JSON.
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Evento prenotato con successo!');
            } else {
                alert('Errore nella prenotazione dell\'evento: ' + (data.message || 'Errore sconosciuto.'));
                submitButton.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Si è verificato un errore: ' + error.message);
            submitButton.disabled = false;
        });
    });
});

//Verifica durante la registrazione

function validateForm() {
    var password = document.forms["registrationForm"]["password"].value;
    var confirmPassword = document.forms["registrationForm"]["confirm_password"].value;

    if (password !== confirmPassword) {
        alert("Le password non coincidono.");
        return false;
    }

    if (password.length < 8 || !/[A-Z]/.test(password) || !/[0-9]/.test(password) || !/[\W]/.test(password)) {
        alert("La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale.");
        return false;
    }

    return true;
}