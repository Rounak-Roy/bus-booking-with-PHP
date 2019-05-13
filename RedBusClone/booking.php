<?php
  include "includes/connection.php";
  //session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: RedBus Clone ::</title>
    <link href="style/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/all.js"></script>
    <script language="javascript" src="js/calendarDateInput.js"></script>
  </head>
  <body>
    <?php include "includes/header.php";?>
    <div class="container">
      <center><h1>Welcome <?php echo $_SESSION['name']; ?>!</h1></center>
      <div class="contain">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th><h3 class="head">Choose what you want to book :</h3></th>
            </tr>
            <tr>
              <td width="25%" align="center" id="box">
                <img src="images/bus.png" alt="">
                <h3 class="head">Bus Booking</h3>
                <button id="busbox" onclick="changeBus()" class="btn1">Book Now</button>
              </td>

              <td width="25%" align="center" id="box">
                <img src="images/flight.png" alt="">
                <h3 class="head">Flight Booking</h3>
                <button id="busbox" onclick="changeFlight()" class="btn1">Book Now</button>
              </td>

              <td width="25%" align="center" id="box">
                <img src="images/car.png" alt="">
                <h3 class="head">Car Booking</h3>
                <button id="busbox" onclick="changeCar()" class="btn1">Book Now</button>
              </td>

              <td width="25%" align="center" id="box">
                <img src="images/hotel.png" alt="">
                <h3 class="head">Hotel Booking</h3>
                <button name="busbox" id="busbox" onclick="changeHotel()" class="btn1">Book Now</button>
              </td>
            </tr>
          </table>
      </div>

      <div id="wrap">
            <hr>
            <h2 class="head">Bus Booking</h2>
            <form action="" method="post">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr height="50px" width="100%">
                  <th align="right">From</th>
                  <td align="middle">:</td>
                  <td align="left">
                    <select name="from" id="from" onchange="chk_ft(this.id)">
                      <option value="0">...Select Source...</option>
                      <?php
                        $fsql = "SELECT * FROM source_destination WHERE sd_status='1' ORDER BY sd_name";
                        $fsql_result = mysqli_query($connect, $fsql);
                        while($fdata = mysqli_fetch_assoc($fsql_result)){
                          ?>
                          <option value="<?php echo $fdata['sd_id']; ?>" <?php if(@$_POST['from'] == $fdata['sd_id']){ echo "selected";} ?>><?php echo $fdata['sd_name']; ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </td>
                </tr>

                <tr height="50px" width="100%">
                  <th align="right">To</th>
                  <td align="middle">:</td>
                  <td align="left">
                    <select name="to" id="to" onchange="chk_ft(this.id)">
                      <option value="0">...Select Destination...</option>
                      <?php
                        $tsql = "SELECT * FROM source_destination WHERE sd_status='1' ORDER BY sd_name";
                        $tsql_result = mysqli_query($connect, $tsql);
                        while($tdata = mysqli_fetch_assoc($tsql_result)){
                          ?>
                          <option value="<?php echo $tdata['sd_id']; ?>" <?php if(@$_POST['to'] == $tdata['sd_id']){ echo "selected";} ?>><?php echo $tdata['sd_name']; ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </td>
                </tr>

                <tr height="50px" width="100%">
                  <th align="right">Date of Journey</th>
                  <td align="middle">:</td>
                  <td align="left">
                    <script>DateInput('doj', true, 'YYYY-MM-DD')</script>
                  </td>
                </tr>

                <tr height="50px" width="100%">
                  <td colspan="3" align="center"><input type="submit" name="submit" value="Search Bus" class="btn2"></td>
                </tr>
              </table>
            </form>

            <?php
              if(isset($_POST['submit'])){
                ?>
                <script>
                  var x = document.getElementById("wrap");
                  x.style.display = "block";
                </script>
                <table width="100%" border="0" align="center" cellpadding="0" cellpadding="0">
                  <tr class="tr1">
                    <th width="6%" scope="row">Sl.</th>
                    <td width="61%">Bus Description </td>
                    <td width="33%" align="center">Option</td>
                  </tr>

                <?php
                    $source = @$_POST['from'];
    	              $destn = @$_POST['to'];
      	            $sql = "SELECT * FROM route_master rm, bus bd where rm.source_id='$source' and rm.destn_id='$destn' and rm.bus_id=bd.bus_id";
    	              //echo $sql;exit;
    	              $rec = mysqli_query($connect,$sql);
    	              $num = mysqli_num_rows($rec);
    	              $i = 1;
    	              while($i <= $num){
                      $fres = mysqli_fetch_assoc($rec)
                    ?>
                      <tr class="tr">
                        <td align="center"><?php echo $i;?></td>
                        <td height="30"><?php echo $fres['bname'];?></td>
                        <td align="center"><a href="bus_detail.php?I=<?php echo $fres['bus_id'];?>&amp;C=<?php echo $fres['total_seat'];?>&amp;SC=<?php echo $source;?>&amp;DS=<?php echo $destn;?>&amp;DT=<?php echo $_POST['doj'];?>">Book Now </a></td>
                      </tr>
                      <?php
                      $i++;
                    }
                  ?>
                </table>
                <?php
              }
      ?>
    </div>

      <div class="foot">
        <?php include "includes/footer.php";?>
      </div>
    </div>
  </body>
</html>
