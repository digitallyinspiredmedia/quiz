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

    if ($answer1 == "A") {
	 	$score1 =0; }
	 elseif ($answer1 == "B"){
	 	$score1 =0; }
	 elseif ($answer1 == "C"){
	 	$score1 =0; }
	 elseif ($answer1 == "D"){
	  	$score1=0;
	}

	if ($answer2 == "A") {
	 	$score2 =0; }
	 elseif ($answer2 == "B"){
	 	$score2 =0; }
	 elseif ($answer2 == "C"){
	 	$score2 =0; }
	 elseif ($answer2 == "D"){
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
	if ($answer4 == "A") {
	 	$score4 = 2; }
	 elseif ($answer4 == "B"){
	 	$score4 = 3; }
	 elseif ($answer4 == "C"){
	 	$score4 =4; }
	 elseif ($answer4 == "D"){
	  	$score4= 1;
	}
	if ($answer5 == "A") {
	 	$score5 = 3; }
	 elseif ($answer5 == "B"){
	 	$score5 = 2; }
	 elseif ($answer5 == "C"){
	 	$score5 = 1; }
	 elseif ($answer5 == "D"){
	  	$score5= 4;
	}
	if ($answer6 == "A") {
	 	$score6 = 2; }
	 elseif ($answer6 == "B"){
	 	$score6 = 4; }
	 elseif ($answer6 == "C"){
	 	$score6 = 3; }
	//  elseif ($answer5 == "D"){
	//   	$score6 = 1;
	// }
	if ($answer7 == "A") {
	 	$score7 = 2; }
	 elseif ($answer7 == "B"){
	 	$score7 = 3; }
	 elseif ($answer7 == "C"){
	 	$score7 = 1; }
	//  elseif ($answer7 == "D"){
	//   	$score7=1;
	// }
	if ($answer8 == "A") {
	 	$score8 = 2; }
	 elseif ($answer8 == "B"){
	 	$score8 = 1; }
	 elseif ($answer8 == "C"){
	 	$score8 = 4; }
	//  elseif ($answer8 == "D"){
	//   	$score8=1;
	// }
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
//echo $total .'&nbsp;by&nbsp;'. $name .'&nbsp;,emailid:'. $email .'user id: '. $fid.' and you are&nbsp;' .$type. ' &nbsp;driver / rider :)' ;

require 'dbconfig.php';

 $check = mysql_query("select * from Result where Fuid='$fid'")or die(mysql_error());
	$duplicate=mysql_num_rows($check);
	if($duplicate==0) { // if new user . Insert a new record
	$query = "INSERT INTO Result (Fuid,Ffname,Femail,type,total) VALUES ('$fid','$name','$email','$type','$total')";
	mysql_query($query);
	echo'The name '.$name.' is update in table';

	} else {   // If Returned user . update the user record
	//$query = "UPDATE Result SET Ffname='$name', Femail='$email' , total='$total', type='$type' where Fuid='$fid'";
	echo'The name '.$name.' is already present in the user table';
	}
?>
<div><a href="logout.php">Logout</a></div>

	</div>
</body>
</html>
