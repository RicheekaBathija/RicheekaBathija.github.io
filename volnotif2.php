<html>
<head>
<title>
First db page
</title>
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


input[type=button] 
{
    background-color: white;
    color: black;
    padding: 8px 12px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;
	border-radius:4px;
	text-align:center;
	position:relative;
	top:120px;
	left:550px;
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
<h2 style="text-align:center">Volunteer Details</h2>
<?php
session_start();

$db=mysql_connect('localhost','root','');

if(!$db)
exit("error");

$route=$_POST["route"];
$seat_req=$_POST["seat_req"];
echo $route;
$er=mysql_select_db("carpool");

if(!$er)
exit("error");

$qu="select name,profileid,seats,routeid from volunteer;";
$result=mysql_query($qu);
if(!$result)
 {
  print "ER 3";
  exit;
 }
 
 $fla=0;
 $nr=mysql_num_rows($result); 
 for($ron=0;$ron<$nr;$ron++)
 {	 
   
   $row=mysql_fetch_array($result);
   $values=array_values($row);
   $passname=htmlspecialchars($values[1]);
   $profid=htmlspecialchars($values[3]);
   $s=htmlspecialchars($values[5]);
   $value=htmlspecialchars($values[7]);    
     if($value==$route)
	{
          $fla++;
		  if($s<$seat_req)
		  {  echo "<script type ='text/javascript'> alert('Required number of seats unavailable on this route.'); window.location.replace(\"reqform1.html\"); </script> ";
          }
		  else
		  {
             $s=$s-$seat_req;
			 $qu1="update volunteer set seats=$s where routeid=$value;";
			 $res1=mysql_query($qu1);
			 
			 $qu2="select passenger1,passenger2,passenger3 from profile where profileid='$profid';";
			 $res2=mysql_query($qu2);
			 if(!$res2)
			 {
				 print "Selection error in profile table";
				 exit;
			 }
			              
				 $row1=mysql_fetch_array($res2);
                 $values1=array_values($row1);
                 $pass1=htmlspecialchars($values1[1]);
                 $pass2=htmlspecialchars($values1[3]);
                 $pass3=htmlspecialchars($values1[5]);
				 
                 if($pass1=='x')
				  {$qu3="update profile set passenger1='".$_SESSION['login_user']."' where profileid='$profid';";
				   $res3=mysql_query($qu3);
				 
				   $qq="update history set passenger1='".$_SESSION['login_user']."' where profileid='$profid';";
				   $resq=mysql_query($qq);   
				  
				  $q1="update profile set seat1='$seat_req' where profileid='$profid'";
          			$r1=mysql_query($q1);	   
				  }
				 else if($pass2=='x')
				   { $qu4="update profile set passenger2='".$_SESSION['login_user']."' where profileid='$profid';";
				     $res4=mysql_query($qu4); 
				     
					 $qqu4="update history set passenger2='".$_SESSION['login_user']."' where profileid='$profid';";
				     $res4q=mysql_query($qqu4); 
				     
					 $q1="update profile set seat2='$seat_req' where profileid='$profid'";
          			$r1=mysql_query($q1);
				   }
				 else					 
				   { $qu5="update profile set passenger3='".$_SESSION['login_user']."'   where profileid='$profid';";  					 
			         $res5=mysql_query($qu5);
				     
					 $qqu5="update history set passenger3='".$_SESSION['login_user']."'   where profileid='$profid';";  					 
			         $resq5=mysql_query($qqu5);
				     					 
					 $q1="update profile set seat3='$seat_req' where profileid='$profid'";
          			$r1=mysql_query($q1);
				   }
			 			
             $qu="select * from profile where profileid ='$profid' ";
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
			 
			 
		  }
		break;
	}
 }
 if($fla==0)
	  echo "<script type ='text/javascript'> alert('Invalid route-id entered.Please try again'); window.location.replace(\"reqform1.html\"); </script> ";
 
 
    ?>
  </div>
  <br />
 <input type="button" value="Save volunteer details" id="save" onclick="window.print();"/>
 <br />
 <input type="button" value="Return to home page" id="return" onclick="window.location.replace('Home_page.html');"/>
 
</body>
</html>
	
	
    