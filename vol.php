<html>
<head>
<title>
First db page
</title>
</head>
<body>

<?php
session_start(); // Starting Session

$db=mysql_connect('localhost','root','');

if(!$db)
exit("error");

print "Connection done";
$nam=$_SESSION['login_user'];


$pickup=$_POST["start"];
$p1=$_POST["ma"];
$p2=$_POST["as"];
$p3=$_POST["asd"];
$p4=$_POST["asdf"];
$dest=$_POST["dest"];
$seat=$_POST["seat"];
$t=$_POST["usr_time"];
$d=$_POST["usr_date"];
//echo $x,$nam,$pickup,$p1,$p2,$p3,$p4,$dest,$seat,$t,$d;
$pickup=strtolower($pickup);
$p1=strtolower($p1);
$p2=strtolower($p2);
$p3=strtolower($p3);
$p4=strtolower($p4);
$dest=strtolower($dest);	
$er=mysql_select_db("carpool");

if(!$er)
exit("error");
//print "database selected";

$q="select * from volunteer where profileid='".$_SESSION['login_user']."'";
$ress=mysql_query($q);
$n=mysql_num_rows($ress);
if($n==0)
{		
$qu="insert into volunteer values ('$x','$nam','$pickup','$p1','$p2','$p3','$p4','$dest',$seat,'$t','$d','');";
$quq="insert into history values ('$x','$nam','$pickup','$p1','$p2','$p3','$p4','$dest',$seat,'$t','$d','','x','x','x');";

$resultq=mysql_query($quq);

$result=mysql_query($qu);
print $result;
if(!$result)
 {
  print "error daa";
  exit;
 }
$q="update profile set passenger1='x',passenger2='x',passenger3='x',seat1=0,seat2=0,seat3=0 where profileid='".$_SESSION['login_user']."'";
$res=mysql_query($q);
if(!$res)
	print "errorrrr";
 
echo "<script type ='text/javascript'> alert('You are now a Volunteer!'); window.location.replace(\"Home_page.html\"); </script> ";
}

else
  echo "<script type ='text/javascript'> alert('You have already volunteered. You cannot volunteer for 2 rides simultaneously'); window.location.replace(\"Home_page.html\"); </script> ";	
?>

</body>
</html>


