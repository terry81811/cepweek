<body style="background-color:white;">
	<div class="well">
		<p style="text-align:right"><a href="/db_cep_ship">依出貨與否分類</a>｜<a href="/db_cep_waiting">尚未匯款訂單</a>｜<a href="/db_cep_fail">錯誤訂單</a>｜<a href="/api/cep_logout">登出</a></p>
		<h1>創創後台，請勿將網址給團隊外部人士</h1>

	</div>



	<div class="well">

	<h2>線上蛋糕總數（已付款）：<?php echo $total_num;?>個 / 4000</h2>
	<h3>線上目前收入：<?php echo $total_income;?>元 / 1,000,000元</h3>
	<h3>線上收入（不含信用卡）：<?php echo $total_income_no_credit;?>元</h3>

	    <table class="table table-condensed" style="margin-bottom:0px;">
		<tr>
			<td>線上總訂單數</td>
			<td>自行匯款訂單數</td>
			<td>虛擬帳號訂單數</td>
			<td>webatm訂單數</td>
			<td>信用卡訂單數</td>
		</tr>
		<tr>
			<td><?php echo $total_order;?></td>
			<td><?php echo sizeof($order_success_array) + sizeof($order_not_success_array)?></td>
			<td><?php echo sizeof($virtual_order_success_array) + sizeof($virtual_order_not_success_array)?></td>
			<td><?php echo sizeof($webatm_order_success_array) + sizeof($webatm_order_not_success_array)?></td>
			<td><?php echo sizeof($credit_order_success_array) + sizeof($credit_order_not_success_array)?></td>
		</tr>
		<tr>
			<td>線上已繳費訂單數</td>
			<td>已匯款訂單數</td>
			<td>虛擬帳號已繳費訂單數</td>
			<td>webatm已繳費訂單數</td>
			<td>信用卡已繳費訂單數</td>
		</tr>

		<tr>
			<td><?php echo $total_success;?></td>
			<td><?php echo sizeof($order_success_array)?></td>
			<td><?php echo sizeof($virtual_order_success_array)?></td>
			<td><?php echo sizeof($webatm_order_success_array)?></td>
			<td><?php echo sizeof($credit_order_success_array)?></td>
		</tr>

		</table>


	</div>




<div class="well">
	<a class="btn btn-primary" data-toggle='collapse' data-parent='#accordion' href='.collapse-open'>展開/收合貨單</a>

	<h2>已付款匯款訂單 <?php echo sizeof($order_success_array);?> 筆</h2>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='8%'>訂單編號</td>
			  			<td width='6%'>付款人</td>
			  			<td width='3%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='6%'>匯款戶名</td>
			  			<td width='5%'>銀行代碼</td>
			  			<td width='5%'>帳號末五碼</td>
			  			<td width='18%'>付款email（點我寄email）</td>
			  			<td width='5%'>貨單數量</td>
			  			<td width='12%'>訂單時間</td>
			  			<td width='12%'>註解</td>
			  		</tr>
			  	</table>



<div class="panel-group" id="accordion">
<form id="delivery_form2" action="/api/confirm_delivery" method="post">

<?php
	foreach ($order_success_array as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='8%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='6%'>".$order['order_name']."</td>";
				echo "<td width='3%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='6%'>".$order['order_acc_name']."</td>";
				echo "<td width='5%'>".$order['order_bank_id']."</td>";
				echo "<td width='5%'>".$order['order_last_id']."</td>";
				echo "<td width='18%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='5%'><a data-toggle='collapse' data-parent='#accordion' href='#collapse".$order['order_id']."'>".$order['rec_num']."</a></td>";
				echo "<td width='12%'>".$order['order_timestamp']."</td>";
				echo "<td width='12%'><a href='/db_cep_edit/".$order['order_id']."'>".$order['order_note']." +</a></td>";
?>
	  		</tr>
	  	</table>
    </div>

    <div id="<?php echo "collapse".$order['order_id'] ; ?>" class="panel-collapse collapse collapse-open">
      <div class="panel-body">

	    		<table class="table table-hover">
			  		<tr>
			  			<td width='5%'>貨單編號</td>
			  			<td width='5%'>繳費與否</td>
			  			<td width='5%'>收貨人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>郵遞區號</td>
			  			<td width='25%'>地址</td>
			  			<td width='8%'>收貨人電話</td>
			  			<td width='8%'>指定收貨時間</td>
			  			<td width='5%'>已送貨</td>
			  			<td width='8%'>標註為已送貨</td>				
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
							echo "<td width='8%'>".$rec['rec_phone']."</td>";
							echo "<td width='8%'>".$rec['rec_arrive_time']."</td>";
							echo "<td width='5%'>".$rec['rec_on_the_way']."</td>";
							echo "<td width='8%'><input type='checkbox' name='delivered[]' value='".$rec['rec_id']."'></td>";
							echo "</tr>";
						}

	    			?>
			  	</table>

      </div>
    </div>
  </div>

<?php } ?>

			  	<a href="#" id="delivery_btn2" class="btn btn-primary btn-lg" type="submit" style="margin-top:20px;">確認送貨</a>
			</form>

  </div>
</div>





















<div class="well">

	<h2>已付款虛擬帳號訂單 <?php echo sizeof($virtual_order_success_array);?> 筆</h2>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='8%'>訂單編號</td>
			  			<td width='6%'>付款人</td>
			  			<td width='3%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='8%'>匯款虛擬帳號</td>
			  			<td width='18%'>付款email（點我寄email）</td>
			  			<td width='5%'>貨單數量</td>
			  			<td width='12%'>訂單時間</td>
			  			<td width='12%'>註解</td>
			  		</tr>
			  	</table>



<div class="panel-group" id="accordion">
<form id="delivery_form2" action="/api/confirm_delivery" method="post">

<?php
	foreach ($virtual_order_success_array as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='8%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='6%'>".$order['order_name']."</td>";
				echo "<td width='3%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='8%'>".$order['order_acc_name']."</td>";
				echo "<td width='18%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='5%'><a data-toggle='collapse' data-parent='#accordion' href='#collapse".$order['order_id']."'>".$order['rec_num']."</a></td>";
				echo "<td width='12%'>".$order['order_timestamp']."</td>";
				echo "<td width='12%'><a href='/db_cep_edit/".$order['order_id']."'>".$order['order_note']." +</a></td>";
?>
	  		</tr>
	  	</table>
    </div>

    <div id="<?php echo "collapse".$order['order_id'] ; ?>" class="panel-collapse collapse collapse-open">
      <div class="panel-body">

	    		<table class="table table-hover">
			  		<tr>
			  			<td width='5%'>貨單編號</td>
			  			<td width='5%'>繳費與否</td>
			  			<td width='5%'>收貨人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>郵遞區號</td>
			  			<td width='25%'>地址</td>
			  			<td width='8%'>收貨人電話</td>
			  			<td width='8%'>指定收貨時間</td>
			  			<td width='5%'>已送貨</td>
			  			<td width='8%'>標註為已送貨</td>				
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
							echo "<td width='8%'>".$rec['rec_phone']."</td>";
							echo "<td width='8%'>".$rec['rec_arrive_time']."</td>";
							echo "<td width='5%'>".$rec['rec_on_the_way']."</td>";
							echo "<td width='8%'><input type='checkbox' name='delivered[]' value='".$rec['rec_id']."'></td>";
							echo "</tr>";
						}

	    			?>
			  	</table>

      </div>
    </div>
  </div>

<?php } ?>

			  	<a href="#" id="delivery_btn2" class="btn btn-primary btn-lg" type="submit" style="margin-top:20px;">確認送貨</a>
			</form>

  </div>
</div>


















<div class="well"><h2>已付款webatm訂單 <?php echo sizeof($webatm_order_success_array);?> 筆</h2>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='8%'>訂單編號</td>
			  			<td width='6%'>付款人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='18%'>付款email</td>
			  			<td width='5%'>貨單數量</td>
			  			<td width='12%'>訂單時間</td>
			  			<td width='12%'>註解</td>
			  		</tr>
			  	</table>

<div class="panel-group" id="accordion">
<form id="delivery_form3" action="/api/confirm_delivery" method="post">

<?php
	foreach ($webatm_order_success_array as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='8%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='6%'>".$order['order_name']."</td>";
				echo "<td width='5%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='18%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='5%'><a data-toggle='collapse' data-parent='#accordion' href='#collapse".$order['order_id']."'>".$order['rec_num']."</a></td>";
				echo "<td width='12%'>".$order['order_timestamp']."</td>";
				echo "<td width='12%'><a href='/db_cep_edit/".$order['order_id']."'>".$order['order_note']." +</a></td>";
?>
	  		</tr>
	  	</table>
    </div>

    <div id="<?php echo "collapse".$order['order_id'] ; ?>" class="panel-collapse collapse collapse-open">
      <div class="panel-body">

	    		<table class="table table-hover">
			  		<tr>
			  			<td width='5%'>貨單編號</td>
			  			<td width='5%'>繳費與否</td>
			  			<td width='5%'>收貨人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>郵遞區號</td>
			  			<td width='25%'>地址</td>
			  			<td width='8%'>收貨人電話</td>
			  			<td width='8%'>指定收貨時間</td>
			  			<td width='5%'>已送貨</td>
			  			<td width='8%'>標註為已送貨</td>		
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
							echo "<td width='8%'>".$rec['rec_phone']."</td>";
							echo "<td width='8%'>".$rec['rec_arrive_time']."</td>";
							echo "<td width='5%'>".$rec['rec_on_the_way']."</td>";
							echo "<td width='8%'><input type='checkbox' name='delivered[]' value='".$rec['rec_id']."'></td>";
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




















<div class="well"><h2>已付款信用卡訂單 <?php echo sizeof($credit_order_success_array);?> 筆</h2>
	    		<table class="table table-condensed" style="margin-bottom:0px;">
			  		<tr>
			  			<td width='8%'>訂單編號</td>
			  			<td width='6%'>付款人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>總價</td>
			  			<td width='18%'>付款email</td>
			  			<td width='5%'>貨單數量</td>
			  			<td width='12%'>訂單時間</td>
			  			<td width='12%'>註解</td>
			  		</tr>
			  	</table>

<div class="panel-group" id="accordion">
<form id="delivery_form4" action="/api/confirm_delivery" method="post">

<?php
	foreach ($credit_order_success_array as $key => $order) {
?>
  <div class="panel panel-default" style="margin-bottom:-6px;">
    <div class="panel-heading" style="padding:0px 15px;">
	    <table class="table table-condensed" style="margin-bottom:0px; width='100%'">
			<tr>
<?php
				echo "<td width='8%'>訂單編號：".$order['order_id']."</td>";
				echo "<td width='6%'>".$order['order_name']."</td>";
				echo "<td width='5%'>".$order['order_num']."</td>";
				echo "<td width='5%'>".$order['order_cost']."</td>";
				echo "<td width='18%'><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
				echo "<td width='5%'><a data-toggle='collapse' data-parent='#accordion' href='#collapse".$order['order_id']."'>".$order['rec_num']."</a></td>";
				echo "<td width='12%'>".$order['order_timestamp']."</td>";
				echo "<td width='12%'><a href='/db_cep_edit/".$order['order_id']."'>".$order['order_note']." +</a></td>";
?>
	  		</tr>
	  	</table>
    </div>

    <div id="<?php echo "collapse".$order['order_id'] ; ?>" class="panel-collapse collapse collapse-open">
      <div class="panel-body">

	    		<table class="table table-hover">
			  		<tr>
			  			<td width='5%'>貨單編號</td>
			  			<td width='5%'>繳費與否</td>
			  			<td width='5%'>收貨人</td>
			  			<td width='5%'>數量</td>
			  			<td width='5%'>郵遞區號</td>
			  			<td width='25%'>地址</td>
			  			<td width='8%'>收貨人電話</td>
			  			<td width='8%'>指定收貨時間</td>
			  			<td width='5%'>已送貨</td>
			  			<td width='8%'>標註為已送貨</td>		
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
							echo "<td width='8%'>".$rec['rec_phone']."</td>";
							echo "<td width='8%'>".$rec['rec_arrive_time']."</td>";
							echo "<td width='5%'>".$rec['rec_on_the_way']."</td>";
							echo "<td width='8%'><input type='checkbox' name='delivered[]' value='".$rec['rec_id']."'></td>";
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
























