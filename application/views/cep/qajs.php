<script>
    $(window).load(function() {
        $('#loading').hide();
    });
    $(function() {
        $(".main-nav .qa").addClass("target");
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