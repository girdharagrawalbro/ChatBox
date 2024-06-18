<?php
// Include your database connection
include 'conn.php';

// Retrieve the last message ID from the client-side request
$s = $_GET['r'];
$r = $_GET['s'];


// Prepare and execute SQL query to fetch new messages since the last message ID
$sql = "SELECT * FROM chat WHERE sender_id = '$r' AND recipient_id = '$s' ORDER BY sent_at desc limit 1";
$result = mysqli_query($conn, $sql);

// Fetch new messages and store them in an array
$newMessages = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $newMessages[] = $row;
    }
}
// Encode new messages array as JSON and send it back to the client
echo json_encode($newMessages);
?>
