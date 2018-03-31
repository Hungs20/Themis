<?php
	//Tên kỳ thi
	$contestName = "Bài tập tin học"; 
	//Mô tả kỳ thi
	$description = "Chuyên Hạ Long";
	//footer
	$footer = '<i>Copyright © <a href = "http://fb.com/hungs20"><font color = "red"><b>Hungs20</b></font></a><br/>IT <font color = "blue"><b>15 - 18</b></font> Chuyên Hạ Long</i>';
	//Thư mục chưa đề (định dạng pdf, jpg hoặc zip)
	$problemsDir = "contests/problems";
	//Tên file đề tổng hợp
	$problemsFile = "Debai.rar";
	//Thư mục chứa test
	$examTestDir = "contests/test";
	//Tên file test tổng hợp
	$examTestFile = "test.rar";
	//Thư mục lưu bài làm trực tuyến của học sinh
	$uploadDir = "contests/submit/";	
	//Thư mục chứa file logs
	$logsDir = "contests/submit/Logs/";
	$logssubDir = "contests/submit/Logs/";
	$hisDir = "contests/submit/History";
	$penDir = "contests/submit/Penalty";
	//Thời gian bắt đầu kỳ thi (theo định dạng bên dưới)
	$startTime = date_create("2017-09-26 23:00:00",timezone_open("Asia/Bangkok")); //YYYY-MM-DD HH:MM:SS
	//Thời gian làm bài - (đặt 0: không giới hạn, tính theo phút)
	$duringTime = 0;
	//1: Công bố kết quả sau khi chấm, 0: không công bố.
	$publish = 1;
	// Time giới hạn submit, 0: không giới hạn, tính theo giây.
	$submitTime = 30;
	// Penalty score , 0: false, 1 : true.
	$penalty = 1; 
	// score penalty
	$score_pen = 0.1;
	// num chat
	 $file=@fopen('chatbox/log.txt', 'r');
     $numchat = fread($file,filesize('chatbox/log.txt'));
     if(!$numchat) $numchat = 0;
     if(filesize('chatbox/log.html') == 0) $numchat = 0;
     fclose($file);
     // new message
     $file=@fopen('sms/new/'.$user['username'].'.txt', 'r');
     $newmess = fread($file,filesize('sms/new/'.$user['username'].'.txt'));
     if(!$newmess) $newmess = 0;
     if(filesize('sms/new/'.$user['username'].'.txt') == 0) $newmess = 0;
     fclose($file);
?>
