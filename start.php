<?php
	session_start();
?>
<?php
	if(!isset($_GET["g"]) || !isset($_GET["y"]) || !isset($_GET["o"]))
	{
		echo "error";
		die();
	}
	else
	{
		$n=(int)($_GET["g"]);
		$_SESSION["g"]=$n;
		$grid=array();
		for($i=0;$i<=$n;$i++)
		{
			$grid[$i]=array();
			for($j=0;$j<=$n;$j++)
			{
				$grid[$i][$j]=0;
			}
		}
		$mpos=$_GET["y"];
		$opos=$_GET["o"];
		$_SESSION["xm"]=(int)(substr($mpos,0,strpos($mpos,"|")));
		$_SESSION["ym"]=(int)(substr($mpos,strpos($mpos,"|")+1));
		$_SESSION["xo"]=(int)(substr($opos,0,strpos($opos,"|")));
		$_SESSION["yo"]=(int)(substr($opos,strpos($opos,"|")+1));
		$grid[$_SESSION["xm"]][$_SESSION["ym"]]=1;
		$grid[$_SESSION["yo"]][$_SESSION["yo"]]=1;
		$_SESSION["grid"]=$grid;
		if($_SESSION["ym"]==1)
		{
			$_SESSION["flag"]=true;
			$SESSION["k"]=0;
		}
		else
		{
			$_SESSION["flag"]=false;
			$SESSION["k"]=1;
		}
		$out=array('ok'=>true);
		header('Content-Type: application/json');
		echo json_encode($out);
	}
?>