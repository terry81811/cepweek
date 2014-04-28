$(function() {
    $("#get-receipt-or-not-checkbox").on("click",function() {
        $(".get-receipt-or-not").toggleClass("check");
    });
    $("#payment-webatm-btn").on("click", function(e) {
        e.preventDefault();
        $("#payment-webatm-radio").trigger("click");
        $(".payment-btn").removeClass("active");
        $(this).addClass("active");
        $("#payment-webatm-radio").trigger("click");
        $("#order-submit-btn").trigger("click");
    });
    $("#payment-credit_card-btn").on("click", function(e) {
        e.preventDefault();
    //     $(".payment-btn").removeClass("active");
    //     $(this).addClass("active");
    //     $("#payment-credit_card-radio").trigger("click");
    });
    $("#remittance-btn").on("click", function(){
        e.preventDefault();
        $("#order-submit-btn").trigger("click");
    })
    $("#payment-remittance").on("click", function(e) {
        e.preventDefault();
        $(".payment-btn").removeClass("active");
        $(this).addClass("active");
        $("#payment-remittance-radio").trigger("click");
        $(".remittance").toggleClass("hidden");
    });
    $(".order-form").on("blur", ".num", function() {
        var total_order_num = 0;
        var total_order_price = 0;
        var local_order_num = parseInt($(this).val(),10);
        var local_order_price = 0;

        // local
        if (local_order_num >= 10) { // 免運費
            local_order_price = local_order_num * 390;
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
            '    <h3>收貨人資訊</h3>',
            '    <div class="row mg10">',
            '        <div class="form-group">',
            '            <label for="rec_name'+index+'">收件人：</label>',
            '            <input class="form-control rec-input" type="text" name="rec_name[]" placeholder="王小明" id="rec_name'+index+'">',
            '        </div>',
            '        <div class="form-group">',
            '            <label for="rec_num'+index+'">數量：</label>',
            '            <input class="form-control num" type="text" name="rec_num[]" placeholder="10" id="rec_num'+index+'">',
            '        </div>',
            '        <div class="form-group">',
            '            <label for="rec_phone'+index+'">收件人電話：</label>',
            '            <input class="form-control rec-phone" type="text" name="rec_phone[]" placeholder="09xx-xxx-xxx" id="rec_phone'+index+'">',
            '        </div>',
            '        <div class="form-group rec_a">',
            '            <label for="rec_arrive_time'+index+'">到貨時間：</label>',
            '            <select class="form-control" name="rec_arrive_time[]" id="rec_arrive_time'+index+'">',
            '                <option value="白天">白天</option>',
            '                <option value="晚上">晚上</option>',
            '            </select>',
            '        </div>',
            '    </div>',
            '    <div class="row mg10">',
            '        <div class="form-group">',
            '            <label for="rec_add_num'+index+'">郵遞區號：</label>',
            '            <input class="form-control add_num" type="text" name="rec_add_num[]" placeholder="100" id="rec_add_num'+index+'">',
            '        </div>',
            '        <div class="form-group">',
            '            <label for="rec_address'+index+'">地址：</label>',
            '            <input class="form-control address" type="text" name="rec_address[]" placeholder="" id="rec_address'+index+'">',
            '        </div>',
            '    </div>',
            '    <div class="row mg10 count">',
            '        <div class="pull-left">運費：NT$150，單筆滿10個免運費。</div>',
            '        <div class="pull-right">小計：<span class="price">0</span></div>',
            '    </div>',
            '</div>'
        ].join('');

        return receiver_template;
    }

});