<?php
  include "includes/connection.php";
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check_sql_query = "SELECT * FROM login_master WHERE email_id = '{$email}'";
    $check_sql_query_result = mysqli_query($connect, $check_sql_query);
    if($check_sql_query_result){
      $num_row = mysqli_num_rows($check_sql_query_result);
      //echo $num_row;
      //exit();
      if($num_row > 0){
        echo "<script>
        alert('User already registered!Please login!');
        location.replace('index.php');
        </script>";
      }
      else{
          $insert_sql = "INSERT INTO login_master(name,email_id,password) VALUES ('{$name}','{$email}','{$password}')";
          $insert_sql_result = mysqli_query($connect,$insert_sql);
          if($insert_sql_result){
            echo "<script>
                alert('Signup Success!');
                location.replace('signup.php?');
            </script>";
          }
          else {
            echo "<script>
              alert('Error in signing up!Please try again');
              location.replace('signup.php?');
            </script>";
          }
      }
    }
    else{
      echo "<script>
        alert('Error in signing up!Please try again');
        location.replace('signup.php?');
      </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: RedBus Clone ::</title>
    <link href="style/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/all.js"></script>
  </head>
  <body>
    <div class="bg-modal-signup">
      <div class="modal-contain">
        <div class="close-signup">
          <p onclick="cancelSignup()">+<p>
        </div>
        <h2 class="head">Signup</h2>
        <form action="" method="post">
          <input type="text" name="name" value="" placeholder="Name">
          <input type="text" name="email" value="" placeholder="Email ID">
          <input type="password" id="password" name="password" value="" placeholder="Password">
          <input type="password" id="rePassword" name="rePassword" value="" placeholder="Retype Password" onblur="checkPassword()">
          <input type="submit" class="btn-login" name="submit" value="Submit">
        </form>
      </div>
    </div>
  </body>
</html>
