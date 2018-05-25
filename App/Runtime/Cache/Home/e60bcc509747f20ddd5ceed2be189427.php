<?php if (!defined('THINK_PATH')) exit();?> <div class="bottom_x"></div>
    <div class="footer">
        <div class="wp">
            <div class="box">
                <div class="blogo l">
                    <img src="Public/Home/images/logo2.png" alt="">
                </div>
                <div class="a"><a href="">联系我们</a><span></span><a href="">站点地图</a><span></span><a href="">法律声明</a></div> 
                <div class="p">Copyright ©  2016 瑪緻裝飾建材(深圳)有限公司 All Rights Reserved.</div>               
            </div>
        </div>
    </div>


    <script type="text/javascript">
            $(function () {
                var winH = $(window).height();
                var aboxH = $(".bottom_x").height();
                var bboxH = $(".footer").outerHeight();
                var cboxH = $(".header").outerHeight();
                //var dboxH = $(".bottom_t").outerHeight();
                $(".bg").css("height",winH - aboxH - bboxH + 'px');
                $(".main").css("height",winH - aboxH - bboxH - cboxH + 'px');
                $(".home_nav ul li a").css("height",winH - aboxH - bboxH - cboxH - 40 + 'px');
            })
    </script>

</body>
</html>