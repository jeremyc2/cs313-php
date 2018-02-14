<?php session_start();
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"], '/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

 if ( isset($_REQUEST["reset"]) )
 {
 if ($_REQUEST["reset"] == 'true')
   {
   session_unset();
   }
 }
if ( isset($_REQUEST["add"]) )
   {
   $i = $_REQUEST["add"];
   $_SESSION[$i] = $i;
   $stmt = $db->prepare('INSERT INTO albums (artist) VALUES :name');
   $stmt->execute(array(':name' => $i));
 }
 if ( isset($_REQUEST["delete"]) )
   {
   $i = $_REQUEST["delete"];
     echo htmlspecialchars($_SESSION[$i]);
    unset($_SESSION[$i]);
     $stmt = $db->prepare('DELETE FROM albums WHERE artist=:name');
     $stmt->execute(array(':name' => $i));
 }
?>
