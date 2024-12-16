<?php
require_once("vendor/autoload.php");
require_once("../../conn.php");
session_start();

$name = $_SESSION['name'];
$position = $_SESSION['position'];
$message = $_POST["message"];
if($position == 'admin'){
    $sent = $_SESSION["sent_to"];
}else{
    $sent = "admin";
}
date_default_timezone_set('Asia/Manila');
$time = date("Y-m-d H:i:s");

try {
    $stmt = $conn->prepare("INSERT INTO messages (username, position, message, created_at, sent_to) VALUES (?, ?, ?, ?, '$sent')");
    $stmt->bind_param("ssss", $name, $position, $message, $time);

    if ($stmt->execute()) {
        $app_id = '1897162';
        $app_key = 'e9e315430e211d373294';
        $app_secret = '3924cc91f8a78bdcadcc';
        $app_cluster = 'ap1';

        $pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);
        
        // Send both username and position in the data
        $data = [
            "username" => $name,
            "position" => $position,
            "message" => $message,
            "created_at" => $time,
            "sent_to" => $sent  // Add this line
        ];

        $pusher->trigger('timely-bath-36', 'add_message', $data);
        
        // Redirect based on user position
        $redirect_page = ($position === 'admin') ? 'message_adm.php' : 'message_cus.php';
        header("location: $redirect_page?status=success");
    }
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    header("location: " . ($_SESSION['position'] === 'admin' ? 'message_adm.php' : 'message_cus.php') . "?status=exception");
}
?>