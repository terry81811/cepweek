    <body>
        <div id="loading"></div>
        <div class="call-to-action visible-md visible-lg" role="button">
            <a href="<?php echo base_url(); ?>order"></a>
        </div>
        <div class="facebook"><a href="https://www.facebook.com/253825544806259"></a></div>
        <div class="contact-us"><a href="mailto:rainbowhope.service@gmail.com" target="_top"></a></div>
        <div class="container">
            <div class="main-container">
                <header class="header">
                    <a href="<?php echo base_url(); ?>" class="logo img-responsive">
                        <img src="<?php echo base_url(); ?>/assets/img/logo.png" class="img-responsive">
                    </a>
                </header>
                <nav class="main-nav hidden-xs">
                    <ul class="nav nav-pills nav-justified">
                        <li class="story"><a href="<?php echo base_url(); ?>story">我們的故事</a></li>
                        <li class="product"><a href="<?php echo base_url(); ?>product">產品介紹</a></li>
                        <li class="progresss"><a href="<?php echo base_url(); ?>progress">募款進度</a></li>
                        <li class="photos"><a href="<?php echo base_url(); ?>photos">彩虹相簿</a></li>
                    </ul>
                </nav>
                <nav class="navbar navbar-default visible-xs" role="navigation">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="<?php echo base_url(); ?>">彩虹故鄉的願望</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>story">我們的故事 | Story</a></li>
                        <li><a href="<?php echo base_url(); ?>product">產品介紹 | Product</a></li>
                        <li><a href="<?php echo base_url(); ?>progress">募款進度 | Progress</a></li>
                        <li><a href="<?php echo base_url(); ?>photos">彩虹相簿 | Photos</a></li>
                        <li><a href="<?php echo base_url(); ?>order">立即訂購 | Order</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>
                <div class="order-success-frame">
                    <h2>訂購完成！</h2>
                    <p>
                    您已經訂購<span class="virtual-account-focus"> <?php echo $TransAmt; ?> </span>個蛋糕<br>
                    銀行代號：<span class="virtual-account">808</span><br>
                    您的匯款虛擬帳號為 <span class="virtual-account"><?php echo $Virtual_account; ?></span><br>
                    提醒您，請於<span class="virtual-account-focus"> <?php echo $date_before_pay; ?></span> 匯款，以利蛋糕製作<br>若超過時間匯款，蛋糕將於下週的相同指定時間出貨<br>
                    我們已經將相關資訊寄到 <span class="success-email"><?php echo $email_to; ?></span><br>
                    若有任何問題，請<a href="mailto:rainbowhope.service@gmail.com" target="_top">來信</a>我們聯絡</p>
                </div>
            </div>
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>主辦：<a class="cep" href="http://www.cep.ntu.edu.tw/" target="_blank"><img src="<?php echo base_url(); ?>/assets/img/Footer_cep.png"></a></h3>

                        </div>
                        <div class="col-md-6">
                            <h3>協辦：
                                <a class="poozan" href="http://www.you-care.org.tw/" target="_blank"><img src="<?php echo base_url(); ?>/assets/img/poozan.png" alt="普仁青年基金會"></a>
                                <img class="x" src="<?php echo base_url(); ?>/assets/img/x.png" >
                                <a class="esunbank" href="https://www.esunbank.com.tw/" target="_blank"><img src="<?php echo base_url(); ?>/assets/img/Footer_bank.png" alt="玉山銀行"></a>
                                <img class="x" src="<?php echo base_url(); ?>/assets/img/x.png" >
                                <a class="t-cat" href="http://www.t-cat.com.tw/" target="_blank"><img src="<?php echo base_url(); ?>/assets/img/Footer_cat.png" alt="黑貓宅急便"></a>
                            </h3>
                        </div>
                        <div class="col-md-3">
                            <h3>贊助：
                                <a class="aws" href="http://aws.amazon.com/" target="_blank"><img src="<?php echo base_url(); ?>/assets/img/Footer_aws.png" alt="Amazon Web Services"></a>
                            </h3>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        
