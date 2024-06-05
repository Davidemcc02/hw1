<?php
require 'config.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validazione lato server
    if (!preg_match('/^[a-zA-Z0-9]{6,}$/', $username)) {
        $error = "Username non valido.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email non valida.";
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W]/', $password)) {
        $error = "Password non valida. Deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale.";
    } else {
        // Controlla se l'username o l'email esistono già
        $stmt = $conn->prepare("SELECT email FROM users WHERE username = ? OR email = ?");
        if ($stmt) {
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $error = "Username o email già esistenti.";
            } else {
                // Hashing della password
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Inserimento nel database
                $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("sss", $username, $hashed_password, $email);
                    if ($stmt->execute()) {
                        $success = "Registrazione completata.";
                    } else {
                        $error = "Errore durante la registrazione. Riprovare.";
                    }
                    $stmt->close();
                } else {
                    $error = "Errore durante la preparazione della query.";
                }
            }
        } else {
            $error = "Errore durante la preparazione della query.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="icon" href="../img/stars.ico">
    <link rel="stylesheet" href="../css/signup.css">
    <script src="../js/scripts.js"></script>
</head>
<body>
    <div class="form-container">
        <div class="register-container">
            <h1>Registrazione</h1>
            <?php if (!empty($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
                <strong class="success"><?php echo $success; ?></strong>
            <?php endif; ?>
            <form name="registrationForm" action="signup.php" method="post" onsubmit="return validateForm()">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Conferma Password" required>
                <input type="submit" value="Registrati">
            </form>
            <a href="login.php" class="login-button">Login</a>
            <a href="../index.php" class="login-button">Home</a>
        </div>
    </div>
</body>
</html>
