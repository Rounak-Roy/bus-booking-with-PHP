<?php
  session_start();
  if(@$_SESSION['login_id'] != NULL){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="71%" class="nav-menu-brand" align="left">RedBus Clone</th>
    <td width="4%" class="nav-menu" align="middle"><a href="index.php">Home</a></td>
    <td width="1%" class="nav-menu" align="middle">|</td>
    <td width="8%" class="nav-menu" align="middle"><a href="booking.php">Book Now</a></td>
    <td width="1%" class="nav-menu" align="middle">|</td>
    <td width="8%" class="nav-menu" align="middle"><a href="#">My Booking</a></td>
    <td width="1%" class="nav-menu" align="middle">|</td>
    <td width="6%" class="nav-menu" align="middle"><a href="logout.php">Logout</a></td>
  </tr>
</table>
<?php
  }
  else{
?>
<table  width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="80%" class="nav-menu-brand" align="left">RedBus Clone</th>
    <td width="4%" class="nav-menu" align="middle"><a href="#">Home</a></td>
    <td width="1%" class="nav-menu" align="middle">|</td>
    <td width="6%" class="nav-menu" align="middle"><a href="#contact">Offers</a></td>
    <td width="1%" class="nav-menu" align="middle">|</td>
    <td width="8%" class="nav-menu" align="middle"><a href="#offer">Contact us</a></td>
  </tr>
</table>
<?php
  }
?>
