<?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $role = $_POST['role'];
    $hear = $_POST['hear'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $message = $_POST['message'];

    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($message)){

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter a valid email address.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'hey@anteanstudios.com';
            $emailSubject = 'Propeurbs Application Submitted by '.$name;
            $htmlContent = '<h2>Propeurbs Application Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Company</h4><p>'.$company.'</p> 
                <h4>Role</h4><p>'.$role.'</p> 
                <h4>How you heard about us?</h4><p>'.$hear.'</p>
                <h4>Business Status</h4><p>'.$status.'</p> 
                <h4>Phone</h4><p>'.$phone.'</p>
                 
                <h4>Message</h4><p>'.$message.'</p>';

            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";

            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = 'Your application for Propeurbs has been submitted successfully !';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Your contact request submission failed, please try again.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
}
?>