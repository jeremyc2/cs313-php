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
         echo $query . "<br>";
         $statement = $db->query($query);
         $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
         echo "<table>\n";

         foreach ($rows as $key => $values) // For every field name (id, name, last_name, gender)
         {
             echo "<tr>\n"; // start the row
             echo "\t<td>" . $key . "</td>\n" ; // create a table cell with the field name
                 foreach ($values as $cell) // for every sub-array iterate through all values
                 {
                    echo "\t<td>" . $cell . "</td>\n"; // write cells next to each other
                 }
             echo "</tr>\n"; // end row

         }

         echo "</table>";
?>
