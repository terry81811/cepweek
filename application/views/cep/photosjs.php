        <script src="<?php echo base_url(); ?>assets/js/lib/masonry.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/lib/jquery.colorbox-min.js"></script>
        <script>
            $(window).load(function() {
                $('#loading').hide();
            });
            $(".group1").colorbox({rel:'group1'});
            $(".main-nav .photos").addClass("target");
        </script>
        <script>
            var $container = $(".masonry-container");
            // initialize
            $container.masonry({
              columnWidth: 20,
              itemSelector: ".item"
            });
        </script>