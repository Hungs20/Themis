

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<!-- highlight code -->

<script src="../js/jquery-latest.js"></script>
<script src="../highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

<!-- bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/bootstrap-theme.css">
<script src="../js/bootstrap.js"></script>


<title>Code Library</title>
<link rel="stylesheet" href="../highlight/styles/atom-one-dark.css">
<style type="text/css">

html{overflow-y: scroll!important}

	.hide
	{
		display: none;
	}

	.h-scroll {
    height: 80vh;
    position: fixed;
    overflow-y: auto;
    margin-top: 60px;
	}
	.code{
		position: sticky;
		margin-top: 60px;
		overflow: auto;
		/*height: 80vh;*/
		float: right;
		/*margin-right: 50px;*/
	}
	.navbar-header{
		color: red;
		font-size: 20px;
		text-align: center;
		z-index:999;
	}
	#code,#name{
		overflow: auto;
		font-size: 15px;
	}

html{overflow-y: scroll!important}
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
#body{padding-top:15px;padding-bottom:15px;background:transparent url('../images/bg.png') scroll top left repeat;}
@media (min-width: 992px) {#body{margin-bottom:40px}}





</style>




<script>
function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
}
function view(name){
	$(function(){
		$.get('../wiki/code/' + name, function(data) {
		$('#code').text(data);
		$('#name').text(name);
		$('#source').removeClass('hide');
		$(document).ready(function() {
		  $('#code').each(function(i, block) {
		  	  hljs.highlightBlock(block);
		  	  });
		  });
		});
	});
}
</script>
</head>

<body>


<div id="container">
<nav class = "navbar navbar-default navbar-fixed-top"><div class="container">
<div class="navbar-header">
<button type="button" class="noPusher navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
Code Library
</div></div></nav>

<div id="body" class="maintxt container">
<div class = "row">
<div class="col-md-4 col-lg-3" id = "myNavbar"><div class="panel panel-primary"><div class="list-group">
	<?php
		$dir = "code";
		$file = scandir($dir);

		for($i = 2; $i < sizeof($file); $i++) {
			echo '<a href = "#hungs20" class="list-group-item" onclick="view(';
			echo "'". $file[$i] ."')";
			echo '">' . $file[$i] . '</a>';
		}
	?>
	
	</div></div>
</div>

<div class = "col-md-8 col-lg-9" id="hungs20" name="hungs20">
		<div id = "source" class="hide"><div class="panel panel-primary"><div class="list-group">
				<pre><center><span id="name" class="label label-info"></span></center>
				<code><div id = "code"></div></code>	
				</pre>
			</div>
		</div>
	</div></div>

</div>
</div>
</body>
</html>
</html>

