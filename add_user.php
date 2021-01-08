<html>

<?php include 'base.html'; ?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$db = mysqli_connect('localhost','root','','cs306');

if($db->connect_errno > 0){
  die('Unable to connect to database [' . $db->connect_error . ']');
}

?>
<div>
<div class="container">
  <br>
  <h2>User Panel</h2>
  <div class="row">
    <div class="col-sm-6" style="background-color:lavender;">
      ADD USER
      <form action="add_user_form.php" method="POST">
        <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">
          <p>Username:</p>
          <p>Location:</p>
          <p>Password:</p>

        </div>
        <div class="col-sm-3" style="background-color:lavender;">
          <input type="text" id="fname" name="uname" placeholder="Username"required><br>
          <input type="text" id="loc" name="loc" placeholder="Location"required><br>
          <input type="password" id="passw" name="passw" placeholder="Password"required><br><br>
          <button type="submit" class="btn btn-primary my-sm-0">SEND</button>
        </div></div>

      </form>


    </div>
    <div class="col-sm-6" style="background-color:lavenderblush;">
      DELETE USER


      <?php include 'list_users.php'; ?>

      <form action="add_delete_user_form.php" method="POST">
      <select name="ids">

      <?php

      $sql_command = "SELECT Username FROM User";

      $myresult = mysqli_query($db, $sql_command);

      while($id_rows = mysqli_fetch_assoc($myresult))
      {
        $id = $id_rows['Username'];
        echo "<option value=$id>".$id."</option>";
      }

      ?>
      </select>

      <button class="btn btn-primary">DELETE</button>
      </form>


    </div>
  </div>
</div>
</div>









</body>
</html>
