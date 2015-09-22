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
  $insertSQL = sprintf("INSERT INTO customer (cid, `state`, city, fname, lname) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cid'], "int"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['lname'], "text"));

  mysql_select_db($database_con_online, $con_online);
  $Result1 = mysql_query($insertSQL, $con_online) or die(mysql_error());

  $insertGoTo = "logindet.php";
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
#form1 blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote h1 strong {
	font-family: Gotham, Helvetica Neue, Helvetica, Arial, sans-serif;
}
#form1 blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote blockquote h1 strong {
	font-family: Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana, sans-serif;
}
</style>
</head>

<body tracingsrc="file:///C|/wamp/www/Images/Dark-wooden-website-background.jpg" tracingopacity="91">
<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <blockquote>
                    <blockquote>
                      <blockquote>
                        <blockquote>
                          <blockquote>
                            <p>&nbsp;</p>
                            <blockquote>
                              <blockquote>
                                <blockquote>
                                  <blockquote>
                                    <blockquote>
                                      <blockquote>
                                        <h1><strong>Signup</strong> </h1>
                                      </blockquote>
                                    </blockquote>
                                  </blockquote>
                                </blockquote>
                              </blockquote>
                            </blockquote>
                          </blockquote>
                        </blockquote>
                      </blockquote>
                    </blockquote>
                  </blockquote>
                </blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
  <div align="right">
    <table width="386" border="1">
      <tr>
        <td width="124"><div align="center">
          <p>Coustumer Id</p>
        </div></td>
        <td width="246"><div align="center">
          <p>
            <input type="text" name="cid" id="cid">
            </p>
        </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <p>State</p>
        </div></td>
        <td><div align="center">
          <p>
            <input type="text" name="state" id="state">
            </p>
        </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <p>City</p>
        </div></td>
        <td><div align="center">
          <p>
            <input type="text" name="city" id="city">
            </p>
        </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <p>First Name</p>
        </div></td>
        <td><div align="center">
          <p>
            <input type="text" name="fname" id="fname">
            </p>
        </div></td>
      </tr>
      <tr>
        <td><div align="center">
          <p>Last Name</p>
        </div></td>
        <td><div align="center">
          <p>
            <input type="text" name="lname" id="lname">
            </p>
        </div></td>
      </tr>
    </table>
    
    <table width="386" height="32" border="1">
      <tr>
        <td><div align="center">
          <input type="submit" name="submit" id="submit" value="Submit">
        </div></td>
        <td><div align="center">
          <input type="reset" name="reset" id="reset" value="Reset">
        </div></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
</form>
<p align="justify">  &copy; Copyrights GAM, All rights reserved.  
  <!-- #BeginDate format:Am1m -->December 5, 2014  13:20<!-- #EndDate -->
</p>
</body>
</html>