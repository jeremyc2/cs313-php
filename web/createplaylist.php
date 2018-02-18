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
        <title>Create Playlist</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="funnybusiness.js"></script>

        <link rel="stylesheet" type="text/css" href="CSS%20style%20sheet%20(2).css" />
        <script type="text/javascript">
             function send() {
                  $.get("addplaylistsongs.php", $('#formId').serialize(), function(data){
                    document.getElementById('result').innerHTML = data;
                  });
             }
        </script>
    </head>

    <body>
        <?php
    require 'parts/navbar.php';
        ?>
        <div class="well">
          <h1>Click on a table row to delete it.</h1><br>

        <form class="" action="" id="formId" method="post">
          <label for="">Pick a playlist:</label><br>
          <select class="" name="p_id">
            <?php
              $query = "select title, id from playlists;";
              $stmt = $db->prepare($query);
              $stmt->execute();
              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $row) {
                echo "<option value=\"" . $row['id'] . "\">" . $row['title'] . "</option>";
              }
             ?>
          </select><br>
          <label>Which songs do you want to add?</label><br>
          <select class="" name="song_id">
            <?php
              $query = "select title, id from songs;";
              $stmt = $db->prepare($query);
              $stmt->execute();
              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $row) {
                $id = $row['id'];
                echo "<option value=\"" . $id . "\">" . $row['title'] . "</option>";
              }
             ?>
          </select>
          <button type="button" name="button" id="submit" onclick="send()">Submit</button>
        </form><br>
        <div class="" id="result">
          <?php
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

        </div>
      </div>

      </body>
    </html>
