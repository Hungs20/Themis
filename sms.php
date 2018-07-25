<?php
  include("init.php");
  include("config.php");
  include("functions.php");
  date_default_timezone_set("Asia/Bangkok");
?>
<!doctype html>
<meta charset="utf-8"/>
<title>SMS</title>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<script src=../js/pace.min.js></script>
<link rel=stylesheet href=../css/pace-theme-minimal.css>
<script src=../js/jquery-latest.js></script>
<link href=../css/jumbotron.css rel=stylesheet>
<link href=../css/bootstrap.css rel=stylesheet>
<script src=../js/bootstrap.js></script>
<style>body{font-family:Consolas}.label-medium{vertical-align:super;font-size:medium}.label-large{vertical-align:super;font-size:large}.label-small{vertical-align:super;font-size:small}.glyphicon-refresh-animate{-animation:spin .7s infinite linear;-webkit-animation:spin2 .7s infinite linear}@-webkit-keyframes spin2{from{-webkit-transform:rotate(0deg)}to{-webkit-transform:rotate(360deg)}}@keyframes spin{from{transform:scale(1) rotate(0deg)}to{transform:scale(1) rotate(360deg)}}body{font-family:consolas;font-size:13px;line-height:18px;padding-top:50px;background:#f4f4fe;color:#000;background:#b2dfda url('/images/bg.gif') 0 50px fixed no-repeat}::-webkit-scrollbar{width:10px;height:10px}::-webkit-scrollbar-track{background-color:#f5f5f5;-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.3);border:0 solid #000}::-webkit-scrollbar-thumb{background:#07F}::-webkit-scrollbar-thumb:hover{background:#09F}::-webkit-scrollbar-thumb:active{background:#888;-webkit-box-shadow:inset 1px 1px 2px rgba(0,0,0,.3)}:focus{outline:0}textarea{resize:vertical}ul,li{margin:0;padding:0}li{list-style:none}.icon{padding:3px 6px 3px 1px;vertical-align:middle}.icon-inline{padding-right:6px;vertical-align:middle}img{max-width:100%}body#login .subLoginForm{display:none}#body{padding-top:15px;padding-bottom:15px;background:transparent url('/images/bg.png') scroll top left repeat}@media(min-width:992px){#body{margin-bottom:40px}}</style>
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
<li role="presentation"><a href=/index.php title="Trang Chủ" ><span class="glyphicon glyphicon-home text-success"></span> Home</a></li>
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
<form name=inbox method=POST class=form-horizontal>
<center><h4>Tên người nhận</h4><br>
<div class=form-inline>
<input type=text name=user class="form-control"/>
</div>
<br>
<h4>Nội dung</h4><br>
<textarea name=sms class=form-control style=max-width:50%;height:100px></textarea><br/>
<div class=form-inline>
<input type=submit name=submit class="btn btn-success" value="Send"/>
</div></center>
</form>
<?php

        $dir = 'sms/data/';
        $dirnew = 'sms/new/';
      $name = $user['username'];
        if(isset($_POST['submit']))
        {
          if(!$_POST['user'] || !$_POST['sms'])
          {
            echo '<div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning! </strong>Tên người nhận hoặc thư rỗng.</div>';
          }
          else
          {
            $uname = $_POST['user'];
              $text = stripslashes(htmlspecialchars($_POST['sms']));
            if(!is_dir('sms/data')) mkdir('sms/data');
            if(!is_dir('sms/new')) mkdir('sms/new');

            $fpp = @fopen($dir.$uname.'.txt', "r");
          $data = fread($fpp, filesize($dir.$uname.'.txt'));
          fclose($fpp);

          $fn = @fopen($dirnew.$uname.'.txt', "r");
          $num = fread($fn, filesize($dirnew.$uname.'.txt'));
          if(!$num) $num = 0;
          fclose($fn);

          $mess = '<li class="list-group-item list-group-item-success"><font color = "blue">['.date("d-m-Y h:i:s A").']</font><font color = "red">'.$name.'</font>: '.$text.'</li>';
            $fp = @fopen($dir.$uname.'.txt', "w+");
          fwrite($fp, base64_encode($mess.base64_decode($data)));
          fclose($fp);

          $num++;
            $fp = @fopen($dirnew.$uname.'.txt', "w+");
          fwrite($fp, $num);
          fclose($fp);

        }
        
        }
        ?>
<br/><center><h2>Tin nhắn đến</h2></center><br/>
<form method=POST><input type=submit name=del value="Xóa hết tin nhắn" class="btn btn-success"></form>
<?php

       if(isset($_POST['del']))
       {
        if(!is_dir('sms/data')) mkdir('sms/data');
          if(!is_dir('sms/new')) mkdir('sms/new');
          $fp = @fopen($dir.$name.'.txt', "w+");
          fwrite($fp, '');
          fclose($fp);
        $fp = @fopen($dirnew.$name.'.txt', "w+");
          fwrite($fp, '0');
          fclose($fp);
       }

        if (is_dir($dir)){
        if ($dh = opendir($dir)){
          while (($file = readdir($dh)) !== false){
            if($file == '.' || $file == '..') continue;
            if(strpos($file, $name) === false) continue;

            $fp = @fopen($dir.$file, "r");
            $data = fread($fp, filesize($dir.$file));
            echo '<ul class="list-group">'.base64_decode($data).'</ul>';
            fclose($fp);

            $fp = @fopen($dirnew.$file, "w+");
          fwrite($fp, '0');
          fclose($fp);

          }
          closedir($dh);
        }
      }
    ?>
</div>
<footer>
<div id="body" class="maintxt container">
<p><?php echo $footer; ?></p>
</div>
</footer>