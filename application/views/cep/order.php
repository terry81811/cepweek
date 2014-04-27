<body>
    <div class="facebook"><a href="https://www.facebook.com/253825544806259"></a></div>
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
                        <img src="<?php echo base_url(); ?>/assets/photo/cake.png" class="img-responsive">
                    </div>
                    <div class="col-md-7">
                        <div class="cake-info">
                            <ul>
                                <li>六村蛋糕，適合小家庭的午餐時光</li>
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
                            每盒蛋糕均附贈部落歌曲原聲帶 ＋ 部落藝術家手繪明信片套組
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-form">
                <form action="api/order" method="post" role="form" class="form-inline">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- receiver -->
                        <div class="receiver">
                            <h3>收貨人資訊</h3>
                            <div class="row mg10">
                                <div class="form-group">
                                    <label for="rec_name1">收件人：</label>
                                    <input class="form-control rec-input" type="text" name="rec_name[]" placeholder="王小明" id="rec_name1">
                                </div>
                                <div class="form-group">
                                    <label for="rec_num1">數量：</label>
                                    <input class="form-control num" type="text" name="rec_num[]" placeholder="10" id="rec_num1">
                                </div>
                                <div class="form-group">
                                    <label for="rec_phone1">收件人電話：</label>
                                    <input class="form-control rec-phone" type="text" name="rec_phone[]" placeholder="09xx-xxx-xxx" id="rec_phone1">
                                </div>
                                <div class="form-group rec_a">
                                    <label for="rec_arrive_time1">到貨時間：</label>
                                    <select class="form-control" name="rec_arrive_time[]" id="rec_arrive_time1">
                                        <option value="白天">白天</option>
                                        <option value="晚上">晚上</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mg10">
                                <div class="form-group">
                                    <label for="rec_add_num1">郵遞區號：</label>
                                    <input class="form-control add_num" type="text" name="rec_add_num[]" placeholder="100" id="rec_add_num1">
                                </div>
                                <div class="form-group">
                                    <label for="rec_address1">地址：</label>
                                    <input class="form-control address" type="text" name="rec_address[]" placeholder="" id="rec_address1">
                                </div>
                            </div>
                            <div class="row mg10 count">
                                <div class="pull-right">小計：<span class="price">390</span></div>
                            </div>
                        </div>
                        <!-- end of receiver -->

                        <div class="line"></div>

                        <!-- .total -->
                        <div class="row mg10 total">
                            <div class="pull-left add-receiver">
                                <span class="glyphicon glyphicon-plus-sign"></span> 新增收貨人
                            </div>
                            <div class="pull-right">合計：<span class="price">390</span></div>
                        </div>
                        <!-- end of .total -->

                        <!-- payment -->
                        <div class="payment">
                            <h3>付款方式</h3>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <a href="" role="button" class="payment-btn" id="payment-webatm-btn">WebATM</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="" role="button" class="payment-btn" id="payment-credit_card-btn">線上刷卡</a>
                                </div>
                                <div style="display:none">
                                    <input type="radio" name="payment" value="webatm" id="payment-webatm-radio">WebATM<br>
                                    <input type="radio" name="payment" value="credit_card" id="payment-credit_card-radio">線上刷卡
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="subscriber-info">
                                        <div class="row mg10">
                                            <div class="form-group">
                                                <label for="pay_name">付款人：</label>
                                                <input class="form-control pay_name" type="text" name="pay_name" placeholder="王大明" id="pay_name">
                                            </div>

                                        </div>
                                        <div class="row mg10">
                                            <div class="form-group">
                                                <label for="pay_phone">付款人電話：</label>
                                                <input class="form-control pay_phone" type="text" name="pay_phone" placeholder="09xx-xxx-xxx" id="pay_phone">
                                            </div>
                                        </div>
                                        <div class="row mg10">
                                            <div class="form-group">
                                                <label for="pay_email">E-mail：</label>
                                                <input class="form-control pay_email" type="text" name="pay_email" placeholder="rainbowhope.service@gmail.com" id="pay_email">
                                            </div>
                                        </div>
                                        <div class="row mg10">
                                            <div class="receipt">
                                                <input type="checkbox" name="get-receipt-or-not-checkbox" id="get-receipt-or-not-checkbox">
                                                <label for="get-receipt-or-not-checkbox">是否索取發票？</label>
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
                                                    <input class="form-control pay_address" type="text" name="pay_address" placeholder="" id="pay_address">
                                                </div>
                                            </div>
                                            <div class="row mg10">
                                                <div class="form-group">
                                                    <label for="pay_title">發票抬頭：</label>
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
                            <h3>確認訂單</h3>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="confirm-info">
                                        <p>您總共訂了<span class="total-num">1</span>個蛋糕</p>
                                        <p>合計<span class="total-price">390</span><span class="shipping-fee">（含運）</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg10 submit-btn-row">
                                <button type="submit" class="btn btn-warning btn-lg">送出</button>
                            </div>
                        </div>
                        <!-- end of .confirm -->
                    </div>
                </div>

                

                </form>
            </div>
        </div>
    </div>
