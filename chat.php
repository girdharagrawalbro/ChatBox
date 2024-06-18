<?php
include 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
Chat Box

    </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
        

    @media screen and (max-width: 600px) {
    .chats{display: none;}}
</style>
<body>

<?php include "chat_list.php"; ?>

<div class="chatbox" id="chatbox">
<?php 
$data = $_SESSION['data'];
$username = $_GET['u'];
$sq = "SELECT * FROM user WHERE username = '$username';";
$r = mysqli_execute_query($conn, $sq);  
$data2 =mysqli_fetch_array($r);
$r_id = $data2['id'];
$s_id = $data['id'];

$s =  "UPDATE `chat` SET `isread` = '1' WHERE `recipient_id` = '$s_id' and sender_id = '$r_id'";
mysqli_execute_query( $conn,$s);

?>
 <header>
        <div class="header-text flex a-cen gap">
            <img src="svg/back.svg" alt="back" onclick="goback()">

            <?php echo $data2['name'] ?>
        </div>
        <div class="hamburger-menu" >

<div class="gap-2 flex">
<img src="svg/call.svg" alt="">
<img src="svg/v-call.svg" alt="">
<button class="svg-btn">
        <img src="svg/dots.svg" alt="" onclick="menu()">
        </button>
            <div class="menu-items" id="menu">
                <a href="contactprofile.php?u=<?php echo $username; ?>">Profile</a>
            </div>
            </div>
        </div>
    </header>
        <div class="chat-box">
        <div class="messages" id="messages">
            <?php

    // Select messages sent by the current user to the recipient
$sql1 = "SELECT * FROM chat WHERE sender_id = '$s_id' AND recipient_id = '$r_id' ORDER BY sent_at";
$res1 = mysqli_query($conn, $sql1);

// Select messages sent by the recipient to the current user
$sql2 = "SELECT * FROM chat WHERE sender_id = '$r_id' AND recipient_id = '$s_id' ORDER BY sent_at";
$res2 = mysqli_query($conn, $sql2);

// Fetch and merge all messages into a single array
$messages = [];
if ($res1 && $res2) {
    // Fetch messages from the first query
    while ($d1 = mysqli_fetch_array($res1)) {
        $messages[] = $d1;
    }
    // Fetch messages from the second query
    while ($d2 = mysqli_fetch_array($res2)) {
        $messages[] = $d2;
    }
}

// Sort messages by time
usort($messages, function($a, $b) {
    return strtotime($a['sent_at']) - strtotime($b['sent_at']);
});

// Display messages
foreach ($messages as $message) {
    if ($message['sender_id'] == $s_id) {
        // Sent message
        echo '<div class="sent-msg message flex a-cen">';
        echo '<span class="msg-content">' . $message["message"] . '</span>';

        echo '<span class="time">' . $message["sent_at"] . '</span>';

        
        
        if($message['isread']== '1'){

            echo '<img src="svg/blue-tick.svg" alt="" style="margin-left:5px">';
        }
        else{
            echo '<img src="svg/tick.svg" alt="" style="margin-left:5px">';

        }

        echo '</div>';
    } else {
        // Received message
        echo '<div class="received-msg message">';
        echo '<span class="msg-content">' . $message["message"] . '</span>';
        echo '<span class="time">' . $message["sent_at"] . '</span>';
        echo '</div>';
    }
}
    ?>
            </div>

            <div class="msg-sender">
                <form action="" method="post">
                    <input type="text" id="sender" name="sender_id" value="<?php echo $s_id ?>" style="display: none;">
                    <input type="text" id="reciver" name="recipient_id" value="<?php echo $r_id ?>" style="display: none;">

                    <div class="flex a-cen">
                        <input type="text" name="msg" id="messageInput" placeholder="Type a message..." required>
                        <!-- <input type="file" id="fileInput" accept="image/*" style="display: none;"> -->
<!-- Image element -->
                        <!-- <img src="svg/camera.svg" alt="img" id="imagePreview" style="cursor: pointer;"> -->


                        <button type="submit" name="send"><img src="svg/send.svg" alt=""></button>
                    </div>
                </form>
            </div>
        </div> 
        </div>
</body>
<script src="js/script.js"></script>
<!-- Add this script to your HTML file -->
<script>
   document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");

       form.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this);

            // Send the form data using AJAX
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "send_message.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response here
                    console.log(xhr.responseText);
                    window.location.reload();
                    // You can update UI or perform other actions based on the response
                }
            };
            xhr.send(formData);
        });
    });

    
    function updateChatUI(newMessage) {
        // Get the chat container element
        var chatContainer = document.getElementById('messages');

        // Create a new message element
        var msg = document.createElement('div');
        msg.classList.add('sent-msg', 'message');

        // Extract message content and sent time from the new message object
        var messageContent = newMessage.message;
        var sentAt = newMessage.sent_at;
        var isread = newMessage.isread;

        // Create HTML content for the new message
        var messageHTML = '<span class="msg-content">' + messageContent + '</span>';
        messageHTML += '<span class="time">' + sentAt + '</span>';
        if(isread == '1'){
            messageHTML+='<img src="svg/blue-tick.svg" alt="" style="margin-left:5px">';
            }
        else{
            messageHTML+= '<img src="svg/tick.svg" alt="" style="margin-left:5px">';
}

        // Set the inner HTML of the new message element
        msg.innerHTML = messageHTML;

        // Append the new message element to the chat container
        chatContainer.appendChild(msg);

        // Scroll to the bottom of the chat container to show the latest message
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }
</script>

</html>
<script>
// Get the file input and image elements
// var fileInput = document.getElementById('fileInput');
// var imagePreview = document.getElementById('imagePreview');

// // Add click event listener to the image element
// imagePreview.addEventListener('click', function() {
//     // Trigger a click event on the file input element
//     fileInput.click();
// });

// // Add change event listener to the file input element
// fileInput.addEventListener('change', function() {
//     // Check if a file is selected
//     if (fileInput.files && fileInput.files[0]) {
//         // Create a FileReader object to read the selected file
//         var reader = new FileReader();

//         // Set the onload event handler
//         reader.onload = function(e) {
//             // Set the src attribute of the image element to the data URL of the selected file
//             imagePreview.src = e.target.result;
//         };

//         // Read the selected file as a data URL
//         reader.readAsDataURL(fileInput.files[0]);
//     }
// });

        if(window.history.replaceState){
            window.history.replaceState(null,null, window.location.href);
        }

        window.addEventListener('load', function() {
    var myDiv = document.getElementById('messages');
    myDiv.scrollTop = myDiv.scrollHeight;
});

function fetchNewMessages() {
    var sender = document.getElementById("reciver").value;
    var receiver = document.getElementById("sender").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Parse the response and update the UI with new messages
                var newMessages = JSON.parse(xhr.responseText);
                // Update the chat interface with new messages
                updateReceived(newMessages);
            } else {
                // Handle errors
                console.error('Error fetching new messages:', xhr.status);
            }
        }
    };
    // Send a GET request to your server-side script to fetch new messages
    xhr.open('GET', 'fetch_new_messages.php?s=' + sender + '&r=' + receiver, true);

    xhr.send();
}

// Call fetchNewMessages function periodically (e.g., every 5 seconds)
setInterval(fetchNewMessages, 1000); // 5000 milliseconds = 5 seconds
// Keep track of message IDs that have already been displayed

// Keep track of message IDs that have already been displayed
var displayedMessageIds = [];

function updateChatUI(newMessages) {
    // Get the chat container element
    var chatContainer = document.getElementById('messages');

    // Loop through each new message
    newMessages.forEach(function(message) {
        // Check if the message ID has already been displayed
        if (!displayedMessageIds.includes(message.id)) {
            // Add the message ID to the displayedMessageIds array
            displayedMessageIds.push(message.id);

            // Create a new message element
            var msg = document.createElement('div');
            msg.classList.add('received-msg', 'message');

            // Extract message content and sent time from the message object
            var messageContent = message.message;
            var sentAt = message.sent_at;

            // Create HTML content for the message
            var messageHTML = '<span class="msg-content">' + messageContent + '</span>';
            messageHTML += '<span class="time">' + sentAt + '</span>';

            // Set the inner HTML of the message element
            msg.innerHTML = messageHTML;

            // Append the message element to the chat container
            chatContainer.appendChild(msg);
        }
    });

    // Optionally, scroll to the bottom of the chat container to show the latest messages
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

</script>
