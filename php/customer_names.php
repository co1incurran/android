<?php
define("DB_HOST", "127.0.0.1");
define("DB_USER", "user");
define("DB_PASSWORD", "1234");
define("DB_DATABASE", "enable_supplies_db");
 
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
 
$sql = "SELECT first_name, last_name FROM customer; ";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
	array_push($result,
		array('first_name'=>$row[0],
		'last_name'=>$row[1]
	));
}
foreach ($result as $results){
	//$comma_separated = implode(",", $results);

	//echo $comma_separated; // lastname,email,phone
	
	//echo '<pre>'; print_r($results); echo '</pre>';
	//echo implode('<br>', $results);
	
	//The 4 lines below echo the names of the customers properly
	printf($results['first_name']);
	printf(" ");
	printf($results['last_name']);
	echo nl2br("\n");
}

//echo $result[0][0];

//print_r(array_values($result));
//echo json_encode(array("result"=>$result));
 
mysqli_close($con);
 
?>

