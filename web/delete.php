<?php
// Start the session
session_start();

    $dbUrl = getenv('DATABASE_URL');

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

      $table = $_GET['table'];
      $column = $_GET['column'];
      $condition = $_GET['condition'];

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      try {
        echo "HELLO!!" . $table . $column . $condition;
      $stmt = $db->prepare('delete from :foo where :boo = :coo;');
      $stmt->bindValue(':foo', $table, PDO::PARAM_STR);
      $stmt->bindValue(':boo', $column, PDO::PARAM_STR);
      $stmt->bindValue(':coo', $condition, PDO::PARAM_STR);
      $stmt->execute();
      echo "string";
    } catch (\Exception $e) {
      echo $e;
    }
 ?>
