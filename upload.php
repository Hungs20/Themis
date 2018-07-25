<?php
	include("init.php");
	include("config.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- loading -->

    <script src="js/pace.min.js"></script>
    <link rel="stylesheet" href="/css/pace-theme-minimal.css">
    <!--end load-->
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">body{font-family:consolas;}
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
</head>
<body>
<?php

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
?>
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
</body>
</html>
