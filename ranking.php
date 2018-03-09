

<!-- loading -->

<script src="js/pace.min.js"></script>
<link rel="stylesheet" href="/css/pace-theme-minimal.css">
<!--end load-->
<?php
include("config.php");
include("functions.php");
date_default_timezone_set("Asia/Bangkok"); 
$YYYY = date('Y', time());
$dir = $logsDir;
$cntc = $cntp = 0;
$reg_cttants = $reg_problems = $sum = $last = $cttants = $problems = array();
$data = $log = $ac = array(array());
$color = array("user-grandmaster", "user-hacker", "user-master", "user-expert", "user-coder", "user-novice");
if (is_dir($dir)) if ($dh = opendir($dir)) {
  while ($file = readdir($dh)) if ($file!="." && $file!=".." && $file != "<") {
    if (filemtime($dir.$file) < $begintime) continue;
    $handle = @fopen($dir.$file, "r");
    if ($handle && !feof($handle)) { 
      $content = fgets($handle, 100); fclose($handle); 
    }
    getdata($content, $w, $p, $scr);
    if (updatectts($w, $cttants[$cntc], $reg_cttants[$w])) ++$cntc;
    if (updateprbs($p, $problems[$cntp], $reg_problems[$p])) ++$cntp;
    if ($scr == "") continue;
    if ($data[$w][$p] == 0 || filemtime($dir.$file) > filemtime($dir.$log[$w][$p])) {
      $data[$w][$p] = $scr;
      $log[$w][$p] = $file;
      $last[$w] = max($last[$w], filemtime($dir.$file));
      $flog = fopen($dir.$file, 'r');
      $numname = 0;
      $numscore = 0;
      while (!feof($flog)) {
             $line_of_text = fgets($flog);
             $numname += substr_count($line_of_text, $w);
             $numscore += substr_count($line_of_text, ': 0.00');
      }
      $numname--;
      if($scr == '0.00') $numscore--;
      if($numscore == 0) $ac[$w][$p] = '#4E9A05';
      else if($numscore == $numname || $scr == '0.00') $ac[$w][$p] = '#F40000';
      else $ac[$w][$p] = '#B99F00';
    } 
  }
  closedir($dh);
}

/// get max score 
if($penalty)
{
  $maxscore = array();
  for ($i = 0; $i < $cntc; ++$i)
    for ($j = 0; $j < $cntp; ++$j)
      {
        $maxscore[$problems[$j]] = max($maxscore[$problems[$j]], $data[$cttants[$i]][$problems[$j]]);
      }
}

function getpen($username, $problem)
{
  if($GLOBALS['penalty']){
    $dir = './'.$GLOBALS['penDir'];
    $files1 = scandir($dir);
    $num = 0;
    $filename = '[' . $username. '][' . $problem . ']';
    for($i = 2; $i < sizeof($files1); $i++) {
        if(!stripos($files1[$i], $filename)) continue;
        $num++;
    }
    $num--;
    if($num > 0) return ' <small><u><font color = "#000000" size = "2px">'.$num.'</font></u></small>';
  }
}
function get_score_pen($username, $problem, $score, $max_score)
{
  if($GLOBALS['penalty']){
    $dir = './'.$GLOBALS['penDir'];
    $files1 = scandir($dir);
    $num = 0;
    $filename = '[' . $username. '][' . $problem . ']';
    for($i = 2; $i < sizeof($files1); $i++) {
        if(!stripos($files1[$i], $filename)) continue;
        $num++;
    }
    if($score) return number_format($score - $GLOBALS['score_pen'] * max(0, number_format($num - 1, 2)) * number_format($max_score/100,2) , 2);

  }
}
?>

<!DOCTYPE HTML PUBLIC>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bảng điểm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="15" />
  <!--CombineResourcesFilter-->
  <link rel="stylesheet" href="../css_hy/clear.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../css_hy/style.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../css_hy/datatable.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../css_hy/table-form.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../css_hy/user.css" type="text/css" charset="utf-8"/>
  <style type="text/css">body{font-family: Consolas;font-size: 18px;}
  .standings{font-size: 18px;}
  .score { opacity: .8;}
  .score:hover{
    opacity: 1.0;
}
  }
</style>
</head>
<body> 
  <div id="body">
    <div class='datatable' style='background-color: #E1E1E1; padding-bottom: 3px;position:absolute '>

      <div style="padding: 4px 0 0 6px;font-size:1em;position:relative;"> <h2 style="color:#445f9d;margin-left:10px">Bảng xếp hạng</h2> </div>

      <div style="background-color: white;margin:0.3em 3px 0 3px;position:relative;">
        <table class="standings">
          <?php function swap(&$xm, &$ym){ $tmp = $xm; $xm = $ym; $ym = $tmp; }
          for ($i = 0; $i < $cntc; ++$i)
          for ($j = 0; $j < $cntp; ++$j)
          if ($data[$cttants[$i]][$problems[$j]] != "...") {
            if($penalty) $data[$cttants[$i]][$problems[$j]] = get_score_pen($cttants[$i], $problems[$j], $data[$cttants[$i]][$problems[$j]], $maxscore[$problems[$j]] );
            $sum[$cttants[$i]] += $data[$cttants[$i]][$problems[$j]];
            }
          for ($i = 0; $i < $cntc; ++$i) // SORT CONTESTANTS
          for ($j = $i + 1; $j < $cntc; ++$j)
          if ($sum[$cttants[$i]] < $sum[$cttants[$j]] || ($sum[$cttants[$i]] == $sum[$cttants[$j]] && $last[$cttants[$i]] > $last[$cttants[$j]]))
          swap ($cttants[$i], $cttants[$j]);
          for ($i = 0; $i < $cntp; ++$i) // SORT PROBLEMS
          for ($j = $i + 1; $j < $cntp; ++$j)
          if ($problems[$i] > $problems[$j])
          swap ($problems[$i], $problems[$j]); ?>
          <tr>
          <th style='color:#445f9d; min-width:40px'>#</th>
          <th style='text-align:left;min-width:250px;color:#445f9d;'> <h3> Thí Sinh </h3> </th>
          <th style='color:#445f9d;min-width:80px'> <h4> Tổng </h4> </th>
          <?php for ($i = 0; $i < $cntp; ++$i) echo "<th style='min-width:95px;'>".$problems[$i]."</th>"; ?> 
          </tr>

          <?php for ($i = 0; $i < $cntc; ++$i) {
          $cl = "user-newbie";
          if ($i < 12) $cl = "user-beginner";
          if ($i < 6) $cl = $color[min($i, 7)];
          echo "<tr>";
          if ($i % 2) {
            echo "<td>".($i + 1)."</td>";
            echo "<td style='text-align:left;'><b><span class = 'username ".$cl."'>".$cttants[$i]."</span></b></td>";
            echo "<td style='color:black'><b>".sprintf("%0.2f", $sum[$cttants[$i]])."</b></td>";
            for ($j = 0; $j < $cntp; ++$j){
            echo "<td class = 'score' style='color:#fff;background-color:".$ac[$cttants[$i]][$problems[$j]].";-moz-border-radius: 10px;-webkit-border-radius: 10px;-ms-border-radius: 10px;-o-border-radius: 10px;border-radius: 10px;'> ";
          if($data[$cttants[$i]][$problems[$j]]) echo "<a onclick=wload('".$logssubDir.rawurlencode($log[$cttants[$i]][$problems[$j]])."')> <b>".$data[$cttants[$i]][$problems[$j]].getpen($cttants[$i], $problems[$j])."</b> </a>";
          echo " </td>";
                }
          } else {
            echo "<td class='contestant-cell dark'>".($i + 1)."</td>";
            echo "<td style='text-align:left;' class='contestant-cell dark'><b><span class = 'username ".$cl."'>".$cttants[$i]."</span></b></td>";
            echo "<td style='color:black' class='contestant-cell dark'><b>".sprintf("%0.2f", $sum[$cttants[$i]])."</b></td>";
            for ($j = 0; $j < $cntp; ++$j){
              echo "<td class='score contestant-cell dark' style='color:#fff;background-color:".$ac[$cttants[$i]][$problems[$j]].";-moz-border-radius: 10px;-webkit-border-radius: 10px;-ms-border-radius: 10px;-o-border-radius: 10px;border-radius: 10px;'>";
              if($data[$cttants[$i]][$problems[$j]]) echo "<a onclick=wload('".$logssubDir.rawurlencode($log[$cttants[$i]][$problems[$j]])."')> <b>".$data[$cttants[$i]][$problems[$j]].getpen($cttants[$i], $problems[$j])."</b> </a> ";
              echo "</td>";
                  }
            }
            echo "</tr>"; 
          } ?>
        </table>
      </div>
	  
   
	</div> 
  </div> 
</body>
</html>