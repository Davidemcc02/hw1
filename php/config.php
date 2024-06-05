

<?php
//<!-- Pagina per connessione al database -->

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'webprogramming');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verifica la connessione
if($conn->connect_error){
    die("Errore di connessione: " . $conn->connect_error);
}
?>
