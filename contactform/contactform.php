<?php
  /**
  * Requires the PHP Mail Form library
  * The PHP Mail Form library is available only in the pro version of the template
  * The library should be uploaded to: lib/php-mail-form/php-mail-form.php
  * For more info and help: https://templatemag.com/php-mail-form/
  */



echo $name . '<br>';
echo $company_name . '<br>';
echo $email . '<br>';
echo $subject . '<br>';
echo $message . '<br>';
//echo $name;
  if( file_exists($php_mail_form_library = '../lib/php-mail-form/php-mail-form.php' )) {
    include( $php_mail_form_library );
  } else {
    die( 'Unable to load the PHP Mail Form Library!');
  }
class PHP_Mail_Form 
{
  
  public function add_message()
  {
    
    //echo 'add_message ok';
    
  }
  public function send()
  {
    echo 'send ok';
  }


}

  $contactform = new PHP_Mail_Form;
  $contactform->ajax = true;

  // Replace with your real receiving email address
  $contactform->to = 'contact@example.com';
  $contactform->from_name = $_POST['name'];
  $contactform->from_email = $_POST['email'];
  $contactform->subject = $_POST['subject'];
  $contactform->hello = 'hellooooooo';

  $contactform->add_message( $_POST['name'], 'Form');
  $contactform->add_message( $_POST['email'], 'Email');
  $contactform->add_message( $_POST['message'], 'Message', 10);

  //echo $contactform->send();
  echo '<pre>';
  print_r ($contactform);
  print_r ($contactform->to);
  echo '</pre>'; 
  $lastname = $_POST['name'];
  $data = json_decode($lastname);

  print_r ($data);







  
  $name = $_POST['name'];
  $company_name = $_POST['company_name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bike1";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO `form` (`name`, `company_name`, `email`, `subject`, `message`, `time`)
  VALUES ('$name' ,'$company_name' ,'$email' ,'$subject','$message' , NOW())";
  
  if ($conn->query($sql) === TRUE) {
      header('Location: thx.php');
      exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  


?>
