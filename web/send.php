<?php
     session_start();
     $query = $_REQUEST['query'];


         // $dbUrl = getenv('DATABASE_URL');
         //
         // $dbopts = parse_url($dbUrl);
         //
         // $dbHost = $dbopts["host"];
         // $dbPort = $dbopts["port"];
         // $dbUser = $dbopts["user"];
         // $dbPassword = $dbopts["pass"];
         // $dbName = ltrim($dbopts["path"], '/');
         //
         // $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
         // $stmt = $db->prepare(:query);
         // $stmt->bindValue(':query', $query, PDO::PARAM_STR);
         // $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         echo $query . " IT WORKED!";
?>
