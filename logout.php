<?php

/* Delete cookie and redir */

/* Set cookie email = null */
$cookie_name  = "email";
$cookie_value = '';
setcookie($cookie_name, $cookie_value, time() - (86400 * 30), "/");

/* Redirect to homepage*/
'<script type="text/javascript">
     window.location = "http://localhost/CSC174-Midterm-master/index.php"
   </script>';
   
header('Location: index.php');
exit;


?>