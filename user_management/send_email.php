<?php

$base_url = 'http://ec2-52-90-32-110.compute-1.amazonaws.com';

if(isset($_POST['register'])){
    $regcode = $_POST['regcode'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $subject = "LostPetReport - Account Verification";
    $body = '
    Hello '.$username.',
    
    Click the following link to verify your account:
    
    '.$base_url.'/verification_page.php?username='.$username.'&email='.$email.'&regcode='.$regcode;
    
    mail($email, $subject, $body);
    echo "<h2>Action Required</h2>";
    echo "An activation link has been sent to your email address";
}

?>