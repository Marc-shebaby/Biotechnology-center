<?php
include ("connect.php");

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$date=$_POST['date'];
$type_of_test=$_POST['type_of_test'];
$tumor_name=$_POST['tumor_name'];

$stmt2=$con->prepare("SELECT id FROM patients WHERE email=? ");
		$stmt2->bind_param("s", $email);
		$stmt2->execute();
		$patient_id=0;
		$results = $stmt2->get_result();

		if ($results->num_rows >0){
			
			$stmt2->close();
		}
		else{
			$stmt2->close();
		$stmt = $con->prepare("insert into patients(name, email, phone_number, gender,hospital_id) values(?, ?, ?, ?,1)");
		$stmt->bind_param("ssss", $name, $email, $phone, $gender);
		 $stmt->execute();
		 $stmt->close();
		
		
		
		
	

		}
		$patient_id = "SELECT id FROM patients WHERE email='$email'";
		

		$rslt=mysqli_query($con, $patient_id);
		$row=mysqli_fetch_row($rslt);
		
		if($type_of_test=='tumor'){
		
		$stmt=$con->prepare("insert into tumor_testing_orders(cost, date ,tumor_name, patients_id) values(50.5, ?, ?, ?)");
		 
	
		$stmt->bind_param("ssi",$date,$tumor_name,$row[0]);
		$stmt->execute();
		$stmt->close();
		}
		else{
			$stmt=$con->prepare("insert into sequence_testing_orders(date ,cost,patients_id) values(?, 50.5, ?)");
			$stmt->bind_param("si",$date,$row[0]);
		$stmt->execute();
		$stmt->close();
			
		}	
require 'includes/PHPMailer.php';
require 'includes /SMTP.php';
require 'includes/Exception.php';	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail=new PHPMailer();
$mail->isSMTP();
$mail-> Host="smtp.gmail.com";
$mail->SMTPAuth="true";
$mail->SMTPSecure="tls";
$mail->Port= "587";
$mail->Username = 'medilab39@gmail.com';
$mail->Password = 'medilabisfuture1';
$mail->Subject= "Order test";
	
 
    $mail->setFrom('medilab39@gmail.com');
	$mail->Body = 'You have successufully submitted your order. Results will be sent in 2 weeks from now.';
    $mail->addAddress($email);
    $mail->Send();
    

header('location:index2.php');
	
	 
		
		
	
	
	
?>
