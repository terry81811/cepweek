<body style="background-color:white;">
	<div class="well">
		<p style="text-align:right"><a href="/db_cep">後台首頁</a>｜<a href="/db_cep_ship">依出貨與否分類</a>｜<a href="/db_cep_fail">錯誤訂單</a>｜<a href="/api/cep_logout">登出</a></p>
		<h1>創創後台，請勿將網址給團隊外部人士</h1>

	</div>




<div class="well"><h2>未付款匯款訂單 <?php echo sizeof($order_not_success_array);?> 筆</h2>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='10%'>訂單編號</td>
			  			<td width='8%'>付款人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='5%'>匯款戶名</td>
			  			<td width='5%'>銀行代碼</td>
			  			<td width='5%'>帳號末五碼</td>
			  			<td width='20%'>付款email（點我寄email）</td>
			  			<td width='5%'>貨單數量</td>
			  			<td width='5%'>確認繳費</td>
			  			<td width='15%'>訂單時間</td>
			  			<td width='15%'>註解</td>
			  		</tr>
			  	</table>


<div class="panel-group" id="accordion">
<form action="/api/confirm_remmitance" method="post">
<?php
	foreach ($order_not_success_array as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='10%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='8%'>".$order['order_name']."</td>";
				echo "<td width='5%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='5%'>".$order['order_acc_name']."</td>";
				echo "<td width='5%'>".$order['order_bank_id']."</td>";
				echo "<td width='5%'>".$order['order_last_id']."</td>";
				echo "<td width='20%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='5%'><a style='display:block;width:100%;' data-toggle='collapse' data-parent='#accordion' href='#collapse".$order['order_id']."'>".$order['rec_num']."</a></td>";
				echo "<td width='5%'><input type='checkbox' name='paid[]' value='".$order['order_id']."'></td>";
				echo "<td width='15%'>".$order['order_timestamp']."</td>";
				echo "<td width='15%'>".$order['order_note']."<a href='#'> +</a></td>";
?>
	  		</tr>
	  	</table>
    </div>

    <div id="<?php echo "collapse".$order['order_id'] ; ?>" class="panel-collapse collapse">
      <div class="panel-body">

	    		<table class="table table-hover">
			  		<tr>
			  			<td>貨單編號</td>
			  			<td>繳費與否</td>
			  			<td>收貨人</td>
			  			<td>數量</td>
			  			<td>郵遞區號</td>
			  			<td>地址</td>
			  			<td>收貨人電話</td>
			  			<td>指定收貨時間</td>
			  		</tr>
	    			<?php
						foreach ($order['rec'] as $key => $rec) {
							echo "<tr>";
							echo "<td width='5%'>".$rec['rec_id']."</td>";
							echo "<td width='5%'>".$rec['rec_pay_success']."</td>";
							echo "<td width='5%'>".$rec['rec_name']."</td>";
							echo "<td width='5%'>".$rec['rec_num']."</td>";
							echo "<td width='5%'>".$rec['rec_address_code']."</td>";
							echo "<td width='25%'>".$rec['rec_address']."</td>";
							echo "<td width='10%'>".$rec['rec_phone']."</td>";
							echo "<td width='10%'>".$rec['rec_arrive_time']."</td>";
							echo "</tr>";
						}

	    			?>
			  	</table>

      </div>
    </div>
  </div>

<?php } ?>

			  	<input class="btn btn-primary btn-lg" type="submit" value="確認更改" style="margin-top:20px;">
			</form>
  </div>

</div>

























