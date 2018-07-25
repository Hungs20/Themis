<?php
	include("init.php");
	include("config.php");
	date_default_timezone_set("Asia/Bangkok"); 
    $dir = $penDir.'/';
    $dirsubmit = $uploadDir;
    $liststatus = $listwait = array();
    $cntstatus = 0;
    if (is_dir($dir)) if ($dh = opendir($dir)) {
      while ($file = readdir($dh)) if ($file!="." && $file!=".." && $file != "<") $liststatus[$cntstatus++] = $file;
      closedir($dh);
    }
    if (is_dir($dirsubmit)) if ($dh = opendir($dirsubmit)) {
      while ($file = readdir($dh)) if ($file!="." && $file!=".." && $file != "<") {
      	$n = strlen($file);
      	$user = "";
        $id = "";
        $prob = "";
        $endid = 0;
        $endname = 0;
      	for($i=0; $i < $n; $i++)
      	{
			if($endid && $endname && $file[$i] == ']') continue;
            if($endid == 0 && $file[$i] == '[') $endid = 1;
            if($endname == 0 && $file[$i] == ']') $endname = 1;
            if(!$endid) $id = $id.$file[$i];
            if(!$endname && $endid == 1 && $file[$i] != '[') $user = $user.$file[$i];
            if($endid && $endname && $file[$i] != '[' && $file[$i] != ']') $prob = $prob.$file[$i];
      	}
      	$listwait[$user.$prob] = 1;
      }
      closedir($dh);
    }
    rsort($liststatus);
   // echo '<ul class="list-group">';
    for($i = 0; $i < $cntstatus; $i++) 
    {
        $user = "";
        $time = "";
        $prob = "";
        $endtime = 0;
        $endname = 0;
        $n = strlen($liststatus[$i]);
        for($j = 0; $j < $n; $j++)
        {
            if($endtime && $endname && $liststatus[$i][$j] == ']') continue;
            if($endtime == 0 && $liststatus[$i][$j] == '[') $endtime = 1;
            if($endname == 0 && $liststatus[$i][$j] == ']') $endname = 1;
            if(!$endtime) $time = $time.$liststatus[$i][$j];
            if(!$endname && $endtime == 1 && $liststatus[$i][$j] != '[') $user = $user.$liststatus[$i][$j];
            if($endtime && $endname && $liststatus[$i][$j] != '[' && $liststatus[$i][$j] != ']') $prob = $prob.$liststatus[$i][$j];
        }
        if($listwait[$user.$prob]) {
        	echo '<a class="list-group-item list-group-item-action list-group-item-light"><font color = "blue">'.date('[d-m-Y][h:i:s A]', $time).'</font> <font color = "red"><b>'.$user.'</b></font> <font color = "green"><u>submitted</u></font> <font color = "red"><b>'.$prob.'</b></font></a>';
        	$listwait[$user.$prob] = 0;
        }
        else echo '<a class="list-group-item list-group-item-action list-group-item-success"><font color = "blue">'.date('[d-m-Y][h:i:s A]', $time).'</font> <font color = "red"><b>'.$user.'</b></font> <font color = "green"><u>submitted</u></font> <font color = "red"><b>'.$prob.'</b></font></a>';
    }
?>
