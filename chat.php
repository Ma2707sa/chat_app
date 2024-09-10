<?php
include('db.php');
      $query = "SELECT * FROM `chat-1` ORDER BY id DESC";
      $run = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($run)) {
          $name = htmlspecialchars($row['name']); // لحماية البيانات من هجمات XSS
          $msg = htmlspecialchars($row['msg']);
          $date = $row['date'];
      ?>
      <div id="chatdata">
      <span style="color:gold;"><?php echo $name; ?></span>
      <span>:</span>
      <span><?php echo $msg; ?></span>
      <span style="color:crimson; float:right;"><?php echo $date;?></span>
      </div>
      <?php } ?> 
