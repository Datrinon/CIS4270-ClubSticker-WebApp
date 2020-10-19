    <!-- Footer-->
    <footer id="Footer" class="clearfix">


        <!-- Footer copyright-->
        <div class="footer_copy">
            <div class="container">
                <div class="column one">
                    <a id="back_to_top" href="#" class="button button_left button_js"><span class="button_icon"><i class="icon-up-open-big"></i></span></a>
                    <div class="copyright">
                        &copy; 2020 Club Sticker. All Rights Reserved.
                    </div>
                    <!--Social info area-->
                    <ul class="social">
                        <li class="facebook">
                            <a href="https://www.facebook.com/Beantown-Themes-653197714728193" title="Facebook"><i class="icon-facebook"></i></a>
                        </li>
                        <li class="twitter">
                            <a href="https://twitter.com/BeantownThemes" title="Twitter"><i class="icon-twitter"></i></a>
                        </li>
                        <li class="dribbble">
                            <a href="#" title="Dribbble"><i class="icon-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- JS -->

    <script src="js/jquery-2.1.4.min.js"></script>

    <script src="js/mfn.menu.js"></script>
    <script src="js/jquery.plugins.js"></script>
    <script src="js/jquery.jplayer.min.js"></script>
    <script src="js/animations/animations.js"></script>
    <script src="js/email.js"></script>
    <script src="js/scripts.js"></script>

    <script src="plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="plugins/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
    <script src="plugins/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="plugins/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="plugins/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="plugins/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="plugins/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="plugins/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="plugins/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>

    <script>
        var tpj = jQuery;
        tpj.noConflict();
        var revapi55;
        tpj(document).ready(function() {
            revapi55 = tpj('#rev_slider_55_2').show().revolution({
                dottedOverlay: "none",
                delay: 8000,
                startwidth: 1180,
                startheight: 730,
                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 80,
                thumbAmount: 1,
                simplifyAll: "off",
                navigationType: "none",
                navigationArrows: "none",
                navigationStyle: "round",
                touchenabled: "on",
                onHoverStop: "on",
                nextSlideOnWindowFocus: "off",
                swipe_threshold: 0.7,
                swipe_min_touches: 1,
                drag_block_vertical: false,
                keyboardNavigation: "off",
                navigationHAlign: "center",
                navigationVAlign: "bottom",
                navigationHOffset: 0,
                navigationVOffset: 180,
                soloArrowLeftHalign: "right",
                soloArrowLeftValign: "bottom",
                soloArrowLeftHOffset: 90,
                soloArrowLeftVOffset: 40,
                soloArrowRightHalign: "right",
                soloArrowRightValign: "bottom",
                soloArrowRightHOffset: 40,
                soloArrowRightVOffset: 40,
                shadow: 0,
                fullWidth: "on",
                fullScreen: "off",
                spinner: "spinner3",
                stopLoop: "off",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                forceFullWidth: "off",
                hideTimerBar: "on",
                hideThumbsOnMobile: "on",
                hideBulletsOnMobile: "off",
                hideArrowsOnMobile: "off",
                hideThumbsUnderResolution: 768,
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0
            });
        });
    </script>

    <script>
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src", "club-sticker-images/logo.png").width(retinaLogoW).height(retinaLogoH)
            }
        });
    </script>

    </body>

    </html>