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
$query_Recordset2 = "SELECT proid, `year`, `description`, mrp, desprice FROM products WHERE type = 'laptop'";
$Recordset2 = mysql_query($query_Recordset2, $con_online) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body tracingsrc="Dark-wooden-website-background.jpg" tracingopacity="82">
<div id="head">
  <header id="he">
    <h1 align="center" style="font-size: 36px">		GAMOnlineShoppingStore </h1>
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
  <table width="800" border="1">
    
    <?php do { ?>
      <tr>
        <td width="129" height="36"><div align="center"><?php echo $row_Recordset2['proid']; ?></div></td>
        <td width="156"><div align="justify"><?php echo $row_Recordset2['year']; ?></div></td>
        <td width="156"><div align="center"><?php echo $row_Recordset2['description']; ?></div></td>
        <td width="171"><div align="center"><?php echo $row_Recordset2['mrp']; ?></div></td>
        <td width="154"><div align="center"><?php echo $row_Recordset2['desprice']; ?></div></td>
      </tr>
      <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
    
  </table>
</div>
<p align="center">	<strong style="font-size: 24px"><a href="payment.php">Buy Now</a></strong></p>
<p align="justify">&nbsp;</p>
<p align="justify">&copy; Copyrights GAM, All rights reserved.  
  	<!-- #BeginDate format:Am1m -->December 5, 2014  13:27<!-- #EndDate -->
</p>
</body>
</html>
<?php
mysql_free_result($Recordset2);
?>
