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
      </head>
      <body>
        <form class="" action="" method="post">
          <label for="">Pick a playlist:</label><br>
          <select class="" name="playlist">
            <?php
              $query = "select title, id from playlists;";
              $stmt = $db->prepare($query);
              $stmt->execute();
              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $row) {
                echo "<option value=\"" . $row['id'] . "\">" . $row['title'] . "</option>";
              }
             ?>
          </select>
        </form>

      </body>
    </html>
