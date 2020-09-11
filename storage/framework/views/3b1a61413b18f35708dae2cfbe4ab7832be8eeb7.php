<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('themes.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
<div id="page"  class="wsmenucontainer clearfix">
    <div class="overlapblackbg"></div>

    <!-- ==========  HEADER ================= -->
    <div id="pheader">
        <div class="header clearfix">
            <?php echo $__env->make('themes.includes.logo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="hright">
                <?php echo $__env->make('themes.includes.header_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('themes.includes.menu_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div><!-- /.header -->

        <?php echo $__env->make('themes.includes.trending', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- ==========  HEADER : END  ========== -->

    <!-- ==========  MAIN =================== -->
    <div class="pmain">
        <div class="list-col-tow clearfix">
            <?php echo $__env->make('themes.includes.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('main-content'); ?>
          <?php echo $__env->make('themes.includes.sidebar_group', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </div>
    <!-- ==========  MAIN : END ============= -->

        <?php echo $__env->make('themes.includes.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ==========  FOOTER =================-->

    <div id="footer">
        <?php echo $__env->make('themes.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <!-- ==========  FOOTER : END =========== -->
        <p id="back-top" style="display: block;"> <a href="#top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a> </p>
        <?php echo $__env->make('themes.includes.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script type="text/javascript">
            $(document).on('ready', function() {
                $('.multi-item-carousel').carousel({
                    interval: false,
                    wrap:false
                });
                if ($(".multi-item-carousel .carousel-inner .item:first").hasClass("active")) {
                    $(".multi-item-carousel").children(".left").hide();
                    $(".multi-item-carousel").children(".right").show();
                }

                $('.carousel').on('slid.bs.carousel', function () {
                    var carouselData = $(this).data('bs.carousel');
                    var currentIndex = carouselData.getItemIndex(carouselData.$element.find('.item.active'));
                    $(this).children('.carousel-control').show();
                    if(currentIndex == 0){
                        $(this).children('.left.carousel-control').hide();
                    }else if(currentIndex+1 == carouselData.$items.length){
                        $(this).children('.right.carousel-control').hide();
                    }
                });
                $('.multi-item-carousel .item').each(function(){
                    var next = $(this).next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }
                    next.children(':first-child').clone().appendTo($(this));
                    if (next.next().length>0) {
                        next.next().children(':first-child').clone().appendTo($(this));
                    } else {
                        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
                    }
                });

                $('.multi-item-carousel .item a').hover(function(e) {
                    var $this = $(this);
                    var img = $this.attr('data-img-big');
                    //alert(img);
                    $(this).closest('.info-product').closest('.item-box').find('.cover img').attr('src',img);

                });
            });
        </script>

</div>
    <?php echo $__env->yieldContent('page-script'); ?>
<!-- ===============  PAGE : END =============== -->
</body>
</html>