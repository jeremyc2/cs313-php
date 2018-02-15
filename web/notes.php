<?php
     $dbUrl = getenv('DATABASE_URL');

     $dbopts = parse_url($dbUrl);

     $dbHost = $dbopts["host"];
     $dbPort = $dbopts["port"];
     $dbUser = $dbopts["user"];
     $dbPassword = $dbopts["pass"];
     $dbName = ltrim($dbopts["path"],'/');

     $id = $_GET['id'];

     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
     $query = "SELECT number, name, id from course WHERE id = :id;";
     $stmt = $db->prepare($query);
     $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
               <h1>Notes for
               <?php
               foreach ($rows as $row) {
                         $number = $row['number'];
                         $course = $row['name'];
                         $id = $row['id'];
                         echo $course . ' - ' . $number;
                    }
               ?>
          </h1>
          </body>
     </html>
