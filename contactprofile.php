<!DOCTYPE html>
<html lang="en">
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Chat Box
    </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
#chatbox {
    width: 530px;
}
<style>.profile-sec {
    animation: myAnim .3s ease 0s 1 normal forwards;
}
@keyframes myAnim {
    0% {
        opacity: 0;
        transform: translateX(250px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}
@media screen and (max-width: 600px) {
    .chatbox {
        display: none;
    }
}
</style>
<body>
    <?php include "chat.php"; ?>
    <div class="profile-sec">
        <?php
        include 'conn.php';
        $username = $_GET['u'];
        $data = $_SESSION['data'];
        $sql = "SELECT * FROM user WHERE username = '$username';";
        $result = mysqli_execute_query($conn, $sql);
        $data2 = mysqli_fetch_array($result);
        $id = $data['id'];
        ?>
        <header>
            <div class="header-text flex a-cen gap">
                <img src="svg/back.svg" alt="" onclick="goback()">
                Profile
            </div>
            <div class="hamburger-menu">
                <img src="svg/dots.svg" alt="">
            </div>
        </header>
        <div class="profile">
            <div class="profile-img">
                <img src="img/<?php echo $data2["profile_pic"]; ?>" alt="profile">
            </div>
            <div class="data">
                <div>
                    <img src="svg/profile.svg" alt="">
                </div>
                <div>
                    <h4>
                        <span>
                            Name
                        </span>
                        <br>
                        <?php echo $data2["name"]; ?>
                    </h4>
                </div>
            </div>
            <div class="data">
                <div>
                    <img src="svg/info.svg" alt="">
                </div>
                <div>
                    <h4>
                        <span>
                            Username
                        </span>
                        <br>
                        <?php echo $data2["username"]; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/script.js"></script>
</html>
<?php
// Retrieve form data
if (isset($_POST['send'])) {
    $msg = $_POST['msg'];
    $sender_id = $_POST['sender_id'];
    $recipient_id = $_POST['recipient_id'];
    $sql = "INSERT INTO chat (`message`, `sender_id`, `recipient_id`) VALUES ('$msg', '$sender_id','$recipient_id')";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>