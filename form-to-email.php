<?php
if(isset($_POST['submit']))
{
  $name = $_POST['fname'];
  $user_Mail = $_POST['email'];
  $mail = $_POST['text'];

  $mailTo = "mabuzawomenclinic@hotmail.com";
  $headers = "From: Mabuza Hospital Website";
  $txt = "You have recieved an email from ".$name.".\n\n".$mail;

  mail($mailTo,$txt,$headers);
  header("Location: index.php?mailsent");
}
// Function to validate against any email injection attempts
/*function IsInjected($str)
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