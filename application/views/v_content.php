<style>


.wrap {
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
  margin: auto;
  height: 310px;
}

a {
  text-decoration: none;
  color: #1a1a1a;
}

.countdown {
width: 720px;
margin: 0 auto;
}
.countdown .bloc-time {
float: left;
margin-right: 45px;
text-align: center;
}
.countdown .bloc-time:last-child {
margin-right: 0;
}
.countdown .count-title {
display: block;
margin-bottom: 15px;
font: normal 0.94em "Lato";
color: #1a1a1a;
text-transform: uppercase;
}
.countdown .figure {
position: relative;
float: left;
height: 110px;
width: 100px;
margin-right: 10px;
background-color: #fff;
border-radius: 8px;
-moz-box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), inset 2px 4px 0 0 rgba(255, 255, 255, 0.08);
-webkit-box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), inset 2px 4px 0 0 rgba(255, 255, 255, 0.08);
box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), inset 2px 4px 0 0 rgba(255, 255, 255, 0.08);
}
.countdown .figure:last-child {
margin-right: 0;
}
.countdown .figure > span {
position: absolute;
left: 0;
right: 0;
margin: auto;
font: normal 5.94em/107px "Lato";
font-weight: 700;
color: #de4848;
}
.countdown .figure .top:after,
.countdown .figure .bottom-back:after {
content: "";
position: absolute;
z-index: -1;
left: 0;
bottom: 0;
width: 100%;
height: 100%;
border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.countdown .figure .top {
z-index: 3;
background-color: #f7f7f7;
transform-origin: 50% 100%;
-webkit-transform-origin: 50% 100%;
-moz-border-radius-topleft: 10px;
-webkit-border-top-left-radius: 10px;
border-top-left-radius: 10px;
-moz-border-radius-topright: 10px;
-webkit-border-top-right-radius: 10px;
border-top-right-radius: 10px;
-moz-transform: perspective(200px);
-ms-transform: perspective(200px);
-webkit-transform: perspective(200px);
transform: perspective(200px);
}
.countdown .figure .bottom {
z-index: 1;
}
.countdown .figure .bottom:before {
content: "";
position: absolute;
display: block;
top: 0;
left: 0;
width: 100%;
height: 50%;
background-color: rgba(0, 0, 0, 0.02);
}
.countdown .figure .bottom-back {
z-index: 2;
top: 0;
height: 50%;
overflow: hidden;
background-color: #f7f7f7;
-moz-border-radius-topleft: 10px;
-webkit-border-top-left-radius: 10px;
border-top-left-radius: 10px;
-moz-border-radius-topright: 10px;
-webkit-border-top-right-radius: 10px;
border-top-right-radius: 10px;
}
.countdown .figure .bottom-back span {
position: absolute;
top: 0;
left: 0;
right: 0;
margin: auto;
}
.countdown .figure .top,
.countdown .figure .top-back {
height: 50%;
overflow: hidden;
-moz-backface-visibility: hidden;
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
}
.countdown .figure .top-back {
z-index: 4;
bottom: 0;
background-color: #fff;
-webkit-transform-origin: 50% 0;
transform-origin: 50% 0;
-moz-transform: perspective(200px) rotateX(180deg);
-ms-transform: perspective(200px) rotateX(180deg);
-webkit-transform: perspective(200px) rotateX(180deg);
transform: perspective(200px) rotateX(180deg);
-moz-border-radius-bottomleft: 10px;
-webkit-border-bottom-left-radius: 10px;
border-bottom-left-radius: 10px;
-moz-border-radius-bottomright: 10px;
-webkit-border-bottom-right-radius: 10px;
border-bottom-right-radius: 10px;
}

.countdown .figure .top-back span {
    position: absolute;
    top: -100%;
    left: 0;
    right: 0;
    margin: auto;
}

.gallery {
    margin: -16px -25px 43px;
    display: flex;
    flex-wrap: wrap;
    padding-right: 30px;
}

.gallery .gallery-item {
    padding: 0 12px;
    margin-top: 10px;
    margin-bottom: 0
}

.gallery.gallery-columns-2 .gallery-item {
    width: 50%
}

.gallery.gallery-columns-3 .gallery-item {
    width: 33.33%
}

.gallery.gallery-columns-4 .gallery-item {
    width: 25%
}

.gallery.gallery-columns-5 .gallery-item {
    width: 20%
}

.widget_media_gallery .gallery-item {
    padding: 0 5px;
    margin-top: 10px;
    margin-bottom: 0
}

.widget_media_gallery .gallery {
    margin: -10px -5px 0
}

@media (min-width: 768px) {
    .foto {
        display: none;
    }
}

@media (max-width: 768px) {
    .slotholder {
        height: 50%!important;
    }

    .mainslider {
        height: 300px!important;
    }

    .foto {
        display: block;
    }
    
        .foto-talent {
        display: none;
    }
    
    .hermes {
        top:25%!important;
    }
}

figure img {
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
}

.img-tombol {
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 90%;
}
</style>

<!-- main slider -->
<?php $this->load->view('v_mainslider');  ?>
<!-- Intro -->
<?php $this->load->view('v_intro');  ?>
<!-- Intro Talent -->
<?php $this->load->view('v_introtalent');  ?>
<!-- Gallery Talent -->
<?php $this->load->view('v_gallery');  ?>
<!-- Viedo Talent -->
<?php $this->load->view('v_videotalent');  ?>
<!-- Viedo Talent -->
<?php $this->load->view('v_ending');  ?>
<!-- Pembayaran -->
<?php if($this->input->get('checkout') != ''){
    $this->load->view('checkout_snap');
} ?>
