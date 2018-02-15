<?php
     $dbUrl = getenv('DATABASE_URL');

     $dbopts = parse_url($dbUrl);

     $dbHost = $dbopts["host"];
     $dbPort = $dbopts["port"];
     $dbUser = $dbopts["user"];
     $dbPassword = $dbopts["pass"];
     $dbName = ltrim($dbopts["path"],'/');

     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
?>
     <!DOCTYPE html>
     <html>
          <head>
               <meta charset="utf-8">
               <title>Courses</title>
          </head>
          <body>
               <h1>Courses</h1>
               <?php
                    
               ?>
          </body>
     </html>
