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
     </head>
     <body>
          <form id="formId" action="send()" method="post">
               <textarea name="query" rows="8" cols="80"></textarea>
               <button type="submit" name="button"></button>
          </form>
          <br><br>
          <div class="result">

          </div>

          <script type="text/javascript">
               function send() {
                    $(".result").load(send.php, $('#formId').serialize());
               }
          </script>
     </body>
</html>
