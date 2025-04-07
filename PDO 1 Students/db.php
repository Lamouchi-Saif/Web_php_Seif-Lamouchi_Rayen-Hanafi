<?php
$dsn = "mysql:host=localhost:3333;dbname=rt2";
$username = 'root';
$password = '';


try {
  echo "Connecting to the database.....<br>";
  $conn = new PDO($dsn, $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br><br>";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  // Add more debug info
  echo "<br>Error Code: " . $e->getCode();
  echo "<br>File: " . $e->getFile();
  echo "<br>Line: " . $e->getLine();
}
?>
<!DOCTYPE html>