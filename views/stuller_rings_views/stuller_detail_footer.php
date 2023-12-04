<?php echo setContainer('footer'); //// end cotainer div here if page is not test engagement ?>

<div class="clear"></div>

<?php 
    require_once 'application/views/erd/main_footer_file.php';

?>
<!--<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>-->


<!-- Footer End here -->


<script type="text/javascript" src="<?php echo SITE_URL; ?>js/moijey_js/modernizr.custom.46884.js"></script>

<script src="<?php echo SITE_URL; ?>js/moijey_js/bars.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/moijey_js/jquery.slicebox.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/moijey_js/jquery.flexisel.js"></script>

<script type="text/javascript">
    $(function () {

        var Page = (function () {

            var $navArrows = $('#nav-arrows').hide(),
                $navDots = $('#nav-dots').hide(),
                $nav = $navDots.children('span'),
                $shadow = $('#shadow').hide(),
                slicebox = $('#sb-slider').slicebox({
                    onReady: function () {

                        $navArrows.show();
                        $navDots.show();
                        $shadow.show();

                    },
                    onBeforeChange: function (pos) {

                        $nav.removeClass('nav-dot-current');
                        $nav.eq(pos).addClass('nav-dot-current');

                    }
                }),

                init = function () {

                    initEvents();

                },
                initEvents = function () {

                    // add navigation events
                    $navArrows.children(':first').on('click', function () {

                        slicebox.next();
                        return false;

                    });

                    $navArrows.children(':last').on('click', function () {

                        slicebox.previous();
                        return false;

                    });

                    $nav.each(function (i) {

                        $(this).on('click', function (event) {

                            var $dot = $(this);

                            if (!slicebox.isActive()) {

                                $nav.removeClass('nav-dot-current');
                                $dot.addClass('nav-dot-current');

                            }

                            slicebox.jump(i + 1);
                            return false;

                        });

                    });

                };

            return {
                init: init
            };

        })();

        Page.init();

    });
</script>


<!-- Stats -->
<script src="<?php echo SITE_URL; ?>js/moijey_js/waypoints.min.js"></script>
<script src="<?php echo SITE_URL; ?>js/moijey_js/counterup.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    });
</script>
<!-- //Stats -->

<script type="text/javascript" src="<?php echo SITE_URL; ?>js/moijey_js/jquery.flexisel.js"></script>
<!-- flexisel -->
<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 4,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 2
                }
            }
        });

    });
</script>
<!-- //flexisel -->


<!-- //flexisel -->
<!-- js for portfolio lightbox -->
<script src="<?php echo SITE_URL; ?>js/moijey_js/jquery.chocolat.js "></script>
<!-- //menu -->
<!-- for bootstrap working -->
<script src="<?php echo SITE_URL; ?>js/moijey_js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/moijey_js/move-top.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/moijey_js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
            };
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //here ends scrolling icon -->

<style type="text/css">
    
.dropdown:hover .dropdown-menu{
    display: block !important;
}
.navbar-right ul.dropdown-menu {
    right: auto;
    width: 240px !important;
    text-align: left !important;
}
.navbar-right ul.dropdown-menu a{
    padding-left: 15px !important;
}
</style>


</body>
</html>