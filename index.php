<?php
session_unset();
session_start();
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Quiz App</title>

    <style>
    body{
     font: 400 30px/40px 'Montserrat', sans-serif;
    }
    h1{
     font: 700 40px/60px 'Montserrat', sans-serif;
     padding-top: 80px;
    }
    #page-wrap{
     position: relative;
    }
    .item{
     margin: 0 auto;
     padding: 0 40vh;
    }
    .fromgroup{
     display: block;
     padding: 10px;
    }
    input{
     display: inline-block;
     padding: 10px;
    }
    </style>

 </head>
  <body>
  <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
<div class="container" style="display: none;">
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
<div><a href="logout.php">Logout</a></div>
</ul></div>
</div>
<div class="container">
<?php
  include 'test.php';
 ?>

</div>
    <?php else: ?>     <!-- Before login -->
<div class="container">
<h1>Login with Facebook</h1>
           Not Connected
<div>
      <a href="fbconfig.php">Login with Facebook</a></div>

	  </div>
      </div>
    <?php endif ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" > </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/0.1.14/jquery.scrollify.min.js" > </script>
    <script>
    $( "input" ).change(function() {
      var $this = $(this);
      $('html, body').animate({
        scrollTop: $($this).parent().next().offset().top
     }, 400);
    });
    $(function() {
    					$.scrollify({
    						section : ".item",
          scrollbars: false
    					});
    				});
        WebFontConfig = {
        google: { families: [ 'Montserrat:400,700:latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>


  </body>
</html>
