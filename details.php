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
  width: 750px;
  //height:500px;
  margin: auto;
  
  text-align: center;
  font-family: arial;
  background-color:white;
  cell-padding:15px;
  padding:30px;
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
<h2 style="text-align:center">Result</h2>

<?php

$db=mysql_connect('localhost','root','');

if(!$db)
exit("error");

$er=mysql_select_db("carpool");

if(!$er)
exit("error");

$qu="select name,profileid,email,phonenumber,address from profile where profileid!='Admin'";

$result=mysql_query($qu);
if(!$result)
 {
  print "<p>".$error."</p>";
  exit;
 }
 
print "<table border='3' align='center'><tr align='center'>";

$nr=mysql_num_rows($result);
$row=mysql_fetch_array($result);
$num_fie=mysql_num_fields($result);
$keys=array_keys($row);

for($ron=0;$ron<$num_fie;$ron++)
 print "<th>".$keys[2*$ron+1]. "</th>";

print "</tr>";

for($ron=0;$ron<$nr;$ron++)
{ print "<tr align='center'>";
  $values=array_values($row);
  for($ron1=0;$ron1<
  $num_fie;$ron1++)
   {$value=htmlspecialchars($values[2*$ron1+1]);
    print "<td>".$value."</td>";
   }
print "</tr>";
$row=mysql_fetch_array($result);
}


print "</table>";
?>
</body>
</html>


