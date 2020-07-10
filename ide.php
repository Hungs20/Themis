<?php
  include("init.php");
  include("config.php");
  include("functions.php");
?>
<!doctype html>
<meta charset="utf-8"/>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<title>IDE Online</title>
<script src=js/pace.min.js></script>
<link rel=stylesheet href=/css/pace-theme-minimal.css>
<link rel=stylesheet href=/ide/lib/codemirror.css>
<link rel=stylesheet href=/css/ide.css>
<script src=js/jquery-latest.js></script>
<script src=/ide/lib/codemirror.js></script>
<script src=/ide/addon/edit/matchbrackets.js></script>
<link rel=stylesheet href=/ide/addon/hint/show-hint.css>
<link rel=stylesheet href=/ide/theme/one-dark.css>
<link rel=stylesheet href=/ide/theme/3024-day.css>
<link rel=stylesheet href=/ide/theme/3024-night.css>
<link rel=stylesheet href=/ide/theme/abcdef.css>
<link rel=stylesheet href=/ide/theme/ambiance.css>
<link rel=stylesheet href=/ide/theme/base16-dark.css>
<link rel=stylesheet href=/ide/theme/bespin.css>
<link rel=stylesheet href=/ide/theme/base16-light.css>
<link rel=stylesheet href=/ide/theme/blackboard.css>
<link rel=stylesheet href=/ide/theme/cobalt.css>
<link rel=stylesheet href=/ide/theme/colorforth.css>
<link rel=stylesheet href=/ide/theme/dracula.css>
<link rel=stylesheet href=/ide/theme/duotone-dark.css>
<link rel=stylesheet href=/ide/theme/duotone-light.css>
<link rel=stylesheet href=/ide/theme/eclipse.css>
<link rel=stylesheet href=/ide/theme/elegant.css>
<link rel=stylesheet href=/ide/theme/erlang-dark.css>
<link rel=stylesheet href=/ide/theme/hopscotch.css>
<link rel=stylesheet href=/ide/theme/icecoder.css>
<link rel=stylesheet href=/ide/theme/isotope.css>
<link rel=stylesheet href=/ide/theme/lesser-dark.css>
<link rel=stylesheet href=/ide/theme/liquibyte.css>
<link rel=stylesheet href=/ide/theme/material.css>
<link rel=stylesheet href=/ide/theme/mbo.css>
<link rel=stylesheet href=/ide/theme/mdn-like.css>
<link rel=stylesheet href=/ide/theme/midnight.css>
<link rel=stylesheet href=/ide/theme/monokai.css>
<link rel=stylesheet href=/ide/theme/neat.css>
<link rel=stylesheet href=/ide/theme/neo.css>
<link rel=stylesheet href=/ide/theme/night.css>
<link rel=stylesheet href=/ide/theme/panda-syntax.css>
<link rel=stylesheet href=/ide/theme/paraiso-dark.css>
<link rel=stylesheet href=/ide/theme/paraiso-light.css>
<link rel=stylesheet href=/ide/theme/pastel-on-dark.css>
<link rel=stylesheet href=/ide/theme/railscasts.css>
<link rel=stylesheet href=/ide/theme/rubyblue.css>
<link rel=stylesheet href=/ide/theme/seti.css>
<link rel=stylesheet href=/ide/theme/solarized.css>
<link rel=stylesheet href=/ide/theme/the-matrix.css>
<link rel=stylesheet href=/ide/theme/tomorrow-night-bright.css>
<link rel=stylesheet href=/ide/theme/tomorrow-night-eighties.css>
<link rel=stylesheet href=/ide/theme/ttcn.css>
<link rel=stylesheet href=/ide/theme/twilight.css>
<link rel=stylesheet href=/ide/theme/vibrant-ink.css>
<link rel=stylesheet href=/ide/theme/xq-dark.css>
<link rel=stylesheet href=/ide/theme/xq-light.css>
<link rel=stylesheet href=/ide/theme/yeti.css>
<link rel=stylesheet href=/ide/theme/zenburn.css>
<script src=/ide/addon/hint/show-hint.js></script>
<script src=/ide/mode/clike/clike.js></script>
<script src=/ide/mode/pascal/pascal.js></script>
<script src=/ide/mode/python.js></script>
<link href=css/bootstrap.css rel=stylesheet>
<link href=css/jumbotron.css rel=stylesheet>
<script src=js/bootstrap.js></script>
<script src=js/alert.js></script>
<style>body{font-family:consolas}.CodeMirror{border:2px inset #dee}body{font-family:consolas;font-size:13px;line-height:18px;padding-top:50px;background:#f4f4fe;color:#000;background:#b2dfda url('/images/bg.gif') 0 50px fixed no-repeat}::-webkit-scrollbar{width:10px;height:10px}::-webkit-scrollbar-track{background-color:#f5f5f5;-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.3);border:0 solid #000}::-webkit-scrollbar-thumb{background:#07F}::-webkit-scrollbar-thumb:hover{background:#09F}::-webkit-scrollbar-thumb:active{background:#888;-webkit-box-shadow:inset 1px 1px 2px rgba(0,0,0,.3)}:focus{outline:0}textarea{resize:vertical}ul,li{margin:0;padding:0}li{list-style:none}.icon{padding:3px 6px 3px 1px;vertical-align:middle}.icon-inline{padding-right:6px;vertical-align:middle}img{max-width:100%}body#login .subLoginForm{display:none}#body{padding-top:15px;padding-bottom:15px;background:transparent url('/images/bg.png') scroll top left repeat}@media(min-width:992px){#body{margin-bottom:40px}}</style>
<style> .modal-content {
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
<textarea style=display:none id=codecpp>#include <iostream>
using namespace std;

int main() {
  // your code goes here
  return 0;
}
</textarea>
<textarea style=display:none id=codepas>program ideone;
begin
  (* your code goes here *)
end.
</textarea>
<textarea style=display:none id=codejava>/* package whatever; // don't place package name! */

import java.util.*;
import java.lang.*;
import java.io.*;

/* Name of the class has to be "Main" only if the class is public. */
class Ideone
{
  public static void main (String[] args) throws java.lang.Exception
  {
    // your code goes here
  }
}
</textarea>
  <textarea style=display:none id=codepy># Hello World program in Python
    
print "Hello World!\n"
</textarea>
<script>
function setCookie(b,f,c){
	var e=new Date();
	e.setTime(e.getTime()+(c*24*60*60*1000));
	var a="expires="+e.toUTCString();document.cookie=b+"="+f+";"+a+";path=/"
}
function getCookie(d){
	var b=d+"=";
	var a=document.cookie.split(";");
	for(var e=0;e<a.length;e++){
		var f=a[e];
		while(f.charAt(0)==" "){
			f=f.substring(1)
		}
		if(f.indexOf(b)==0){
			return f.substring(b.length,f.length)
		}
	}
	return""
}
function insertTextAtCursor(a,d){
	var b=a.getDoc();
	var c=b.getCursor();
	b.replaceRange(d,c)
}
var test0=document.getElementById("codecpp").value;
var test1=document.getElementById("codepas").value;
var test2=document.getElementById("codejava").value;
var test3=document.getElementById("codepy").value;
function change(){
	var a=document.add.file.value;
	console.log(a);
	if(a=="cpp"){
		editor.setValue("");
		insertTextAtCursor(editor,test0);
		editor.setOption("mode","text/x-c++src")
	}else if(a=="pas"){
		editor.setValue("");
		insertTextAtCursor(editor,test1);
		editor.setOption("mode","text/x-pascal")
	} else if(a=="py"){
		editor.setValue("");
		insertTextAtCursor(editor,test3);
		editor.setOption("mode","text/x-python")
	} else if(a=="java"){
		editor.setValue("");
		insertTextAtCursor(editor,test2);
		editor.setOption("mode","text/x-java")
	}
}
</script>
<?php


    if(isset($_POST['submit']))
    {
        $ten=$_POST['ten'];
        $str=preg_replace('/[^a-z0-9]+/i','',$ten);
        $code=$_POST['code'];
        $code = str_replace("system", "sistem", $code);
        $file=$_POST['file'];
        if($str != $ten) $ten = '';
        if(!$ten || !$code)
        {
            $err = "Tên bài hoặc code không hợp lệ.";
        }
        else if($file != 'cpp' && $file != 'pas' && $file != 'java' && $file != 'py' && $file != 'c')
        {
          $err = "Tên file không hợp lệ.";
        }
        else
        {
          $lastsubmit = $_SESSION['prb'.$ten.$file];
          if(strtotime(date('Y-m-d H:i:s')) - $lastsubmit < $submitTime)
          {
            $err = 'Bạn nộp quá nhanh. Bạn phải đợi <b><font color = "red">'. ($submitTime - (strtotime(date('Y-m-d H:i:s')) - $lastsubmit)) . '</font></b>s nữa mới được nộp tiếp bài <font color = "green"><b>'.$ten.'.'.$file.'</b></font>.';
          }
          else if (((date_timestamp_get($startTime) + $duringTime*60 - time() > 0) && date_timestamp_get($startTime) <= time()) || ($duringTime == 0))
          {
            //update time
            $_SESSION['prb'.$ten.$file] = strtotime(date('Y-m-d H:i:s'));
            $username = $_SESSION['tuser'];
            $fname = $uploadDir."/".$user['id']."[".$username."][".$ten."].".$file;
            $hname = $hisDir."/".$user['id']."[".$username."][".$ten."].".$file;
            $fmake = fopen($fname,'w');
            $hmake = fopen($hname, 'w');
            fwrite($hmake, $code);
            fwrite($fmake,$code);
            fclose($hmake);
            fclose($fmake);
            if($penalty)
            {
              $pen = $penDir . "/". strtotime(date('Y-m-d H:i:s'))."[".$user['username']."][".$ten."].".$file;
              $hpen = fopen($pen, 'w');
              fwrite($hpen, $code);
              fclose($hpen);
            }
            $message = "Nộp bài thành công.";
          } 
          else if (date_timestamp_get($startTime) > time())
          {
            $message = "Chưa đến giờ nộp bài!";
          }
          else
          {
            $err = "Đã hết thời gian nộp bài!";
          }
        }
    }
?>
<article>
<form name=add method=POST class=form-horizontal>
<center><h2>Tên bài</h2><br>
<div class=form-inline>
<input type=text name=ten id=fnames class="form-control"/>
<select name=file class=form-control onChange=change()>
<option value=cpp>.cpp</option>
<option value=pas>.pas</option>
<option value=java>.java</option>
<option value=py>.py</option>
</select>
</div>
</center>
<br>
<?php
if($err){
    ?>
  <div class="modal modal-message modal-warning fade" id="warningModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"><i class="glyphicon glyphicon-warning-sign"></i></div>
      <div class="modal-body">
        <h4><?php echo $err; ?></h4>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<?php
}
if($message){
  ?>
<div class="modal modal-message modal-success fade" id="successModal" tabindex="-1" role="dialog"  aria-hidden="true">
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
<?php
}
?>
<script>
  $("#successModal").modal("show");$("#successModal").on("hidden.bs.modal",function(){window.location="/index.php"});$(document).keyup(function(a){if(a.keyCode){$("#successModal").modal("hide")}});
  $("#warningModal").modal("show");$(document).keyup(function(a){if(a.keyCode){$("#successModal").modal("hide")}});
</script>
<center><h2>Code</h2></center> <br>
<div><textarea name=code id=cpp-code class=form-control>
#include <iostream>
using namespace std;

int main() {
  // your code goes here
  return 0;
}
</textarea></div><br/>
<center>
<div class=form-inline>
<input type=submit name=submit class="btn btn-success" value="Submit"/>
<select class=form-control onchange=selectTheme() id=select>
<script>var x=getCookie("theme");if(x==""){x="default"}var list=["default","3024-day","3024-night","abcdef","ambiance","base16-dark","base16-light","bespin","blackboard","cobalt","colorforth","dracula","duotone-dark","duotone-light","eclipse","elegant","erlang-dark","hopscotch","icecoder","isotope","lesser-dark","liquibyte","material","mbo","mdn-like","midnight","monokai","neat","neo","night","panda-syntax","paraiso-dark","paraiso-light","pastel-on-dark","railscasts","rubyblue","seti","solarized dark","solarized light","the-matrix","tomorrow-night-bright","tomorrow-night-eighties","ttcn","twilight","vibrant-ink","xq-dark","xq-light","yeti","zenburn",];for(var i=0;i<list.length;i++){if(x==list[i]){document.write("<option selected>"+x+"</option>")}else{document.write("<option>"+list[i]+"</option>")}}</script>
</select></div>
</center>
</form>
</article>
<script>var x=getCookie("theme");if(x==""){x="default"}var editor=CodeMirror.fromTextArea(document.getElementById("cpp-code"),{lineNumbers:true,styleActiveLine:true,matchBrackets:true,mode:"text/x-c++src",theme:x,});var input=document.getElementById("select");function selectTheme(){var a=input.options[input.selectedIndex].innerHTML;editor.setOption("theme",a);setCookie("theme",a,365)};</script>
<?php
  $arr = array();
  $dir = './'.$hisDir;
  $files1 = scandir($dir);
  $filename = '[' . $user['username'] . ']';
  for($i = 2; $i < sizeof($files1); $i++) {
      if(!strpos($files1[$i], $filename )) continue;
      $file = strstr($files1[$i], '.');
       $start = strlen($user['username']) + strlen($user['id']) + 3;
      $end = strlen($files1[$i]) - strlen($file) - $start - 1;
      $name = substr( $files1[$i], $start , $end);
      $fp = file_get_contents($dir."/".$files1[$i]);
      $arr[$name.$file] = $fp;
      }
?>
<script>
	var data=<?php echo json_encode($arr); ?>;
	function do_something(a,b){
		var c=data[a+b];
		editor.setValue("");
		insertTextAtCursor(editor,c);
		document.getElementById("fnames").value=a;
		if(b==".cpp"){
			editor.setOption("mode","text/x-c++src")
		} else if(b==".pas"){
			editor.setOption("mode","text/x-pascal")
		} else if(b==".java"){
			editor.setOption("mode","text/x-java")
		} else if(b==".py"){
			editor.setOption("mode","text/x-python")
		}
	};
</script>
<?php
echo '<br/><br/><center><h4>Danh sách các bài đã nộp :</h4></center><br/><div class="table-responsive"><table class="table table-condensed" style = "font-size:16px;"><tr class = "info">';
$dir    = './'.$hisDir;
$files1 = scandir($dir);
$ok = 0;
$filename = '[' . $user['username'] . ']';
$num = 0;
for($i = 2; $i < sizeof($files1); $i++) {
    if(!strpos($files1[$i], $filename)) continue;
    $num++;
    if($num % 7 == 1) echo '</tr><tr class = "info">';
    $file = strstr($files1[$i], '.');
    $start = strlen($user['username']) + strlen($user['id']) + 3;
    $end = strlen($files1[$i]) - strlen($file) - $start - 1;
    $name = substr( $files1[$i], $start , $end);
    echo '<td align="left" width="auto" class = "info"><a href = "#" onclick="do_something(';
    echo "'".$name."','".$file."'";
    echo ')"><b>'.strtoupper($name).'</b></a></td>';
    }
echo '</tr></table></div>';
?>
</div>
<footer>
<div id="body" class="maintxt container">
<p><?php echo $footer; ?></p>
</div>
</footer>
