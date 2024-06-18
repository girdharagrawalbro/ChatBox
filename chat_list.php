
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Chat Box</title>
</head>
<style>
body {
    background-color: rgba(31, 41, 55, 1);
}

#add,
#userprofile {
    animation: myAnim .3s ease 0s 1 normal forwards;
}

@keyframes myAnim {
    0% {
        opacity: 0;
        transform: translateX(-250px);
    }

    100% {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>

<body>
    <div class="sidenav desk">
        <div>
            <ul>
                <li onclick="show('chat')">
                    <img src="svg/msg.svg" alt="">
                </li>
                <li onclick="show('status')">
                    <img src="svg/status.svg" alt="">
                </li>
                <li>
                    <img src="svg/archive.svg" alt="">
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li onclick="show('profile')">
                    <img src="svg/profile.svg" alt="">
                </li>
                <li>
                    <img src="svg/settings.svg" alt="">
                </li>
            </ul>
        </div>
    </div>
 
    <div class="chats">
        <div class="add" id="chat" style="display:block">
            <header>
                <div class="header-text flex a-cen">Chats</div>
                <div class="hamburger-menu flex gap-2">
                    <button class="svg-btn" onclick="show('add')">

                        <img src="svg/plus.svg" alt="add" class="desk">
                    </button>
                    <button class="svg-btn mobile" onclick="show('profile')">
                        <img src="svg/profile.svg" alt="profile">
                    </button>
                </div>
            </header>
            <div class="search-bar">
                <input type="search" placeholder="Search" disabled>
            </div>
            <div class="chat-list">
                <?php
                    $data = $_SESSION['data'];
                    $id = $data['id'];
                    $sql = "SELECT * FROM user WHERE id IN (SELECT recipient_id FROM chat WHERE sender_id = '$id' UNION SELECT sender_id FROM chat WHERE recipient_id = '$id' )";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        // Fetch each row from the result set
                        while ($row = mysqli_fetch_assoc($result)) {
                            $r_id = $row['id'];
                            $s = "SELECT * FROM chat WHERE (sender_id ='$id' AND recipient_id='$r_id') OR (sender_id='$r_id' AND recipient_id='$id') ORDER BY sent_at DESC LIMIT 1";
                            $r = mysqli_query($conn, $s);
                            $d = mysqli_fetch_array($r);
                            $sread = "SELECT * FROM chat WHERE sender_id ='$r_id' AND recipient_id='$id'  And `isread` = '0'";
                            $rread = mysqli_query($conn, $sread);
                            $nr = mysqli_num_rows($rread);
                            ?>
                <div class="chat-item" onclick="openchat('<?php echo $row['username']; ?>')">
                    <div class="profile-pic">
                        <img src="img/<?php echo $row["profile_pic"]; ?>" alt="profile">
                    </div>
                    <div class="chat-details">
                        <div>
                            <div class="chat-name">
                                <?php echo $row['name']; ?>
                            </div>
                            <div class="last-message flex j-bet">
                                <?php echo $d['message']; ?>
                            </div>
                        </div>
                        <div class="new-msg">
                            <div>
                                <?php 
                            if($nr == '0')
                            {
                                echo "";
                            }
                            else{
                                echo '<span style="background:green;border-radius:50%;padding:5px;">
                                 ' . $nr . '
                                </span>';
                                }
                                ?>
                            </div>
                            <div style="font-size: 12px">
                                <?php echo $d['sent_at']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                    } else {
                        // Handle query error
                        echo "Error: " . mysqli_error($conn);
                    }
                    ?>
            </div>
            <img src="svg/plus.svg" alt="add" onclick="show('add')" class="add-button mobile">
        </div>

        <div class="add" id="status">
            <header>
                <div class="header-text flex a-cen gap">

                    Updates
                </div>
            </header>
            <div style="padding: 0px 15px">
                <h3>
                    Status
                    </h2>
            </div>
            <div class="status flex">
                <div class="useraddstatus">
                    <div class="profile-pic">
                        <div class="status-indicator"></div>
                        <img src="img/<?php echo $data["profile_pic"]; ?>" alt="profile" class="user-status">
                        <span class="add-span">+</span>
                    </div>
                </div>
                <div class="status-list">
                    <?php 
        $statussql = "Select * from status";
        $resstatus = mysqli_query($conn, $statussql);
        while ($status = mysqli_fetch_assoc($resstatus)){
    ?>
                    <div class="profile-pic">
                        <div class="status-indicator"></div>
                        <img src="img/<?php echo ""; ?>" alt="profile">
                    </div>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <img src="svg/camera.svg" alt="add" onclick="addStatus()" class="add-button mobile">
        </div>

        <div class="add" id="comunity">
        </div>

        <div class="add" id="call">
        </div>

        <div class="bottom-nav mobile">
    <ul class="flex ul">
        <li class="" onclick="show('chat', this)"><img src="svg/msg.svg" alt="">Message</li>
        <li onclick="show('status', this)"><img src="svg/status.svg" alt="">Status</li>
        <li onclick="show('comunity', this)"><img src="svg/profile.svg" alt="">Community</li>
        <li onclick="show('calls', this)"><img src="svg/call.svg" alt="">Calls</li>
    </ul>
</div>

        <div class="add" id="add">
            <header>
                <div class="header-text flex a-cen gap">
                    <button class="svg-btn" onclick="closeshow('add')">
                        <img src="svg/back.svg" alt="back" >
                    </button>
                    Add Contact
                </div>
            </header>
            <div class="search-bar">
                <input type="search" placeholder="Search" disabled>
                <br>
                <br>
                CONTACTS ON CHAT BOX
            </div>
            <div class="chat-list">
                <?php
                    $username = $_SESSION['username'];
                    $s1 = "SELECT * FROM user WHERE username != '$username';";
                    $r1 = mysqli_execute_query($conn, $s1);
                    while ($d1 = mysqli_fetch_array($r1)) { ?>
                <div class="chat-item" onclick="openchat('<?php echo $d1['username'] ?>')">
                    <div class="profile-pic">
                        <img src="img/<?php echo $d1["profile_pic"]; ?>" alt="">
                    </div>
                    <div class="chat-details">
                        <div class="chat-name">
                            <?php echo $d1['name'] ?>
                        </div>
                        <div class="last-message"></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="add" id="profile">
            <header>
                <div class="header-text flex a-cen gap">
                    <button class="svg-btn" onclick="closeshow('profile')">
                        <img src="svg/back.svg" alt="">
                    </button>
                    Profile
                </div>
                <div class="hamburger-menu">
                    <img src="svg/dots.svg" alt="">
                </div>
            </header>
            <div class="profile">
                <div class="profile-img">
                    <img src="img/<?php echo $data["profile_pic"]; ?>" alt="profile">
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
                            <?php echo $data["name"]; ?>
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
                            <?php echo $data["username"]; ?>
                        </h4>
                    </div>
                </div>
                <br>
                <br>
                <div class="btns">
                    <button>Change Password</button>
                    <br>
                    <br>
                    <a href="logout.php"> <button>Logout</button></a>
                </div>
            </div>
        </div>

    </div> 
</body>
<script src="js/script.js"></script>
<script>
function show(id, element) {
  // Hide all elements with class 'add'
  var addElements = document.querySelectorAll('.add');
  addElements.forEach(function(element) {
      element.style.display = "none";
  });

  // Remove background color from all li elements
  var allLiElements = document.querySelectorAll('.ul li');
  allLiElements.forEach(function(li) {
    li.style.background = "transparent";
  });

  // Show the element with the specified id
  var elementToShow = document.getElementById(id);
  if (elementToShow) {
     elementToShow.style.display = "block";
  }

  // Change the color of the clicked li's image
  var img = element.querySelector('img');
  if (img) {
    img.style.background = "rgba(41, 233, 50, 0.5)"; // Assuming the SVG has a fill color

  }
}

function closeshow(id){
  document.getElementById('chat').style.display = "block";
document.getElementById(id).style.display = "none";

}
  window.addEventListener('popstate', function(event) {
      userprofile.style.left = '-500px'; // Hide the sidebar
  console.log('Back button clicked');
});
</script>

</html>
