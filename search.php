<html>
<head>
<title>
First db page
</title>
</head>
<body>
<?php
 session_start();
 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

 body
{background-image: url("spots.jpg");
	  background-repeat:no-repeat; background-size: cover;  top:0;left:0; margin:auto;
	 /* background-color:#4c6a92;*/


}



.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 500px;
  height:500px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color:white;
  cell-padding:15px;
  border: solid 2px;
  position:relative; top:100px;
  overflow: auto;
  }

.title {
  color: grey;
  font-size: 18px;
}

button {
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

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>



<div class="card">
<h2 style="text-align:center">Result</h2>
 <?php

$db=mysql_connect('localhost','root','');

if(!$db)
exit("error");

$x=$_POST["search"];
$er=mysql_select_db("carpool");

if(!$er)
exit("error");
function call($valuex)
{
$qm="select profileid,starttime,startdate from history where profileid='$valuex'";

$result2=mysql_query($qm);
if(!$result2)
 {
  print "error";
  //echo "<script type ='text/javascript'> alert('This user has not yet travelled as a passenger'); window.location.replace(\"search.html\"); </script> ";
 
 }
 
//print "<table border='3' align='center'>";
//print "<tr align='center'>";

$nr1=mysql_num_rows($result2);
$row1=mysql_fetch_array($result2);
$num_fie1=mysql_num_fields($result2);
//$keys1=array_keys($row1);

if($nr1==0)
	echo "<script type ='text/javascript'> alert('This user has not yet travelled as a passenger'); window.location.replace(\"search.html\"); </script> ";
 

//for($ron2=0;$ron2<$num_fie1;$ron2++)
//print "<th>".$keys1[2*$ron2+1]. "</th>";
$values2=array_values($row1);
print "<tr>";
for($ron=0;$ron<$nr1;$ron++)
{
print "<tr>";
$value2=htmlspecialchars($values2[1]);
print "<th>".$value2."</th>";
$value2=htmlspecialchars($values2[3]);
print "<th>".$value2."</th>";
$value2=htmlspecialchars($values2[5]);
    print "<th>".$value2."</th>";


print "</tr>";
$row1=mysql_fetch_array($result2);
}
   }



$qu1="select * from profile where passenger1='$x' or passenger2='$x' or passenger3='$x'";
$result7=mysql_query($qu1);
if(!$result7)
	print"eerrorr777";
$nr7=mysql_num_rows($result7);
$row7=mysql_fetch_array($result7);

$num_fie7=mysql_num_fields($result7);
$flag=0;
print "<table border='3' align='center'>";
print "<tr align='center'>";
print "<th> Profile id </th> <th> Start time </th><th> Start date </th>";
for($ron=0;$ron<$nr7;$ron++)
{
  $flag=1;
  $values=array_values($row7);
$value=htmlspecialchars($values[3]);



call($value);
   
$row7=mysql_fetch_array($result7);
   
}
if($flag==0)
	echo "<script type ='text/javascript'> alert('This user has not yet travelled as a passenger'); window.location.replace(\"search.html\"); </script> ";
?>

  </div>
  </body>
</html>


