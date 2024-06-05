<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

include 'config.php';

$search = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $descrizione = isset($_POST['descrizione']) ? $_POST['descrizione'] : '';

  

    echo "Segnalazione inviata con successo!";
    echo "<pre>" . htmlspecialchars($descrizione) . "</pre>";
} else {
    if (isset($_GET['search'])) {
        $search = $conn->real_escape_string($_GET['search']);
        $sql = "SELECT id, nome_ricambio, modello_telefono, costo FROM ricambi WHERE nome_ricambio LIKE '%$search%' OR modello_telefono LIKE '%$search%'";
    } else {
        $sql = "SELECT id, nome_ricambio, modello_telefono, costo FROM ricambi";
    }
    $result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista Ricambi</title>
    <link rel="stylesheet" type="text/css" href="../css/orders.css">
</head>
<body>
    <div class="container">
        <a href="./php/upload.php" class="logout-button">Invia riparazione</a>
        <a href="logout.php" class="logout-button">Logout</a>
        <a href="./index.php" class="logout-button">Home</a>
        <h2>Lista Ricambi</h2>
        
        <form class="search-form" method="GET" action="">
            <input type="text" name="search" placeholder="Cerca per nome ricambio o modello" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Cerca</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Nome Ricambio</th>
                    <th>Modello Telefono</th>
                    <th>Costo</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nome_ricambio']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['modello_telefono']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['costo']) . "</td>";
                        echo "<td><button class='checkout-button' data-ricambio='" . htmlspecialchars($row['nome_ricambio']) . "' data-modello='" . htmlspecialchars($row['modello_telefono']) . "' data-costo='" . htmlspecialchars($row['costo']) . "'>Checkout</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nessun ricambio trovato</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="../js/orders.js"></script>
</body>
</html>

