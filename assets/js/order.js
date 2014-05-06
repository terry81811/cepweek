$(function() {
    $(".add-receiver").tooltip();
    $("#get-receipt-or-not-checkbox").on("click",function() {
        $(".get-receipt-or-not").toggleClass("check");
    });
    //webatm
    $("#payment-webatm-btn").on("click", function(e) {
        e.preventDefault();
        if ( !$(".remittance").hasClass("hidden") ) {
            $(".payment-btn").removeClass("active");
            $(".remittance").addClass("hidden");
        } else { //確認送出WebATM訂單
            alertify.confirm("確認送出訂單？將會進入WebATM刷卡頁面", function (e) {
                if (e) {
                    // user clicked "ok"
                    $("#payment-webatm-radio").trigger("click");
                    $(".payment-btn").removeClass("active");
                    $(this).addClass("active");
                    $("#order-submit-btn").trigger("click");
                } else {
                    alertify.error("訂單尚未送出");
                }
            });
        }
    });
    //線上刷卡
    $("#payment-credit_card-btn").on("click", function(e) {
        e.preventDefault();
         $(".payment-btn").removeClass("active");
         $(this).addClass("active");
         $("#payment-credit_card-radio").trigger("click");
        $("#order-submit-btn").trigger("click");

    });
    //匯款按鈕
    $("#payment-remittance").on("click", function(e) {
        e.preventDefault();
        if ( $("#payment-remittance").hasClass("active") ) {
            $(".payment-btn").removeClass("active");
        } else {
            $(this).addClass("active");
        }
        $("#payment-remittance-radio").trigger("click");
        $(".remittance").toggleClass("hidden");
    });
    //匯款確認按鈕
    $("#remittance-btn").on("click", function(e){
        e.preventDefault();
        alertify.confirm("確認送出匯款訂單？", function (e) {
            if (e) {
                // user clicked "ok"
                $("#order-submit-btn").trigger("click");
            } else {
                // user clicked "Cancel"
                alertify.error("訂單尚未送出");
            }
        });
    })
    $(".order-form").on("blur", ".num", function() {
        var total_order_num = 0;
        var total_order_price = 0;
        var local_order_num = parseInt($(this).val(),10);
        var local_order_price = 0;

        // local
        if (local_order_num >= 10) { // 免運費
            local_order_price = local_order_num * 390;
        } else if (isNaN(local_order_num)) {
            alertify.alert("訂購數量請填入數字！");
        } else if (local_order_num == 0) {
            $(this).val("");
            alertify.alert("訂購數量不得為0！");
        } else if (local_order_num < 0 ) {
            $(this).val("");
            alertify.alert("訂購數量不得小於0！");
        } else {
            local_order_price = local_order_num * 390 + 150;
        }
        $(this).parents(".receiver").find(".price").html(local_order_price);

        // total
        $(".order-form .num").each(function() {
            var num = parseInt($(this).val(), 10);
            total_order_num = num + total_order_num;
        });
        $(".order-form .price").each(function() {
            var price = parseInt($(this).text(), 10);
            total_order_price = price + total_order_price;
        });
        $(".total-price").html(total_order_price);

        // total confirm
        $(".confirm-total-price").html(total_order_price);
        $(".confirm-total-num").html(total_order_num);
    });
    $(".order-form").on("mouseenter", ".receiver", function() {
        if ($(".receiver").length > 1) {
            $(this).find("h3").append('<span class="receiver-delete glyphicon glyphicon-remove-sign pull-right"></span>')
        }
    }).on("mouseleave", ".receiver", function() {
        if ($(".receiver").length > 1) {
            $(this).find(".receiver-delete").remove();
        }
    })
    $(".order-form").on("click",".receiver-delete",function(){
        
        // count the price 
        var total_order_num = 0;
        var total_order_price = 0;
        
        // delete the node
        $(this).parents(".receiver").remove();

        // total
        $(".order-form .num").each(function() {
            var num = parseInt($(this).text(), 10);
            total_order_num = num + total_order_num;
        });
        $(".order-form .price").each(function() {
            var price = parseInt($(this).text(), 10);
            total_order_price = price + total_order_price;
        });
        $(".total-price").html(total_order_price);

        // total confirm
        $(".confirm-total-price").html(total_order_price);
        $(".confirm-total-num").html(total_order_num);

    })
    $(".add-receiver").on("click", function() {
        $(".line").before(add_new_receiver());
    })
    function add_new_receiver() {
        var receiver_template = [];
        var index = $(".receiver").length + 1;
        receiver_template += [
            '<div class="receiver">',
            '    <h3>【收貨人資訊】</h3>',
            '    <div class="row mg10">',
            '        <div class="form-group">',
            '            <label for="rec_name'+index+'">收件人：</label>',
            '            <input class="form-control rec-input" type="text" name="rec_name[]" placeholder="王小明" id="rec_name'+index+'" required>',
            '        </div>',
            '        <div class="form-group">',
            '            <label for="rec_num'+index+'">數量：</label>',
            '            <input class="form-control num" type="number" name="rec_num[]" placeholder="10" id="rec_num'+index+'" required>',
            '        </div>',
            '        <div class="form-group">',
            '            <label for="rec_phone'+index+'">收件人電話：</label>',
            '            <input class="form-control rec-phone" type="text" name="rec_phone[]" placeholder="09xx-xxx-xxx" id="rec_phone'+index+'" required>',
            '        </div>',
            '        <div class="form-group rec_a">',
            '            <label for="rec_arrive_time'+index+'">到貨時間：</label>',
            '            <select class="form-control" name="rec_arrive_time[]" id="rec_arrive_time'+index+'">',
            '               <option value="不指定">不指定</option>',
            '               <option value="5/9(五)白天">5/9(五)白天</option>',
            '               <option value="5/9(五)晚上">5/9(五)晚上</option>',
            '               <option value="5/10(六)白天">5/10(六)白天</option>',
            '               <option value="5/10(六)晚上">5/10(六)晚上</option>',
            '               <option value="5/11(日)白天">5/11(日)白天</option>',
            '               <option value="5/11(日)晚上">5/11(日)晚上</option>',
            '            </select>',
            '        </div>',
            '    </div>',
            '    <div class="row mg10">',
            '        <div class="form-group">',
            '            <label for="rec_add_num'+index+'">郵遞區號：</label>',
            '            <input class="form-control add_num" type="text" name="rec_add_num[]" placeholder="100" id="rec_add_num'+index+'" required>',
            '        </div>',
            '        <div class="form-group">',
            '            <label for="rec_address'+index+'">地址：</label>',
            '            <input class="form-control address" type="text" name="rec_address[]" placeholder="" id="rec_address'+index+'" required>',
            '        </div>',
            '    </div>',
            '    <div class="row mg10 count">',
            '        <div class="pull-left">運費：10個以下一律NT$150，單筆滿10個以上免運費。</div>',
            '        <div class="pull-right">小計：<span class="price">0</span></div>',
            '    </div>',
            '</div>'
        ].join('');

        return receiver_template;
    }

});