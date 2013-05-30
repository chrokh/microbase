<?php

$connection = DBConnect::GetConnection();

$email = $connection->real_escape_string($_POST['email']);

$result = $connection->query("SELECT salt FROM users WHERE email = '$email' LIMIT 1;");
$obj = $result->fetch_object();

if($obj == null)
  return fail();

$salt = $obj->salt;
$hashed_pass = md5($email . $salt);

$query = "SELECT id, email, password, salt FROM users WHERE email = '$email' AND password = '$hashed_pass' LIMIT 1;";
$result = $connection->query($query)->fetch_object();

if($result == null)
  return fail();

$user_id = $result->id;

if(count($user_id) != 1)
  return fail();


$_SESSION['user_id'] = $user_id;
Router::Redirect('/');

function fail(){
  exit("Invalid email or password");
}
?>
