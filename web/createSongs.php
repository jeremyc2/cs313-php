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
        <title>Create Songs</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="funnybusiness.js"></script>

        <link rel="stylesheet" type="text/css" href="CSS%20style%20sheet%20(2).css" />
        <script type="text/javascript">
             function send() {
                  $.get("addsongs.php", $('#formId').serialize(), function(data){
                    document.getElementById('result').innerHTML = data;
                  });
             }
        </script>
        <script type="text/javascript">
        var attribute = "";
        $(document).ready(function() {
          //title, album,	duration,	genre from songs
              $("td").click(function() {
                var i = this.cellIndex;
                if (i == 0){
                  attribute = "title";
                }
                else if (i == 1){
                  attribute = "album";
                }
                else if(i == 2){
                  attribute = "duration";
                }
                else if(i == 3){
                  attribute = "genre";
                }
                $.get("delete.php", { table: "songs", column: attribute, condition: this.innerHTML },function(data){
                  document.getElementById('result').innerHTML = data;});
              });
        });

        </script>
    </head>

    <body>
        <?php
    require 'parts/navbar.php';
        ?>
        <div class="well">
          <h1>Click on a table row to delete it.</h1><br>

        <form class="" action="" id="formId" method="post">
          <label>Which songs do you want to add?</label><br>
          <input type="text" name="title" value=""><br>
          <label>From which artist?</label><br>
          <select class="" name="album">
            <?php
                $query = "select artist, id from albums;";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row) {
                  echo "<option value=\"" . $row['id'] . "\">" . $row['artist'] . "</option>";
                }
             ?>
          </select><br>
          <label>How many seconds long is it?</label><br>
          <input type="text" name="duration" value=""><br>
          <label>What genre?</label><br>
          <input type="text" name="genre" value=""><br>
          <button type="button" name="button" id="submit" onclick="send()">Submit</button>
        </form><br>
        <div class="" id="result">
          <?php
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
        </div>
      </div>

      </body>
    </html>
