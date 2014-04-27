$(function() {
    $("#get-receipt-or-not-checkbox").on("click",function() {
        $(".get-receipt-or-not").toggleClass("check");
        console.log("check");
    })
    $("#payment-webatm-btn").on("click", function(e) {
        e.preventDefault();
        $("#payment-webatm-radio").trigger("click");
        $(".payment-btn").removeClass("active");
        $(this).addClass("active");
    });
    $("#payment-credit_card-btn").on("click", function(e) {
        e.preventDefault();
        $(".payment-btn").removeClass("active");
        $(this).addClass("active");
        $("#payment-credit_card-radio").trigger("click");
    });
});