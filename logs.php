<?php
	include("init.php");
	include("config.php");
	$dir = opendir($logsDir);
	$session = $user['username'];
	while ($file = readdir($dir)) {
		$pos = strpos($file,"[".$session."]");
		if ($pos > 0) {
			if ($publish == 1) echo "<a onclick=wload('".$logssubDir.rawurlencode($file)."') class='list-group-item list-group-item-action list-group-item-primary'><span class = 'glyphicon glyphicon-hand-right glyphicon-hand-right-animate'></span> <b>".substr($file,$pos+strlen($session)+2)."</b>";
			else echo "<a href='#' class='list-group-item list-group-item-action list-group-item-primary'><span class = 'glyphicon glyphicon-hand-right glyphicon-hand-right-animate'></span> <b>".substr($file,$pos+strlen($session)+2)."</b>";
			if (strpos($file,".log") > 0 || strpos($file,".LOG") > 0) {
				if ($publish == 1) {
					$finp = fopen($logsDir."/".$file,"r");
					$str = substr(fgets($finp),strlen($session)+3);
					$st = 0;
					for($i = 0; $i < strlen($str); $i++) if($str[$i] == ':') {$st = $i+2;break;}
					$str = trim(substr($str, $st));
					fclose($finp);
				}	
				else $str = "Đã chấm xong!";
			}	
			else $str = "Đang đợi chấm...";
			if($str == "0.00") echo ' <span class="label label-danger label-small">'.$str.'</span>';
			else echo ' <span class="label label-info label-small">'.$str.'</span>';
			$length = strlen($file);
			$tenfile = substr( $file,  0, $length - 4);
			$filesub = $uploadDir."/".$tenfile;
			if (!file_exists($filesub))
			{
			    echo '<span class = "badge"><span class="glyphicon glyphicon-ok glyphicon-ok-animate"></span></span>';
			}
			else echo '<span class = "badge"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span></span>';
			echo '</a>';
		}
	}
?>
