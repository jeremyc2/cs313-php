<?php
  $dbopts = parse_url($dbUrl);

  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"], '/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $password = htmlspecialchars($_REQUEST['password']);
  $username = htmlspecialchars($_REQUEST['username']);
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $db->prepare("insert into userteam (username, password) values (:username, :password)");
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
  $stmt->execute();

  $newURL = "Homehash.php";

  header('Location: ' . $newURL);
  die();

?>
