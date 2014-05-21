<body style="background-color:white;">
	<div class="well">
		<p style="text-align:right"><a href="/db_cep">後台首頁</a>｜<a href="/db_cep_ship">依出貨與否分類</a>｜<a href="/db_cep_fail">錯誤訂單</a>｜<a href="/api/cep_logout">登出</a></p>
		<h1>創創後台，請勿將網址給團隊外部人士</h1>

	</div>




<div class="well"><h2>已付款未出貨訂單 <?php echo sizeof($not_shipped);?> 筆</h2>
	<h3>已付款未出貨蛋糕 <?php echo $not_shipped_count;?> 個</h3>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='10%'>訂單編號</td>
			  			<td width='10%'>付款人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='10%'>付款方式</td>
			  			<td width='25%'>付款email</td>
			  			<td width='5%'>確認送貨</td>
			  			<td width='15%'>訂單時間</td>
			  			<td width='12%'>註解</td>
			  		</tr>
			  	</table>


<div class="panel-group" id="accordion">
<form action="/api/confirm_ship" method="post">
<?php
	foreach ($not_shipped as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='10%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='10%'>".$order['order_name']."</td>";
				echo "<td width='5%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='10%'>".$order['order_type']."</td>";
				echo "<td width='25%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='5%'><input type='checkbox' name='ship[]' value='".$order['order_id']."'></td>";
				echo "<td width='15%'>".$order['order_timestamp']."</td>";
				echo "<td width='12%'><a href='/db_cep_edit/".$order['order_id']."'>".$order['order_note']." +</a></td>";
?>
	  		</tr>
	  	</table>
    </div>

  </div>

<?php } ?>

			  	<input class="btn btn-primary btn-lg" type="submit" value="確認更改" style="margin-top:20px;">
			</form>
  </div>

</div>









<div class="well"><h2>已付款已出貨訂單 <?php echo sizeof($shipped);?> 筆</h2>
	<h3>已付款已出貨蛋糕 <?php echo $shipped_count;?> 個</h3>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='10%'>訂單編號</td>
			  			<td width='10%'>付款人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='10%'>付款方式</td>
			  			<td width='25%'>付款email</td>
			  			<td width='15%'>訂單時間</td>
			  			<td width='12%'>註解</td>
			  		</tr>
			  	</table>


<div class="panel-group" id="accordion">
<?php
	foreach ($shipped as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='10%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='10%'>".$order['order_name']."</td>";
				echo "<td width='5%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='10%'>".$order['order_type']."</td>";
				echo "<td width='25%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='15%'>".$order['order_timestamp']."</td>";
				echo "<td width='12%'><a href='/db_cep_edit/".$order['order_id']."'>".$order['order_note']." +</a></td>";
?>
	  		</tr>
	  	</table>
    </div>

  </div>

<?php } ?>

  </div>

</div>


















