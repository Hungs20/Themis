<?php
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    function create_bbcode($text) {
 
//BBcode
$find = array(
 
'~\[b\](.*?)\[/b\]~s',
 
'~\[i\](.*?)\[/i\]~s',
 
'~\[u\](.*?)\[/u\]~s',
 
'~\[quote\](.*?)\[/quote\]~s',
 
'~\[size=(.*?)\](.*?)\[/size\]~s',
 
'~\[color=(.*?)\](.*?)\[/color\]~s',
 
'~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
 
'~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'
 
);
 
// HTML tags thay thế BBcode
 
$replace = array(
 
'<b>$1</b>',
 
'<i>$1</i>',
 
'<span style="text-decoration:underline;">$1</span>',
 
'<pre>$1</'.'pre>',
 
'<span style="font-size:$1px;">$2</span>',
 
'<span style="color:$1;">$2</span>',
 
'<a href="$1">$1</a>',
 
'<img src="$1" alt=""/>'
 
);
 
// Thay thế
 
return preg_replace($find,$replace,$text);
 
}
    if(isset($_SESSION['tname'])){
        $file=@fopen('log.txt', 'r');
        $num = fread($file,filesize('log.txt'));
        if(!$num) $num = 0;
        if(filesize('log.html') == 0) $num = 0;
        
        $text = $_POST['text'];
        $text = stripslashes(htmlspecialchars($text));
        $text = create_bbcode($text);
        if($text == '/clear')
        {
            $filechat = 'log.html';
            if (file_exists($filechat)) {
                if(unlink($filechat)) {
                    $text = "Đã xóa chatbox.";
                    $num = 0;
                }
             }
        }
        if($text == '/help')
        {
            $text = '/help<br/>[img]Link img[/img]<br/><b>[b]Chữ đậm[/b]</b><br/><i>[i]Chữ nghiêng[/i]</i><br/><u>[u]Gạch chân[/u]</u><br/><pre>[quote]Khung[/quote]</pre><br/><span style="font-size:20px;">[size=20]Font size[/size]</span><br/><span style="color:red;">[color=red]Chữ màu[/color]</span><br/>[url]<a href = "http://google.com.vn">http://google.com.vn</a>[/url]';
        }
        $num++;
        $file=@fopen('log.txt', 'w');
        fwrite($file,$num);
        $fp = fopen("log.html", 'a');
        fwrite($fp, '<div class="msgln" style="word-wrap: break-word" id="chat'.date("U").'"><font color = "red"><b> '.$_SESSION["tuser"].' </b></font>: '.$text.'<hr></div>');
        fwrite($new, $_SESSION["tuser"].' : '.$text);
        fclose($new);
        fclose($fp);
    }
    ?>