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

    $artist = htmlspecialchars($_GET['artist']);
    $rating = htmlspecialchars($_GET['rating']);
    $genre = htmlspecialchars($_GET['genre']);

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $stmt = $db->prepare('Insert into albums(artist, rating, genre) values (:artist, :rating, :genre);');
    $stmt->bindValue(':artist', $artist, PDO::PARAM_STR);
    $stmt->bindValue(':rating', $rating, PDO::PARAM_INT);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    $stmt->execute();
  echo "<br><br><br><h1>Albums</h1><br>";
  $statement = $db->query("select artist, genre, rating from albums;");
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
 ?>
