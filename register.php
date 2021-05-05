<?php
  /**
  * Requires the PHP Mail Form library
  * The PHP Mail Form library is available only in the pro version of the template
  * The library should be uploaded to: lib/php-mail-form/php-mail-form.php
  * For more info and help: https://templatemag.com/php-mail-form/
  */
$mail = $_POST['email'];


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

$sql = "INSERT INTO `newsletter` (`mail`, `timeStamp`)
VALUES ('$mail' , NOW())";

if ($conn->query($sql) === TRUE) {
    header('Location: thx.php');
    exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>