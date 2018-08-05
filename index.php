<?php
  include("init.php");
  include("functions.php");
  include("config.php");
?>
<!doctype html>
<meta charset="utf-8"/>
<title>Hệ thống nộp bài trực tuyến.</title>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<link href=css/jumbotron.css rel=stylesheet>
<link href=css/bootstrap.css rel=stylesheet>
<link rel=stylesheet href=/css/pace-theme-minimal.css>
<style>body{font-family:Consolas}.label-medium{vertical-align:super;font-size:medium}.label-large{vertical-align:super;font-size:large}.label-small{vertical-align:super;font-size:small}.glyphicon-refresh-animate{-animation:spin .7s infinite linear;-webkit-animation:spin2 .7s infinite linear}@-webkit-keyframes spin2{from{-webkit-transform:rotate(0deg)}to{-webkit-transform:rotate(360deg)}}@keyframes spin{from{transform:scale(1) rotate(0deg)}to{transform:scale(1) rotate(360deg)}}body{font-family:consolas;font-size:13px;line-height:18px;padding-top:50px;background:#f4f4fe;color:#000;background:#b2dfda url('/images/bg.gif') 0 50px fixed no-repeat}::-webkit-scrollbar{width:10px;height:10px}::-webkit-scrollbar-track{background-color:#f5f5f5;-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.3);border:0 solid #000}::-webkit-scrollbar-thumb{background:#07F}::-webkit-scrollbar-thumb:hover{background:#09F}::-webkit-scrollbar-thumb:active{background:#888;-webkit-box-shadow:inset 1px 1px 2px rgba(0,0,0,.3)}:focus{outline:0}textarea{resize:vertical}ul,li{margin:0;padding:0}li{list-style:none}.icon{padding:3px 6px 3px 1px;vertical-align:middle}.icon-inline{padding-right:6px;vertical-align:middle}img{max-width:100%}body#login .subLoginForm{display:none}#body{padding-top:15px;padding-bottom:15px;background:transparent url('/images/bg.png') scroll top left repeat}@media(min-width:992px){#body{margin-bottom:40px}}</style>
<style type="text/css">
.row-height{
  max-height: 100%;
}
	.scrolllist { max-height: 90vh;
    overflow-y: scroll;
  }
::-webkit-scrollbar {
    width: 0px;
    background: transparent;
}

* {
  -ms-overflow-style: none !important;
}
    .modal-content {
    -webkit-border-radius: 0;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 0;
    -moz-background-clip: padding;
    border-radius: 6px;
    background-clip: padding-box;
    -webkit-box-shadow: 0 0 40px rgba(0,0,0,.5);
    -moz-box-shadow: 0 0 40px rgba(0,0,0,.5);
    box-shadow: 0 0 40px rgba(0,0,0,.5);
    color: #000;
    background-color: #fff;
    border: rgba(0,0,0,0);
}
.modal-message .modal-dialog {
    width: 300px;
}
.modal-message .modal-body, .modal-message .modal-footer, .modal-message .modal-header, .modal-message .modal-title {
    background: 0 0;
    border: none;
    margin: 0;
    padding: 0 20px;
    text-align: center!important;
}

.modal-message .modal-title {
    font-size: 17px;
    color: #737373;
    margin-bottom: 3px;
}

.modal-message .modal-body {
    color: #737373;
}

.modal-message .modal-header {
    color: #fff;
    margin-bottom: 10px;
    padding: 15px 0 8px;
}
.modal-message .modal-header .fa, 
.modal-message .modal-header 
.glyphicon, .modal-message 
.modal-header .typcn, .modal-message .modal-header .wi {
    font-size: 30px;
}

.modal-message .modal-footer {
    margin: 25px 0 20px;
    padding-bottom: 10px;
}

.modal-backdrop.in {
    zoom: 1;
    filter: alpha(opacity=75);
    -webkit-opacity: .75;
    -moz-opacity: .75;
    opacity: .75;
}
.modal-backdrop {
    background-color: #fff;
}
.modal-message.modal-success .modal-header {
    color: #53a93f;
    border-bottom: 3px solid #a0d468;
}

.modal-message.modal-info .modal-header {
    color: #57b5e3;
    border-bottom: 3px solid #57b5e3;
}

.modal-message.modal-danger .modal-header {
    color: #d73d32;
    border-bottom: 3px solid #e46f61;
}

.modal-message.modal-warning .modal-header {
    color: #f4b400;
    border-bottom: 3px solid #ffce55;
}
</style>
<style>nav.navbar-findcond { background: #000; border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
nav.navbar-findcond a { color: #ccc; }
nav.navbar-findcond ul.navbar-nav a { color: #fff; border-style: solid; border-width: 0 0 2px 0; border-color: #000; }
nav.navbar-findcond ul.navbar-nav a:hover,
nav.navbar-findcond ul.navbar-nav a:visited,
nav.navbar-findcond ul.navbar-nav a:focus,
nav.navbar-findcond ul.navbar-nav a:active { background: #428bca; }
nav.navbar-findcond ul.navbar-nav a:hover { border-color: #f14444; color: yellow; font-weight: bolder; }
nav.navbar-findcond li.divider { background: #ccc; }
nav.navbar-findcond button.navbar-toggle { background: #f14444; border-radius: 2px; }
nav.navbar-findcond button.navbar-toggle:hover { background: #999; }
nav.navbar-findcond button.navbar-toggle > span.icon-bar { background: #fff; }
nav.navbar-findcond ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
nav.navbar-findcond ul.dropdown-menu > li > a { color: #444; }
nav.navbar-findcond ul.dropdown-menu > li > a:hover { background: #f14444; color: #fff; }
nav.navbar-findcond span.badge { background: #f14444; font-weight: normal; font-size: 11px; margin: 0 4px; }
nav.navbar-findcond span.badge.new { background: rgba(255, 0, 0, 0.8); color: #fff; }
</style>
<nav class="navbar navbar-findcond navbar-fixed-top" role=navigation>
<div class=container>
<div class=navbar-header>
	<button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-collapse>
		<span class=sr-only>Toggle navigation</span>
		<span class=icon-bar></span>
		<span class=icon-bar></span>
		<span class=icon-bar></span>
	</button>
	<a class=navbar-brand href=#>&middot; Hệ thống nộp bài trực tuyến.</a>
</div>
<div class="navbar-collapse collapse">
<div class="navbar-form navbar-right">
<ul class="nav navbar-nav">
<li role="presentation"><a href=/ide.php title="IDE Online" ><span class="glyphicon glyphicon-console text-success"></span> IDE</a></li>
<li role="presentation"><a href=/chatbox/ title="Phòng Chat"><span class="glyphicon glyphicon-comment text-success"></span> Chatbox <?php echo '<span class="badge new"><b>'.$numchat.'</b></span>'; ?></a></li>
<li role="presentation"><a href=ranking.php title="Bảng Rank"><span class="glyphicon glyphicon-stats glyphicon-stats text-success"></span> Rank</a></li>
<li role="presentation"><a href=/sms.php title="Tin Nhắn"><span class="glyphicon glyphicon-envelope text-success"></span> Sms <?php if($newmess) { echo '<span class="badge new"><b>'.$newmess.'</b></span>'; }?></a></li>
<li role="presentation"><a href=repass.php title="Đổi mật khẩu"><span class="glyphicon glyphicon-user text-success"></span> Thí sinh: <?php echo $_SESSION['tname']; ?></a></li>
<li role="presentation"><a href=logout.php title="Đăng Xuất"><span class="glyphicon glyphicon-off text-success"></span> Thoát</a></li></ul>
</div>
</div>
</div>
</nav>
<div id=body class="maintxt container">
<h1><?php echo $contestName; ?></h1>
<p><?php echo $description; ?></p>
<?php if ($duringTime > 0) { ?>
<p>
- Thời gian bắt đầu: <?php echo date_format($startTime,"H:i:s"); ?> <br/>
- Thời gian làm bài: <?php echo $duringTime; ?> phút. <br/>
- Thời gian còn lại: <span id=timer> </span>
</p>
<?php } ?>
<!-- Upload -->
<?php
	if(isset($_POST['upload']))
	{
		echo $message;
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		$lastsubmit = $_SESSION['prb'.$temp[0].$extension];
		$err = 1;
		 if (((date_timestamp_get($startTime) + $duringTime*60 - time() > 0) && date_timestamp_get($startTime) <= time()) || ($duringTime == 0)) {
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			if ( !$_FILES["file"]["name"] ) 
				{$message = "LỖI: Chưa chọn file.";}
			else if ($_FILES["file"]["size"] > 10*1024*1024)  
				{$message = "LỖI: File có dung lượng quá lớn.";}
			else if ($_FILES["file"]["error"] > 0) 
				{$message = "LỖI: Không rõ.";}
			else if ($extension != 'cpp' && $extension != 'pas' && $extension != 'java' && $extension != 'c') 
				{
					$message = "LỖI: File không hợp lệ.";
				}
			else if(strtotime(date('Y-m-d H:i:s')) - $lastsubmit < $submitTime)
				{
					$message = 'Bạn nộp quá nhanh. Bạn phải đợi <b><font color = "red">'. ($submitTime - (strtotime(date('Y-m-d H:i:s')) - $lastsubmit)) . '</font></b>s nữa mới được nộp tiếp bài <font color = "green"><b>'.$temp[0].'.'.$extension.'</b></font>.';
				}
			else 
				{		
					//update time submit
					$_SESSION['prb'.$temp[0].$extension] = strtotime(date('Y-m-d H:i:s'));
					$dir = $uploadDir;
					$his = $hisDir;
					$source = $his ."/".  $user['id']."[".$user['username']."][".$temp[0]."].".$extension;
					$dest = $dir ."/".  $user['id']."[".$user['username']."][".$temp[0]."].".$extension;
					move_uploaded_file($_FILES["file"]["tmp_name"],$his ."/".  $user['id']."[".$user['username']."][".$temp[0]."].".$extension);
					$fp = fopen($source, "r");
					$data = fread($fp, filesize($source));
					$data =str_replace("system", "sistem", $data);
					$fp = fopen($source, "w");
					fwrite($fp, $data);
					copy($source, $dest);
					/// code panalty
					if($penalty)
					{
						$pen = $penDir . "/". strtotime(date('Y-m-d H:i:s'))."[".$user['username']."][".$temp[0]."].".$extension;
						copy($source, $pen);
					}
					//move_uploaded_file($_FILES["file"]["tmp_name"],$dir ."/".  $user['id']."[".$user['username']."][".$temp[0]."].".$extension);
					$message = "Nộp bài thành công.";
					$err = 0;	
				}
		} 
		else if (date_timestamp_get($startTime) > time())
		{
			$message = "Chưa đến giờ nộp bài!";
		}
		else 
		{
			$message = "Đã hết thời gian nộp bài!";
		} 
	?>

<!-- Modal -->
<?php 
if(!$err){
	?>
<div class="modal modal-message modal-success fade" id="exampleModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"><i class="glyphicon glyphicon-check"></i></div>
      <div class="modal-body">
        <h4><?php echo $message; ?></h4>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
?>

<?php 
}
else {
	?>
	<div class="modal modal-message modal-warning fade" id="exampleModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"><i class="glyphicon glyphicon-warning-sign"></i></div>
      <div class="modal-body">
        <h4><?php echo $message; ?></h4>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
	<?php
}
	}
?>
<form class="navbar-form navbar-right" method="POST" enctype=multipart/form-data>
Nộp bài:
<div class=form-group>
<input type=file name=file id=file accept=*.* class=form-control>
<button type="submit" name="upload" class="btn btn-success"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Nộp</button>
</div>
</form>
</div>
<div id=body class="maintxt container">
<div class="row row-height">
<div class=col-md-4>
<div class="panel panel-primary"><div class=panel-heading><h2 class=panel-title>Đề bài</h2></div><div class="list-group scrolllist">
<?php
		$dir = opendir($problemsDir);
		while ($file = readdir($dir)) { if ($file!="." && $file!=".." && substr($file,0,strlen($file)-4)!="allproblems") {
			echo "<a href='".$problemsDir."/".$file."' class='list-group-item list-group-item-action list-group-item-primary'>".$file."</a>";
		}}
		closedir($dir);
?>
</div></div>
<p><a class="btn btn-default" href=<?php echo $problemsDir.'/'.$problemsFile; ?> role=button><span class="glyphicon glyphicon glyphicon-download-alt glyphicon-download-alt-animate"></span> Tải về</a></p>
<div class="panel panel-primary"><div class=panel-heading><h2 class=panel-title>Test mẫu</h2></div><div class="list-group scrolllist">
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
?> </div></div>
<p><a class="btn btn-default" href=<?php echo $examTestDir.'/'.$examTestFile; ?> role=button><span class="glyphicon glyphicon glyphicon-download-alt glyphicon-download-alt-animate"></span> Tải về</a></p>
</div>
<div class="col-md-4">
<div class="panel panel-primary"><div class="panel-heading"><h2 class="panel-title">Nhật kí nộp bài</h2></div><div class="list-group scrolllist">
<div id="status"> Đang tải... </div>
</div></div>
</div>
<div class=col-md-4>
<div class="panel panel-primary"><div class=panel-heading><h2 class=panel-title>Kết quả chấm bài</h2></div><div class="list-group scrolllist">
<div id=logs> Đang tải... </div>
</div></div>
</div>
</div>
</div>
<footer>
<div id="body" class="maintxt container">
<p><?php echo $footer; ?></p>
</div>
</footer>
<script src=js/pace.min.js></script>
<script src=js/jquery-latest.js></script>
<script src=js/bootstrap.js></script>
<script>
	var refreshId=setInterval(function(){$("#logs").load("logs.php");$("#timer").load("timer.php")},1000);
	var refreshId=setInterval(function(){$("#status").load("status.php");$("#timer").load("timer.php")},1000);
</script>
<script>
	$('#exampleModal').modal('show');
	$('#exampleModal').on('hidden.bs.modal', function () {
		window.history.back();
	})
	$(document).keyup(function(e) {
     	if(e.keyCode){
        	 $('#exampleModal').modal('hide');
   		}
	});
</script>