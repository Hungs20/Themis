
<!-- loading -->

<script src="js/pace.min.js"></script>
<link rel="stylesheet" href="/css/pace-theme-minimal.css">
<!--end load-->
<?php
include("config.php");
include("functions.php");
session_start();
if(isset($_POST['login']))
{
  if(addslashes($_POST['user']) == 'admin' && addslashes($_POST['pass']) == 'admin') $_SESSION['admin'] = 1;
  else $err = 1;
}
if(!$_SESSION['admin'])
{
  ?>
    
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
     <!-- Bootstrap core CSS   -->
  <script src="js/jquery-latest.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script> 
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    .form-signin .warning {
      font-size: 14px;
    color: red; 
    margin-top: 8px;
    text-align: center;
    }

    </style>

    <body>
    <div class="container">
  <center>
  <form class="form-signin" method="POST">
     <h2 class="form-signin-heading">Đăng nhập</h2>
    <input type="text" name="user" class="input-block-level" placeholder="Tài khoản">
        <input type="password" name="pass" class="input-block-level" placeholder="Mật khẩu">
        <button class="btn btn-large btn-primary" type="submit" name = "login">Đăng nhập</button>
        <div class="warning"> <?php if ($err) echo "Sai tên đăng nhập hoặc mật khẩu!"; ?> </div>
      </form>
</center>
</div>
</body>
  <?php 
  exit();
}


date_default_timezone_set("Asia/Bangkok"); 
$YYYY = date('Y', time());
$dir = $logsDir;
$cntc = $cntp = 0;
$reg_cttants = $reg_problems = $sum = $last = $cttants = $problems = array();
$data = $log = $source = array(array());
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
      $source[$w][$p] = substr($file, 0, strlen($file) - 4);
      $last[$w] = max($last[$w], filemtime($dir.$file));
    } 
  }
  closedir($dh);
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
    if($num > 0) return ' <small><u><font color = "blue" size = "1px">'.$num.'</font></u></small>';
  }
}
function get_score_pen($username, $problem, $score)
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
    if($score) return number_format($score - number_format($GLOBALS['score_pen'], 2) * max(0, (number_format($num, 2) - 1)), 2);
  }
}
?>

<!DOCTYPE HTML PUBLIC>
<html lang="en">
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bảng điểm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="refresh" content="15" />
  <!-- Bootstrap core CSS   -->
  <script src="js/jquery-latest.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script> 
  <!--CombineResourcesFilter-->
  <link rel="stylesheet" href="../css_hy/clear.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../css_hy/style.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../css_hy/datatable.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../css_hy/table-form.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="../css_hy/user.css" type="text/css" charset="utf-8"/>


  <style type="text/css">body{font-family: Consolas;font-size: 18px;}
  .standings{font-size: 18px;}
  more {
    display:none;
}
a:hover {
    text-decoration: none;
}
#loadMore {
    padding: 10px;
    text-align: center;
    background-color: #33739E;
    color: #fff;
    border-width: 0 1px 1px 0;
    border-style: solid;
    border-color: #fff;
    box-shadow: 0 1px 1px #ccc;
    transition: all 600ms ease-in-out;
    -webkit-transition: all 600ms ease-in-out;
    -moz-transition: all 600ms ease-in-out;
    -o-transition: all 600ms ease-in-out;
}
#loadMore:hover {
    background-color: #fff;
    color: #33739E;
}
</style>
</head>
  <div id="body">
    <div class='datatable' style='background-color: #E1E1E1; padding-bottom: 3px;position:absolute;'>

      <div style="padding: 4px 0 0 6px;font-size:1em;position:relative;"> <h2 style="color:#445f9d;margin-left:10px">Bảng xếp hạng</h2>  </div>

      <div style="background-color: white;margin:0.3em 3px 0 3px;position:relative;">
        <table class="standings">
          <?php function swap(&$xm, &$ym){ $tmp = $xm; $xm = $ym; $ym = $tmp; }
          for ($i = 0; $i < $cntc; ++$i)
          for ($j = 0; $j < $cntp; ++$j)
          if ($data[$cttants[$i]][$problems[$j]] != "...") {
            if($penalty) $data[$cttants[$i]][$problems[$j]] = get_score_pen($cttants[$i], $problems[$j], $data[$cttants[$i]][$problems[$j]] );
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
            echo "<td style='color:#0a0'> ";
          if($data[$cttants[$i]][$problems[$j]]) echo "<a onclick=wload('".$logssubDir.rawurlencode($log[$cttants[$i]][$problems[$j]])."')> <b>".$data[$cttants[$i]][$problems[$j]].getpen($cttants[$i], $problems[$j])."</b> </a> <a onclick=wload('".$hisDir.'/'.rawurlencode($source[$cttants[$i]][$problems[$j]])."')> <b><small><font color = 'red'>[+]</font></small></b> </a>";
          echo " </td>";
                }
          } else {
            echo "<td class='contestant-cell dark'>".($i + 1)."</td>";
            echo "<td style='text-align:left;' class='contestant-cell dark'><b><span class = 'username ".$cl."'>".$cttants[$i]."</span></b></td>";
            echo "<td style='color:black' class='contestant-cell dark'><b>".sprintf("%0.2f", $sum[$cttants[$i]])."</b></td>";
            for ($j = 0; $j < $cntp; ++$j){
              echo "<td class='contestant-cell dark' style='color:#0a0'>";
              if($data[$cttants[$i]][$problems[$j]]) echo "<a onclick=wload('".$logssubDir.rawurlencode($log[$cttants[$i]][$problems[$j]])."')> <b>".$data[$cttants[$i]][$problems[$j]].getpen($cttants[$i], $problems[$j])."</b> </a>  <a onclick=wload('".$hisDir.'/'.rawurlencode($source[$cttants[$i]][$problems[$j]])."')> <b><small><font color = 'red'>[+]</font></small></b> </a>";
              echo "</td>";
                  }
            }
            echo "</tr>"; 
          } ?>
        </table>
      </div>
	  
    
 
  <!-- status -->

  <?php
    echo '<div style="padding: 4px 0 0 6px;font-size:1em;position:relative;"> <h2 style="color:#445f9d;margin-left:10px">Status</h2></div><div class = "list-group">';
    $dir = $penDir.'/';
    $liststatus = array();
    $cntstatus = 0;
    if (is_dir($dir)) if ($dh = opendir($dir)) {
      while ($file = readdir($dh)) if ($file!="." && $file!=".." && $file != "<") $liststatus[$cntstatus++] = $file;
      closedir($dh);
    }
    rsort($liststatus);
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
            if($endtime && $endname && $liststatus[$i][$j] == ']') break;
            if($endtime == 0 && $liststatus[$i][$j] == '[') $endtime = 1;
            if($endname == 0 && $liststatus[$i][$j] == ']') $endname = 1;
            if(!$endtime) $time = $time.$liststatus[$i][$j];
            if(!$endname && $endtime == 1 && $liststatus[$i][$j] != '[') $user = $user.$liststatus[$i][$j];
            if($endtime && $endname && $liststatus[$i][$j] != '[' && $liststatus[$i][$j] != ']') $prob = $prob.$liststatus[$i][$j];
        }
        echo '<more><font color = "blue">'.date('[d-m-Y] [h:i:s A]', $time).'</font> <font color = "red"><b>'.$user.'</b></font> <font color = "green"><u>submitted</u></font> <font color = "red"><b>'.$prob.'</b></font></more>';
    }
  ?></div>
  <a href="#" id = "loadMore" style="color: #33739E;text-decoration: none;display: block;margin: 10px 0;"><font color = "red">Load more</font></a>
</div>
  <script>
    $(function () {
    $("more").slice(0, 10).addClass('list-group-item list-group-item-action list-group-item-primary').show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $("more:hidden").slice(0, 4).addClass('list-group-item list-group-item-action list-group-item-primary').slideDown();
        if ($("more:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});
</script>
</html>