

<!DOCTYPE html>
<!-- Pagina prenotazione chiamata clienti -->

<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenotazione chiamata</title>
    <link rel="icon" href="../img/stars.ico">
    <link rel="stylesheet" href="..\css\calendar.css">
</head>
<body>
    <div id="calendar"></div>

    <form id="eventForm">
        <a class="button_home" href="./../index.php">Torna alla home</a>
        <h2>Prenota una chiamata</h2>
		
        <label for="title">Email:</label>
        <input type="email" id="title" name="title" required>
        
        <label for="date">Data:</label>
        <input type="date" id="date" name="date" required>
        
        <p for="time">Ora:</p>
        <select id="timePicker" name="time" required></select>
        
        <button type="submit">Prenota</button>
        
		<h6>Ti contatteremo noi all'orario scelto</h6>
    </form>
   
    <script src="../js/scripts.js" defer></script>
</body>
</html>

