<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat-App</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="chat.png">
  <script>
    function aj(){
      var req = new XMLHttpRequest();
      req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
          document.getElementById("chat").innerHTML = req.responseText;
        }
      }
      req.open('GET', 'chat.php', true);
      req.send();
    }
    setInterval(function(){aj()}, 1000);
  </script>
</head>
<body onload="aj();">
  <div id="container">
    <div id="chatbox"> <!-- chatbox: Container for chat messages -->
      <div id="chat">

      </div>
    </div>
    <form action="index.php" method="post">
      <input type="text" name="name" placeholder="Enter Your Name" required>
      <textarea name="msg" placeholder="Enter Your Message" required></textarea>
      <input type="submit" name="submit" value="Send">
    </form>

    <!-- زر حذف جميع الرسائل -->
    <form action="delete.php" method="post">
      <input type="submit" name="delete_all" value="Delete All Messages">
    </form>

    <!-- زر تنزيل التطبيق -->

    <?php 
    if(isset($_POST['submit'])){
      $n = mysqli_real_escape_string($con, $_POST['name']); // حماية من حقن SQL (Protection against SQL injection)
      $m = mysqli_real_escape_string($con, $_POST['msg']);

      if(!empty($n) && !empty($m)) {
          $insert = "INSERT INTO `chat-1` (name, msg) VALUES ('$n', '$m')";
          $run_insert = mysqli_query($con, $insert);

          if($run_insert){
              // إعادة تحميل الصفحة لتحديث الرسائل (Reload the page to refresh messages)
              echo "<meta http-equiv='refresh' content='0'>";
          } else {
              echo "Error: " . mysqli_error($con);
          }
      } else {
          echo "<p style='color:red;'>Please enter both name and message!</p>";
      }
      header('location:index.php');
    }
    ?>
  </div>
</body>
</html>
