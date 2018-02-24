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
    <style type="text/css">body{font-family:consolas;}</style>
</head>
<body>
<?php

	$lastsubmit = $_SESSION['lastsubmit'];
	if(strtotime(date('Y-m-d H:i:s')) - $lastsubmit < $submitTime)
	{
		$message = 'Bạn submit quá nhanh. Bạn phải đợi <b><font color = "red">'. ($submitTime - (strtotime(date('Y-m-d H:i:s')) - $lastsubmit)) . '</font></b>s nữa mới được submit tiếp.';
	}
	else if (((date_timestamp_get($startTime) + $duringTime*60 - time() > 0)) || ($duringTime == 0)) {

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
				$message = "LỖI: File chỉ được có phần mở rộng là : c, cpp, pas, java";
			}
		else 
			{		
				//update time submit
				$_SESSION['lastsubmit'] = strtotime(date('Y-m-d H:i:s'));

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
			}
	} 
	else {
				$message = "Đã hết thời gian nộp bài! <br/><br/> Nộp bài không thành công!";
	}	
?>		

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header list-group-item active">
        <center><h3 class="modal-title" id="exampleModalLabel">Thông báo</h3></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><font color = "red">&times;</font></span>
        </button>
      </div>
      <div class="modal-body">
        <h4><?php echo $message; ?></h4>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
