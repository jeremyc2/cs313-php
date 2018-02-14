<?php
     session_start();
     $query = $_REQUEST['query'];


         $dbUrl = getenv('DATABASE_URL');

         $dbopts = parse_url($dbUrl);

         $dbHost = $dbopts["host"];
         $dbPort = $dbopts["port"];
         $dbUser = $dbopts["user"];
         $dbPassword = $dbopts["pass"];
         $dbName = ltrim($dbopts["path"], '/');

         $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

         if (!empty($query)) {
         $statement = $db->query($query);
         $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
         echo "<table>\n";
         echo "<tr>";
         foreach ($rows[0] as $key => $value) {
              echo "<th>" . $key . "</th>";
         }
         echo "</tr>";
         foreach ($rows as $values) // For every field name (id, name, last_name, gender)
         {
             echo "<tr>\n"; // start the row
                 foreach ($values as $cell) // for every sub-array iterate through all values
                 {
                    echo "\t<td>" . $cell . "</td>\n"; // write cells next to each other
                 }
             echo "</tr>\n"; // end row

         }

         echo "</table>";
    }

         $tables = array("users", "albums", "threads", "songs", "playlists", "songs_playlists");
         foreach ($tables as $table) {
              echo "<br><br><br><h1>$table</h1><br>";
              $statement = $db->query("select * from $table;");
              $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
              echo "<table>\n";
              echo "<tr>";
              foreach ($rows[0] as $key => $value) {
                   echo "<th>" . $key . "</th>";
              }
              echo "</tr>";
              foreach ($rows as $values) // For every field name (id, name, last_name, gender)
              {
                  echo "<tr>\n"; // start the row
                      foreach ($values as $cell) // for every sub-array iterate through all values
                      {
                         echo "\t<td>" . $cell . "</td>\n"; // write cells next to each other
                      }
                  echo "</tr>\n"; // end row

              }
              echo "</table>";
         }
?>
