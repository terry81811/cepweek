<body style="background-color:white;">
	<div class="well">
		<p style="text-align:right"><a href="/api/cep_logout">登出</a></p>
		<h1>創創後台，請勿將網址給團隊外部人士</h1>
		<h3>失敗訂單</h3>

	</div>






<div class="well"><h2>未付款webatm訂單 <?php echo sizeof($webatm_order_not_success_array);?> 筆</h2>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='10%'>訂單編號</td>
			  			<td width='5%'>付款人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='20%'>付款email</td>
			  			<td width='5%'>貨單數量</td>
			  			<td width='15%'>訂單時間</td>
			  			<td width='10%'>失敗原因</td>
			  		</tr>
			  	</table>

<div class="panel-group" id="accordion">
<form id="delivery_form3" action="/api/confirm_delivery" method="post">

<?php
	foreach ($webatm_order_not_success_array as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='10%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='5%'>".$order['order_name']."</td>";
				echo "<td width='5%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='20%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='5%'><a data-toggle='collapse' data-parent='#accordion' href='#collapse".$order['order_id']."'>".$order['rec_num']."</a></td>";
				echo "<td width='15%'>".$order['order_timestamp']."</td>";
				echo "<td width='10%'><a href='/api/webATM_check/".$order['order_id']."'>".$order['order_err_desc'].' | 查看'."</a></td>";

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
			  			<td>已送貨</td>
			  			<td>標註為已送貨</td>				
			  		</tr>
	    			<?php
						foreach ($order['rec'] as $key => $rec) {
							echo "<tr>";
							echo "<td>".$rec['rec_id']."</td>";
							echo "<td>".$rec['rec_pay_success']."</td>";
							echo "<td>".$rec['rec_name']."</td>";
							echo "<td>".$rec['rec_num']."</td>";
							echo "<td>".$rec['rec_address_code']."</td>";
							echo "<td>".$rec['rec_address']."</td>";
							echo "<td>".$rec['rec_phone']."</td>";
							echo "<td>".$rec['rec_arrive_time']."</td>";
							echo "<td>".$rec['rec_on_the_way']."</td>";
							echo "<td><input type='checkbox' name='delivered[]' value='".$rec['rec_id']."'></td>";
							echo "</tr>";
						}

	    			?>
			  	</table>

      </div>
    </div>
  </div>

<?php } ?>

			  	<a href="#" id="delivery_btn3" class="btn btn-primary btn-lg" type="submit" style="margin-top:20px;">確認送貨</a>
			</form>
  </div>


</div>




















<div class="well"><h2>未付款信用卡訂單 <?php echo sizeof($credit_order_not_success_array);?> 筆</h2>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='10%'>訂單編號</td>
			  			<td width='5%'>付款人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='20%'>付款email</td>
			  			<td width='5%'>貨單數量</td>
			  			<td width='15%'>訂單時間</td>
			  			<td width='10%'>失敗原因</td>
			  		</tr>
			  	</table>

<div class="panel-group" id="accordion">
<form id="delivery_form4" action="/api/confirm_delivery" method="post">

<?php
	foreach ($credit_order_not_success_array as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='10%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='5%'>".$order['order_name']."</td>";
				echo "<td width='5%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='20%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='5%'><a data-toggle='collapse' data-parent='#accordion' href='#collapse".$order['order_id']."'>".$order['rec_num']."</a></td>";
				echo "<td width='15%'>".$order['order_timestamp']."</td>";
				echo "<td width='10%'><a href='/api/credit_query/".$order['order_id']."/01'>".$order['order_err_desc']."</a></td>";
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
			  			<td>已送貨</td>
			  			<td>標註為已送貨</td>				
			  		</tr>
	    			<?php
						foreach ($order['rec'] as $key => $rec) {
							echo "<tr>";
							echo "<td>".$rec['rec_id']."</td>";
							echo "<td>".$rec['rec_pay_success']."</td>";
							echo "<td>".$rec['rec_name']."</td>";
							echo "<td>".$rec['rec_num']."</td>";
							echo "<td>".$rec['rec_address_code']."</td>";
							echo "<td>".$rec['rec_address']."</td>";
							echo "<td>".$rec['rec_phone']."</td>";
							echo "<td>".$rec['rec_arrive_time']."</td>";
							echo "<td>".$rec['rec_on_the_way']."</td>";
							echo "<td><input type='checkbox' name='delivered[]' value='".$rec['rec_id']."'></td>";
							echo "</tr>";
						}

	    			?>
			  	</table>

      </div>
    </div>
  </div>

<?php } ?>

			  	<a href="#" id="delivery_btn4" class="btn btn-primary btn-lg" type="submit" style="margin-top:20px;">確認送貨</a>
			</form>
  </div>


</div>
























