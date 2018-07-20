<?php
session_start(); // Starting Session

$db=mysql_connect('localhost','root','');

if(!$db)
exit("error");

//print "Connection done";
$username=$_POST["p-name"];
$password=$_POST["p-pass"];

$er=mysql_select_db("carpool");

if(!$er)
exit("error");
//print "database selected";

$qu="select * from profile where password='$password' AND profileid='$username';";
$res= mysql_query($qu);
$rows = mysql_num_rows($res);

if(!$res)
{  print "query error";
   exit();
	}
if($rows==1)
{
	if($username=='Admin'&&$password=='abc123')
	{
	$_SESSION['login_user']=$username; 
//echo "found";
	header("Location: admin_page.html");
	}

	else
	{$_SESSION['login_user']=$username; 
//echo "found";
	header("Location: Home_page.html");
	}

}
 
else 
{
  echo "<script type ='text/javascript'> alert('Invalid username or password'); window.location.replace(\"firstpage.html\"); </script> ";
}


?>
