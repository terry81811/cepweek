<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <form id ="webatm_form" action="https://netbank.esunbank.com.tw/webatm/payment/paymentUTF8.asp" method="POST">
    <input type="hidden" name="IcpNo" value="<? echo $IcpNo;?>"<br/>
    <input type="hidden" name="VAccNo" value="<? echo $VAccNo ;?>"><br/>
    <input type="hidden" name="IcpConfirmTransURL" value="<? echo $IcpConfirmTransURL; ?>"><br/>
    <input type="hidden" name="TransNo" value="<? echo $OrderNo; ?>"><br/>
    <input type="hidden" name="TransAmt" value="<? echo $TransAmt;?>"><br/>
    <input type="hidden" name="TransDesc" value="消費"><br/>
    <input type="hidden" name="StoreName" value="哈凱部落-彩虹故鄉的願望"><br/>
    <input type="hidden" name="TransIdentifyNo" value="<? echo $TransIdentifyNo ;?>"><br/>
    <input type="hidden" name="Echo" value="WebATM"><br/>       
  </form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $( "#webatm_form" ).submit();
</script>