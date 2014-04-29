        <script>
            $(window).load(function() {
                $('#loading').hide();
            });
            setTimeout(function(){ 
                window.location.replace("<?php echo base_url(); ?>");
            },5000);
        </script>