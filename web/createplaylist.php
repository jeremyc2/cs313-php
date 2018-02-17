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
             function load() {
                  $.get("addplaylistsongs.php", $('#formId').serialize(), function(data){
                    $('#submit').val(data);
                  });
             }
        </script>
    </head>

    <body>
        <?php
    require 'parts/navbar.php';
        ?>
        <div class="well">

        <form class="" action="" id="formId" method="post">
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
          </select><br>
          <label>Which songs do you want to add?<label><br>
          <select class="" name="songs">
            <?php
              $query = "select title, id from songs;";
              $stmt = $db->prepare($query);
              $stmt->execute();
              $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $row) {
                echo "<option value=\"" . $row['id'] . "\">" . $row['title'] . "</option>";
              }
             ?>
          </select>
          <button type="button" name="button" id="submit" onclick="send()">Submit</button>
        </form>
      </div>

      </body>
    </html>
