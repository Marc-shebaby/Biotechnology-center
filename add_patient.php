<?php
include ("connect.php");
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$date=$_POST['date'];
$type_of_test=$_POST['type_of_test'];
$tumor_name=$POST['tumor_name'];

$stmt2=$con->prepare("SELECT id from patients WHERE email=? ");
		$stmt2->bind_param("s", $email);
		$stmt2->execute();
		$patient_id=0;
		$results = $stmt2->get_result();
		$count = $results->num_rows(); 
		if ($count >0){
		
			$stmt2->close();
		}
		else{
			$stmt2->close();
		$stmt = $con->prepare("insert into patients(name, email, phone, gender,hospital_id) values(?, ?, ?, ?,1");
		$stmt->bind_param("sssss", $name, $email, $phone, $gender);
		 $stmt->execute();
		$patient_id = $stmt>insert_id;
		
	
		$stmt->close();
		}
		
		if($type_of_test='tumor'){
			
		$stmt=$con->prepare("insert into tumor_testing_orders(cost, date ,tumor_name, patient_id) values(50.5, ?, ?, ?");
		 
	
		$stmt->bind_param("ssi",$date,$tumor_name,$patient_id);
		$stmt->execute();
		$stmt->close();
		}
		else{
			$stmt=$con->prepare("insert into sequence_testing_orders(date ,cost,patient_id) values(?, 50.5, ?");
			$stmt->bind_param("si",$date,$patient_id);
		$stmt->execute();
		$stmt->close();
			
		}
		header('location index2.php');
		?>
	<!--	require "vendor/autoload.php";
$robo = '.com';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$developmentMode = true;
$mailer = new PHPMailer($developmentMode);
try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();
    if ($developmentMode) {
    $mailer->SMTPOptions = [
        'ssl'=> [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ];
    }
	    $mailer->Host = 'medilab39@gmail.com'; 
    $mailer->SMTPAuth = true;
    $mailer->Username = 'medilab39@gmail.com';
    $mailer->Password = 'medilabisfuture1';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;
    $mailer->setFrom('medilab39@gmail.com', 'medilab');
    $mailer->addAddress($email, $name);
    $mailer->isHTML(true);
    $mailer->Subject = 'Thank you for using medilab';
    $mailer->Body = 'You have successufully submitted tour order, Results will be sent in 2 weeks from now.';

	
	 
		
		
	
		} -->
	
	

