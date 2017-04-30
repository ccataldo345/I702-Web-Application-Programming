<?php
require_once "config.php";
include "header.php";

session_start();
//set cookies
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600,  
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]);
}
// 86400 = 1 day
// 3600 = 1 hour
//
unset($_SESSION["user"]);
header("Location: index.php");
?>


<!--
https://www.w3schools.com/php/php_cookies.asp
To delete a cookie, use the setcookie() function with an expiration date in the past:
Example
<?php
// set the expiration date to one hour ago
//setcookie("user", "", time() - 3600);
?>
<html>
<body>

<?php
//echo "Cookie 'user' is deleted.";
?>

</body>
</html> 
-->