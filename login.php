
<!-- loading -->

<script src="js/pace.min.js"></script>
<link rel="stylesheet" href="/css/pace-theme-minimal.css">
<!--end load-->
<?php
session_start();
if (isset($_SESSION['tuser'])) header("Location: index.php");
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$dom = new DOMDocument();
    $dom->load("data/account.xml");
    $row = $dom->getElementsByTagName("Row");
	$found = -1;
	foreach ($row as $r) {
		if ($found > -1 && $username) {
			for ($i = 0; $i < 5; $i++) $a[$i] = $r->getElementsByTagName("Cell")->item($i)->nodeValue;
			if ($a[1] == $username) {
				if (($a[4]==0 && $password == $a[2]) || (md5($password) == $a[2])) {
					$_SESSION['tid'] = $a[0];
					$_SESSION['tuser'] = $a[1];
					$_SESSION['tname'] = $a[3];
					$_SESSION['tpass'] = $a[2];

					if (isset($_POST['remember'])) {
						setcookie("cooktname", $username, time()+60*60*24*100); 
						setcookie("cooktpass", $password, time()+60*60*24*100);
					}			
					else {
						setcookie("cooktname", "", time()-60*60*24*100); 
						setcookie("cooktpass", "", time()-60*60*24*100);
					}	
					$found++;
					break;
				}
			}
		}
		else $found++;
	}
	if ($found == 1) header("Location: index.php");
	else header("Location: login.php?err=1");
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
    <link href="css/bootstrap.css" rel="stylesheet">
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

      <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h2 class="form-signin-heading">Đăng nhập</h2>
        <input type="text" name="username" class="input-block-level" placeholder="Tài khoản" <?php if (isset($_COOKIE['cooktname'])) echo "value='".$_COOKIE['cooktname']."'";?>>
        <input type="password" name="password" class="input-block-level" placeholder="Mật khẩu" <?php if (isset($_COOKIE['cooktpass'])) echo "value='".$_COOKIE['cooktpass']."'";?>">
        <label class="checkbox">
          <input type="checkbox" name="remember" value="remember" <?php if (isset($_COOKIE['cooktname'])) echo "checked='checked'" ?>> Nhớ mật khẩu
        </label>
        <button class="btn btn-large btn-primary" type="submit">Đăng nhập</button>
		<div class="warning"> <?php if (isset($_GET['err'])) echo "Sai tên đăng nhập hoặc mật khẩu!"; ?> </div>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
