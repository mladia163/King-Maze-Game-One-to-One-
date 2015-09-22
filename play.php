<?php
	session_start();
?>
<?php
	$mov=$_GET["m"];
	$movx=substr($mov,0,strpos($mov,"|"));
	$movy=substr($mov,strpos($mov,"|")+1);
	$grid=$_SESSION["grid"];
	$xm=$_SESSION["xm"];
	$ym=$_SESSION["ym"];
	$grid[$movx][$movy]=1;

	// k==1 -> ym ko decrement krna hai
	// k==0 -> ym ko increment krna hai

	$xcor=array(0,1,1,1,0,-1,-1,-1);
	$ycor=array(1,1,0,-1,-1,-1,0,1);

	function issafe($movx,$movy,$xp,$yp)
	{
		global $grid;
		if($xp<=$_SESSION["g"] && $yp<=$_SESSION["g"] && $xp>0 && $yp>0 && $grid[$xp][$yp]==0)
			return true;
		return false;
	}
	$grid1=$grid;
	//int $xp,$yp;
	$movei=1;
	function makeit($xg,$yg,$movei)
	{
		global $grid1,$xcor,$ycor,$movx,$movy;

		if($movei==10)
			return true;

		for($k=0;$k<8;$k++)
		{
			$xp = $xg + $xcor[$k];
			$yp = $yg + $ycor[$k];

			$grid1[$xp][$yp]=1;

			if(issafe($movx,$movy,$xp,$yp)==true)
			{
				if(makeit($xp,$yp,$movei+1)==true)
					$arr=array();
					$arr[]=$xp;
					$arr[]=$yp;
					return $arr;							// abhi bnana hai aaray jo return krre
			}
			else
				$grid1[$xp][$yp]=0;
		}
	}

	$parr=makeit($xm,$ym,1);
	$xm=$parr[0];
	$ym=$parr[1];


	$_SESSION["xm"]=(int)$xm;
	$_SESSION["ym"]=(int)$ym;
	$grid[$xm][$ym]=1;
	$_SESSION["grid"]=$grid;
	$out=array('m'=>$xm."|".$ym);
	header('Content-Type: application/json');
	echo json_encode($out);
?>