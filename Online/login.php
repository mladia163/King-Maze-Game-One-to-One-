<?php require_once('Connections/con_online.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "p2.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_con_online, $con_online);
  
  $LoginRS__query=sprintf("SELECT username, password FROM users WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $con_online) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
#form1 p a {
	font-family: Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana, sans-serif;
	font-size: 24px;
}
#form1 h3 {
	font-family: Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana, sans-serif;
	font-size: 36px;
}
#form1 div table {
	font-family: Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana, sans-serif;
}
</style>
</head>

<body tracingsrc="file:///C|/wamp/www/Images/Dark-wooden-website-background.jpg" tracingopacity="92">
<form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
  <h3 align="center">Login</h3>
  <div align="center">
    <p>&nbsp;</p>
    <table width="200" border="1">
      <tr>
        <td>Username</td>
        <td><input type="text" name="username" id="username"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" value="Submit"></td>
      </tr>
    </table>
  </div>
  <p align="center">&nbsp;</p>
  <p align="center"><a href="signup.php">Sign Up</a></p>
</form>
<p>&nbsp;</p>
<p align="justify">  &copy; Copyrights GAM, All rights reserved.  
  	<!-- #BeginDate format:Am1m -->December 5, 2014  13:21<!-- #EndDate -->
</p>
</body>
</html>