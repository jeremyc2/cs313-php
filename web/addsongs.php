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

    $title = htmlspecialchars($_GET['title']);
    $album = htmlspecialchars($_GET['album']);
    $duration = htmlspecialchars($_GET['duration']);
    $genre = htmlspecialchars($_GET['genre']);

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $stmt = $db->prepare('Insert into songs(title, album, duration, genre) values (:title, :album, :duration, :genre);');
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':album', $album, PDO::PARAM_INT);
    $stmt->bindValue(':duration', $duration, PDO::PARAM_INT);
    $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
    $stmt->execute();
  $query = "select title, id from songs;";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<br><br><br><h1>Songs</h1><br>";
  $statement = $db->query("select title, album,	duration,	genre from songs;");
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
