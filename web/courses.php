<?php
     $dbUrl = getenv('DATABASE_URL');

     $dbopts = parse_url($dbUrl);

     $dbHost = $dbopts["host"];
     $dbPort = $dbopts["port"];
     $dbUser = $dbopts["user"];
     $dbPassword = $dbopts["pass"];
     $dbName = ltrim($dbopts["path"],'/');

     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
     $query = "SELECT number, name from course;";
     $stmt = $db->prepare($query);
     $stmt->execute();
     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
     <!DOCTYPE html>
     <html>
          <head>
               <meta charset="utf-8">
               <title>Courses</title>
          </head>
          <body>
               <h1>Courses</h1>
               <ul>

               </ul>
               <?php
                    foreach ($rows as $row) {
                         $number = $row['number'];
                         $course = $row['name'];
                         echo "<li><a href="">$course - $number</a></li>";
                    }
               ?>
          </body>
     </html>
