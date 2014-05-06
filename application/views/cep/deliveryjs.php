<script src="<?php echo base_url(); ?>assets/js/lib/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/alertify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/order.js"></script>

<script>
    $("#delivery_btn2").on("click", function(e){
        e.preventDefault();
        console.log("hi!");
        alertify.confirm("確認更改送貨結果？一送出即無法更改", function (e) {
            if (e) {
                // user clicked "ok"
                $("#delivery_form2").submit();
            } else {
                // user clicked "Cancel"
                alertify.error("貨單尚未送出");
            }
        });
    })	

    $("#delivery_btn3").on("click", function(e){
        e.preventDefault();
        alertify.confirm("確認更改送貨結果？一送出即無法更改", function (e) {
            if (e) {
                // user clicked "ok"
                $("#delivery_form3").submit();
            } else {
                // user clicked "Cancel"
                alertify.error("貨單尚未送出");
            }
        });
    })  



    $("#delivery_btn4").on("click", function(e){
        e.preventDefault();
        alertify.confirm("確認更改送貨結果？一送出即無法更改", function (e) {
            if (e) {
                // user clicked "ok"
                $("#delivery_form4").submit();
            } else {
                // user clicked "Cancel"
                alertify.error("貨單尚未送出");
            }
        });
    })  

</script>