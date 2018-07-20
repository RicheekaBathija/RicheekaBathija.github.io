<html>
<head>
<title>
First db page
</title>
<style >

 body
{background-image: url("spots.jpg");
	  background-repeat:no-repeat; background-size: cover;  top:0;left:0; margin:auto;
	 /* background-color:#4c6a92;*/


}

.card
 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 20px;
  text-align: center;
  font-family: arial;
  background-color:white;
  cell-padding:15px;
  border: solid 2px;
  position:relative; top:50px;
  padding:20px;
}

input[type=text], select
 {
    width: 20%;
    padding: 6px 6px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
}


button {
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;
	border-radius:4px;
}

</style>
</head>
<body>
<div class="card">
<?php
session_start();
$db=mysql_connect('localhost','root','');

if(!$db)
exit("error");



$pik=$_POST["pick"];
$des=$_POST["dest"];

$pik=strtolower($pik);
$des=strtolower($des);

$er=mysql_select_db("carpool");

if(!$er)
exit("error");


$q="delete from volunteer where startdate < curdate()";
$re=mysql_query($q);
if(!$re)
 {
  print "date error";
  exit;
 }


$qu="select * from volunteer where profileid!='".$_SESSION['login_user']."' ";

$result=mysql_query($qu);
if(!$result)
 {
  print "ERRRRRORRRRRR 35";
  exit;
 }
 
$nr=mysql_num_rows($result);
$row=mysql_fetch_array($result);
$num_fie=mysql_num_fields($result);
$keys=array_keys($row);


 print " <h1> Available Routes </h1> <table style='background-color:white;' border=1; padding=3px; > <tr align='centre'>";
 for($ron=1;$ron<$num_fie;$ron++)
 print "<th>".$keys[2*$ron+1]. "</th>";
 print "</tr>";

 $flag=0; 

 for($ron=0;$ron<$nr;$ron++)
{ 
  $values=array_values($row);
  
  for($ron1=0;$ron1<8;$ron1++)
   {
	   $value=htmlspecialchars($values[2*$ron1+1]);
        if($value==$pik )
		{           
		  for($ron3=$ron1;$ron3<$num_fie;$ron3++)
		 { 
	       if($values[2*$ron3+1]==$des)
		  {
			$flag++;  
		   print "<tr>";
		   for($ron2=1;$ron2<$num_fie;$ron2++)
		   { $val=$values[2*$ron2+1];
              print "<td>" .$val. "</td>";		  
		   }
		  print "</tr>"; 
		  }
		 }
		}		 
   }
    
   if($flag==0)
   {
      echo "<script type ='text/javascript'> alert('No routes available.Please try a different route'); window.location.replace(\"reqform1.html\"); </script> ";
   }	  
   
 $row=mysql_fetch_array($result);
}
?>
</div>
<br/>
<form action="volnotif2.php" method="POST">
<label> Enter the Route ID of the route you would like to use: <input type="text" id="route" name="route"/> </label> <br /> <br />
<label> Enter the number of seats you require: <input type="text" id="seat_req" name="seat_req" /> </label> <br /><br />
<button type="submit"> Request drop </button>
<br /> <br />
</form>
</body>
</html>   