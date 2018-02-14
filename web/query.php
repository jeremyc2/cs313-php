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
          <style>
               table {
                   font-family: arial, sans-serif;
                   border-collapse: collapse;
                   width: 100%;
               }

               td, th {
                   border: 1px solid #dddddd;
                   text-align: left;
                   padding: 8px;
               }

               td:nth-child(even) {
                   background-color: #dddddd;
               }
          </style>
     </head>
     <body>
          <form id="formId" action="send.php" method="post">
               <textarea name="query" rows="8" cols="80" id="input"></textarea><br>
               <button type="button" name="button" onclick="send()">Run</button><br><br>
               <select name="query_list" id="query_list">
               <?php
                    foreach (scandir("sqlQueries") as $file){
                        $file_ext = strpos($file, ".sql");
                        if($file_ext !== false) {
                            $filename = substr($file, 0 ,$file_ext);
                            echo"<option value=\"$filename\">$filename</option>";
                        }
                    }
               ?>

               </select>
               <button type="button" name="button" onclick="load()">Load</button>
          </form>
          <br><br>
          <div class="result">

          </div>

          <script type="text/javascript">
               function send() {
                    $(".result").load("send.php", $('#formId').serialize());
               }
               function load() {
                    $str = "sqlQueries/" + $("#query_list").val() + ".sql";
                    $("#input").load($str);
               }
          </script>
     </body>
</html>
