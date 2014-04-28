        <script src="<?php echo base_url(); ?>assets/js/lib/jquery.colorbox-min.js"></script>
        <script>

            $(window).load(function() {
                $('#loading').hide();
            });
            $(function() {
                $(".youtube").colorbox({iframe:true, innerWidth:853, innerHeight:480});
            })
        </script>