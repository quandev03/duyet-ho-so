<?php


function displayMessage($message, $type = 'success') {
  $types = ['success', 'warning', 'error'];
  if (!in_array($type, $types)) {
    $type = 'success';
  }
  
  echo "<div id='message' class='message {$type}'>{$message}</div>";
  echo "
  <script>
    let countdown = 3;
    const messageDiv = document.getElementById('message');
    const interval = setInterval(() => {
      if (countdown > 0) {
        messageDiv.innerHTML = '{$message} (' + countdown + 's)';
        countdown--;
      } else {
        clearInterval(interval);
        messageDiv.style.display = 'none';
      }
    }, 1000);
  </script>
  ";
}
