<?php

    $submit = $_POST['submit'];
    $name= htmlspecialchars($_POST['username']);
    $email=htmlspecialchars($_POST['email_address']);
    $web_address = htmlspecialchars($_POST['web_address']);
    $message = htmlspecialchars($_POST['messages']);

    $full_message = 'Web Address: ' . $web_address . '<br>' . $meassage;

    if(isset($submit)){
      if (($name == "")||($email=="")||($message==""))
          {
          echo "<h3 class='text-danger'>All fields are required, please fill <a href=\"\">the form</a> again.</h3>";
          }
      else{
          echo "<h3 class='text-warning'>Message Sent Successfully. We will get back to you shortly</h3>";
          $from="From: $name<$email>\r\nReturn-path: $email";
          $subject="Site Visitors";
          mail("admin@jaydeespen.com", $subject, $full_message, $from);
          header('Location: contact.php');

        }
    }
?>