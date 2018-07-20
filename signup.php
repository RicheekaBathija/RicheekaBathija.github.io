<html>
<head>
<title>signupform</title>
</head>
<body>
<?php
$db=mysql_connect('localhost','root','');
if(!$db)
exit("error");

//print "connection done";

$nam=$_POST["p-name"];
$id=$_POST["p-id"];
$email=$_POST["p-email"];
$phno=$_POST["p-phno"];
$addr=$_POST["p-addr"];
$pass=$_POST["p-pass"];
//echo $nam,$id,$email,$phno,$addr,$pass;

$er=mysql_select_db("carpool");
if(!$er)
exit("error");
//print "database selected";

$qu="insert into profile (name,profileid,email,phonenumber,address,password) values ('$nam','$id','$email','$phno','$addr','$pass');";

$result=mysql_query($qu);
//print $result;

if(!$result)
 {
  print "error33";
  exit;
 }
//echo("SUCCESSFULLY SIGNED UP ");
echo "<script type ='text/javascript'> alert('Succesfully signed up. Please login to continue.'); window.location.replace(\"firstpage.html\"); </script> "; 

?>
</body>
</html>