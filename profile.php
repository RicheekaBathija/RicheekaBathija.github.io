 
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
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color:white;
  cell-padding:15px;
  border: solid 2px;
  position:relative; top:100px;
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
<h2 style="text-align:center">User Profile Card</h2>
 <?php
 $db=mysql_connect('localhost','root','');

if(!$db)
exit("error");
$er=mysql_select_db("carpool");
  $qu="select * from profile where profileid ='".$_SESSION['login_user']."' ";
  $result=mysql_query($qu);

$row=mysql_fetch_array($result);
$num_fie=mysql_num_fields($result);
$keys=array_keys($row);
$values=array_values($row);
$value1=htmlspecialchars($values[1]);
$value2=htmlspecialchars($values[3]);
$value3=htmlspecialchars($values[5]);
$value4=htmlspecialchars($values[7]);
$value5=htmlspecialchars($values[9]);

print "<h4>Name :$value1</h4>";   
print "<h4>Profile-id :$value2</h4>";   
print "<h4>Email :$value3</h4>";   
print "<h4>Phone Number :$value4</h4>";   
print "<h4>Address:$value5</h4>";   






  ?>
  </div>

</body>
</html>