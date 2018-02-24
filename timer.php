<?php
	include("config.php");

	$t = date_timestamp_get($startTime) + $duringTime*60 - time();
	if ($t > 0) {
		$h = ($t - $t%3600)/3600;
		$t =  $t%3600;
		$m = ($t - $t%60)/60;
		$s = $t%60;
		echo $h . " giờ " . $m . " phút " . $s." giây.";
	} else {
		echo "Đã hết thời gian làm bài.";
	}	
	
?>