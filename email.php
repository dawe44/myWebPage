<?php

header('Content-type: text/plain');

// Print POST variables
foreach ($_POST as $key=>$val ) {
  echo "\n" . $key . " = " . $val;
}

// Print GET variables
foreach ($_GET as $key=>$val ) {
  echo "\n" . $key . " = " . $val;
}

echo "\n\n";

echo "File data:\n";

// Check filesize
if ($_FILES["file"]["size"] > 10000000) {
  header('Content-Type: text/plain');
  echo("File is to big!");
} else {
  // Everything is ok
  // Upload file
  if(!move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name'])) {
    die('Error uploading file');
  }
  
  $file = "uploads/" . $_FILES['file']['name'];
  $mimetype = $_FILES["file"]["type"];
  $file_size = $_FILES["file"]["type"];
		
  header('Content-Type: text/plain');
  echo "Name: " . $_FILES["file"]["name"] . "\n";
  echo "Type: " . $_FILES["file"]["type"] . "\n";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb\n";		
}

// Ta bort filen
if ($_FILES["file"]) {
  $file = "uploads/" . $_FILES['file']['name'];
  unlink($file);
}
	
?>