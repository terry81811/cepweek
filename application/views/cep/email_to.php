<body>
	<div class="well">
		<h1>創創後台，請勿將網址給團隊外部人士</h1>
	</div>



  	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">寄信給 <? echo $email_to ?></h3>
	  </div>
	  	<div class="panel-body">
	  		<form action="/api/send_email" method="post">
				<label>主旨</label>
				<input type="hidden" name="email_to" value="<? echo $email_to?>">
				<input type="text" name ="email_subject" class="form-control" placeholder="">
				<label>內文</label>
				<textarea name="email_msg" class="form-control" rows="3" style="height:300px;"></textarea>
				<br>
			  	<input class="btn btn-primary btn-lg" type="submit" value="確認送出">
					
			</form>

	 	</div>
	</div>