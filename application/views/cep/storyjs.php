<script>
    $(function() {
        $(".main-nav .story").addClass("target");
        if(typeof(Storage) !== "undefined") {
            if (localStorage.rainbowhope == undefined) {
                $("#success_modal").modal();
                localStorage.rainbowhope = true;
            }
        } else {
            // Sorry! No Web Storage support..
        }
    });
    $(window).load(function() {
        $('#loading').hide();
    });
</script>