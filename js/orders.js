
/* Prende le varie info dei ricarbi per inserirli direttamente nella descrizione */
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll('.checkout-button');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const ricambio = this.getAttribute('data-ricambio');
            const modello = this.getAttribute('data-modello');
            const costo = this.getAttribute('data-costo');

            const descrizione = `Nome ricambio: ${ricambio}\nModello telefono: ${modello}\nCosto: ${costo}`;

            const form = document.createElement('form');
            form.method = 'post';
            form.action = 'upload.php';

            const descrizioneInput = document.createElement('input');
            descrizioneInput.type = 'hidden';
            descrizioneInput.name = 'descrizione';
            descrizioneInput.value = descrizione;

            form.appendChild(descrizioneInput);
            document.body.appendChild(form);
            form.submit();
        });
    });
});


