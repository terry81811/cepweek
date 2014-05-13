        <script src="<?php echo base_url(); ?>assets/js/lib/jquery.colorbox-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/lib/alertify.min.js"></script>
        <script>

            $(window).load(function() {
                $('#loading').hide();
            });
            $(function() {
                $(".youtube").colorbox({iframe:true, innerWidth:853, innerHeight:480});
                setTimeout(function() {
                    $(".call-to-action").addClass("animated wobble");
                }, 4000);
            })
        </script>