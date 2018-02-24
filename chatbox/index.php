<?php
    include("../init.php");
    include("../config.php");
    include("../functions.php");

?>
    

    <doctype html>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <head>
    <title>Chatbox</title>

    <!-- loading -->

    <script src="../js/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/pace.min.js"></script>
    <link rel="stylesheet" href="/css/pace-theme-minimal.css">
    <!--end load-->
    <link type="text/css" rel="stylesheet" href="style.css" />
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/jumbotron.css" rel="stylesheet">

    </head>

    <div id="wrapper">
        <div id="menu">
            <p class="welcome">Welcome, <b><?php echo $_SESSION['tname']; ?></b></p>
            <p class="logout"><a id="exit" href="#"><span class = "glyphicon glyphicon-off glyphicon glyphicon-off-animate"></span> </a></p>
            <div style="clear:both"></div>
        </div>    
        <div id="chatbox" style="overflow: auto;">

        <?php 
    if(file_exists("log.html") && filesize("log.html") > 0){
        $handle = fopen("log.html", "r");
        $contents = fread($handle, filesize("log.html"));
        fclose($handle);
    }
    echo $contents; ?>
        
    </div>




    <center>
  <form name="message" action="">
    <div class="form-group">
      <input name = "usermsg" type="text" class="form-control" id="usermsg" placeholder="Write something !">
    </div>
   
    <input name="submitmsg" type="submit" id="submitmsg" class="btn btn-success" value="Send">
  </form>
  </center>

    </div>
    <script type="text/javascript" src="jquery.min.js"></script>
    <style type="text/css">img{
    max-width: 100px;
    max-height:100px;}</style>
    <script type="text/javascript">
    // jQuery Document
    var prvtime = 0;
    $(document).ready(function(){
    });
    </script>
    <script type="text/javascript">
    // jQuery Document
    $(document).ready(function(){
  $('#chatbox').animate({
  scrollTop: $('#chatbox').get(0).scrollHeight}, 2000);
});

    $(document).ready(function(){
        //If user wants to end session
        $("#exit").click(function(){
            var exit = confirm("Exit Chatbox ???");
            if(exit==true){window.location = '/index.php';}      
        });
    });
    $("#submitmsg").click(function(){   
            var clientmsg = $("#usermsg").val();
            var dt = new Date();
            if(Date.parse(dt) - prvtime <= 5 * 1000) alert('Bạn chat quá nhanh! Đợi ' + (6 - (Date.parse(dt) - prvtime)/1000) + 's nữa.');
            else if(clientmsg.length <= 4) alert('Quá ngắn. Độ dài phải >= 5');
            else {
                $.post("post.php", {text: clientmsg});    
                prvtime = Date.parse(dt);
                }          
            $("#usermsg").attr("value", "");
            return false;
        });

       	function loadLog(){
            var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
            $.ajax({
                url: "log.html",
                cache: false,
                success: function(html){        
                    $("#chatbox").html(html); //Insert chat log into the #chatbox div   

                    //Auto-scroll           
                    var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                    if(newscrollHeight > oldscrollHeight){
                        $("#chatbox").animate({ scrollTop: newscrollHeight }, "normal"); //Autoscroll to bottom of div
                    }               
                },
            });
        }
    setInterval("loadLog() ",1000); </script>
