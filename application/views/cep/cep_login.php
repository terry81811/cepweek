<body>
	<div class="well">
		<h1>創創後台，請勿將網址給團隊外部人士</h1>
	</div>



  	<div class="panel panel-default" style="width:300px; margin-left:auto; margin-right:auto;">
	  <div class="panel-heading">
	    <h3 class="panel-title">請輸入帳號密碼登入創創後台</h3>
	  </div>
	  	<div class="panel-body">
	  		<form action="/api/cep_login" method="post">
				<label>帳號</label>
				<input type="text" name ="id" class="form-control" placeholder="">
				<label>密碼</label>
				<input type="password" name ="pw" class="form-control" placeholder="">
				<br>
			  	<input class="btn btn-primary btn-lg" type="submit" value="確認送出">
					
			</form>

	 	</div>
	</div>