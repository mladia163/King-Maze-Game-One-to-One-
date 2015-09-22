<?php require_once('Connections/con_online.php'); ?>
<?php require_once('Connections/con_online.php'); ?>
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

mysql_select_db($database_con_online, $con_online);
$query_Recordset1 = "SELECT proid, `year`, `description`, mrp, desprice FROM products WHERE type = 'mobile'";
$Recordset1 = mysql_query($query_Recordset1, $con_online) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body tracingsrc="file:///C|/wamp/www/Images/Dark-wooden-website-background.jpg" tracingopacity="91">
<div id="head">
  <header id="he">
    <h2 align="center" style="font-size: 36px">GAMOnlineShoppingStore  </h2>
  </header>
</div>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="799" border="1">
    <tr>
      <td width="130"><div align="center">Product Id</div></td>
      <td width="155"><div align="center">Year</div></td>
      <td width="155"><div align="center">Description</div></td>
      <td width="171"><div align="center">MRP</div></td>
      <td width="154"><div align="center">Discount Price</div></td>
    </tr>
  </table>
  
</div>
<div align="center">
  <table width="799" height="40" border="1">
    <tr>
      <td width="129" height="34"><?php echo $row_Recordset1['proid']; ?></td>
      <td width="156"><?php echo $row_Recordset1['year']; ?></td>
      <td width="155"><?php echo $row_Recordset1['description']; ?></td>
      <td width="170"><div align="center"><?php echo $row_Recordset1['mrp']; ?></div></td>
      <td width="155"><?php echo $row_Recordset1['desprice']; ?></td>
    </tr>
  </table>
</div>
<h3 align="center" style="font-size: 24px"><a href="payment.php">Buy Now</a></h3>
<p align="justify">&nbsp;</p>
<p align="justify">&copy; Copyrights GAM, All rights reserved.  
  	<!-- #BeginDate format:Am1m -->December 5, 2014  13:21<!-- #EndDate -->
</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
