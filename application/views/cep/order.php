<body>
    <div class="facebook"><a href="https://www.facebook.com/253825544806259"></a></div>
    <div class="contact-us"><a href="mailto:rainbowhope.service@gmail.com" target="_top"></a></div>
    <!-- modal -->
    
    <!-- end of modal -->
    <div class="container">
        <div class="main-container">
            <header class="header">
                <a href="<?php echo base_url(); ?>" class="logo img-responsive">
                    <img src="<?php echo base_url(); ?>/assets/img/logo.png" class="img-responsive">
                </a>
            </header>
            <div class="order-intro-frame">
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?php echo base_url(); ?>/assets/img/Cake.jpg" class="img-responsive">
                    </div>
                    <div class="col-md-7">
                        <div class="cake-info">
                            <ul>
                                <li>六吋蛋糕，適合小家庭的午茶時光</li>
                                <li>南投土鳳梨飽滿果粒</li>
                                <li>蜂蜜檸檬清爽無負擔</li>
                                <li>微熱山丘嚴選清蛋白</li>
                            </ul>
                            <div class="sale-price pull-right">售價NT$390元</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="present">
                            每盒蛋糕均附贈<span class="focus">部落歌曲原聲帶</span> ＋ 部落藝術家<span class="focus">手繪明信片套組</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="notice">
                                <ul class="list-unstyled">
                                    <li>請於到貨後<span class="focus">4日</span>內食用，並以<span class="focus">低溫冷藏</span>方式保存</li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-form">
                <form action="api/order" method="post" role="form" class="form-inline" id="order-form-validator">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- receiver -->
                        <div class="receiver">
                            <h3>【收貨人資訊】</h3>
                            <div class="row mg10">
                                <div class="form-group">
                                    <label for="rec_name1">收件人：</label>
                                    <input class="form-control rec-input" type="text" name="rec_name[]" placeholder="王小明" id="rec_name1" required>
                                </div>
                                <div class="form-group">
                                    <label for="rec_num1">數量：</label>
                                    <input class="form-control num" type="number" name="rec_num[]" placeholder="10" id="rec_num1" required>
                                </div>
                                <div class="form-group">
                                    <label for="rec_phone1">收件人電話：</label>
                                    <input class="form-control rec-phone" type="text" name="rec_phone[]" placeholder="09xx-xxx-xxx" id="rec_phone1" required>
                                </div>
                                <div class="form-group rec_a">
                                    <label for="rec_arrive_time1">到貨時間：</label>
                                    <select class="form-control" name="rec_arrive_time[]" id="rec_arrive_time1">
                                        <option value="不指定">不指定</option>
                                        <option value="5/16(五)白天">5/16(五)白天</option>
                                        <option value="5/16(五)晚上">5/16(五)晚上</option>
                                        <option value="5/17(六)白天">5/17(六)白天</option>
                                        <option value="5/17(六)晚上">5/17(六)晚上</option>
                                        <option value="5/18(日)白天">5/18(日)白天</option>
                                        <option value="5/18(日)晚上">5/18(日)晚上</option>
                                        <option value="5/19(一)白天">5/19(一)白天</option>
                                        <option value="5/19(一)晚上">5/19(一)晚上</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mg10">
                                <div class="form-group">
                                    <label for="rec_add_num1">郵遞區號：</label>
                                    <input class="form-control add_num" type="text" name="rec_add_num[]" placeholder="100" id="rec_add_num1" required>
                                </div>
                                <div class="form-group">
                                    <label for="rec_address1">地址：</label>
                                    <input class="form-control address" type="text" name="rec_address[]" placeholder="ex.台北市xx區xx路x號" id="rec_address1" required>
                                </div>
                            </div>
                            <div class="row mg10 count">
                                <div class="pull-left">運費：10個以下一律NT$150，單筆滿10個以上免運費。</div>
                                <div class="pull-right">小計：<span class="price">0</span></div>
                            </div>
                        </div>
                        <!-- end of receiver -->

                        <div class="line"></div>

                        <!-- .total -->
                        <div class="row mg10 total">
                            <div class="pull-left add-receiver" data-toggle="tooltip" data-placement="right" title="您可以增加多個收貨人，運費每個收貨人分開計算，金額一次付清">
                                <span class="glyphicon glyphicon-plus-sign"></span> 新增收貨人
                            </div>
                            <div class="pull-right">合計：<span class="total-price">0</span></div>
                        </div>
                        <!-- end of .total -->

                        <!-- payment -->
                        <div class="payment">
                            <h3>【付款人資訊】</h3>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="subscriber-info">
                                        <div class="row mg10">
                                            <div class="form-group">
                                                <label for="pay_name">付款人：</label>
                                                <input class="form-control pay_name" type="text" name="pay_name" placeholder="王大明" id="pay_name" required>
                                            </div>

                                        </div>
                                        <div class="row mg10">
                                            <div class="form-group">
                                                <label for="pay_phone">付款人電話：</label>
                                                <input class="form-control pay_phone" type="text" name="pay_phone" placeholder="09xx-xxx-xxx" id="pay_phone" required>
                                            </div>
                                        </div>
                                        <div class="row mg10">
                                            <div class="form-group">
                                                <label for="pay_email">E-mail：</label>
                                                <input class="form-control pay_email" type="email" name="pay_email" placeholder="rainbowhope.service@gmail.com" id="pay_email" required>
                                            </div>
                                        </div>
                                        <div class="row mg10">
                                            <div class="receipt">
                                                <input type="checkbox" name="get-receipt-or-not-checkbox" id="get-receipt-or-not-checkbox">
                                                <label for="get-receipt-or-not-checkbox">是否索取收據？</label>
                                            </div>
                                        </div>
                                        <div class="get-receipt-or-not">
                                            <div class="row mg10">
                                                <div class="form-group">
                                                    <label for="pay_post">郵遞區號：</label>
                                                    <input class="form-control pay_post" type="text" name="pay_post" placeholder="100" id="pay_post">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pay_address">地址：</label>
                                                    <input class="form-control pay_address" type="text" name="pay_address" placeholder="ex.台北市xx區xx路" id="pay_address">
                                                </div>
                                            </div>
                                            <div class="row mg10">
                                                <div class="form-group">
                                                    <label for="pay_title">收據抬頭：</label>
                                                    <input class="form-control pay_title" type="text" name="pay_title" placeholder="" id="pay_title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pay_tax_id">統一編號：</label>
                                                    <input class="form-control pay_tax_id" type="text" name="pay_tax_id" placeholder="XXXX XXXX" id="pay_tax_id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- end of .payment -->

                        <!-- confirm -->
                        <div class="confirm">
                            <h3>【確認訂單】</h3>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="confirm-info">
                                        <p>您總共訂了<span class="confirm-total-num">0</span>個蛋糕</p>
                                        <p>合計<span class="confirm-total-price">0</span><span class="shipping-fee">(含運)</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of .confirm -->

                        <!-- payment style-->
                        <div class="payment mg10">
                            <h3>【付款方式】</h3>
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <a href="" role="button" class="payment-btn open" id="payment-webatm-btn">WebATM</a>
                                    <span>* 需自備讀卡機</span>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <a href="" role="button" class="payment-btn open" id="payment-credit_card-btn">線上刷卡</a>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <a href="" role="button" class="payment-btn open" id="payment-remittance">匯款</a>
                                </div>

                                <div style="display:none">
                                    <input type="radio" name="payment" value="webatm" id="payment-webatm-radio">WebATM<br>
                                    <input type="radio" name="payment" value="credit_card" id="payment-credit_card-radio" >線上刷卡
                                    <input type="radio" name="payment" value="remittance" id="payment-remittance-radio" >匯款

                                </div>
                            </div>
                        </div>
                        <!-- end of payment -->
                        <div class="remittance mg10 hidden">
                            <h3>匯款資料</h3>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="remittance-info">
                                        <p>銀行代號：808 玉山銀行八德分行</p>
                                        <p>戶名：桃園縣復興鄉哈凱部落永續發展協會張志雄</p>
                                        <p>存戶帳號：0277-940-015066 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg10">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        <label for="pay_title">戶名：</label>
                                        <input class="form-control order_acc_name" type="text" name="order_acc_name" placeholder="" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mg10">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        <label for="pay_title">帳戶末五碼：</label>
                                        <input class="form-control order_last_id" type="text" name="order_last_id" placeholder="" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mg10">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        <label for="pay_title">銀行代碼：</label>
                                        <input class="form-control order_bank_id" type="text" name="order_bank_id" placeholder="" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mg10">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="info">＊三日內匯款成功，系統方計入訂單</div>
                                    <a href="" id="remittance-btn" class="btn btn-warning">送出</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mg10 submit-btn-row hidden">
                    <button type="submit" class="btn btn-warning btn-lg" id="order-submit-btn">送出</button>
                </div>


                </form>
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
