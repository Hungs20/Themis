<?php
	function getFileName($s) {
		if (is_file($s.'.zip')) return($s.'.zip');
		if (is_file($s.'.pdf')) return($s.'.pdf');
		if (is_file($s.'.jpg')) return($s.'.jpg');
	}
  function getdata($str, &$who, &$problem, &$score) {
    $s = 0;
    while ($s < 100 && !ctype_alpha($str[$s]) && !ctype_digit($str[$s])) ++$s; $e = $s;
    while ($e < 100 && (ctype_alpha($str[$e]) || ctype_digit($str[$e]) || $str[$e] == ' ')) ++$e;
    $who = substr($str, $s, $e - $s); $s = $e;
    while ($s < 100 && !ctype_alpha($str[$s]) && !ctype_digit($str[$s])) ++$s; $e = $s;
    while ($e < 100 && (ctype_alpha($str[$e]) || ctype_digit($str[$e]))) ++$e;
    $problem = substr($str, $s, $e - $s); $s = $e;
    $problem = strtoupper($problem); $s = $e;
    while ($s < 100 && !ctype_digit($str[$s])) ++$s; $e = $s;
    while ($e < 100 && (ctype_digit($str[$e]) || $str[$e] == '.' || $str[$e] == ',')) ++$e;
    $score = substr($str, $s, $e - $s);
  }
  function updatectts(&$name, &$pos, &$exist){ if ($exist) return 0; $pos = $name; $exist = 1; return 1; }
  function updateprbs(&$name, &$pos, &$exist){ if ($exist) return 0; $pos = $name; $exist = 1; return 1; }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<script>
  function wload(link) {
    var l = Math.max((window.screen.width - 800)/2, 0);
    var t = Math.max((window.screen.height - 600)/2 - 50, 0);
    var myWindow = window.open(link, "Log", 'title=0, toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=1, resizable=0, copyhistory=0, width=800, height=600, top='+t+', left='+l);
  }
</script>