<?php 

$userAgent = $_SERVER['HTTP_USER_AGENT'];
$root = "/";

if (!empty($_FILES)) {
  $fileName = $_FILES['zipFile']['tmp_name'];
  $difficulty = $_POST['difficulty'];
  $password = $_POST['password'];

  $serverLocation = shell_exec ( "./mmmmm --start \"$fileName\" \"$difficulty\" \"$password\"" );
}

if ( $userAgent == "MediocreMapper" ) {
  echo "$serverLocation";
} else {
  header("Location: $root");
}

?>