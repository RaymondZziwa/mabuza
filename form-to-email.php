<?php
// Uncomment the next line if you're using a dependency loader (such as Composer) (recommended)
require 'vendor/autoload.php';
$API_KEY ="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";
// Uncomment the next line if you're not using a dependency loader (such as Composer), replacing <PATH TO> with the path to the sendgrid-php.php file
// require_once '<PATH TO>/sendgrid-php.php';

if(isset($_POST['submit']))
{
  $name = $_POST['fname'];
  $user_Mail = $_POST['email'];
  $mail = $_POST['text'];
  

  /*$mailTo = "Mabuzawomenclinic@hotmail.com";
  $headers = "From: Mabuza Hospital Website";
  $txt = "You have recieved an email from ".$name.".\n\n".$mail;

  mail($mailTo,$txt,$headers);
  header("Location: index.php?mailsend");*/
  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("Mabuzawomenclinic@hotmail.com", "Mabuza Clinic");
  $email->setSubject("Inquiry from potential client");
  $email->addTo($user_Mail, $name);
  $email->addContent("text/plain", $mail);
  /*$email->addContent(
      "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
  );*/
  $sendgrid = new \SendGrid($API_KEY);
  if($sendgrid->send($email));
  {
    echo "Email sent successfully";
  }
  
  /*try {
      $response = 
      print $response->statusCode() . "\n";
      print_r($response->headers());
      print $response->body() . "\n";
  } catch (Exception $e) {
      echo 'Caught exception: '. $e->getMessage() ."\n";
  }*/
}


/*if(isset($_POST['submit']))
{
  $name = $_POST['fname'];
  $user_Mail = $_POST['email'];
  $mail = $_POST['text'];

  $mailTo = "Mabuzawomenclinic@hotmail.com";
  $headers = "From: Mabuza Hospital Website";
  $txt = "You have recieved an email from ".$name.".\n\n".$mail;

  mail($mailTo,$txt,$headers);
  header("Location: index.php?mailsend");
}
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
   */
?> 