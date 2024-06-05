

<?php
//<!-- Pagina gestione login token google, creazione evento, controllo orario se già prenotato -->

session_start();
/*
Ho usato il pacchetto vendor per gestire le dipendenze (come quelle di Google Client).
*/
require 'vendor/autoload.php'; 
require 'config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

$client = new Google_Client();
$client->setAuthConfig('../json/client_secret.json');
$client->setScopes(Google_Service_Calendar::CALENDAR);
$client->setRedirectUri('http://localhost/WebProgramming/php/calendar.php');
$client->setAccessType('offline');

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        $_SESSION['access_token'] = $client->getAccessToken();
    }
} else {
    if (!isset($_GET['code'])) {
        $auth_url = $client->createAuthUrl();
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        exit();
    } else {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
        header('Location: ' . filter_var('http://localhost/WebProgramming/php/calendar.php', FILTER_SANITIZE_URL));
        exit();
    }
}

if ($client->getAccessToken()) {
    $service = new Google_Service_Calendar($client);

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (isset($data['title'], $data['date'], $data['time'])) {
        $title = $data['title'];
        $date = $data['date'];
        $time = $data['time'];

        // Controlla se l'orario è già stato prenotato
        $stmt = $conn->prepare("SELECT id FROM orari WHERE orario = ?");
        $stmt->bind_param("s", $time);
        $stmt->execute();
        $result = $stmt->get_result();
        $orario = $result->fetch_assoc();
        $id_orario = $orario['id'];

        $stmt = $conn->prepare("SELECT * FROM prenotazioni WHERE data = ? AND id_orario = ?");
        $stmt->bind_param("si", $date, $id_orario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'Orario già prenotato']);
        } else {
            $stmt = $conn->prepare("INSERT INTO prenotazioni (data, id_orario, descrizione) VALUES (?, ?, ?)");
            $stmt->bind_param("sis", $date, $id_orario, $title);
            $stmt->execute();

            // Crea evento sul calendario Google
            $startDateTime = new DateTime($date . 'T' . $time . ':00');
            $endDateTime = clone $startDateTime;
            $endDateTime->modify('+30 minutes');

            $event = new Google_Service_Calendar_Event([
                'summary' => $title,
                'start' => [
                    'dateTime' => $startDateTime->format(DateTime::RFC3339),
                    'timeZone' => 'Europe/Rome',
                ],
                'end' => [
                    'dateTime' => $endDateTime->format(DateTime::RFC3339),
                    'timeZone' => 'Europe/Rome',
                ],
            ]);

            $calendarId = '0a915426145060d54a58419dfe70e5596ae3ea71e6484da55ae0fe0ffb668400@group.calendar.google.com';

            try {
                $service->events->insert($calendarId, $event);
                echo json_encode(['success' => true]);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            }
        }
        
    } else {
        header('Location: http://localhost/WebProgramming/php/prenotations.php');
        exit();
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Autenticazione fallita']);
}
?>
