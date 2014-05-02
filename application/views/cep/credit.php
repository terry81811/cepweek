
<?php

$str = '8089002793&&EC000001&98080001&1&/api/credit&W8FGAZYNTJA7NGIZBZZJLEIFWAJUMQDT';
$M = md5($str);
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>信用卡付款測試頁</title>
</head>
<body>

	<form action="https://acqtest.esunbank.com.tw/acq_online/online/sale42.htm" method="post">
		


		<input type="hidden" name="MID" value="8089002793">
		<input type="hidden" name="CID" value="">
		<input type="hidden" name="TID" value="EC000001">
		<input type="hidden" name="ONO" value="98080001">
		<input type="hidden" name="TA" value="1">
		<input type="hidden" name="U" value="/api/credit">
		<input type="hidden" name="M" value="<? echo $M;?>">

		<input type="submit" value="送出">
	</form>

</body>
</html>