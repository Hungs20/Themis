<!doctype html>
<meta charset="utf-8"/> 
<title>Hệ thống nộp bài trực tuyến.</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- loading -->

<script src="js/pace.min.js"></script>
<link rel="stylesheet" href="/css/pace-theme-minimal.css">
<!--end load-->
  <!-- Bootstrap core CSS -->
  <script src="js/jquery-latest.js"></script>
  <link href="css/jumbotron.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.js"></script>
  <script>
    var refreshId = setInterval(function(){
      $('#logs').load('logs.php');
      $('#timer').load('timer.php');
    }, 1000);
  </script>
  <style>
  body{font-family: Consolas;}.label-medium {
  vertical-align: super;
  font-size: medium;
}.label-large {
  vertical-align: super;
  font-size: large;
}.label-small {
  vertical-align: super;
  font-size: small;
}.glyphicon-refresh-animate {
    -animation: spin .7s infinite linear;
    -webkit-animation: spin2 .7s infinite linear;
}

@-webkit-keyframes spin2 {
    from { -webkit-transform: rotate(0deg);}
    to { -webkit-transform: rotate(360deg);}
}

@keyframes spin {
    from { transform: scale(1) rotate(0deg);}
    to { transform: scale(1) rotate(360deg);}
}
body{font-family: consolas;font-size:13px; line-height: 18px; padding-top:50px;background:#F4F4FE;color:#000000;background:rgb(178,223,218) url('/images/bg.gif') 0 50px fixed no-repeat;}
::-webkit-scrollbar{width:10px;height:10px}
::-webkit-scrollbar-track{background-color:#F5F5F5;-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.3);border:0 solid #000}
::-webkit-scrollbar-thumb{background:#07F}
::-webkit-scrollbar-thumb:hover{background:#09F}
::-webkit-scrollbar-thumb:active{background:#888;-webkit-box-shadow:inset 1px 1px 2px rgba(0,0,0,.3)}
:focus{outline:0}
textarea{resize:vertical}
ul,li{margin:0;padding:0}
li{list-style:none}
.icon{padding:3px 6px 3px 1px;vertical-align:middle}
.icon-inline{padding-right:6px;vertical-align:middle}
img{max-width:100%}


body#login .subLoginForm{display: none;}
#body{padding-top:15px;padding-bottom:15px;background:transparent url('/images/bg.png') scroll top left repeat;}
@media (min-width: 992px) {#body{margin-bottom:40px}}
</style>

  <!-- Header -->
  <?php
  include("functions.php");
  include("init.php");
  include("config.php");
?>

     <!-- Header -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">&middot; Hệ thống nộp bài trực tuyến.</a>
        </div>
    
    <div class="navbar-collapse collapse">
      <div class="navbar-form navbar-right"> 
        <a class="btn btn-success" href="/ide.php" title="Ide Online"><span class = "glyphicon glyphicon-console text-danger"></span> IDE</a>
           <a class="btn btn-success" href="/chatbox" title="Chatbox"><span class = "glyphicon glyphicon-comment text-danger"></span> Chatbox <?php echo '<span class="badge"><font color = "red"><b>'.$numchat.'</b></font></span>'; ?></a>
        <a class="btn btn-success" href="ranking.php" title="Rank"><span class = "glyphicon glyphicon-stats glyphicon-stats text-danger"></span> Rank</a>
           <a class="btn btn-success" href="/sms.php" title="Sms"><span class = "glyphicon glyphicon-envelope text-danger"></span> Sms <?php echo '<span class="badge"><font color = "red"><b>'.$newmess.'</b></font></span>'; ?></a>
        <a class="btn btn-success" href="repass.php" title="Đổi mật khẩu"><span class = "glyphicon glyphicon-user text-danger"></span> Thí sinh: <?php echo $_SESSION['tname']; ?></a> 
        <a class="btn btn-success" href="logout.php" title="logout"><span class = "glyphicon glyphicon-off text-danger"></span> Thoát</a>
    </div>
    </div>  
      </div>
    </div>

      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="body" class="maintxt container">

        <h1><?php echo $contestName; ?></h1>
        <p><?php echo $description; ?></p>
<?php if ($duringTime > 0) { ?>
		<p>
			- Thời gian bắt đầu: <?php echo date_format($startTime,"H:i:s"); ?> <br/>
			- Thời gian làm bài: <?php echo $duringTime; ?> phút. <br/>
			- Thời gian còn lại: <span id="timer"> </span>
		</p>
<?php } ?>
          <form class="navbar-form navbar-right"  action="upload.php" method="POST" enctype="multipart/form-data">
 			 Nộp bài: 
			<div class="form-group">
				<input type="file" name="file" id="file" accept="*.*" class="form-control">
            <button type="submit" class="btn btn-success">Nộp</button>
            </div>
          </form>
        </div>  
      <!-- Example row of columns -->
    <div id="body" class="maintxt container">
        <div class="row">
        <div class="col-md-4">
          <div class="panel panel-primary"><div class="panel-heading"><h2 class = "panel-title">Đề bài</h2></div><div class="list-group">
<?php
		$dir = opendir($problemsDir);
		while ($file = readdir($dir)) { if ($file!="." && $file!=".." && substr($file,0,strlen($file)-4)!="allproblems") {
			echo "<a href='".$problemsDir."/".$file."' class='list-group-item list-group-item-action list-group-item-primary'>".$file."</a>";
		}}
		closedir($dir);
?>		    
        </div></div>
        <p><a class="btn btn-default" href="<?php echo $problemsDir.'/'.$problemsFile; ?>" role="button"><span class = "glyphicon glyphicon glyphicon-download-alt glyphicon-download-alt-animate"></span> Tải về</a></p>
      </div>
		
        <div class="col-md-4">

          <div class="panel panel-primary"><div class="panel-heading"><h2 class = "panel-title">Test mẫu</h2></div><div class="list-group">
<?php	
		$dir = opendir($examTestDir);
		while ($file = readdir($dir)) { if ($file!="." && $file!=".." && !is_file($examTestDir."/".$file)) {
      echo '<li class="list-group-item list-group-item-dark">';
			echo "<h4>Bài: ".$file."</h4>"; 
			$subdir = opendir($examTestDir."/".$file);
			echo "<p>";
			while ($subfile = readdir($subdir)) {
				if ($subfile!="." && $subfile!=".." && !is_file($examTestDir."/".$file."/".$subfile)) {
					echo "<a href='".$examTestDir."/".$file."/".$subfile."'>".$subfile."</a> | ";
				}
			}
			echo "</p>";
      echo '</li>';
			closedir($subdir);
		}}
		closedir($dir);
?>		  </div></div>
          <p><a class="btn btn-default" href="<?php echo $examTestDir.'/'.$examTestFile; ?>" role="button"><span class = "glyphicon glyphicon glyphicon-download-alt glyphicon-download-alt-animate"></span> Tải về</a></p>
       </div>
	   
        <div class="col-md-4">
          <div class="panel panel-primary"><div class="panel-heading"><h2 class = "panel-title">Nhật ký nộp bài</h2></div><div class="list-group">
		  <div id="logs"> Đang tải... </div>
    </div></div>
        </div>
      </div>

      <hr>

      <footer>
        <p><?php echo $footer; ?></p>
      </footer>
    </div> <!-- /container -->
