<body>
	<div class="well">
		<h1>創創後台，請勿將網址給團隊外部人士</h1>

	</div>




  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">未付款匯款訂單</h3>
	  </div>
	  	<div class="panel-body">
	  		<form action="/api/confirm_remmitance" method="post">
	    		<table class="table table-hover">
			  		<tr>
			  			<td>訂單編號</td>
			  			<td>訂單時間</td>
			  			<td>付款人</td>
			  			<td>數量</td>
			  			<td>總價</td>
			  			<td>匯款戶名</td>
			  			<td>銀行代碼</td>
			  			<td>帳號末五碼</td>
			  			<td>付款email（點我寄email）</td>
			  			<td>貨單數量（點我看貨單）</td>
			  			<td>確認繳費</td>
			  		</tr>

				<?php
					foreach ($order_not_success_array as $key => $order) {
						echo "<tr>";
						echo "<td>".$order['order_id']."</td>";
						echo "<td>".$order['order_timestamp']."</td>";
						echo "<td>".$order['order_name']."</td>";
						echo "<td>".$order['order_num']."</td>";
						echo "<td>".$order['order_cost']."</td>";
						echo "<td>".$order['order_acc_name']."</td>";
						echo "<td>".$order['order_bank_id']."</td>";
						echo "<td>".$order['order_last_id']."</td>";
						echo "<td><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
						echo "<td><a href='/delivery/".$order['order_id']."'>".$order['rec_num']."</a></td>";
						echo "<td><input type='checkbox' name='paid[]' value='".$order['order_id']."'></td>";
						echo "</tr>";
					}

				?>
			  	</table>
			  	<input class="btn btn-primary btn-lg" type="submit" value="確認繳費">
			</form>

	 	</div>
	</div>



  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">已付款匯款訂單</h3>
	  </div>
	  	<div class="panel-body">
	    		<table class="table table-hover">
			  		<tr>
			  			<td>訂單編號</td>
			  			<td>訂單時間</td>
			  			<td>付款人</td>
			  			<td>數量</td>
			  			<td>總價</td>
			  			<td>匯款戶名</td>
			  			<td>銀行代碼</td>
			  			<td>帳號末五碼</td>
			  			<td>付款email（點我寄email）</td>
			  			<td>貨單數量（點我看貨單）</td>
			  		</tr>

				<?php
					foreach ($order_success_array as $key => $order) {
						echo "<tr>";
						echo "<td>".$order['order_id']."</td>";
						echo "<td>".$order['order_timestamp']."</td>";
						echo "<td>".$order['order_name']."</td>";
						echo "<td>".$order['order_num']."</td>";
						echo "<td>".$order['order_cost']."</td>";
						echo "<td>".$order['order_acc_name']."</td>";
						echo "<td>".$order['order_bank_id']."</td>";
						echo "<td>".$order['order_last_id']."</td>";
						echo "<td><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
						echo "<td><a href='/delivery/".$order['order_id']."'>".$order['rec_num']."</a></td>";
						echo "</tr>";
					}

				?>
			  	</table>
	 	</div>
	</div>

  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">未付款webatm訂單</h3>
	  </div>
	  	<div class="panel-body">
	    		<table class="table table-hover">
			  		<tr>
			  			<td>訂單編號</td>
			  			<td>訂單時間</td>
			  			<td>付款人</td>
			  			<td>數量</td>
			  			<td>總價</td>
			  			<td>付款email</td>
			  			<td>貨單數量（點我看貨單）</td>
			  		</tr>

				<?php
					foreach ($webatm_order_not_success_array as $key => $order) {
						echo "<tr>";
						echo "<td>".$order['order_id']."</td>";
						echo "<td>".$order['order_timestamp']."</td>";
						echo "<td>".$order['order_name']."</td>";
						echo "<td>".$order['order_num']."</td>";
						echo "<td>".$order['order_cost']."</td>";
						echo "<td><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
						echo "<td><a href='/delivery/".$order['order_id']."'>".$order['rec_num']."</a></td>";
						echo "</tr>";
					}

				?>
			  	</table>
	 	</div>
	</div>

  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">已付款webatm訂單</h3>
	  </div>
	  	<div class="panel-body">
	    		<table class="table table-hover">
			  		<tr>
			  			<td>訂單編號</td>
			  			<td>訂單時間</td>
			  			<td>付款人</td>
			  			<td>數量</td>
			  			<td>總價</td>
			  			<td>付款email</td>
			  			<td>貨單數量（點我看貨單）</td>
			  		</tr>

				<?php
					foreach ($webatm_order_success_array as $key => $order) {
						echo "<tr>";
						echo "<td>".$order['order_id']."</td>";
						echo "<td>".$order['order_timestamp']."</td>";
						echo "<td>".$order['order_name']."</td>";
						echo "<td>".$order['order_num']."</td>";
						echo "<td>".$order['order_cost']."</td>";
						echo "<td><a href='/api/email/".urlencode($order['order_email'])."'>".$order['order_email']."</a></td>";
						echo "<td><a href='/delivery/".$order['order_id']."'>".$order['rec_num']."</a></td>";
						echo "</tr>";
					}

				?>
			  	</table>
	 	</div>
	</div>