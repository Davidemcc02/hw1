

<?php
//<!-- Pagina gestione login clienti/admin -->

session_start();
require 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Preparare una dichiarazione SQL
    if ($stmt = $conn->prepare("SELECT email, username, password FROM users WHERE email = ?")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($email, $username, $hashed_password);
            $stmt->fetch();

            // Verifica la password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;

               
                header("Location: ../index.php");
            } else {
                $error = "Password errata.";
            }
        } else {
            $error = "Email non trovata.";
        }

        $stmt->close();
    } else {
        $error = "Errore nella preparazione della dichiarazione.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../img/stars.ico">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <div id="login-box">
        <div class="left">
            <h1>Login</h1>
            <?php if ($error): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" value="Login" />   
            </form>
            <a href="signup.php"><input type="submit" value="Sign-up" /></a>
            <a href="../index.php"><input type="submit" value="Home" /></a>
        </div>
    </div>
</body>
</html>
