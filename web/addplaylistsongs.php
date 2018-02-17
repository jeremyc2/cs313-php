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

    $p_id = $_GET['p_id'];
    $s_id = $_GET['song_id'];

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $stmt = $db->prepare('Insert into songs_playlists(s_id, p_id) values (:s_id, :p_id);');
    $stmt->bindValue(':s_id', $s_id, PDO::PARAM_INT);
    $stmt->bindValue(':p_id', $p_id, PDO::PARAM_INT);
    $stmt->execute();


              echo "<br><br><br><h1>Playlists</h1><br>";
              $statement = $db->query("select s.title as song, p.title as playlist, artist from songs s join albums a on (s.album = a.id) join songs_playlists sp on (sp.s_id = s.id) join playlists p on (sp.p_id = p.id);");
              $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
              ?><label for="">Now Playing</label><?php
              echo "<table>\n";
              echo "<tr>";
              foreach ($rows[0] as $key => $value) {
                if ($key != 'playlist') {
                   echo "<th>" . $key . "</th>";
                 }
              }
              echo "</tr>";
              foreach ($rows as $values) // For every field name (id, name, last_name, gender)
              {
                unset($values['playlist']);
                  echo "<tr>\n"; // start the row
                      foreach ($values as $cell) // for every sub-array iterate through all values
                      {
                         echo "\t<td>" . $cell . "</td>\n"; // write cells next to each other
                      }
                  echo "</tr>\n"; // end row

              }
              echo "</table>";
     ?>
