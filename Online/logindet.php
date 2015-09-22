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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO users (username, password, cid) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['cid'], "int"));

  mysql_select_db($database_con_online, $con_online);
  $Result1 = mysql_query($insertSQL, $con_online) or die(mysql_error());

  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
#form1 h2 {
	font-family: Impact, Haettenschweiler, Franklin Gothic Bold, Arial Black, sans-serif;
}
#form1 h2 {
	font-family: Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana, sans-serif;
}
</style>
</head>

<body tracingsrc="file:///C|/wamp/www/Images/Dark-wooden-website-background.jpg" tracingopacity="90">
<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
  <h2 align="center" style="font-size: 36px">&nbsp;</h2>
  <h2 align="center" style="font-size: 36px">&nbsp;</h2>
  <h2 align="center" style="font-size: 36px">Login Details</h2>
  <div align="center">
    <p>&nbsp;</p>
    <table width="332" border="1">
      <tr>
        <td width="132"><div align="center">User Name</div></td>
        <td width="184"><input type="text" name="username" id="username">      </td>
      </tr>
      <tr>
        <td><div align="center">Password</div></td>
        <td><input type="text" name="password" id="password">      </td>
      </tr>
      <tr>
        <td><div align="center">Customer Id</div></td>
        <td><input type="text" name="cid" id="cid">      </td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
        <td><input type="submit" name="submit" id="submit" value="Submit">        <input type="reset" name="reset" id="reset" value="Reset">      </td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p align="justify">  &copy; Copyrights GAM, All rights reserved.  
  <!-- #BeginDate format:Am1m -->December 5, 2014  13:21<!-- #EndDate -->
</p>
</body>
</html>