<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	

	<form action="api/order" method="post">
	收件人：<input type="text" name="rec_name[]" placeholder="王小明">
	數量：<input type="text" name="rec_num[]" placeholder="1">
	郵遞區號：<input type="text" name="rec_add_num[]" placeholder="111">
	地址：<input type="text" name="rec_address[]" placeholder="">
	收件人電話：<input type="text" name="rec_phone[]" placeholder="09xx-xxx-xxx">

<BR/>
	
	收件人：<input type="text" name="rec_name[]" placeholder="王小明">
	數量：<input type="text" name="rec_num[]" placeholder="1">
	郵遞區號：<input type="text" name="rec_add_num[]" placeholder="111">
	地址：<input type="text" name="rec_address[]" placeholder="">
	收件人電話：<input type="text" name="rec_phone[]" placeholder="09xx-xxx-xxx">

<BR/>
	
	收件人：<input type="text" name="rec_name[]" placeholder="王小明">
	數量：<input type="text" name="rec_num[]" placeholder="1">
	郵遞區號：<input type="text" name="rec_add_num[]" placeholder="111">
	地址：<input type="text" name="rec_address[]" placeholder="">
	收件人電話：<input type="text" name="rec_phone[]" placeholder="09xx-xxx-xxx">

<BR/>

<input type="radio" name="payment" value="webatm">webatm<br>
<input type="radio" name="payment" value="credit_card">credit

<BR/>

	付款人：<input type="text" name="pay_name" placeholder="王小明">
	總數量：<input type="text" name="pay_num" placeholder="should be counted by prev value">
	總金額：<input type="text" name="pay_cost" placeholder="should be counted by prev value">
	付款人信箱：<input type="text" name="pay_email" placeholder="terrytsai0811@xxxx.xxx">
	付款人電話：<input type="text" name="pay_phone" placeholder="09xx-xxx-xxx">

<BR/>

	發票抬頭：<input type="text" name="pay_title" placeholder="">
	統一編號：<input type="text" name="pay_tax_id" placeholder="">

<BR/>

<button type="submit">送出</button>

	</form>

</body>
</html>