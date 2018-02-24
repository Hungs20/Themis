<?php
	include("init.php");
	if (isset($_POST["repass"])) {
		$success = FALSE;
		if (($_POST["oldpass"] != $_SESSION["tpass"] && md5($_POST["oldpass"]) != $_SESSION["tpass"])||($_POST["newpass"]!=$_POST["repass"])||(strlen($_POST["newpass"]) < 5)) {
			header("Location: repass.php?err=1");
		}	
		else $success = TRUE;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Đăng nhập &middot; Chấm bài trực tuyến</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    
    <!-- loading -->

    <script src="js/pace.min.js"></script>
    <link rel="stylesheet" href="/css/pace-theme-minimal.css">
    <!--end load-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-repass {
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
      .form-repass .form-repass-heading,
      .form-repass .checkbox {
        margin-bottom: 10px;
      }
      .form-repass input[type="text"],
      .form-repass input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
	  .form-repass .warning {
	    font-size: 14px;
		color: red; 
		margin-top: 8px;
		text-align: center;
	  }

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>

    <div class="container">

      <form class="form-repass" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h2 class="form-repass-heading">Đổi mật khẩu</h2>
        <input type="password" name="oldpass" class="input-block-level" placeholder="Mật khẩu cũ">
        <input type="password" name="newpass" class="input-block-level" placeholder="Mật khẩu mới (ít nhất 5 ký tự)">
        <input type="password" name="repass" class="input-block-level" placeholder="Nhập lại mật khẩu mới">
        <div align="center">
		<button class="btn btn-large btn-primary" type="submit">Đổi mật khẩu</button> 
		<a class="btn btn-large btn-primary" href="index.php">Về trang chủ</a>
		<div class="warning"> 
			<?php if (isset($_GET['err'])) echo "<strong>LỖI:</strong> Mật khẩu cũ không đúng, mật khẩu mới quá ngắn hoặc nhập không trùng nhau!"; ?> 
		</div>
		</div>
      </form>

    </div> <!-- /container -->
<?php
	if (isset($success) && $success) {
		if (!is_file('data/tmp.xml')) {
			$fi = fopen('data/account.xml','r');
			$fo = fopen('data/tmp.xml','w');
			while (!feof($fi)) {
				$str = fgets($fi);
				if (strpos($str,">".$user['username']."<") > 0) {
					fwrite($fo,$str);
					$str = fgets($fi);
					$str = str_replace(">".$user['password']."<",">".md5($_POST['newpass'])."<",$str);
					fwrite($fo,$str);
					$str = fgets($fi);
					fwrite($fo,$str);
					$str = fgets($fi);
					$str = str_replace('>0<','>1<',$str);
				}
				fwrite($fo,$str);
			}
			fclose($fi);
			fclose($fo);
			copy('data/tmp.xml','data/account.xml');
			unlink('data/tmp.xml');
			$_SESSION['tpass']=md5($_POST['newpass']);
?>
			<script>
				alert("Đổi mật khẩu thành công");
				window.location.assign("index.php");
			</script>	
<?php
		}
		else {
?>		
			<script>
				alert("LỖI: Đổi mật khẩu không thành công\n Vui lòng đổi mật khẩu lại!");
				window.location.assign("repass.php");
			</script>
<?php
		}
	}	
?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
