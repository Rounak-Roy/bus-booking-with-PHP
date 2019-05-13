<?php
  include "includes/connection.php";
  if(isset($_POST['signup'])){
    echo"<script>
      location.replace('signup.php');
    </script>";
  }
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $search_sql = "SELECT * FROM login_master WHERE email_id='{$email}'";
    $search_sql_result = mysqli_query($connect,$search_sql);
    if(mysqli_num_rows($search_sql_result)>0){
      $data = mysqli_fetch_assoc($search_sql_result);
      if($password == $data['password']){
        session_start();
        $_SESSION['login_id'] = $data['login_id'];
        $_SESSION['name'] = $data['name'];

        echo "<script>
          location.replace('booking.php');
        </script>";
      }
      else{
        echo "<script>
          alert('Wrong password!');
          location.replace('index.php?');
        </script>";
      }
    }
    else {
      echo "<script>
        alert('User does not exists!');
        location.replace('index.php?');
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
    <div class="header">
      <?php include "includes/header.php";?>
    </div>
    <div class="container">

      <div id="intro">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" width="50%" class="leftDesc">
              <h2>Planning for a vacation with your family?
                <br>Don't worry, We have great amount of services and offers for you!
                <br>So that your vacation becomes memorable.</h2>
                <?php if(@$_SESSION['login_id'] == NULL){?> <button name="button" id="button" class="btn" onclick="change()">Let's get started</button> <?php } ?>
            </td>
            <td align="center" width="50%" class="rightDesc">
              <table width="100%" border="0" cellspacing="5" cellpadding="5">
                <tr>
                  <td width="50%" align="right"><img src="images/bus.png" alt=""></td>
                  <td width="50%" align="left"><img src="images/flight.png" alt=""></td>
                </tr>

                <tr>
                  <td width="50%" align="right"><img src="images/car.png" alt=""></td>
                  <td width="50%" align="left"><img src="images/hotel.png" alt=""></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>

      <div id="offer">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="head" align="center" colspan="4"><h1>Ongoing OFFERS!</h1></th>
          </tr>
          <tr>
            <td width="25%" align="center">
              <div class="box">
                <img src="images/offer.png" alt="">
                <br><br>
                <h3 class="head">Offer 1<h3>
              </div>
            </td>
            <td width="25%" align="center">
              <div class="box">
                <img src="images/offer.png" alt="">
                <br><br>
                <h3 class="head">Offer 2<h3>
              </div>
            </td>
            <td width="25%" align="center">
              <div class="box">
                <img src="images/offer.png" alt="">
                <br><br>
                <h3 class="head">Offer 3<h3>
              </div>
            </td>
            <td width="25%" align="center">
              <div class="box">
                <img src="images/offer.png" alt="">
                <br><br>
                <h3 class="head">Offer 4<h3>
              </div>
            </td>
          </tr>
        </table>
      </div>

      <div id="service">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="head" align="center" colspan="4"><h1>Services We Provide</h1></th>
          </tr>
          <tr>
            <td width="25%" align="center">
              <div class="box">
                <img src="images/service.png" alt="">
                <br><br>
                <h3 class="head">Service 1<h3>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <p>
              </div>
            </td>
            <td width="25%" align="center">
              <div class="box">
                <img src="images/service.png" alt="">
                <br><br>
                <h3 class="head">Service 2<h3>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <p>
              </div>
            </td>
            <td width="25%" align="center">
              <div class="box">
                <img src="images/service.png" alt="">
                <br><br>
                <h3 class="head">Service 3<h3>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <p>
              </div>
            </td>
            <td width="25%" align="center">
              <div class="box">
                <img src="images/service.png" alt="">
                <br><br>
                <h3 class="head">Service 4<h3>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <p>
              </div>
            </td>
          </tr>
        </table>
      </div>

      <div id="contact">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="head" align="center" colspan="3"><h1>Contact Details</h1></th>
          </tr>
          <tr>
            <td width="25%">
              <div class="box1">
                <center><img src="images/phone.png" alt=""></center>
                <br><br>
                <h3 class="head">Call us at</h3>
                <p>Phone no : 1234567890</p>
                <p>Helpline (Toll Free) : 033 123456</p>
              </div>
            </td>
            <td width="25%">
              <div class="box1">
                <center><img src="images/mail.png" alt=""></center>
                <br><br>
                <h3 class="head">Mail us at</h3>
                <p>Email id : RedbusClone2019@Redbus.com</p>
                <p>Community : redbus.community.co.in</p>
              </div>
            </td>
            <td width="25%">
              <div class="box1">
                <center><img src="images/address.png" alt=""></center>
                <br><br>
                <h3 class="head">Reach us at</h3>
                <p>Address : Address Line 1<br>Address Line 2<br>Address Line 3<br>Pincode</p>
              </div>
            </td>
          </tr>
        </table>
      </div>

      <div class="foot">
        <?php include "includes/footer.php";?>
      </div>
    </div>
    <div class="bg-modal">
      <div class="modal-contain">
        <div class="close">
          <p onclick="cancel()">+<p>
        </div>
        <h2 class="head">Login</h2>
        <form action="" method="post">
          <input type="text" name="email" value="" placeholder="Email ID">
          <input type="password" name="password" value="" placeholder="Password">
          <input type="submit" class="btn-login" name="submit" value="Submit">
          <br>
          <button name="signup" id="signup" class="btn-login" onclick="changeLogin()">Signup</button>
        </form>
      </div>
    </div>
  </body>
</html>
