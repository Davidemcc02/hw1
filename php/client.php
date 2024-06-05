


<?php

//Pagina client per la visualizzazione delle prenotazioni
require_once 'config.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM segnalazioni WHERE email = '$email'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="icon" href="../img/stars.ico">
    <link rel="stylesheet" href="../css/upload.css">
</head>
<body>

    <div class="container">
        <a href="./../php/upload.php" class="logout-button">Invia riparazione</a>
        <a href="./../index.php" class="logout-button">Home</a>
        <a href="logout.php" class="logout-button">Logout</a>
        <h2>Le tue segnalazioni</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Descrizione</th>
                        <th>Stato</th>
                        <th>Data Creazione</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td data-label='ID'>" . $row['id'] . "</td>";
                            echo "<td data-label='Email'>" . $row['email'] . "</td>";
                            echo "<td data-label='Descrizione'>" . $row['descrizione'] . "</td>";
                            echo "<td data-label='Stato'>" . $row['stato'] . "</td>";
                            echo "<td data-label='Data Creazione'>" . $row['created_at'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nessuna segnalazione trovata per questa email.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

<?php
$conn->close();
?>
