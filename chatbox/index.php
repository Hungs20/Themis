<?php
    include("../init.php");
    include("../config.php");
    include("../functions.php");

?>
<!DOCTYPE html>
<html>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1.0">
<meta http-equiv=Content-Type content="text/html; charset=UTF-8"/>
<head>
<title>Chatbox</title>
<script type=text/javascript src=jquery-latest.js></script>
<script src=../js/pace.min.js></script>
<link rel=stylesheet href=../css/pace-theme-minimal.css>
<link type=text/css rel=stylesheet href=style.css />
<link href=../css/bootstrap.css rel=stylesheet>
<link href=../css/jumbotron.css rel=stylesheet>
</head>
<body>
<div id=wrapper>
<div id=menu>
<p class=welcome>Welcome, <b><?php echo $_SESSION['tname']; ?></b></p>
<p class=logout><a id=exit href=#><span class="glyphicon glyphicon-off glyphicon glyphicon-off-animate"></span> </a></p>
<div style=clear:both></div>
</div>
<div id=chatbox style=overflow:auto>
<?php 
    if(file_exists("log.html") && filesize("log.html") > 0){
        $handle = fopen("log.html", "r");
        $contents = fread($handle, filesize("log.html"));
        fclose($handle);
    }
    echo $contents; ?>
</div>
<center>
<form name=message action>
<div class=form-group>
<input name=usermsg type=text class=form-control id=usermsg placeholder="Write something !">
</div>
<input name=submitmsg type=submit id=submitmsg class="btn btn-success" value=Send>
</form>
</center>
</div>
<style type=text/css>img{max-width:100px;max-height:100px}</style>
<script type=text/javascript>var prvtime=0;$(document).ready(function(){});</script>
<script type=text/javascript>$(document).ready(function(){$("#chatbox").animate({scrollTop:$("#chatbox").get(0).scrollHeight},2000)});$(document).ready(function(){$("#exit").click(function(){var a=confirm("Exit Chatbox ???");if(a==true){window.location="/index.php"}})});$("#submitmsg").click(function(){var a=$("#usermsg").val();var b=new Date();if(Date.parse(b)-prvtime<=5*1000){alert("Bạn chat quá nhanh! Đợi "+(6-(Date.parse(b)-prvtime)/1000)+"s nữa.")}else{if(a.length<=4){alert("Quá ngắn. Độ dài phải >= 5")}else{$.post("post.php",{text:a});prvtime=Date.parse(b)}}document.getElementById("usermsg").value="";return false});function loadLog(){var a=$("#chatbox").attr("scrollHeight")-20;$.ajax({url:"log.html",cache:false,success:function(b){$("#chatbox").html(b);$("#chatbox").stop().animate({scrollTop:$("#chatbox")[0].scrollHeight})},})}setInterval("loadLog() ",1000);</script>
</body>
</html>