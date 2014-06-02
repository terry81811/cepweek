<script src="<?php echo base_url(); ?>assets/js/lib/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/alertify.min.js"></script>
<script>
 function removeOrderOption() {
     var thu_count_left = <?php echo (500 - $days_count['thu_count'])?>;
     var fri_count_left = <?php echo (500 - $days_count['fri_count'])?>;
     var sat_count_left = <?php echo (500 - $days_count['sat_count'])?>;
     var sun_count_left = <?php echo (500 - $days_count['sun_count'])?>;
     var mon_count_left = <?php echo (500 - $days_count['mon_count'])?>;
     if (thu_count_left <= 0) {
         $(".rec_a").find("option[value*='四']").remove();
     }
     if (fri_count_left <= 0) {
         $(".rec_a").find("option[value*='五']").remove();
     }
     if (sat_count_left <= 0) {
         $(".rec_a").find("option[value*='六']").remove();
     }
     if (sun_count_left <= 0) {
         $(".rec_a").find("option[value*='日']").remove();
     }
     if (mon_count_left <= 0) {
         $(".rec_a").find("option[value*='一']").remove();
     }
 }

 removeOrderOption();

</script>
<script src="<?php echo base_url(); ?>assets/js/order.js"></script>
