        <script>
            $(window).load(function() {
                $('#loading').hide();
            });
            setTimeout(function(){ 
                window.location.replace("<?php echo base_url(); ?>");
            },10000);
        </script>