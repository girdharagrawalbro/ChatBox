if(window.history.replaceState){
  window.history.replaceState(null,null, window.location.href);
}

document.addEventListener("DOMContentLoaded", function() {
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("confirmPassword");
    var passwordError = document.getElementById("passwordMatch");
  
    // Function to check if password and confirm password match
    function checkPasswordMatch() {
      if (passwordField.value !== confirmPasswordField.value) {
        passwordError.style.color = "red";
        passwordError.textContent = "Passwords do not match";
      } else {
        passwordError.textContent = "";
      }
    }
  
    // Event listeners for password and confirm password fields
    passwordField.addEventListener("input", checkPasswordMatch);
    confirmPasswordField.addEventListener("input", checkPasswordMatch);
  });

  function menu(){
    document.getElementById("menu").style.display ="flex";
  }
  function openchat(username) {
   window.location.href = 'chat.php?u=' + username;
}

function goback() {
  window.history.back();
}


function back() {
  window.location.href= "chat_list.php";
}



// Function to adjust message sender position when the mobile keyboard is shown
function adjustMessageSenderPosition() {
  var chatBox = document.querySelector('.chat-box');
  var messageSender = document.querySelector('.msg-sender');
  
  // Subtract the height of the message sender from the chat box height
  var newHeight = chatBox.clientHeight - messageSender.offsetHeight + 'px';
  chatBox.style.height = newHeight; 
}

// Call the adjustMessageSenderPosition function when the window is resized
window.addEventListener('resize', adjustMessageSenderPosition);

// Function to send a message (you can replace this with your actual send message logic)

