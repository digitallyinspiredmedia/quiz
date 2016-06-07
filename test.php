<?php
session_unset();
session_start();


?>
<?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
<div class="container">
<div class="hero-unit">

  <h1>Hello <?php echo $_SESSION['USERNAME']; ?></h1>
  <p>Welcome to "facebook login" tutorial</p>
  </div>
<div class="span4">
 <ul class="nav nav-list">
<li class="nav-header">Image</li>
	<li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
<li class="nav-header">Facebook ID</li>
<li><?php echo  $_SESSION['FBID']; ?></li>
<li class="nav-header">Facebook fullname</li>
<li><?php echo $_SESSION['FULLNAME']; ?></li>
<li class="nav-header">Facebook Email</li>
<li><?php echo $_SESSION['EMAIL']; ?></li>

<li> third_party_id : <span><?php echo $_SESSION['partyid']; ?>
<?php echo 'Name: ' . $user['name']; ?>
<li> bio : <span><?php echo $_SESSION['bio']; ?>
<li> birthday : <span><?php echo $_SESSION['birthday']; ?>

<li> education : <span><?php echo $_SESSION['college']; ?>
<?php
   	
$myArray = json_decode($college, true); echo $myArray[0]['id']; // Fetches the first ID echo $myArray[0]['name']; // Fetches the first name
?>
 <li> gender : <span><?php echo $_SESSION['gender']; ?>
<li> hometown : <span><?php echo $_SESSION['hometown']; ?>



<div><a href="logout.php">Logout</a></div>
</ul></div>
</div>

<?php endif ?>
<?php

?>