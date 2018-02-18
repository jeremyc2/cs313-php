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

      $stmt = $db->prepare('delete from :table where :column = \':condition\';');
      $stmt->bindValue(':table', $table, PDO::PARAM_STR);
      $stmt->bindValue(':column', $column, PDO::PARAM_STR);
      $stmt->bindValue(':condition', $condition, PDO::PARAM_STR);
      $stmt->execute();
 ?>
