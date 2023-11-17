<?php
include('smtp/PHPMailerAutoload.php');

$name = $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$message= $_POST['message'];

$subject = "Mail From Milestone Web";
$body = "<br> Name: " . $name . "<br> Email: " . $email ."<br> Phone: " . $phone . "<br> Message: <br> " . $message;

echo smtp_mailer('milestonemarketingbharuch@gmail.com', $subject ,$body);
function smtp_mailer($to,$subject, $body)
{
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "zkenterprisebharuch@gmail.com";
	$mail->Password = "pstdgdhmzhpjowrx";
	$mail->SetFrom("zkenterprisebharuch@gmail.com");

	$mail->Subject = $subject;
	
	$mail->Body =$body;
	// $mail->Body = $msg;
	// $mail->Header =$body;
	$mail->AddAddress($to);
	
	$mail->AddAddress('milestonemarketing@zkenterprise.tech');     //Add a recipient

	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}
	else
	{
		// return 'Sent Successfully';
		header("Location: index.html", true, 301);  
        exit();
		
	}
	
}
?>
