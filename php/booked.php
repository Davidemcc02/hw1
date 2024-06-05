
<?php
session_start();
/* restituisce gli orari prenotati per una determinata data in formato JSON tramite una richiesta HTTP GET.
 allo script scripts.js (fetchBookedTimes(date)
*/
require 'config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$date = $_GET['date'];

$stmt = $conn->prepare("SELECT id_orario FROM prenotazioni WHERE data = ?");
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();
$bookedTimes = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode(['bookedTimes' => array_column($bookedTimes, 'id_orario')]);
?>
