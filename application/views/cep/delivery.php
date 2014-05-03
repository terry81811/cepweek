<body>
	<div class="well">
		<h1>創創後台，請勿將網址給團隊外部人士</h1>

	</div>




  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">訂單編號<?php echo (98080000 + $order_id);?>貨單</h3>
	  </div>
	  	<div class="panel-body">
	  		<form id="delivery_form" action="/api/confirm_delivery" method="post">
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
					foreach ($delivery_array as $key => $order) {
						echo "<input type='hidden' name='order_id' value='".$order_id."'>";
						echo "<tr>";
						echo "<td>".$order['rec_id']."</td>";
						echo "<td>".$order['rec_pay_success']."</td>";
						echo "<td>".$order['rec_name']."</td>";
						echo "<td>".$order['rec_num']."</td>";
						echo "<td>".$order['rec_address_code']."</td>";
						echo "<td>".$order['rec_address']."</td>";
						echo "<td>".$order['rec_phone']."</td>";
						echo "<td>".$order['rec_arrive_time']."</td>";
						echo "<td>".$order['rec_on_the_way']."</td>";
						echo "<td><input type='checkbox' name='delivered[]' value='".$order['rec_id']."'></td>";
						echo "</tr>";
					}

				?>
			  	</table>
			  	<a href="#" id="delivery_btn" class="btn btn-primary btn-lg" type="submit">確認送貨</a>
			</form>

	 	</div>
	</div>



