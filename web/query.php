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
    ?>


<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title>tables</title>
          <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

          <!-- jQuery library -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

          <!-- Latest compiled JavaScript -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://code.jquery.com/jquery-1.8.3.js"></script>
     </head>
     <body>
          <form id="formId" action="send.php" method="post">
               <textarea name="query" rows="8" cols="80"></textarea><br>
               <button type="button" name="button" onclick="send()">Submit</button>
          </form>
          <br><br>
          <div class="result">

          </div>

          <script type="text/javascript">
               function send() {
                    $(".result").load("send.php", $('#formId').serialize());
               }
          </script>
     </body>
</html>
