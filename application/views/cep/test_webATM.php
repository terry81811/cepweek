<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?
//請代入hashkey 資料
$HASHKey="W8FGAZYNTJA7NGIZBZZJLEIFWAJUMQDT";

//請使用惟一值
$OrderNo=date("Ymdhis");

//如有使用虛擬帳號請把虛擬帳號資料代入
$VAccNo="";

//廠商編號
$IcpNo="8089002793";

//廠商接收WebATM交易訊息URL
$IcpConfirmTransURL="https://rainbowhope.tw/api/webATM_return";

//交易金額
$TransAmt=1000;

//交易識別資料
$TransIdentifyNo  = strtoupper(SHA1( $IcpNo . $VAccNo . $IcpConfirmTransURL . $OrderNo . $TransAmt . $HASHKey));
echo  $TransIdentifyNo;

?>

  <form action="https://netbank.esunbank.com.tw/webatm/payment/paymentUTF8.asp" method="POST">
    商家代號<input type="text" name="IcpNo" value="<? echo $IcpNo;?>"<br/>
    虛擬帳號<input type="text" name="VAccNo" value="<? echo $VAccNo ;?>"><br/>
    商家確認交易處理網頁<input type="text" name="IcpConfirmTransURL" value="<? echo $IcpConfirmTransURL; ?>"><br/>
    交易編號<input type="text" name="TransNo" value="<? echo $OrderNo; ?>"><br/>
    交易金額<input type="text" name="TransAmt" value="<? echo $TransAmt;?>"><br/>
    交易描述<input type="text" name="TransDesc" value="消費"><br/>
    商家名稱<input type="text" name="StoreName" value="WebATM"><br/>
    交易識別資料<input type="text" name="TransIdentifyNo" value="<? echo $TransIdentifyNo ;?>"><br/>
    附言<input type="text" name="Echo" value="WebATM"><br/>       
    <p><input type="submit" value="付款" name="B1"></p>
  </form>




