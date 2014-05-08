<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


	<form id="webATM_check_form" action="https://netbank.esunbank.com.tw/webatm/payment/OrderCheckUTF8.asp" method="post">
		

		<input type="hidden" name="TransNo" value="<? echo $TransNo;?>">
		<input type="hidden" name="IcpNo" value="<? echo $IcpNo;?>">
	</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $( "#webATM_check_form" ).submit();
</script>

