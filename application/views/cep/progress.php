<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="main-container">
                <div class="row">
                <header class="header">
                    <div class="logo"><a href=""></a></div>
                    <div class="banner"></div>
                </header>
                </div>
                <div class="row">
                <nav class="main-nav">
                    <ul class="nav nav-pills nav-justified">
                        <li class="about"><a href="<?php echo base_url(); ?>about">緣起</a></li>
                        <li class="product"><a href="<?php echo base_url(); ?>product">商品</a></li>
                        <li class="progress"><a href="<?php echo base_url(); ?>progress">進度</a></li>
                        <li class="edm"><a href="<?php echo base_url(); ?>edm">edm</a></li>
                    </ul>
                </nav>
                </div>
                <div class="order-info">
                    <h2 class="remainder">剩下<span>999</span>個</h2>
                    <div class="chart" data-percent="89" data-scale-color="#ffb400">89%</div>
                </div>
                <div class="wall-container">
                    <div class="wall-cube">
                        <div class="wall-black"></div>
                        <div class="wall-colorful"></div>
                    </div>
                    <div class="wall-cube wall-cube1">
                        <div class="wall-black"></div>
                        <div class="wall-colorful"></div>
                    </div>
                    <div class="wall-cube wall-cube2">
                        <div class="wall-black"></div>
                        <div class="wall-colorful"></div>
                    </div>
                    <div class="wall-cube wall-cube3">
                        <div class="wall-black"></div>
                        <div class="wall-colorful"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="call-to-action" role="button">
            <a href="<?php echo base_url(); ?>order"></a>
        </div>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/lib/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script>
            $(function() {
                $(".chart").easyPieChart({
                    //your options goes here
                });
                setTimeout(function() {
                    $(".wall-cube").addClass("active");
                },300);
                
            });
        </script>
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
