<?php

$connection = DBConnect::GetConnection();

$email    = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);

$result = $connection->query("SELECT * FROM users WHERE email = '$email' LIMIT 1;");

if(count($result->fetch_object()) != null)
  exit("Email already exists");

$salt = substr(md5(rand()), 0, 10);
$hashed_password = md5($password . $salt);

$query_insert = "INSERT INTO users (email, password, salt) VALUES('$email', '$hashed_password', '$salt');";
$result = $connection->query($query_insert);

Router::Redirect('/');
?>

