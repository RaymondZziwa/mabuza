<?php
if(!isset($_POST['submit']))
{
  $firstName = $_POST['fname'];
  $lastName = $_POST['lname'];
  $visitor_email = $_POST['email'];
  $message = $_POST['text'];
  
  //Validate first
  if(empty($firstname)||empty($visitor_email)||empty($lastName)) 
  {
      echo "Name and email are mandatory!";
      exit;
  }
  
  if(IsInjected($visitor_email))
  {
      echo "Bad email value!";
      exit;
  }
  
  $email_from = "mabuzawomenclinic@gmail.com";//<== update the email address
  $email_subject = "New Form submission";
  $email_body = "You have received a new message from the user $name.\n".
      "Here is the message:\n $message".
      
  $to = "raymondzian@gmail.com";//<== update the email address
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $visitor_email \r\n";
  //Send the email!
  mail($to,$email_subject,$email_body,$headers);
  //done. redirect to thank-you page.
  header('Location: contact us.html');
  
  
  // Function to validate against any email injection attempts
  function IsInjected($str)
  {
    $injections = array('(\n+)',
                '(\r+)',
                '(\t+)',
                '(%0A+)',
                '(%0D+)',
                '(%08+)',
                '(%09+)'
                );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str))
      {
      return true;
    }
    else
      {
      return false;
    }
  }
  
	//This page should not be accessed directly. Need to submit the form.
}
else{
  echo "error; you need to submit the form!";
}  
?> 