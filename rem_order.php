<?php
include ("connect.php");
$email=$_POST['email'];
$date=$_POST['date'];
$type_of_test=$_POST['type_of_test'];

$patient_id = "SELECT id FROM patients WHERE email='$email'";
$rslt=mysqli_query($con, $patient_id);

$row=mysqli_fetch_row($rslt);
if($type_of_test=='tumor'){

$stmt="DELETE FROM tumor_testing_orders WHERE patients_id='$row[0]' AND date='$date'";
$dlt=mysqli_query($con,$stmt);
$rows=mysqli_affected_rows($con);
if ($rows==0){
	echo "Order was not found";

}
else{


	header('location:index2.php');
}
}
else if ($type_of_test=='sequence'){
$stmt="DELETE FROM sequence_testing_orders WHERE patients_id='$row[0]' AND date='$date'";
$dlt=mysqli_query($con,$stmt);
if ($dlt){
		header('location:index2.php');
}
else{
	echo "Order was not found";
}
}
else{
	echo "Type of test is invalid";
}

?>
	
