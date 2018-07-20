<?php
$a=array();
$a=$_POST['a'];
$avg=array_sum($a)/count($a);
$sum=0;
foreach ($a as $val)
{
	$sum+=$val;
}
echo 'sum is  '.$sum.'    ';	
echo '<br /> avg is '.$avg;

echo 'welcomeeeeeeeeeeeeeee';

$b=array("hello"=>"riche", "how"=>"is","are"=>"you");
print_r($b);
$keys=array_keys($b);
echo '<br/><br />';
print_r($keys);
echo '<table border="1">';
echo '<th>';
foreach($keys as $val)
echo $val.'  ';
{echo '<td>$val</td>';}
echo '</th>';

echo '<tr>';
foreach($b as $val)
{echo '<td>$val</td>';}
echo '</tr>';
echo '</table>';

?>
