<?php

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'izhoestudiodigital@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['Nombre'];
  $contact->from_email = $_POST['Correo'];
  $contact->subject = $_POST['Asunto'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['Nombre'], 'From');
  $contact->add_message( $_POST['Correo'], 'Email');
  $contact->add_message( $_POST['Mensaje'], 'Message', 10);

  echo $contact->send();
?>
