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
         $statement = $db->query($query);
         $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
         print_r($rows);
         echo "<table>\n";

         foreach ($rows as $key => $values) // For every field name (id, name, last_name, gender)
         {
             echo "<tr>\n"; // start the row
                 foreach ($values as $cell_key => $cell_values) // for every sub-array iterate through all values
                 {
                    echo "\t<td>" . $cell_key . $cell_values . "</td>\n"; // write cells next to each other
                 }
             echo "</tr>\n"; // end row

         }

         echo "</table>";
?>
