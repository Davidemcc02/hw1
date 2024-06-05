<?php
// Pagina invio segnalazione riparazione clienti
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$descrizione = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['descrizione'])) {
    $descrizione = htmlspecialchars($_POST['descrizione']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invia riparazione</title>
    <link rel="icon" href="../img/stars.ico">
    <link rel="stylesheet" type="text/css" href="../css/upload.css">
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout-button">Logout</a>
        <a href="../index.php" class="logout-button">Home</a>
        <h2>Invia Segnalazione</h2>
        <form id="segnalazioneForm">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly required>
            <label for="descrizione">Descrizione del problema:</label>
            <textarea id="descrizione" name="descrizione" rows="4" required><?php echo $descrizione; ?></textarea>
            <input type="submit" id="submitButton" value="Invia">
        </form>
        <div id="message"></div>
        <a href="client.php"><input type="submit" value="Elenco ordini" /></a>
        <a href="orders.php"><input type="submit" value="Elenco ricambi" /></a>
    </div>
    <script src="../js/upload.js"></script>
</body>
</html>
