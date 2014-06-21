        <script>
            $(window).load(function() {
                $('#loading').hide();
                setTimeout(function() {
                    $(".call-to-action").addClass("animated tada");
                }, 7000);
            });
            $(function() {
                $(".main-nav .product").addClass("target");
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