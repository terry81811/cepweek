    <body>
        <div id="loading"></div>
        <div class="call-to-action hidden-xs" role="button">
            <a href="<?php echo base_url(); ?>order"></a>
        </div>
        <div class="facebook"><a href="https://www.facebook.com/253825544806259"></a></div>
        <div class="contact-us"><a href="mailto:rainbowhope.service@gmail.com" target="_top"></a></div>
        <div class="order"><a href="<?php echo base_url(); ?>order"></a></div>
        <!-- modal -->

        <!-- end of modal -->
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
                <div class="banner hidden-xs">
                    <!-- 滑動banner -->
                    <div id="carousel-index" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-index" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-index" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo base_url(); ?>/assets/img/Home_banner.png" class="img-responsive">
                            <div class="carousel-caption">
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url(); ?>/assets/img/banner-10.jpg" class="img-responsive">
                            <div class="carousel-caption">
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-index" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-index" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                    </div>
                </div>
                <div class="banner visible-xs">
                    <img src="<?php echo base_url(); ?>/assets/img/Home_banner_phone.png" class="img-responsive">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="video">
                            <a class="youtube" href="http://www.youtube.com/embed/1OhgtYRFc9Y?rel=0&amp;wmode=transparent" role="button">
                                <img src="<?php echo base_url(); ?>assets/img/Home_video.png" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="index-intro">
                            <div class="intro-text">
                                <p>老師傅親手烘焙的限量蛋糕，</p>
                                <p>散發來自南投山裡的清甜果香，</p>
                                <p>綿密細緻如同春陽的呢喃。</p>
                            </div>
                            <div class="intro-text-highlight">
                                <p>這是一個台大創意創業學程學生與企業合作的募款計畫，</p>
                                <p>我們不只募款，也誠心與您分享南投在地最美味的糕點。</p>
                                <p>所得扣除成本後將全數捐出，</p>
                                <p>幫助流離失所11年的哈凱部落重建家園。</p><br>
                                <p>我們相信這份憨厚的人情，只在台灣看的見！</p>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/img/Home_text_background.png" class="img-responsive hidden-xs">
                            <img src="<?php echo base_url(); ?>assets/img/sun.png" class="sun">
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>主辦：<a class="cep" href="http://www.cep.ntu.edu.tw/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/Footer_cep.png"></a></h3>

                        </div>
                        <div class="col-md-6">
                            <h3>協辦：
                                <a class="poozan" href="http://www.you-care.org.tw/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/poozan.png" alt="普仁青年基金會"></a>
                                <img class="x" src="<?php echo base_url(); ?>/assets/img/x.png" >
                                <a class="esunbank" href="https://www.esunbank.com.tw/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/Footer_bank.png" alt="玉山銀行"></a>
                                <img class="x" src="<?php echo base_url(); ?>/assets/img/x.png" >
                                <a class="t-cat" href="http://www.t-cat.com.tw/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/Footer_cat.png" alt="黑貓宅急便"></a>
                            </h3>
                        </div>
                        <div class="col-md-3">
                            <h3>贊助：
                                <a class="aws" href="http://aws.amazon.com">
                                    <img src="<?php echo base_url(); ?>assets/img/aws_logo.png" alt="AWS">
                                </a>
                            </h3>
                            <!-- h3 a.aws img-->
                        </div>
                    </div>
                </div>
            </footer>
        </div>
