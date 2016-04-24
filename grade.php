<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>PHP Quiz</title>

	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

	<div id="page-wrap">

		<h1>Final Quiz to find what is your car</h1>

      <?php

		$fid = $_POST['fid'];
		$name = $_POST['name'];
		$email = $_POST['email'];

        $answer1 = $_POST['question-1-answers'];
        $answer2 = $_POST['question-2-answers'];
        $answer3 = $_POST['question-3-answers'];
        $answer4 = $_POST['question-4-answers'];
        $answer5 = $_POST['question-5-answers'];
        $answer6 = $_POST['question-6-answers'];
        $answer7 = $_POST['question-7-answers'];
        $answer8 = $_POST['question-8-answers'];

        $score = 0;

    if ($answer1 == "Yes") {
	 	$score1 =0; }
	 elseif ($answer1 == "No"){
	 	$score1 =0; }
	 elseif ($answer1 == "I really want to"){
	 	$score1 =0; }
	 elseif ($answer1 == ""){
	  	$score1=0;
	}

	if ($answer2 == "Sedan") {
	 	$score2 =0; }
	 elseif ($answer2 == "Hatchback"){
	 	$score2 =0; }
	 elseif ($answer2 == "SUV"){
	 	$score2 =0; }
	 elseif ($answer2 == "MUV"){
	  	$score2=0;
	}
	elseif ($answer2 == ""){
	  	$score2=0;
	}

	if ($answer3 == "A") {
	 	$score3 =0; }
	 elseif ($answer3 == "B"){
	 	$score3 =0; }
	 elseif ($answer3 == "C"){
	 	$score3 =0; }
	 elseif ($answer3 == "D"){
	  	$score3=0;
	}
	 elseif ($answer3 == ""){
	  	$score3=0;
	}
	if ($answer4 == "Race them") {
	 	$score4 = 2; }
	 elseif ($answer4 == "Look away"){
	 	$score4 = 3; }
	 elseif ($answer4 == "Abuse them"){
	 	$score4 =4; }
	 elseif ($answer4 == "Wait for signal"){
	  	$score4= 1;
	}
	elseif ($answer4 == ""){
	  	$score4= 0;
	}
	if ($answer5 == "Mileage") {
	 	$score5 = 3; }
	 elseif ($answer5 == "Speed"){
	 	$score5 = 2; }
	 elseif ($answer5 == "Comfort"){
	 	$score5 = 1; }
	 elseif ($answer5 == "Build quality"){
	  	$score5= 4;
	}
	 elseif ($answer5 == ""){
	  	$score5= 0;
	}
	if ($answer6 == "Honk till he moves") {
	 	$score6 = 2; }
	 elseif ($answer6 == "Overtake him through the left"){
	 	$score6 = 4; }
	 elseif ($answer6 == "Wait for him to give way"){
	 	$score6 = 3; }
	  elseif ($answer5 == ""){
	   	$score6 = 0;
	 }
	if ($answer7 == "Turn up the bass so the whole street hears it") {
	 	$score7 = 2; }
	 elseif ($answer7 == "Radio? That's more distraction"){
	 	$score7 = 3; }
	 elseif ($answer7 == "Get in the zone and sing at the top of your voice"){
	 	$score7 = 1; }
	 elseif ($answer7 == ""){
	  	$score7 = 0;
	}
	if ($answer8 == "No, my car is my world") {
	 	$score8 = 2; }
	 elseif ($answer8 == "Yes, why not?"){
	 	$score8 = 1; }
	 elseif ($answer8 == "Maybe, it depends"){
	 	$score8 = 4; }
	 elseif ($answer8 == ""){
	  	$score8= 0;
	}
	$total = $score + $score1 + $score2 + $score3 + $score4 + $score5 + $score6 + $score7 + $score8;
    if ($total <  "8") {
		$type='The speed ';
	 	}
	 elseif ($total <  "10"){
	 	$type= 'The ECO';
	 	}
	 elseif ($total <  "16"){
	  	$type= 'The thrill';
	 	}
	 elseif ($total < "30"){
	  	$type= 'The thrill seeker';
	}
elseif ($total <  "3"){
	  	$type= 'The crusier  seeker';
	}
	
echo $total .'&nbsp;by&nbsp;'. $name .'&nbsp;<br>,emailid:'. $email .'user id: '. $fid.' and you are<br>&nbsp;' .$type. ' &nbsp;driver / rider :)<br>' ;

echo $answer1 .'<br>';
echo $answer2 .'<br>';
echo $answer3 .'<br>';

require 'dbconfig.php';

 $check = mysql_query("select * from Result where Fuid='$fid'")or die(mysql_error());
	$duplicate=mysql_num_rows($check);
	if($duplicate==0) { // if new user . Insert a new record
	
	$query = "INSERT INTO Result (Fuid,Ffname,Femail,type,total) VALUES ('$fid','$name','$email','$type','$total')";
	
	mysql_query($query);

	echo'The name '.$name.' is update in table<br><br>';
	echo $total .'&nbsp;by&nbsp;'. $name .'&nbsp;,emailid:'. $email .'user id: '. $fid.' and you are&nbsp;' .$type. ' &nbsp;driver / rider :)' ;

	} else {   // If Returned user . update the user record
	//$query = "UPDATE Result SET Ffname='$name', Femail='$email' , total='$total', type='$type' where Fuid='$fid'";
	echo'The name '.$name.' is already present in the user table';
	}


 $check = mysql_query("select * from Answer where Fuid='$fid'")or die(mysql_error());
	$duplicate=mysql_num_rows($check);
	if($duplicate==0) { // if new user . Insert a new record
	$query1 = "INSERT INTO Answer (Fuid,Ffname,Femail,car,cartype,carrate,type,total) VALUES ('$fid','$name','$email','$answer1','$answer2','$answer3',$type','$total')";
	mysql_query($query1);

	echo'The Answer '.$answer2.' is update in table<br><br>';
	echo $answer1 .'&nbsp;by&nbsp;'. $answer2 .'&nbsp;,emailid:'. $answer3 .'user id: '. $fid.' and you are&nbsp;' .$type. ' &nbsp;driver / rider :)' ;

	} else {   // If Returned user . update the user record
	//$query = "UPDATE Result SET Ffname='$name', Femail='$email' , total='$total', type='$type' where Fuid='$fid'";
	echo'The name '.$name.' is already present in the user table';
	}

?>
<div><a href="logout.php">Logout</a></div>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1697560097127611');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1697560097127611&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	</div>
</body>
</html>
