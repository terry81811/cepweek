<body>
	<div class="well">
		<p style="text-align:right"><a href="/db_cep">後台首頁</a>｜<a href="/db_cep_ship">依出貨與否分類</a>｜<a href="/db_cep_waiting">尚未匯款訂單</a>｜<a href="/db_cep_fail">錯誤訂單</a>｜<a href="/api/cep_logout">登出</a></p>
		<h1>創創後台，請勿將網址給團隊外部人士</h1>
	</div>



  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h2 class="panel-title">增加第<?php echo $order['order_id'].'筆訂單的註解';?></h2>
	  </div>
	  	<div class="panel-body">
	  		<form action="/api/note_edit/<?php echo $order['order_id']?>" method="post">
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
			  			<td>註解</td>
			  		</tr>

				<?php

						echo "<input type='hidden' name='paid[]' value='".$order['order_id']."'>";
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
						echo "<td>".$order['order_note']."</td>";
						echo "</tr>";

				?>
			  	</table>
				<label>註解</label>
				<div class="form-group">
					<input type="text" name ="order_note" class="form-control" placeholder="請勿超過十個字">
				</div>
			  	<input class="btn btn-primary" type="submit" value="確認更改">
			</form>

	 	</div>
	</div>