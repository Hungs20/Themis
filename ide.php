<?php
  include("init.php");
  include("config.php");
  include("functions.php");
?>

<!doctype html>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IDE Online</title>
<!-- loading -->

<script src="js/pace.min.js"></script>
<link rel="stylesheet" href="/css/pace-theme-minimal.css">
<!--end load-->

<link rel="stylesheet" href="/ide/lib/codemirror.css">
<link rel="stylesheet" href="/css/ide.css">

    <script src="js/jquery-latest.js"></script>
<script src="/ide/lib/codemirror.js"></script>
<script src="/ide/addon/edit/matchbrackets.js"></script>
<link rel="stylesheet" href="/ide/addon/hint/show-hint.css">
<link rel="stylesheet" href="/ide/theme/one-dark.css">
<link rel="stylesheet" href="/ide/theme/3024-day.css">
<link rel="stylesheet" href="/ide/theme/3024-night.css">
<link rel="stylesheet" href="/ide/theme/abcdef.css">
<link rel="stylesheet" href="/ide/theme/ambiance.css">
<link rel="stylesheet" href="/ide/theme/base16-dark.css">
<link rel="stylesheet" href="/ide/theme/bespin.css">
<link rel="stylesheet" href="/ide/theme/base16-light.css">
<link rel="stylesheet" href="/ide/theme/blackboard.css">
<link rel="stylesheet" href="/ide/theme/cobalt.css">
<link rel="stylesheet" href="/ide/theme/colorforth.css">
<link rel="stylesheet" href="/ide/theme/dracula.css">
<link rel="stylesheet" href="/ide/theme/duotone-dark.css">
<link rel="stylesheet" href="/ide/theme/duotone-light.css">
<link rel="stylesheet" href="/ide/theme/eclipse.css">
<link rel="stylesheet" href="/ide/theme/elegant.css">
<link rel="stylesheet" href="/ide/theme/erlang-dark.css">
<link rel="stylesheet" href="/ide/theme/hopscotch.css">
<link rel="stylesheet" href="/ide/theme/icecoder.css">
<link rel="stylesheet" href="/ide/theme/isotope.css">
<link rel="stylesheet" href="/ide/theme/lesser-dark.css">
<link rel="stylesheet" href="/ide/theme/liquibyte.css">
<link rel="stylesheet" href="/ide/theme/material.css">
<link rel="stylesheet" href="/ide/theme/mbo.css">
<link rel="stylesheet" href="/ide/theme/mdn-like.css">
<link rel="stylesheet" href="/ide/theme/midnight.css">
<link rel="stylesheet" href="/ide/theme/monokai.css">
<link rel="stylesheet" href="/ide/theme/neat.css">
<link rel="stylesheet" href="/ide/theme/neo.css">
<link rel="stylesheet" href="/ide/theme/night.css">
<link rel="stylesheet" href="/ide/theme/panda-syntax.css">
<link rel="stylesheet" href="/ide/theme/paraiso-dark.css">
<link rel="stylesheet" href="/ide/theme/paraiso-light.css">
<link rel="stylesheet" href="/ide/theme/pastel-on-dark.css">
<link rel="stylesheet" href="/ide/theme/railscasts.css">
<link rel="stylesheet" href="/ide/theme/rubyblue.css">
<link rel="stylesheet" href="/ide/theme/seti.css">
<link rel="stylesheet" href="/ide/theme/solarized.css">
<link rel="stylesheet" href="/ide/theme/the-matrix.css">
<link rel="stylesheet" href="/ide/theme/tomorrow-night-bright.css">
<link rel="stylesheet" href="/ide/theme/tomorrow-night-eighties.css">
<link rel="stylesheet" href="/ide/theme/ttcn.css">
<link rel="stylesheet" href="/ide/theme/twilight.css">
<link rel="stylesheet" href="/ide/theme/vibrant-ink.css">
<link rel="stylesheet" href="/ide/theme/xq-dark.css">
<link rel="stylesheet" href="/ide/theme/xq-light.css">
<link rel="stylesheet" href="/ide/theme/yeti.css">
<link rel="stylesheet" href="/ide/theme/zenburn.css">
<script src="/ide/addon/hint/show-hint.js"></script>
<script src="/ide/mode/clike/clike.js"></script>
<script src="/ide/mode/pascal/pascal.js"></script>


    <!-- Bootstrap core CSS -->

  <script src="js/jquery-latest.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
   <link href="css/jumbotron.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>

    <script src="js/alert.js"></script>

<style>
  body{font-family: consolas;}.CodeMirror {border: 2px inset #dee;}
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
        <a class="btn btn-success" href="/index.php" title="Trang chủ"><span class = "glyphicon glyphicon-home text-danger"></span> Home</a>
           <a class="btn btn-success" href="/chatbox" title="Chatbox"><span class = "glyphicon glyphicon-comment text-danger"></span> Chatbox <?php echo '<span class="badge"><font color = "red"><b>'.$numchat.'</b></font></span>'; ?></a>
        <a class="btn btn-success" href="ranking.php" title="Rank"><span class = "glyphicon glyphicon-stats glyphicon-stats text-danger"></span> Rank</a>
           <a class="btn btn-success" href="/sms.php" title="Sms"><span class = "glyphicon glyphicon-envelope text-danger"></span> Sms <?php echo '<span class="badge"><font color = "red"><b>'.$newmess.'</b></font></span>'; ?></a>
        <a class="btn btn-success" href="repass.php" title="Đổi mật khẩu"><span class = "glyphicon glyphicon-user text-danger"></span> Thí sinh: <?php echo $_SESSION['tname']; ?></a> 
        <a class="btn btn-success" href="logout.php" title="logout"><span class = "glyphicon glyphicon-off text-danger"></span> Thoát</a>
    </div>
    </div> 
      </div>
    </div>
    <div id="body" class="maintxt container">

<textarea style="display:none" id="codecpp">#include <iostream>
using namespace std;

int main() {
  // your code goes here
  return 0;
}
</textarea>

<textarea style="display:none" id="codepas">program ideone;
begin
  (* your code goes here *)
end.
</textarea>

<textarea style="display:none" id="codejava">/* package whatever; // don't place package name! */

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

<script>
  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


function insertTextAtCursor(editor,text) {
      var doc = editor.getDoc();
      var cursor = doc.getCursor();
      doc.replaceRange(text, cursor);
  }
var test0= document.getElementById('codecpp').value;
var test1= document.getElementById('codepas').value;
var test2= document.getElementById('codejava').value;
function change() {
var otionValue = document.add.file.value;
if (otionValue == "cpp") {
  editor.setValue('');
    insertTextAtCursor(editor, test0);
    editor.setOption('mode','text/x-c++src');
} else if (otionValue == "pas")
  {
    editor.setValue('');
      insertTextAtCursor(editor, test1);
      editor.setOption('mode','text/x-pascal'); 
  }
  else if (otionValue == "java"){
    editor.setValue('');
    insertTextAtCursor(editor, test2);
    editor.setOption('mode','text/x-java');
  }
}; 



</script>
<?php

  $lastsubmit = $_SESSION['lastsubmit'];
    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $str=preg_replace('/[^a-z0-9]+/i','',$ten);
          $code=$_POST['code'];
          $code = str_replace("system", "sistem", $code);
          $file=$_POST['file'];
        if($str != $ten) $ten = '';
        if(!$ten || !$code){
            $err = "Tên bài hoặc code không hợp lệ.";
        }
         else if($file != 'cpp' && $file != 'pas' && $file != 'java')
          {
             $err = "Tên file không hợp lệ.";
          }
        else{
          if(strtotime(date('Y-m-d H:i:s')) - $lastsubmit < $submitTime)
            {
               $err = 'Bạn submit quá nhanh. Bạn phải đợi <b><font color = "red">'. ($submitTime - (strtotime(date('Y-m-d H:i:s')) - $lastsubmit)) . '</font></b>s nữa mới được submit tiếp.';
            }
            else if (((date_timestamp_get($startTime) + $duringTime*60 - time() > 0)) || ($duringTime == 0)){

              //update time
             $_SESSION['lastsubmit'] = strtotime(date('Y-m-d H:i:s'));


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
          else
          {
            $err = "Nộp bài không thành công. Đã hết thời gian nộp bài!";
          }
        }
    }
?>
<article>
<form name = "add"  method="POST" class="form-horizontal">
<center><h2>Tên bài</h2><br>
<div class = "form-inline">
<input type="text" name="ten" id="fnames" class="form-control"/>
<select name="file" class="form-control" onChange = "change();">
  <option value="cpp">.cpp</option>
  <option value="pas">.pas</option>
  <option value="java">.java</option>
</select>
</div>
</center>
<br>
<?php
if($err){
  echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning! </strong>'.$err.'</div>';
}
if($message){
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
      window.location="/index.php";
      })
      $(document).keyup(function(e) {
          if(e.keyCode){
               $('#exampleModal').modal('hide');
          }
      });
    </script>
  <?php
}
?>
<center><h2>Code</h2></center> <br>
<div><textarea name="code" id="cpp-code" class="form-control" >
#include <iostream>
using namespace std;

int main() {
  // your code goes here
  return 0;
}
</textarea></div><br/>
<center>
<div class = "form-inline">
  <input type="submit" name="submit" class="btn btn-success" value="Submit"/> 
  <select class="form-control" onchange="selectTheme()" id=select>
  <script>
    var x = getCookie("theme");
    if(x == "") x = "default";
    var list = [
    'default',
    '3024-day',
    '3024-night',
    'abcdef',
    'ambiance',
    'base16-dark',
    'base16-light',
    'bespin',
    'blackboard',
    'cobalt',
    'colorforth',
    'dracula',
    'duotone-dark',
    'duotone-light',
    'eclipse',
    'elegant',
    'erlang-dark',
    'hopscotch',
    'icecoder',
    'isotope',
    'lesser-dark',
    'liquibyte',
    'material',
    'mbo',
    'mdn-like',
    'midnight',
    'monokai',
    'neat',
    'neo',
    'night',
    'panda-syntax',
    'paraiso-dark',
    'paraiso-light',
    'pastel-on-dark',
    'railscasts',
    'rubyblue',
    'seti',
    'solarized dark',
    'solarized light',
    'the-matrix',
    'tomorrow-night-bright',
    'tomorrow-night-eighties',
    'ttcn',
    'twilight',
    'vibrant-ink',
    'xq-dark',
    'xq-light',
    'yeti',
    'zenburn',
    ];
    for(var i = 0; i < list.length; i++){
     if(x == list[i]) document.write("<option selected>"+x+"</option>");
    else document.write("<option>"+list[i]+"</option>");
  }
   </script>
    
</select></div>
</center>
</form>
</article>

    <script>
      var x = getCookie("theme");
      if(x == "") x = "default";
      var editor = CodeMirror.fromTextArea(document.getElementById("cpp-code"), {
         lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true,
        mode: "text/x-c++src",
        theme: x,
      });
     var input = document.getElementById('select');
        function selectTheme() {
            var theme = input.options[input.selectedIndex].innerHTML;
            editor.setOption('theme', theme);
            setCookie("theme", theme, 365);
        }
     
    </script>

<!-- View code -->
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
  var data= <?php echo json_encode($arr); ?>;
  function do_something(tenbai, type)
  {
    var code = data[tenbai + type];//document.getElementById('codeold').value;
    editor.setValue('');
    insertTextAtCursor(editor, code);
    document.getElementById("fnames").value = tenbai;
    if(type == '.cpp') editor.setOption('mode','text/x-c++src');
    else if(type == '.pas') editor.setOption('mode', 'text/x-pascal');
    else if(type == '.java') editor.setOption('mode','text/x-java');
  }
</script>
<?php
echo '<br/><br/><center><h4>Danh sách các bài đã nộp :</h4></center><br/><table class="table table-condensed" style = "font-size:16px;"><tr class = "info">';
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
echo '</tr></table>';
?>
</div>





