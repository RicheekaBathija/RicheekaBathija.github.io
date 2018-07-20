 
<?php
 session_start();
 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
	background-image: url("spots.jpg");
	  background-repeat:no-repeat; background-size: cover;  top:0;left:0; margin:auto;
	 /* background-color:#4c6a92;*/
    }
.card 
{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  min-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color:white;
  cell-padding:15px;
  border: solid 2px;
  position:absolute; top:100px;
left:450px;}

.card1 
{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  min-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color:white;
  cell-padding:15px;
  border: solid 2px;
  position:absolute; top:100px;left:50;
  
}


.card2
{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  min-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color:white;
  cell-padding:15px;
  border: solid 2px;
  position:absolute; top:100px;left:900px;
  
}
.title 
{
  color: grey;
  font-size: 18px;
}

button
 {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover 
{
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">Passenger Information</h2>

<div class="card"> <?php
 $db=mysql_connect('localhost','root','');

if(!$db)
exit("error");
$er=mysql_select_db("carpool");
$qu="select passenger1,passenger2,passenger3 from profile where profileid ='".$_SESSION['login_user']."' ";
$m=mysql_query($qu);
$row=mysql_fetch_array($m);
$values=array_values($row);
$p1=htmlspecialchars($values[1]);
$p2=htmlspecialchars($values[3]);
$p3=htmlspecialchars($values[5]);

$qu1="select seat1,seat2,seat3 from profile where profileid = '".$_SESSION['login_user']."';";
$re=mysql_query($qu1);
$rowss=mysql_fetch_array($re);
$val=array_values($rowss);
$val1=htmlspecialchars($val[1]);
$val2=htmlspecialchars($val[3]);
$val3=htmlspecialchars($val[5]);



if($p1=='x')
    print "No Passengers";
else	
{print "Passenger 1: <br />";
 $que1="select * from profile where profileid ='$p1'";
  $result=mysql_query($que1);

$row=mysql_fetch_array($result);
$values=array_values($row);
$value1=htmlspecialchars($values[1]);
$value2=htmlspecialchars($values[3]);
$value3=htmlspecialchars($values[5]);
$value4=htmlspecialchars($values[7]);
$value5=htmlspecialchars($values[9]);



print "<h4>Name :$value1</h4>";   
print "<h4>Profile Id :$value2</h4>";   
print "<h4>Email :$value3</h4>";   
print "<h4>Phone Number :$value4</h4>";   
print "<h4>Address:$value5</h4>"; 
print "<h4>Seats :$val1</h4>";
}

if($p2!='x')	
{
?>
</div>
<div class="card1">
<?php
print "Passenger 2: <br />";
$qu="select * from profile where profileid ='$p2' ";
  $result=mysql_query($qu);

$row=mysql_fetch_array($result);
$values=array_values($row);
$value1=htmlspecialchars($values[1]);
$value2=htmlspecialchars($values[3]);
$value3=htmlspecialchars($values[5]);
$value4=htmlspecialchars($values[7]);
$value5=htmlspecialchars($values[9]);

print "<h4>Name :$value1</h4>";   
print "<h4>Profile Id :$value2</h4>";   
print "<h4>Email :$value3</h4>";   
print "<h4>Phone Number :$value4</h4>";   
print "<h4>Address:$value5</h4>";
print "<h4>Seats :$val2</h4>";
}

if($p3!='x')
{
	?>
	</div>
<div class="card2">
<?php
print "Passenger 3: <br />";
$qu="select * from profile where profileid ='$p3' ";
  $result=mysql_query($qu);

$row=mysql_fetch_array($result);
$values=array_values($row);
$value1=htmlspecialchars($values[1]);
$value2=htmlspecialchars($values[3]);
$value3=htmlspecialchars($values[5]);
$value4=htmlspecialchars($values[7]);
$value5=htmlspecialchars($values[9]);

print "<h4>Name :$value1</h4>";   
print "<h4>Profile Id :$value2</h4>";   
print "<h4>Email :$value3</h4>";   
print "<h4>Phone Number :$value4</h4>";   
print "<h4>Address:$value5</h4>";
print "<h4>Seats :$val3</h4>";
}  

?>
  </div>

</body>
</html>