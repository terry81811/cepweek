        <script src="<?php echo base_url(); ?>assets/js/lib/jquery.colorbox-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/lib/alertify.min.js"></script>
        <script>

            $(window).load(function() {
                $('#loading').hide();
                setTimeout(function() {
                    $(".call-to-action").addClass("animated wobble");
                }, 4000);
            });
            $(function() {
                $(".youtube").colorbox({iframe:true, innerWidth:853, innerHeight:480});
                if(typeof(Storage) !== "undefined") {
                    if (localStorage.rainbowhope == undefined) {
                        $("#success_modal").modal();
                        localStorage.rainbowhope = true;
                    }
                } else {
                    // Sorry! No Web Storage support..
                }
            });

        </script>