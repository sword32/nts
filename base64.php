<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
<?
if (!empty($_POST['txtfile']))
{
	if (file_exists($_POST['txtfile']))
	{
		$txt = file_get_contents($_POST['txtfile']);
		$txt = "<?php 
		eval(base64_decode(\"".base64_encode($txt)."\"));
		?>";
		$filename = "_".$_POST['txtfile'];
		fwrite(fopen($filename,"w+"),$txt);
	}
}
?>
</div>
<form id="form1" name="form1" method="post" action="">
  <input name="txtfile" type="text" id="txtfile" size="50" maxlength="250" value="<?=$_POST['txtfile']?>" />
  &nbsp; <input type="submit" name="button" id="button" value="Submit" />
</form>
</body>
</html>
