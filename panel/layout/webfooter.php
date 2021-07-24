<div class="columns copy-right text-right">
                            <p>© 2019 Placidity. All rights reserved | Design by
                                <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //titels-5 -->
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
				<span class="fa fa-long-arrow-up"></span>
		</button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->
    </section>


    <div id="v-w3layouts"></div>
    <script>
        (function(v, d, o, ai) {
            ai = d.createElement('script');
            ai.defer = true;
            ai.async = true;
            ai.src = v.location.protocol + o;
            d.head.appendChild(ai);
        })(window, document, 'http://a.vdo.ai/core/v-w3layouts/vdo.ai.js');
    </script>
</body>

</html>