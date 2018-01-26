<?php session_start();
 if ( isset($_REQUEST["reset"]) )
 {
 if ($_REQUEST["reset"] == 'true')
   {
   session_unset();
     echo "Cart Cleared";
   }
 }
if ( isset($_REQUEST["add"]) )
   {
   $i = $_REQUEST["add"];
   $_SESSION[$i] = $i;
    echo htmlspecialchars($_SESSION[$i] . " has been added to your cart ");
 }
 if ( isset($_REQUEST["delete"]) )
   {
   $i = $_REQUEST["delete"];
     echo htmlspecialchars($_SESSION[$i]);
    unset($_SESSION[$i]);
     echo htmlspecialchars( " has been removed from your cart ");
 }
?>
