<?php 
$result = $mysqli->query($query);

$outp = "";
while($row = $result->fetch_array())
		{
		$rows[] = $row;
		} 
		
		$count = count($rows);

$outp ='{"recent":'.json_encode($rows,JSON_PRETTY_PRINT).'}';
print $outp;
?>