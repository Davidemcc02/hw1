
<?php

//Parte di interrogazione database SQL
require_once 'config.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'create') {
        $email = $_POST['email'];
        $descrizione = $_POST['descrizione'];
        
        // Genera un ID casuale a 9 cifre
        $id = str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);

        $sql = "INSERT INTO segnalazioni (id, email, descrizione) VALUES ('$id', '$email', '$descrizione')";

        if ($conn->query($sql) === TRUE) {
            $response['message'] = 'Segnalazione inviata con successo';
        } else {
            $response['error'] = 'Errore: ' . $sql . '<br>' . $conn->error;
        }
    } elseif ($action == 'update') {
        $id = $_POST['id'];
        $stato = $_POST['stato'];

        $sql = "UPDATE segnalazioni SET stato='$stato' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            $response['message'] = 'Stato aggiornato con successo';
        } else {
            $response['error'] = 'Errore: ' . $sql . '<br>' . $conn->error;
        }
    } elseif ($action == 'check') {
        $email = $_POST['email'];

        $sql = "SELECT stato FROM segnalazioni WHERE email='$email' ORDER BY created_at DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response['stato'] = $row['stato'];
        } else {
            $response['stato'] = 'Nessuna segnalazione trovata per questa email.';
        }
    } elseif ($action == 'delete') {
        $id = $_POST['id'];

        $sql = "DELETE FROM segnalazioni WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            $response['message'] = 'Segnalazione eliminata con successo';
        } else {
            $response['error'] = 'Errore: ' . $sql . '<br>' . $conn->error;
        }
    }
}

echo json_encode($response);

$conn->close();
?>
