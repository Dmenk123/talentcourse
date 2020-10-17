<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cipto Junaedi Talent Course">
    <meta name="author" content="Cipto Junaedi">
    <meta name="Cipto Junaedi Talent Course" content="">

    <title>Cipto Junaedi Talent Course</title>

	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="http://via.placeholder.com/30x30">

    <!-- Template CSS Files -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template/css/magnific-popup.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template/css/style.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template/css/skins/red.css'); ?>" />

    <!-- Revolution Slider CSS Files -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template/js/plugins/revolution/css/settings.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template/js/plugins/revolution/css/layers.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template/js/plugins/revolution/css/navigation.css'); ?>" />

    <style>
        .spinftw {
            border-radius: 100%;
            display: inline-block;
            height: 30px;
            width: 30px;
            top: 50%;
            position: absolute;
            -webkit-animation: loader infinite 2s;
            -moz-animation: loader infinite 2s;
            animation: loader infinite 2s;
            box-shadow: 25px 25px #3498db, -25px 25px #c0392b, -25px -25px #f1c40f, 25px -25px #27ae60;
            background-size: contain;
        }

        @-webkit-keyframes loader {
            0%,
            100% {
                box-shadow: 25px 25px #3498db, -25px 25px #c0392b, -25px -25px #f1c40f, 25px -25px #27ae60;
            }
            25% {
                box-shadow: -25px 25px #3498db, -25px -25px #c0392b, 25px -25px #f1c40f, 25px 25px #27ae60;
            }
            50% {
                box-shadow: -25px -25px #3498db, 25px -25px #c0392b, 25px 25px #f1c40f, -25px 25px #27ae60;
            }
            75% {
                box-shadow: 25px -25px #3498db, 25px 25px #c0392b, -25px 25px #f1c40f, -25px -25px #27ae60;
            }
        }

        @-moz-keyframes loader {
            0%,
            100% {
                box-shadow: 25px 25px #3498db, -25px 25px #c0392b, -25px -25px #f1c40f, 25px -25px #27ae60;
            }
            25% {
                box-shadow: -25px 25px #3498db, -25px -25px #c0392b, 25px -25px #f1c40f, 25px 25px #27ae60;
            }
            50% {
                box-shadow: -25px -25px #3498db, 25px -25px #c0392b, 25px 25px #f1c40f, -25px 25px #27ae60;
            }
            75% {
                box-shadow: 25px -25px #3498db, 25px 25px #c0392b, -25px 25px #f1c40f, -25px -25px #27ae60;
            }
        }

        @keyframes loader {
            0%,
            100% {
                box-shadow: 25px 25px #3498db, -25px 25px #c0392b, -25px -25px #f1c40f, 25px -25px #27ae60;
            }
            25% {
                box-shadow: -25px 25px #3498db, -25px -25px #c0392b, 25px -25px #f1c40f, 25px 25px #27ae60;
            }
            50% {
                box-shadow: -25px -25px #3498db, 25px -25px #c0392b, 25px 25px #f1c40f, -25px 25px #27ae60;
            }
            75% {
                box-shadow: 25px -25px #3498db, 25px 25px #c0392b, -25px 25px #f1c40f, -25px -25px #27ae60;
            }
        }

        body {
            /*padding: 80px 0;*/
        }
        #CssLoader
        {
            text-align: center;
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(49, 58, 56, 0.85);
            z-index: 9999;
        }
    </style>

</head>

<body>
	<!-- Preloader Starts -->
    <div class="preloader" id="preloader">
        <div class="logopreloader">
            <img src="<?= base_url('img/logo-white.png'); ?>" alt="logo-white">
        </div>
        <div class="loader" id="loader"></div>
	</div>

	<div class="wrapper">

    <!-- *** HEADER ***
 _________________________________________________________ -->

    <?php $this->load->view('v_header'); ?>
    
    <!-- *** HEADER END *** -->

	<?php $this->load->view('v_content'); ?>
	<?php 
                if (isset($content_slider)) 
                {
                    $this->load->view($content_slider); 
                } 
			 ?>
			 
			 <?php 
                if (isset($content_advantage)) 
                {
                    $this->load->view($content_advantage); 
                } 
			 ?>
			 
			 <?php 
                if (isset($content_hot)) 
                {
                    $this->load->view($content_hot); 
                } 
			 ?>
			 
			 <?php 
                if (isset($content)) 
                {
                    $this->load->view($content); 
                } 
             ?>

<!-- _________________________________________________________ -->
        <!-- *** FOOTER *** -->
        <?php $this->load->view('v_footer'); ?>
        <!-- /#footer -->
        <!-- *** FOOTER END *** -->

    </div>
    <!-- Wrapper Ends -->

    <!-- load modal per module -->
	<?php if(isset($modal)) { $this->load->view($modal); }?>
	
	
	<!-- Template JS Files -->
	<script src="<?= base_url('assets/template/js/modernizr.js');?>"></script>
	<!-- Template JS Files -->
    <script src="<?= base_url('assets/template/js/jquery-2.2.4.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/jquery.easing.1.3.js');?>"></script>
	<script src="<?= base_url('https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBpN0oc0NeZv9JolJSIzQRNW9IkUOfKrxw');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/jquery.bxslider.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/jquery.filterizr.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/jquery.magnific-popup.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/jquery.singlePageNav.min.js');?>"></script>

    <!-- Revolution Slider Main JS Files -->
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/jquery.themepunch.tools.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/jquery.themepunch.revolution.min.js');?>"></script>

    <!-- Revolution Slider Extensions -->

    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.actions.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.migration.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js');?>"></script>
    <script src="<?= base_url('assets/template/js/plugins/revolution/js/extensions/revolution.extension.video.min.js');?>"></script>

     <!-- Main JS Initialization File -->
	 <script src="<?= base_url('assets/template/js/custom.js'); ?>"></script>

	<!-- Revolution Slider Initialization Starts -->
	<script>
		(function() {
			"use strict";
			var tpj = jQuery;
			var revapi6;
			tpj(document).ready(function() {
				if (tpj("#rev_slider_6_1").revolution == undefined) {
					revslider_showDoubleJqueryError("#rev_slider_6_1");
				} else {
					revapi6 = tpj("#rev_slider_6_1").show().revolution({
						sliderType: "standard",
						jsFileLocation: "../../revolution/js/",
						sliderLayout: "fullscreen",
						dottedOverlay: "none",
						delay: 9000,
						navigation: {
							keyboardNavigation: "off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation: "off",
							onHoverStop: "off",
							touch: {
								touchenabled: "on",
								swipe_threshold: 75,
								swipe_min_touches: 1,
								swipe_direction: "horizontal",
								drag_block_vertical: false
							},
							bullets: {
								enable: true,
								hide_onmobile: false,
								style: "hermes",
								hide_onleave: false,
								direction: "vertical",
								h_align: "right",
								v_align: "center",
								h_offset: 30,
								v_offset: 0,
								space: 10,
								tmp: ''
							}
						},
						responsiveLevels: [1240, 1024, 778, 480],
						gridwidth: [1024, 850, 778, 480],
						gridheight: [600, 500, 450, 400],
						lazyType: "none",
						shadow: 0,
						spinner: "off",
						stopLoop: "on",
						stopAfterLoops: 0,
						stopAtSlide: 1,
						shuffle: "off",
						autoHeight: "off",
						disableProgressBar: "on",
						hideThumbsOnMobile: "off",
						hideSliderAtLimit: 0,
						hideCaptionAtLimit: 0,
						hideAllCaptionAtLilmit: 0,
						debugMode: false,
						fallbacks: {
							simplifyAll: "off",
							nextSlideOnWindowFocus: "off",
							disableFocusListener: false,
						}
					});
				}
			});
			
			// GOOGLE MAP
			function init_map() {
				
				var myOptions = {
					scrollwheel: false,
					zoom: 12,
					center: new google.maps.LatLng(40.7127837, -74.00594130000002),
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
				var marker = new google.maps.Marker({
					map: map,
					icon: "img/markers/red.png",
					position: new google.maps.LatLng(40.7127837, -74.00594130000002)
				});
				var infowindow = new google.maps.InfoWindow({
					content: "<strong>SALIMO</strong><br>1234 Disney Street, New York City<br>"
				});
				google.maps.event.addListener(marker, "click", function() {
					infowindow.open(map, marker);
				});
			}
			google.maps.event.addDomListener(window, "load", init_map);
			
		})(jQuery);
	</script>
	<!-- Revolution Slider Initialization Ends -->
        
    <!-- load js per modul -->
    <?php if(isset($js)) { $this->load->view($js); }?>
    
</body>

</html>