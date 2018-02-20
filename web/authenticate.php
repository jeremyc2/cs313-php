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

  $stmt = db->prepare("select password from userteam where username = :username");
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->execute();
  $hash = $statement->fetch(PDO::FETCH_ASSOC)['password'];

  if (password_verify($password, $hash)){
    $newURL = "Homehash.php";
  }
  else {
    $newURL = "Signup.php";
  }

  header('Location: ' . $newURL);
  die();

?>
