<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT * from Result';

mysql_select_db('quiz');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "UID :{$row['Fuid']}  <br> ".
         "Ffname		 : {$row['Ffname']} <br> ".
         "Femail	 : {$row['Femail']} <br> ".
         "type : {$row['type']} <br> ".
         "total	 : {$row['total']} <br> ".
         "--------------------------------<br>";
}

mysql_close($conn);
?>
