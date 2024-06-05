
<?php
//Pagina admin gestione prenotazioni
session_start();
require_once 'config.php';

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM segnalazioni";
if (!empty($searchTerm)) {
    $sql .= " WHERE id LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Gestione Segnalazioni</title>
    <link rel="icon" href="../img/stars.ico">
    <link rel="stylesheet" type="text/css" href="../css/upload.css">
</head>
<body>
    <div class="container">
        <h2>Gestione Segnalazioni</h2>
        <a href="logout.php" class="logout-button">Logout</a>
        <a class="logout-button" href="./../index.php">HOME</a>

        <form id="searchForm" method="GET">
            <input type="text" name="search" placeholder="Cerca per ID o Email" value="<?php echo htmlspecialchars($searchTerm); ?>" />
            <input type="submit" value="Cerca" />
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Descrizione</th>
                    <th>Stato</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['descrizione'] . "</td>";
                        echo "<td>" . $row['stato'] . "</td>";
                        echo "<td class='status-buttons'>";
                        echo "<form class='update-status-form'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='button' data-stato='attesa' class='attesa'>Attesa</button>";
                        echo "<button type='button' data-stato='preparazione' class='preparazione'>In Preparazione</button>";
                        echo "<button type='button' data-stato='concluso' class='concluso'>Concluso</button>";
                        echo "<button type='button' class='delete' data-id='" . $row['id'] . "'>Elimina</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nessuna segnalazione trovata</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="../js/upload.js"></script>
</body>
</html>

<?php
$conn->close();
?>
