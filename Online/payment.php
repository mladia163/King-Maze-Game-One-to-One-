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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE item SET qty=qty-1 WHERE proid=%s",
                       GetSQLValueString($_POST['proid'], "int"),
                       GetSQLValueString($_POST['proid'], "int"));

  mysql_select_db($database_con_online, $con_online);
  $Result1 = mysql_query($updateSQL, $con_online) or die(mysql_error());
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="cssdesign.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onLoad="MM_preloadImages('Images/ubuntu-mobile-os-1.jpg','Images/download (1).jpg','Images/images (1).jpg')" tracingsrc="file:///C|/wamp/www/Images/Dark-wooden-website-background.jpg" tracingopacity="91">
<div id="head">
  <header id="head">
    <h2 align="center" style="font-size: 36px">GAMOnlineShoppingStore</h2>
  </header>
</div>
<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
  <div align="center">
    <p>&nbsp;</p>
    <table width="384" border="1">
      <tr>
        <td width="78"><div align="center">Product Id</div></td>
        <td width="211"><div align="center">
          <input type="text" name="proid" id="proid">
        </div></td>
        <td width="73"><input type="submit" name="submit" id="submit" value="Submit"></td>
      </tr>
    </table>
  </div>
  <div align="center">
    <input type="hidden" name="MM_update" value="form1">
  </div>
</form>
<form id="form2" name="form2" method="post">
</form>
<form id="form3" name="form3" method="POST">
  <div align="center">
    <p>&nbsp;</p>
    <table width="310" border="1">
      <tr>
        <td width="132"><div align="center">Card No</div></td>
        <td width="162"><input type="text" name="textfield2" id="textfield2"></td>
      </tr>
      <tr>
        <td><div align="center">Pin</div></td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td><input name="submit2" type="submit" id="submit2" formaction="sucess.php" value="Submit"></td>
        <td><input type="reset" name="reset" id="reset" value="Reset"></td>
      </tr>
    </table>
  </div>
</form>
<p>&nbsp;</p>
<p align="justify">  &copy; Copyrights GAM, All rights reserved.  
  	<!-- #BeginDate format:Am1m -->December 5, 2014  13:20<!-- #EndDate -->
</p>
</body>
</html>