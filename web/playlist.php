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
        <title>Héroe Favorito</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Playlists</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="funnybusiness.js"></script>

        <link rel="stylesheet" type="text/css" href="CSS%20style%20sheet%20(2).css" />
    </head>

    <body>
        <?php
    require 'parts/navbar.php';
        ?>
        <div class="well">
        <form class="" action="index.html" method="post">
             <table>
                  <?php
                            echo "<br><br><br><h1>Playlists</h1><br>";
                            $statement = $db->query("select s.title as song, p.title as playlist, artist from songs s join albums a on (s.album = a.id) join songs_playlists sp on (sp.s_id = sp.p_id) join playlists p on (sp.p_id = p.id);");
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
             </table>
        </form>
   </div>

    </body>

    </html>
