<?php
include "conn.php";
$msg = $_POST['msg'];
$sender_id = $_POST['sender_id'];
$recipient_id = $_POST['recipient_id'];
$sql = "INSERT INTO chat (`message`, `sender_id`, `recipient_id`) VALUES ('$msg', '$sender_id','$recipient_id')";
if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
