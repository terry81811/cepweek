<script>
    var addClassToWall = 0;
    $(function() {
        $(".main-nav .progresss").addClass("target");
        setTimeout(function() {
            $(".call-to-action").addClass("animated swing");
        }, 3000);
    });
    
    $(window).scroll(function() {
        var winoffset = $(window).scrollTop();
        var walloffset = $(".wall-container").offset();
        var winheight = $(window).height();
        if (addClassToWall == 0 && (winoffset + winheight) > walloffset.top ) {
            randomElements = $(".wall-cube").get().sort(function(){ 
              return Math.round(Math.random())-0.5
            }).slice(0,<?php echo $complete_percent;?>);
            
            $(randomElements).each(function(index) {        
                var that = this;
                var t = setTimeout(function() { 
                    $(that).addClass("active"); 
                }, 30 * index);        
            });
            $(".chart").easyPieChart({
                barColor: "#43b3e2",
                trackColor: "#88d2ed",
                lineCap: "square",
                lineWidth: 35,
                size: "220",
                animate: 2000
            });

            addClassToWall = 1;
        }
    });
</script> 
